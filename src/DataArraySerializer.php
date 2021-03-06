<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 2018-04
 */

namespace Moment\Fractal;

use League\Fractal\Pagination\PaginatorInterface;
use League\Fractal\Serializer\ArraySerializer;

class DataArraySerializer extends ArraySerializer
{
    /**
     * Serialize a collection.
     *
     * @param string $resourceKey
     * @param array  $data
     *
     * @return array
     */
    public function collection($resourceKey, array $data)
    {
        return [
            'list' => $data,
        ];
    }

    /**
     * Serialize an item.
     *
     * @param string $resourceKey
     * @param array  $data
     *
     * @return array
     */
    public function item($resourceKey, array $data)
    {
        return $data;
    }

    /**
     * Serialize null resource.
     *
     * @return array
     */
    public function null()
    {
        return [];
    }

    /**
     * Serialize the paginator.
     *
     * @param PaginatorInterface $paginator
     *
     * @return array
     */
    public function paginator(PaginatorInterface $paginator)
    {
        $pagination = [
            'total' => $paginator->getTotal(),
            'per_page' => $paginator->getPerPage(),
            'current' => $paginator->getCurrentPage(),
            'total_page' => $paginator->getLastPage(),
            'from' => $paginator->getPaginator()->firstItem() ?: 0,
            'to' => $paginator->getPaginator()->lastItem() ?: 0,
        ];

        return [
            'page' => $pagination,
        ];
    }
}
