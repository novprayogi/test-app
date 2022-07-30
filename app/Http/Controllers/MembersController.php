<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Member::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($row){
                    $img = '<img width="150px" src="'.url('/data_profile/'.$row->profile).'">';
                    return $img;
                })
                ->addColumn('action', function($row){
                    $btn = '<form action="'.route('members.destroy', ['member'=>$row->id]).'" method="POST"> <input type="hidden" name="_method" value="delete" /><input type="hidden" name="_token" value="'.csrf_token().'">';
//                    $btn .= '<div class="btn-group" role="group" aria-label="Basic example">';
                    $btn .= '<a href="'.route('members.show', ['member'=>$row->id]).'" class="edit btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>';
                    $btn .= '<a href="'.route('members.edit', ['member'=>$row->id]).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    $btn .= '<button class="btn btn-sm btn-danger" onclick="return confirm("Are you sure?")" type="submit"><i class="fa fa-trash"></i></button></form>';
                    return $btn;
                })
                ->rawColumns(['action','image'])
                ->make(true);
        }
        return view('adminlte.members.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::pluck('kota','id');
        return view('adminlte.members.create',compact('groups'));
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
            'nama'      => 'required|max:255',
            'alamat'    => 'required|max:255',
            'hp'        => 'required|max:255',
            'email'     => 'required|email|max:255',
            'profile'   => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $input = $request->all();
        $file = $request->file('profile');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_profile';

        $file->move($tujuan_upload,$nama_file);

        $cm = Member::all()->count();
        $member = Member::create([
            'id'        => $cm+1,
            'nama'      => $input['nama'],
            'alamat'    => $input['alamat'],
            'hp'        => $input['hp'],
            'email'     => $input['email'],
            'group_id'  => $input['group'],
            'profile'   => $nama_file,
        ]);


        return redirect()->route('members.index')->with('success','Member created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('adminlte.members.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $groups = Group::pluck('kota','id');

        return view('adminlte.members.edit',compact('member','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'nama'      => 'required|max:255',
            'alamat'    => 'required|max:255',
            'hp'        => 'required|max:255',
            'email'     => 'required|email|max:255',
            'profile'   => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $input = $request->all();
        $file = $request->file('profile');

        $member->nama = $input['nama'];
        $member->alamat    =$input['alamat'];
        $member->hp       = $input['hp'];
        $member->email     = $input['email'];
        $member->group_id  = $input['group'];
        if (!empty($file)){
            $check = File::exists('data_profile/'.$member->profile);
            if($check == true){
                File::delete('data_profile/'.$member->profile);
            }
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'data_profile';
            $file->move($tujuan_upload,$nama_file);
            $member->profile   = $nama_file;
        }
        $member->save();

        return redirect()->route('members.index')->with('success','Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $check = File::exists('data_profile/'.$member->profile);
        if($check == true){
            File::delete('data_profile/'.$member->profile);
        }
        $member->delete();
        return redirect()->route('members.index')->with('success','Member deleted successfully');
    }
}
