<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();

        $users = [
        	['admin', '12345678', 'nguyenthihang.mdc@gmail.com'],
        	['admin1', '12345678', 'admin@gmail.com'],
        ];

        foreach ($users as $user) {
            Database\User::create([
                'name' => $user[0],
                'password' => $user[1],
                'email' => $user[2]
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
