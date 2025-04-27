<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use App\Models\CustomRole;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleManagementController extends BaseController
{
    function __construct()
    {
        $this->middleware('permission:role-permission-view|role-permission-add|role-permission-edit|role-permission-deleted|permission-assign', ['only' => ['index']]);
        $this->middleware('permission:role-permission-add', ['only' => ['create','store']]);
        $this->middleware('permission:role-permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-assign', ['only' => ['assignPermission']]);
        $this->middleware('permission:role-permission-view', ['only' => ['show']]);
        $this->middleware('permission:role-permission-deleted', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('q', '');
        $permissions = Permission::pluck('name', 'id');
        $permissionID = $request->permission_id??[];
        $orderBy=['desc','asc'];
        $paginations = [10,20,30,50,100];
        $selectedPage = $request->paging??10;
        $selectedOrderBy = $request->orderBy??'desc';
        $roles = CustomRole::search($search)->with('permissions')
            ->when($permissionID, function ($query, $permissionID) {
                return $query->whereHas('permissions', function ($query) use ($permissionID) {
                    $query->whereIn('id', $permissionID);
                });
            })->when($selectedOrderBy, function ($query, $selectedOrderBy) {
                return $query->orderBy('id', $selectedOrderBy);
            })->paginate($selectedPage);


        $div = $request->div??'';


        return view('admin.role.index', compact('roles', 'search', 'paginations','orderBy','selectedPage','selectedOrderBy',
            'permissionID','permissions', 'div'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {

        $role =new Role();
        $role->name = $request->name;
        $role->guard_name  = 'web';
        $role->save();

        return redirect()->route('admin.roles.index')->with('success', 'Role has been created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $rolePermissions = $role->with('permissions')->findOrFail($role->id);

        return view('admin.role.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    // role edit form post
    public function roleEdit(Request $request)
    {
        $role = Role::findOrFail($request->id);
        return view('admin.role.edit_modal', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->name = $request->name;
        $role->update();
        return redirect()->back()->with('success', 'Role has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        /*if ($role){
            return redirect()->back()->with('error', __('we are not ready to delete permission functionality'));
        }*/
        $role->delete();
        return redirect()->back()->with('success', 'Role has been Deleted Successfully');
    }


    // permission assign form post

    public function assignPermission($id)
    {
        $role = Role::findOrFail($id);
        $selelcted_permission = $role->permissions->pluck('name')->toArray();
        $excludedPermissions = [
            /*'permission-lists',
            'permission-create',
            'permission-edit',
            'permission-show',
            'permission-delete'*/
        ];
         $all_permissions = Permission::get()->filter(function ($permission) use ($excludedPermissions) {
            return !in_array($permission->name, $excludedPermissions);
        });


        $all_permissions = $all_permissions->groupBy(function ($permission) {
            $words = explode('-', $permission->name);

            if (count($words) > 3) {
                return $words[0] . '-' . $words[1] . '-' . $words[2];
            } elseif (count($words) > 2) {
                return $words[0] . '-' . $words[1];
            }else{
                return $words[0] ;
            }
        })->map(function ($permissions,$groupName) {
            return $permissions->map(function ($permission)use ($groupName){
                $accessMessages = [
                   // $groupName.'-access' => 'User Can Access Sidebar Menu of '.$groupName,
                    $groupName.'-view' => 'User Can Access List View',
                    $groupName.'-add' => 'User Can Access Create Button and Store into system',
                    $groupName.'-edit' => 'User Can Access Edit Button and Update into system',
                    $groupName.'-delete' => 'User Can Access Delete Button and Delete from system',
                    $groupName.'-profile' => 'User Can Access Profile and Update Profile',
                    $groupName.'-setting' => 'User Can Access Setting and Update Setting',
                    $groupName.'-assign' => 'User Can Access and Assign Permission to Role',
                    $groupName.'-report' => 'User Can Access Report and Generate Report',
                ];
                // Generate a message for the permission group
                $message = $accessMessages[$permission['name']] ?? '';
                $permission->message = $message;
                return $permission;
            });
        });
        return view('admin.role.assign_permission', compact('role','all_permissions','selelcted_permission' ));
    }
    public function assignPermissionUpdate(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permission);
//        dd($role->syncPermissions($request->permission));

        return redirect()->back()->with('success','Permission has been updated successfully');
    }

}
