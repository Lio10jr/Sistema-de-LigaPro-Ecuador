<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nom_user' => 'required',
            'password' => 'required'
        ];
    }
    public function getCredentials(){
        
        $username = $this->get('nom_user');

        if ($this->isEmail($username)) {
            return [
                'email' => $username,
                'password' => $this->get('password')
            ];
        }

        return $this->only('nom_user', 'password');
    }
    public function isEmail($param){
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['nom_user' => $param],
            ['nom_user' => 'email']
        )->fails();
    }
}
