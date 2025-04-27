<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use App\Models\District;
use App\Models\Upazila;
use App\Models\User;
use App\Traits\UploadTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use function Laravel\Prompts\alert;
use function Symfony\Component\String\u;

class UserManagementController extends BaseController
{
    //use UploadTrait;


    function __construct()
    {
        $this->middleware('permission:user-management-view|user-management-add|user-management-edit|user-management-delete', ['only' => ['index']]);
        $this->middleware('permission:user-management-add', ['only' => ['create','store']]);
        $this->middleware('permission:user-management-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-management-view', ['only' => ['show']]);
        $this->middleware('permission:user-management-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search=$request->query('q','');
        $orderBy=['desc','asc'];
        $paginations = [10,20,30,50,100];
        $selectedPage = $request->paging??10;
        $selectedOrderBy = $request->orderBy??'desc';
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        if ($fromDate && $toDate && $fromDate <= $toDate) {
            $dateRange = [Carbon::createFromFormat('d/m/Y', $fromDate)->format('Y-m-d'),Carbon::createFromFormat('d/m/Y', $toDate)->format('Y-m-d')];
        }else{
            $dateRange = null;
        }
        $Roles = DB::table('roles')->orderBy('id')->pluck('name', 'id');

        $users = User::search($search)->with('roles')
            ->when($request->user_type_id, function ($query, $user_type_id) {
                return $query->where('user_type_id', $user_type_id);
            })->when($request->role_id, function ($query, $role_id) {
                return $query->whereHas('roles', function ($query) use ($role_id) {
                    $query->where('role_id', $role_id);
                });
            })->when($dateRange, function ($query, $dateRange) {
                return $query->whereBetween('created_at', $dateRange);
            })->when($selectedOrderBy, function ($query, $selectedOrderBy) {
                return $query->orderBy('id', $selectedOrderBy);
            })->paginate($selectedPage);

        $div = $request->div??'';
        $selectedRole = $request->role_id;

        return view('admin.user.index', compact('users', 'search', 'div',  'Roles', 'selectedRole',
            'fromDate', 'toDate', 'paginations', 'orderBy', 'selectedPage', 'selectedOrderBy'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->orderBy('id')->pluck('name', 'id');
        return view('admin.user.create',compact('roles',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => ['required', Rule::unique('users')],
            'mobile'    => ['required','regex:/(01)[0-9]{9}/','min:11', Rule::unique('users')],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation'     => 'required',
            'role_id'     => 'required',
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = bcrypt($request->password);
            $user->save();
            $user->assignRole($request->role_id);

            return response()->json([
                'success' => true,
                'message' => __('User has been Created Successfully'),
                'redirect' => route('admin.users.index') // Add redirect URL if needed
            ]);
        }catch (\Exception $e) {
            if ($e->errorInfo[1] == 1452) {
                return redirect()->back()->with('error', 'Foreign key constraint violation occurred.');
            } else {
               // Log::error($e->getMessage());
                return redirect()->back()->with('error', __('User is not Created Successfully'));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user =User::with('roles')->findOrFail($id);

        return view('admin.user.show', compact('user', ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = DB::table('roles')->orderBy('id')->pluck('name', 'id');

        return view('admin.user.edit',compact('user','roles'));
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
            'name'      => 'required|string',
            'email'     => ['required', Rule::unique('users')->ignore($id)],
            'mobile'    => ['required','regex:/(01)[0-9]{9}/', Rule::unique('users')->ignore($id)],
            'role_id'     => 'required',
        ]);

        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            if ($request->password){
                $user->password = bcrypt($request->password);
            }
            $user->save();
            DB::table('model_has_roles')
                ->where('model_id', $id)
                ->delete();
            $user->assignRole($request->role_id);
            return redirect()->back()->with('success', __('User has been Updated Successfully'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', __('Profile is not Updated Successfully'.$e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', __('User has been deleted Successfully'));
    }
}
