<?php

namespace App\Support;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection as BaseCollection;

class CollectionPagination extends BaseCollection
{
    /**
     * Paginate a standard Laravel Collection.
     *
     * @param int $perPage
     * @param int $total
     * @param int $page
     * @param string $pageName
     * @return array
     */
    public function paginate($perPage, $total = null, $page = null, $pageName = 'page')
    {
        $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
        return new LengthAwarePaginator(
            $this->forPage($page, $perPage),
            $total ?: $this->count(),
            $perPage,
            $page,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ]
        );
    }
}
