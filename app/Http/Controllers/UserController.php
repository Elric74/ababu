<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($clinic_id = 0)
    {
        $clinic = Clinic::findOrFail($clinic_id);
        return view('users.index')->with('clinic', $clinic);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajax($clinic_id = 0)
    {
        // d($clinic_id);
        return Datatables::of(User::all())
            ->addColumn('action', function ($data) {
                return '<a href="' . route('users.edit', $data->id) . '"><button type="button" class="btn btn-sm btn-primary float-left">'. __('translate.edit') .'</button></a>'
                .'<a href="' . route('users.edit', $data->id) . '"><button type="button" class="btn btn-sm btn-warning float-left">'. __('translate.disable') .'</button></a>'
                .'<a href="' . route('users.edit', $data->id) . '"><button type="button" class="btn btn-sm btn-danger float-left">'. __('translate.delete') .'</button></a>';
            })
            ->make(true);
    }
}
