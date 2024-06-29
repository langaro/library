<?php

namespace App\Http\Controllers;

use App\Data\BookData;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(
        public BookService $service = new BookService()
    ) {
    }

    public function index(Request $request): Collection
    {
        return $this->service->index($request->query());
    }

    public function store(Request $request): Book
    {
        $data = BookData::validateAndCreateDataObject($request->all());

        return $this->service->store($data);
    }

    public function update(Request $request, int $id): Book
    {
        $data = BookData::validateAndCreateDataObject($request->all());

        return $this->service->update($data, $id);
    }

    public function destroy(int $id): bool
    {
        return $this->service->destroy($id);
    }
}
