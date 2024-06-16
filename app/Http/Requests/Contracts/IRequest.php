<?php

namespace App\Http\Requests;

interface IRequest {
  public function all(): array;
  public function authorize(): bool;
  public function rules(): array;
  public function messages(): array;
}