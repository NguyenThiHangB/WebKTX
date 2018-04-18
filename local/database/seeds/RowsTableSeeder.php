<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class RowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('rows')->truncate();

        $rows = [
        	['Dãy D1', '1','60'],
        	['Dãy D2', '1','60'],
        	['Dãy HG', '2', '108']
        ];

        foreach ($rows as $row) {
        	Database\Row::create([
        		'name' => $row[0],
        		'region_id' => $row[1],
        		'number_room' => $row[2],
        	]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
