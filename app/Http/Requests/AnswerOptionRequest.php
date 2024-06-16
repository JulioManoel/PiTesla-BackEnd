<?php

namespace App\Http\Requests;

use App\Http\Requests\Contracts\IRequest;
use Illuminate\Foundation\Http\FormRequest;

class AnswerOptionRequest extends FormRequest implements IRequest
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
      'correct' => 'required|boolean',
      'exercise_id' => 'required|exists:exercises,id'
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
      'video.string' => 'Video must be a string',
      'video.required' => 'Video is required',
      'description.string' => 'Description must be a string',
      'description.required' => 'Description is required',
      'exercise_id.exists'=> 'Exercise not found',
    ];
  }
}
