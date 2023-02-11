<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReCaptchaRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $response = \Http::get("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => config('services.recaptcha.secret'),
            'response' => $value
        ]);
        if ($response->json('score') < 0.7) {
            // your action if needed
        }
        return $response->json('success');
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Unable to validate recaptcha token';
    }
}