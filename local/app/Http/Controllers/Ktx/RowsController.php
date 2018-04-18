<?php

namespace App\Http\Controllers\Ktx;

use App\Http\Controllers\Controller;
use App\Http\Requests\Managerktx\CreateRowsrequest;
use App\Http\Requests\Managerktx\UpdateRowsrequest;
use Illuminate\Http\Request;
use App\Models as Database;
use App\Models\Row;
use App\Models\Region;

class RowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $regions = Region::getNameRegion();
        $rows = Row::getListRow($request->all());

        return view('manager_ktx.rows.index', compact('regions', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::getNameRegion();

        return view('manager_ktx.rows.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRowsrequest $request)
    {
        $row = Row::createRow($request->all());

        if (isset($row)) {
            flash('Thêm dãy thành công.')->success();
            return redirect()->route('rows.index');
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
        $regions = Region::getNameRegion();
        $row = Row::findRow($id);

        return view('manager_ktx.rows.edit', compact('regions', 'row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRowsrequest $request, $id)
    {
        $row = Row::updateRow($request->all(), $id);

        if (isset($row)) {
            flash('Cập nhật thành công.')->success();
            return redirect()->route('rows.index');
        } else {
            flash('Cập nhật thất bại, vui lòng thử lại.')->error();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Database\Row $row)
    {
        $row = Row::deleteRow($row);

        if (isset($row)) {
            flash('Xóa thành công.')->success();
        } else {
            flash('Xóa thất bại, vui lòng thử lại.')->error();
        }

        return redirect()->route('rows.index');
    }
}
