<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * We can't use Class instead of Trait because PHP only support single inheritance
 * That means, class UserSeeder only access outside methods (except from its parent class),
 * it has to use Trait to inherit methods from multiple class.
 */
class UserSeeder extends Seeder
{
    use TruncateTable;
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /**
         * Remove foreign key check before truncating
         * Otherwise, php artisan db:seed won't work
         */
        $this->disableForeignKeys();

        /**
         * Truncate the database to keep it clean while keep creating 10 fake data in User table
         */
        $this->truncate('users');

        /**
         * Create 10 fake data to table `users`
         */
        $user = \App\Models\User::factory(10)->create();

        /**
         * Check foreign again after creating fake data
         * Must check because we have disabled it before
         */
        $this->enableForeignKeys();
    }
}
