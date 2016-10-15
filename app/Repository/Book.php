<?php

namespace App\Repository;

use Carbon\Carbon;
use DB;
use App\Contracts\Top;

class Book implements Top
{
    public function top($period)
    {
        $subPeriod = '';

        $top = DB::table('transactions')
            ->join('books', 'books.id', '=', 'transactions.book_id')
            ->select('books.id', 'books.title', 'transactions.created_at', DB::raw('count(books.id) as count'));

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

        $top->groupBy('books.title')
            ->orderBy('count', 'desc')
            ->limit(10);

        $list = $top->get();
        return $list;
    }
}