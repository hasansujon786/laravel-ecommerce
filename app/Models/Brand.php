<?php

namespace App\Models;

use Database\Factories\BrandFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

#[Fillable(['name', 'slug', 'image'])]
class Brand extends Model
{
    /** @use HasFactory<BrandFactory> */
    use HasFactory;

    /**
     * Scope a query to search brands across multiple columns.
     *
     * @param  array<int, string>  $columns
     */
    #[Scope]
    protected function search(Builder $query, string $term, array $columns = ['name', 'slug']): void
    {
        $term = trim($term);

        if ($term === '') {
            return;
        }

        $query->whereAny($columns, 'like', "%{$term}%");
    }
}
