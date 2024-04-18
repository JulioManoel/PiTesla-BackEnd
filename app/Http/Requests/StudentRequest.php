<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'name' => 'required|string',
      'dateBirth' => 'required|date',
      'experience' => 'required|numeric',
      'coins' => 'required|numeric',
      'email' => 'required|string',
      'password' => 'required|string',
      'school_id' => 'required|exists:schools,id'
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   */
  public function messages(): array
  {
    return [
      'name.required' => 'Name is required',
      'name.string' => 'Name must be a string',
      'dateBirth.required' => 'Date Birth is required',
      'dateBirth.date' => 'Date Birth must be a date',
      'experience.required' => 'Experience is required',
      'experience.numeric' => 'Experience must be a numeric',
      'coins.required' => 'Coins is required',
      'coins.numeric' => 'coins must be a numeric',
      'email.required' => 'Email is required',
      'email.string' => 'Email must be a string',
      'password.required' => 'Password is required',
      'password.string' => 'Password must be a string',
      'school_id.required' => 'School_id is required',
      'school_id.exists' => 'School_id must exists',
    ];
  }
}
