<?php

namespace App\Http\Controllers;

use App\Models\ManageUser;
use App\Repositories\Interfaces\ManageUserRepositoryInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManageUserController extends Controller
{
    public function __construct(private ManageUserRepositoryInterface $manageUserRepository) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage_users.index');
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ManageUser $manageUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageUser $manageUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManageUser $manageUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageUser $manageUser)
    {
        //
    }

    public function ajaxManageUsersData(Request $request)
    {
        if ($request->ajax()) {
            $manage_users = $this->manageUserRepository->getByDate($request->start_date, $request->end_date);

            return DataTables::of($manage_users)->addIndexColumn()->editColumn('date', function ($data) {
                return date('d-m-Y', strtotime($data->date));
            })->make(true);
        }
    }
}
