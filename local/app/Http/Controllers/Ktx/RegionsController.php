<?php

namespace App\Http\Controllers\Ktx;

use App\Http\Controllers\Controller;
use App\Http\Requests\Managerktx\CreateRegionsrequest;
use App\Http\Requests\Managerktx\UpdateRegionsrequest;
use Illuminate\Http\Request;
use App\Models as Database;
use App\Models\Region;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::getListRegion();

        return view('manager_ktx.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager_ktx.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRegionsrequest $request)
    {
        $region = Region::createRegion($request->all());

        if (isset($region)) {
            flash('Thêm khu thành công.')->success();
            return redirect()->route('regions.index');
        } else {
            flash('Thêm thất bại, vui lòng thử lại.')->error();
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::findRegion($id);

        return view('manager_ktx.regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegionsrequest $request, $id)
    {
        $region = Region::updateRegion($request->all(), $id);

        if (isset($region)) {
            flash('Cập nhật thành công.')->success();
            return redirect()->route('regions.index');
        } else {
            flash('Cập nhật thất bại, vui lòng thử lại')->error();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Database\Region $region)
    {
        $region = Region::deleteRegion($region);

        if (isset($region)) {
            flash('Xóa thành công.')->success();
        } else {
            flash('Xóa thất bại, vui lòng thử lại')->error();
            return redirect()->back();
        }

        return redirect()->route('regions.index');
    }
}
