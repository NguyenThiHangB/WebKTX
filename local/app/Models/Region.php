<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models as Database;

class Region extends Model
{
    use SoftDeletes;

    protected $table = 'regions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'number_row',
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
     * The get list name region.
     *
     * @author hangnt
     */
    public static function getNameRegion()
    {
        $regions = Database\Region::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        return $regions;
    }

     /**
     * The get list regions.
     *
     * @author hangnt
     */
    public static function getListRegion()
    {
        $builder = Region::get();

        if (!empty($request['name'])) {
            $builder = $builder->where('name', 'like', '%' . $request['name']. '%');
        }

        return $builder;
    }

    /**
     * Find region.
     *
     * @param int $id
     * @return boolean
     * @author hangnt
     */
    public static function findRegion(int $id)
    {
        $region = Region::find($id);
        return $region;
    }

    /**
     * Create region.
     *
     * @param array $request
     * @return App\Models\Region $request
     * @author hangnt
     */
    public static function createRegion($request)
    {
        return Region::create($request);
    }

    /**
     * Update region.
     *
     * @param array $request
     * @param id int
     * @return boolean
     * @author hangnt
     */
    public static function updateRegion($request, int $id)
    {
        return Region::find($id)->update($request);
    }

    /**
     * Delete region.
     *
     * @param int $region
     * @return boolean
     * @author hangnt
     */
    public static function deleteRegion(Database\Region $region)
    {
        return $region->delete();
    }
}
