<?php

namespace App\Data\Traits;

trait Messages
{
    public static function messages(): array
    {
        return [
            'required' => "O campo :attribute é obrigatório.",
            'string' => "Digite um :attribute válido.",
            'integer' => "Digite um :attribute válido.",
            'boolean' => "Digite um :attribute válido.",
            'regex' => "Digite um :attribute válido.",
            'min' => "O campo :attribute deve ter no mínimo :min caracteres.",
            'max' => "O campo :attribute deve ter no máximo :max caracteres.",
            'email' => "Digite um email válido.",
        ];
    }
}
