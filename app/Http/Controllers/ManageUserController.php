<?php

namespace App\Http\Controllers;

use App\Models\ManageUser;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manage_users = ManageUser::latest()->paginate(10);
//        return response()->json($manage_users);
        return view('manage_users.index',compact('manage_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function show(ManageUser $manageUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageUser $manageUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManageUser $manageUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageUser $manageUser)
    {
        //
    }

    function ajaxManageUsersData(Request $request){
        if($request->ajax()){
            $manage_users = ManageUser::select(['id','user_name','user_email','user_address','user_mobile','gender'])->latest();
            return DataTables::of($manage_users)->addIndexColumn()->make(true);
        }
    }

}
