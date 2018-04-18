<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models as Database;

class Employee extends Model
{
    use SoftDeletes;

    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_employee',
        'name',
        'birth',
        'gender',
        'phone',
        'address',
        'position_id',
        'user_id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birth',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the number of models to return per page.
     *
     * @return int
     */
    protected $perPage = 10;

    /**
     * Get the position that owns the employee.
     */
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'position_id');
    }

    /**
     * Get the user that owns the employee.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //decrare const gender
    const GENDER_FEMALE = 0;
    const GENDER_MALE = 1;

    /**
     * The attributes that are decrare $gender
     *
     * @var array
     */
    public static $gender = [
        self::GENDER_FEMALE => 'Nữ',
        self::GENDER_MALE => 'Nam',
    ];

    /**
     * The get list Employee.
     *
     * @param  \Illuminate\Http\Request $request
     * @return App\Models\Employee $builder
     * @author hangnt
     */
    public static function getListEmployees($request)
    {
    	$builder = Employee::orderBy('position_id', 'asc')->with('position');
        
        if (!empty($request['code_employee'])) {
            $builder = $builder->where('code_employee', '=' , $request['code_employee']);
        }
        if (!empty($request['name'])) {
            $builder = $builder->where('name', 'like', '%' . $request['name']. '%');
        }
        if (!empty($request['phone'])) {
            $builder = $builder->where('phone', '=' , $request['phone']);
        }
        if (!empty($request['address'])) {
            $builder = $builder->where('address', '=' , $request['address']);
        }
        if (!empty($request['position_id'])) {
            $builder = $builder->where('position_id', '=' , $request['position_id']);
        }
        return $builder->paginate();
    }

    /**
     * Find employee.
     *
     * @param int $id
     * @return boolean
     * @author hangnt
     */
    public static function findEmployee(int $id)
    {
        $employee = Employee::find($id);
        return $employee;
    }

    /**
     * Create employee.
     *
     * @param array $request
     * @return App\Models\Employee $request
     * @author hangnt
     */
    public static function createEmployee($request)
    {
        return Employee::create($request);
    }

    /**
     * Update Employee.
     *
     * @param array $request
     * @param id int
     * @return boolean
     * @author hangnt
     */
    public static function updateEmployee($request, int $id)
    {
        return Employee::find($id)->update($request);
    }

    /**
     * Delete employee.
     *
     * @param id int
     * @return boolean
     * @author hangnt
     */
    public static function deleteEmployee(Database\Employee $employee)
    {
        return $employee->delete();
    }
}
