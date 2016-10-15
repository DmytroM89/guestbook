<?php

namespace App\Repository;

use Carbon\Carbon;
use DB;
use App\Contracts\Top;

class Author implements Top
{
    public function top($period)
    {
        $subPeriod = '';

        $top = DB::table('transactions')
            ->join('bookautors', 'bookautors.book_id', '=', 'transactions.book_id')
            ->join('autors', 'autors.id', '=', 'bookautors.autor_id')
            ->select('autors.name', 'autors.id', 'transactions.created_at', DB::raw('count(autors.name) as count'));

        switch ($period) {
            case 'week': $subPeriod = Carbon::now()->subWeek();
                break;
            case 'month': $subPeriod = Carbon::now()->subMonth();
                break;
            case 'year': $subPeriod = Carbon::now()->subYear();
                break;
        }

        if(!empty($period)) {
            $top->whereRaw('transactions.created_at >= ?', [$subPeriod]);
        }

        $top->groupBy('autors.name')
            ->orderBy('count', 'desc')
            ->limit(10);

        $list = $top->get();
        return $list;
    }
}