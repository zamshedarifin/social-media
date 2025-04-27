<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use App\Models\CustomPermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends BaseController
{

    function __construct()
    {
        $this->middleware('permission:permission-view|permission-add|permission-edit|permission-delete', ['only' => ['index']]);
        $this->middleware('permission:permission-add', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $search=$request->query('q','');
        $orderBy=['desc','asc'];
        $paginations = [10,20,30,50,100];
        $selectedPage = $request->paging??10;
        $selectedOrderBy = $request->orderBy??'desc';
        $permissions =CustomPermission::search($search)
            ->when($selectedOrderBy, function ($query, $selectedOrderBy) {
                return $query->orderBy('id', $selectedOrderBy);
            })->paginate($selectedPage);

        return view('admin.permission.index', compact('permissions', 'search','paginations','orderBy','selectedPage','selectedOrderBy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission has been created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->update();

        return redirect()->route('admin.permissions.index')->with('success', 'Permission has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        /*if ($permission){
            // we are not ready to delete user functionality
            return redirect()->back()->with('error', __('we are not ready to delete permission functionality'));
        }*/

        Permission::find($id)->delete();

        return redirect()->back()
            ->with('success', 'Permission has been deleted successfully');
    }
}
