<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('regions')->truncate();

        $regions = [
        	['Khu A', '2'],
        	['Khu B', '1'],
        ];

        foreach ($regions as $region) {
        	Database\Region::create([
        		'name' => $region[0],
        		'number_row' => $region[1],
        	]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
