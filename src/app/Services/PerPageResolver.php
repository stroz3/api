<?php

namespace App\Services;

class PerPageResolver
{
    protected const DEFAULT_PER_PAGE = 15;
    protected const MAX_PER_PAGE = 100;

    public static function resolve($defaultPerPage = self::DEFAULT_PER_PAGE): int
    {
        $query = request()->query('per_page');
        if (!is_null($query)) {
            $specifiedPerPage = abs(intval($query));
            return min(self::MAX_PER_PAGE, $specifiedPerPage);
        } else {
            return $defaultPerPage;
        }
    }
}
