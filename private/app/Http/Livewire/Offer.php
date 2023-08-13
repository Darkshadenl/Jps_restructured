<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Offer as Off;

class Offer extends Component
{
    use WithPagination;

    public $search = "";
    public $min_value = "";
    public $max_value = "";
    public $min_surface = "";
    public $max_surface = "";
    public $orderBy = "added_on";
    public $orderDirection = "desc";
    public $rented = "";
    public $sold = "";
    public $available = "Alles";

    protected $queryString = [
        'search' => ['except' => ''],
        'min_value' => ['except' => ''],
        'max_value' => ['except' => ''],
        'min_surface' => ['except' => ''],
        'max_surface' => ['except' => ''],
    ];

    public function render()
    {
        $data = Off::query();

        $data = $this->orderBy($data);
        $data = $this->filterByAvailable($data);
        $data = $this->searchStreetCity($data);
        $data = $this->filterValue($data);
        $data = $this->filterSurface($data);

        return view('livewire.offer', [
            'offers' => $data->paginate(5),
        ]);
    }

    private function orderBy($data)
    {
        switch ($this->orderBy) {
            case "added_on":
                $data = $data->orderBy('added_on', $this->orderDirection);
                break;
            case "price":
                $data = $data->orderBy('price', $this->orderDirection);
                break;
            case "street":
                $data = $data->orderBy('street', $this->orderDirection);
                break;
            case "city":
                $data = $data->orderBy('city', $this->orderDirection);
                break;
            case "surface":
                $data = $data->orderBy('surface', $this->orderDirection);
                break;
        }
        return $data;
    }

    private function searchStreetCity($data)
    {
        if (!empty($this->search)) {
            $data->where('street', 'like', '%' . $this->search . '%')
                ->orWhere('city', 'like', '%' . $this->search . '%');
        }
        return $data;
    }

    private function filterValue($data)
    {
        if (!empty($this->min_value)) {
            $data->where('price', '>=', "$this->min_value");
        }

        if (!empty($this->max_value)) {
            $data->where('price', '<=', "$this->max_value");
        }
        return $data;
    }

    private function filterSurface($data)
    {
        if (!empty($this->min_surface)) {
            $data->where('surface', '>=', "$this->min_surface");
        }

        if (!empty($this->max_surface)) {
            $data->where('surface', '<=', "$this->max_surface");
        }
        return $data;
    }


    private function filterByAvailable(\Illuminate\Database\Eloquent\Builder $data)
    {
        if (!$this->available || $this->available == 'Alles') {
            return $data;
        } else if ($this->available == 'Verkocht') {
            $data->where('sold', '=', '1');
        } else if ($this->available == 'Beschikbaar') {
            $data->where('sold', '=', '0')
                ->where('rented', '=', '0')
                ->where('temporarily_rented', '=', '0');
        } else if ($this->available == 'Verhuurd') {
            $data->where('rented', '=', '1')
                ->orwhere('temporarily_rented', '=', '1');
        }
        return $data;
    }

    public function updating($name, $value)
    {
        $this->resetPage();
    }


}
