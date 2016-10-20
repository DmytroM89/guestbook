<?php

use Illuminate\Database\Seeder;
use App\Models\Books;

class BooksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->delete();

        Books::insert([
            [
                'title' => 'PHP',
                'description' => 'about php',
                'price' => '233.00'
            ],
            [
                'title' => 'SQL',
                'description' => 'about sql',
                'price' => '300.00'
            ],
            [
                'title' => 'JS',
                'description' => 'about js',
                'price' => '255.00'
            ],
            [
                'title' => 'CSS',
                'description' => 'about css',
                'price' => '200.00'
            ],
            [
                'title' => 'HTML',
                'description' => 'about html',
                'price' => '100.00'
            ]

        ]);
    }
}
