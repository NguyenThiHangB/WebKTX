<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class AssignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('assignations')->truncate();

        $assignations = [
        	['1', '1', '1'],
        	['2', '1', '3'],
        	['3', '2', '1'],
        	['4', '1', '2'],       	
        	['5', '1', '2'],
        	['6', '1', '2'],
        	['7', '2', '2'],
        	['8', '2', '2'],
        	['9', '2', '3'],
        	['10', '1', '1'],
        ];

        foreach ($assignations as $assignation) {
            Database\Assignation::create([
                'employee_id' => $assignation[0],
                'region_id' => $assignation[1],
                'shift_id' => $assignation[2],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
