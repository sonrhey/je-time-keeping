<?php

namespace App\Http\Requests;

use App\RenderJSON\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'type' => 'required|string|exists:roles,name',
      'email' => 'required|email',
      'password' => 'required',
    ];
  }
  public function failedValidation(Validator $validator)
  {
    $response = new Response();
    throw new HttpResponseException($response->renderJSON(false, $validator->errors()));
  }
}
