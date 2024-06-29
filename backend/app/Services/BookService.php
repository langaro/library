<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookService
{
    public function index(array $filters): Collection
    {
        if (empty($filters))
        {
            return Book::all();
        }

        $query = Book::query();

        if (!empty($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (!empty($filters['description'])) {
            $query->where('description', 'like', '%' . $filters['description'] . '%');
        }

        if (!empty($filters['author'])) {
            $query->where('author', 'like', '%' . $filters['author'] . '%');
        }

        if (!empty($filters['pages_from']) && !empty($filters['pages_to'])) {
            $query->whereBetween('pages', [$filters['pages_from'], $filters['pages_to']]);
        }

        if (!empty($filters['published_from']) && !empty($filters['published_to'])) {
            $query->whereBetween('published_at', [$filters['published_from'], $filters['published_to']]);
        }

        return $query->get();

    }

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
