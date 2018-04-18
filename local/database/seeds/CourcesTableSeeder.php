<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class CourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('cources')->truncate();

        $cources = [
        	'Khóa 56',
        	'Khóa 57',
        	'Khóa 58',
        	'Khóa 59',
        	'Khóa 60',
        	'Khóa 61',
        	'Khóa 62',
        ];

        foreach ($cources as $cource) {
            Database\Cource::create([
                'name' => $cource,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
