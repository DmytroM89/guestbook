<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthorsSeed::class);
        $this->call(BooksSeed::class);
        $this->call(UsersSeed::class);
        $this->call(TransactionsSeed::class);
        $this->call(BooAuthorsSeed::class);
    }
}
