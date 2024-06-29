<?php

namespace App\Data\Traits;

use App\Exceptions\BookValidationException;
use Illuminate\Validation\ValidationException;

trait ValidateAndCreate
{
    public static function validateAndCreateDataObject(array $payload): array
    {
        try
        {
            return self::validateAndCreate($payload)->toArray();
        } catch (ValidationException $e)
        {
            throw new BookValidationException($e->errors());
        }
    }
}
