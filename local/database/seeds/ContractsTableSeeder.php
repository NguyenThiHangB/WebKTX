<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('contracts')->truncate();

        $contracts = [
        	['SHD1', 'HD01', '1', '1', '2018-08-10'],
        	['SHD2', 'HD02', '2', '3', '2014-01-15'],
        	['SHD3', 'HD03', '3', '1', '2018-08-15'],
        	['SHD4', 'HD04', '4', '2', '2018-01-15'],       	
        	['SHD5', 'HD05', '5', '2', '2013-08-15'],
        	['SHD6', 'HD06', '6', '2', '2018-01-15'],
        	['SHD7', 'HD07', '7', '2', '2017-09-20'],
        	['SHD8', 'HD08', '8', '2', '2013-01-15'],
        ];

        foreach ($contracts as $contract) {
            Database\Contract::create([
                'code_contract' => $contract[0],
                'name' => $contract[1],
                'student_id' => $contract[2],
                'employee_id' => $contract[3],
                'date_start' => $contract[4],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
