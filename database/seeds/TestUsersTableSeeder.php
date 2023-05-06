<?php

use Illuminate\Database\Seeder;
use App\Models\TestUser;

class TestUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TestUser::class,15)->create();
    }
}
