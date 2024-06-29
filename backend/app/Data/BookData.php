<?php

namespace App\Data;

use App\Data\Traits\Messages;
use App\Data\Traits\ValidateAndCreate;
use Spatie\LaravelData\Attributes\Validation\DateFormat;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class BookData extends Data
{
    use ValidateAndCreate, Messages;

    public function __construct(
        #[Required, StringType, Min(3), Max(255)]
        public string $title,
        #[Required, StringType, Min(3)]
        public string $description,
        #[Required, StringType, Min(3), Max(255)]
        public string $author,
        #[Required, IntegerType]
        public int $pages,
        #[Required, DateFormat('Y-m-d')]
        public string $published_at,
    ) {
    }
}
