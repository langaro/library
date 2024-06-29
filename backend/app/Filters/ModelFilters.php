<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ModelFilters
{
    public function apply(Builder $query, array $filters): Builder
    {
        if (!empty($filters['title']))
        {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (!empty($filters['description']))
        {
            $query->where('description', 'like', '%' . $filters['description'] . '%');
        }

        if (!empty($filters['author']))
        {
            $query->where('author', 'like', '%' . $filters['author'] . '%');
        }

        if (!empty($filters['pages_from']) && !empty($filters['pages_to']))
        {
            $query->whereBetween('pages', [$filters['pages_from'], $filters['pages_to']]);
        }

        if (!empty($filters['published_from']) && !empty($filters['published_to']))
        {
            $query->whereBetween('published_at', [$filters['published_from'], $filters['published_to']]);
        }

        return $query;
    }
}
