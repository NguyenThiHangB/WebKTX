<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('positions')->truncate();

        $positions = [
        	'Quản lý',
        	'Nhân viên',       	
        ];

        foreach ($positions as $position) {
            Database\Position::create([
                'name' => $position,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
