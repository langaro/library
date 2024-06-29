<?php

namespace App\Services;

use App\Filters\ModelFilters;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class BookService
{
    public function __construct(
        public Model $model,
        public ModelFilters $filters
    ) {

    }

    public function index(array $filters = [], int $perPage = 10): LengthAwarePaginator
    {
        $query = $this->model->query();

        if (!empty($filters))
        {
            $query = $this->filters->apply($query, $filters);
        }

        return $query->paginate($perPage);
    }

    public function store(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(array $data, int $id): Model
    {
        $book = $this->model->find($id);
        $book->update($data);

        return $book;
    }

    public function destroy(int $id): bool
    {
        return $this->model->destroy($id);
    }
}
