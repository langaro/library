<?php

namespace App\Http\Controllers;

use App\Data\BookData;
use App\Filters\ModelFilters;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(
        public $service = new BookService(new Book(), new ModelFilters())
    ) {

    }

    public function index(Request $request): LengthAwarePaginator
    {
        $query = $request->query();
        $perPage = $request->input('per_page', 15);
        return $this->service->index($query, $perPage);
    }

    public function store(Request $request): Model
    {
        $data = BookData::validateAndCreateDataObject($request->all());

        return $this->service->store($data);
    }

    public function update(Request $request, int $id): Model
    {
        $data = BookData::validateAndCreateDataObject($request->all());

        return $this->service->update($data, $id);
    }

    public function destroy(int $id): bool
    {
        return $this->service->destroy($id);
    }
}
