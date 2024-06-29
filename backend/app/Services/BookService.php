<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function store(array $data): Book
    {
        return Book::create($data);
    }

    public function update(array $data, int $id): Book
    {
        $book = Book::find($id);
        $book->update($data);

        return $book;
    }

    public function destroy(int $id): bool
    {

        return Book::destroy($id);
    }
}
