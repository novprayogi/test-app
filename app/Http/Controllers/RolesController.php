<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;
use \Illuminate\Support\Facades\DB;
use Auth;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:roles.index')->only('index');
        $this->middleware('permission:roles.create')->only('create','store');
//        $this->middleware('permission:roles.show')->only('show');
        $this->middleware('permission:roles.edit')->only('edit','update');
        $this->middleware('permission:roles.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Role::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<form action="'.route('roles.destroy', ['role'=>$row->id]).'" method="POST"> <input type="hidden" name="_method" value="delete" /><input type="hidden" name="_token" value="'.csrf_token().'">';
//                    $btn .= '<div class="btn-group" role="group" aria-label="Basic example">';
                    $btn .= '<a href="'.route('roles.show', ['role'=>$row->id]).'" class="edit btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>';
                    if (Auth::user()->hasPermissionTo('roles.edit')) {
                        $btn .= '<a href="' . route('roles.edit', ['role' => $row->id]) . '" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    }
                    if (Auth::user()->hasPermissionTo('roles.destroy')) {
                        $btn .= '<button class="btn btn-sm btn-danger" onclick="return confirm("Are you sure?")" type="submit"><i class="fa fa-trash"></i></button></form>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('adminlte.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $s = 0;
        return view('adminlte.roles.create',compact('permissions','s'));
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
            'name' => 'required|unique:roles,name|max:255',
        ]);

        $role = Role::create([
            'name'=>$request->input('name'),
            'guard_name'=>'web',
        ]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$role->id)
            ->get();
        return view('adminlte.roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        $s = 1;
        return view('adminlte.roles.edit',compact('role','permissions','rolePermissions','s'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:255|unique:roles,name,'.$role->id,
        ]);

        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success','Role updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
            ->with('success','Role deleted successfully');
    }
}
