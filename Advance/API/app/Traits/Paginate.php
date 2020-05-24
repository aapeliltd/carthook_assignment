<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
//use Illuminate\Support\Facades\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;
use Illuminate\Pagination\Paginator;

trait Paginate
{
    public function paginate($items, $perPage = 15, $page = null, $options = [])
        {
            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

            $items = $items instanceof Collection ? $items : Collection::make($items);


            return new PaginationLengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        }
}
