<?php

use Illuminate\Database\Seeder;
use App\Models\Bookautors;

class BooAuthorsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookautors')->delete();

        Bookautors::insert([
            [
                'book_id' => '1',
                'autor_id' => '1'
            ],
            [
                'book_id' => '1',
                'autor_id' => '3'
            ],
            [
                'book_id' => '3',
                'autor_id' => '2'
            ],
            [
                'book_id' => '2',
                'autor_id' => '4'
            ],
            [
                'book_id' => '4',
                'autor_id' => '1'
            ],
            [
                'book_id' => '4',
                'autor_id' => '5'
            ],
            [
                'book_id' => '5',
                'autor_id' => '5'
            ]
        ]);
    }
}
