<?php

namespace App\Factories;

use App\Repository\Book;
use App\Repository\Author;

class TopFactory
{
    public function factoryMethod($type)
    {
        switch ($type) {
            case 'books': return new Book();
            break;
            case 'authors': return new Author();
            break;
        }
    }
}