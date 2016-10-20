<?php

use Illuminate\Database\Seeder;
use App\Models\Autors;

class AuthorsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('autors')->delete();

        Autors::insert([
            [
                'name' => 'Alex',
            ],
            [
                'name' => 'Sandra'
            ],
            [
                'name' => 'Ivan'
            ],
            [
                'name' => 'Serg'
            ],
            [
                'name' => 'Petya'
            ]
        ]);
    }
}
