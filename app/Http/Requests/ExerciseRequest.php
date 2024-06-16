<?php

namespace App\Http\Requests;

use App\Http\Requests\Contracts\IRequest;
use Illuminate\Foundation\Http\FormRequest;

class ExerciseRequest extends FormRequest implements IRequest
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
      'description' => 'string',
      'test_id' => 'exists:tests,id'
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
      'description.string' => 'Description must be a string',
      'test_id.exists'=> 'Activity not found',
    ];
  }
}
