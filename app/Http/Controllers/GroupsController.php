<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Auth;

class GroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:groups.index')->only('index');
        $this->middleware('permission:groups.create')->only('create','store');
//        $this->middleware('permission:users.show')->only('show');
        $this->middleware('permission:groups.edit')->only('edit','update');
        $this->middleware('permission:groups.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Group::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<form action="'.route('groups.destroy', ['group'=>$row->id]).'" method="POST"> <input type="hidden" name="_method" value="delete" /><input type="hidden" name="_token" value="'.csrf_token().'">';
//                    $btn .= '<div class="btn-group" role="group" aria-label="Basic example">';
                    $btn .= '<a href="'.route('groups.show', ['group'=>$row->id]).'" class="edit btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>';
                    if (Auth::user()->hasPermissionTo('groups.edit')) {
                        $btn .= '<a href="' . route('groups.edit', ['group' => $row->id]) . '" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    }
                    if (Auth::user()->hasPermissionTo('groups.destroy')) {
                        $btn .= '<button class="btn btn-sm btn-danger" onclick="return confirm("Are you sure?")" type="submit"><i class="fa fa-trash"></i></button></form>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('adminlte.groups.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.groups.create');
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
            'nama' => 'required|max:255',
            'kota' => 'required|max:255|unique:groups,kota',
        ]);

        $input = $request->all();

        $group = Group::create([
            'nama'=>$input['nama'],
            'kota'=>$input['kota'],
        ]);


        return redirect()->route('groups.index')->with('success','Group created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {

        return view('adminlte.groups.show',compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('adminlte.groups.edit',compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'kota' => 'required|max:255|unique:groups,kota,'.$group->id,
        ]);

        $input = $request->all();

        $group->nama = $input['nama'];
        $group->kota = $input['kota'];
        $group->save();

        return redirect()->route('groups.index')->with('success','Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index')
            ->with('success','Group deleted successfully');
    }
}
