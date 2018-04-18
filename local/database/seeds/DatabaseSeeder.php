<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(TypeRoomsTableSeeder::class);
        $this->call(RowsTableSeeder::class);
        $this->call(CourcesTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(ShiftsTableSeeder::class);
        $this->call(AssignationsTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(ContractsTableSeeder::class);
        // $this->call(BillsTableSeeder::class);
        // $this->call(InfrastructuresTableSeeder::class);
        // $this->call(TypeInfrastructuresTableSeeder::class);
    }
}
