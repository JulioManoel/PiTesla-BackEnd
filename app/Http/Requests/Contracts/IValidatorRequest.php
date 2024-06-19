<?php

namespace App\Http\Requests;

interface IValidatorRequest {
  public function authorize(): bool;
  public function rules(): array;
  public function messages(): array;
}