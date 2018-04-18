<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class ShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('shifts')->truncate();

        $shifts = [
        	['Ca 1', '8h', '6h', '14h'],
        	['Ca 2', '8h', '14h', '22h'],
        	['Ca 3', '8h', '22h', '6h'],   	
        ];

        foreach ($shifts as $shift) {
            Database\Shift::create([
                'name' => $shift[0],
                'time' => $shift[1],
                'time_start' => $shift[2],
                'time_end' => $shift[3],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
