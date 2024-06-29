<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class BookValidationException extends HttpResponseException
{
    public function __construct(
        protected array $errors,
        string $message = 'Dados inválidos.'
    ) {
        $response = new JsonResponse([
            'message' => $message,
            'errors' => $this->errors,
        ], 422);

        parent::__construct($response);
    }
}
