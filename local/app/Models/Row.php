<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models as Database;
use App\Models\Region;

class Row extends Model
{
    use SoftDeletes;

    protected $table = 'rows';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'region_id',
        'number_room',
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
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the region that owns the row.
     */
    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    /**
     * The get list rows.
     *
     * @author hangnt
     */
    public static function getRow()
    {
        $rows = Database\Row::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        return $rows;
    }

    /**
     * The get list row and search
     *
     * @author hangnt
     */
    public static function getListRow($request)
    {
        $builder = Row::orderBy('created_at', 'ASC')->with('region');

        if (!empty($request['name'])) {
            $builder = $builder->where('name', 'like', '%' . $request['name']. '%');
        }
        if (!empty($request['region_id'])) {
            $builder = $builder->where('region_id', '=' , $request['region_id']);
        }

        return $builder->get();
    }

    /**
     * Find row.
     *
     * @param int $id
     * @return boolean
     * @author hangnt
     */
    public static function findRow(int $id)
    {
        $row = Row::find($id);
        return $row;
    }

    /**
     * Create row.
     *
     * @param array $request
     * @return App\Models\Row $request
     * @author hangnt
     */
    public static function createRow($request)
    {
        return Row::create($request);
    }

    /**
     * Update row.
     *
     * @param array $request
     * @param int $id
     * @return boolean
     * @author hangnt
     */
    public static function updateRow($request, int $id)
    {
        return Row::find($id)->update($request);
    }

    /**
     * Delete row.
     *
     * @param int $row
     * @return boolean
     * @author hangnt
     */
    public static function deleteRow(Database\Row $row)
    {
        return $row->delete();
    }
}
