<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = User::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<form action="'.route('users.destroy', ['user'=>$row->id]).'" method="POST"> <input type="hidden" name="_method" value="delete" /><input type="hidden" name="_token" value="'.csrf_token().'">';
//                    $btn .= '<div class="btn-group" role="group" aria-label="Basic example">';
                    $btn .= '<a href="'.route('users.show', ['user'=>$row->id]).'" class="edit btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>';
                    $btn .= '<a href="'.route('users.edit', ['user'=>$row->id]).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    $btn .= '<button class="btn btn-sm btn-danger" onclick="return confirm("Are you sure?")" type="submit"><i class="fa fa-trash"></i></button></form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('adminlte.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.users.create');
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
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $input = $request->all();

        $user = User::create([
            'name'=>$input['name'],
            'email'=>$input['email'],
            'password'=> Hash::make($input['email'])
        ]);

        return redirect()->route('users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('adminlte.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('adminlte.users.edit',compact('user'));
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
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);

        $user = User::find($id);
        $input = $request->all();

        $user->name = $input['name'];
        $user->email = $input['email'];
        if (!empty($input['password'])){
            $request->validate([
                'password' => 'required|min:8',
            ]);
            $user->password = Hash::make($input['password']);
        }
        $user->save();

        return redirect()->route('users.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
}
