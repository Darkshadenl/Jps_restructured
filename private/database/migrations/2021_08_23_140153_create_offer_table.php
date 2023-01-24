<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//       TODO: split city and street to diff table
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('street');
            $table->string('house_number')->nullable();
            $table->string('postal_code')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('surface')->nullable();
            $table->string('unit')->nullable();
            $table->text('extra_details')->nullable();
            $table->boolean('sold')->nullable();
            $table->boolean('rented')->nullable();
            $table->boolean('temporarily_rented')->nullable();
            $table->string('image')->nullable();
            $table->date('added_on')->nullable();
            $table->string('brochure')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer');
    }
}
