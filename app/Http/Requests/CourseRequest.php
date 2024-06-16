<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest implements IRequest
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
      'teacher_id' => 'required|exists:teachers,id',
      'discipline_id' => 'required|exists:disciplines,id',
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
      'teacher_id.required' => 'Teacher is Required',
      'teacher_id.exists' => 'Teacher not found',
      'discipline_id.required' => 'Discipline is Required',
      'discipline_id.exists' => 'Discipline not found',
    ];
  }
}
