<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('employees')->truncate();

        $employees = [
        	['NV01', 'Nguyễn Văn Hùng', '1970-01-12', '1', '0982345767', 'Cổ Nhuế - Từ Liêm - Hà Nội', 'Quản lý'],
        	['NV02', 'Đinh Hữu Khánh', '1972-03-10', '1', '0981637098', 'Hoàng Quốc Việt - Cầu Giấy - Hà Nội', 'Nhân viên'],
        	['NV03', 'Đoàn Thị Luyên', '1975-10-02', '0', '0981637098', 'Lê Trong Tấn - Hà Đông - Hà Nội', 'Nhân viên'],
        	['NV04', 'Hà Tú Hương', '1972-06-18', '0', '0981637098', 'Hoàng Quốc Việt - Cầu Giấy - Hà Nội', 'Nhân viên'],       	
        	['NV05', 'Nguyễn Quốc Trường', '1982-09-22', '1', '0981637098', 'Nhổn - Từ Liêm - Hà Nội', 'Nhân viên'],
        	['NV06', 'Vũ Thị Phương Thùy', '1988-06-20', '0', '0981637098', 'Xuân Thủy - Cầu Giấy - Hà Nội', 'Nhân viên'],
        	['NV07', 'Nguyễn Thị Hồng', '1978-12-06', '0', '0981637098', 'Nguyễn Trãi - Thanh Xuân - Hà Nội', 'Nhân viên'],
        	['NV08', 'Ngô Huyền Giang', '1988-09-05', '0', '0981637098', 'Trần Cung - Từ liêm - Hà Nội', 'Nhân viên'],
        	['NV09', 'Đỗ Khắc Điệp', '1973-11-15', '1', '0981637098', 'Xuân Đỉnh - Từ Liêm - Hà Nội', 'Nhân viên'],
        	['NV10', 'Nguyễn Thế Anh', '1989-08-19', '1', '0981637098', 'Hoàng Quốc Việt -Cầu Giấy - Hà Nội', 'Nhân viên'],
        ];

        foreach ($employees as $employee) {
            $position_id = Database\Position::where('name', $employee[6])->first()->id;
            Database\Employee::create([
                'code_employee' => $employee[0],
                'name' => $employee[1],
                'birth' => $employee[2],
                'gender' => $employee[3],
                'phone' => $employee[4],
                'address' => $employee[5],
                'position_id' => $position_id,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
