<?php

namespace App\Http\Requests;

use GuzzleHttp\Client;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {

            if (! $value) {
                return false;
            }

            $data = [
                'remoteip' => $_SERVER['REMOTE_ADDR'],
                'secret'   => config('services.recaptcha.secret'),
                'response' => $value,
            ];

            $client = new Client([
                'base_uri' => 'https://google.com/recaptcha/api/',
                'timeout' => 2.0
            ]);
            $response = $client->request('POST', 'siteverify', ['query' => $data]);
            $result = \GuzzleHttp\json_decode($response->getBody()->getContents());

            return $result && isset($result->success) && $result->success;
        });


        return [
            'email' => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'recaptcha'
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.recaptcha' => 'reCAPTCHA is not valid.',
        ];
    }
}
