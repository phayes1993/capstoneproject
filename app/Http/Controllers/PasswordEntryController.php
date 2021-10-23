<?php

namespace App\Http\Controllers;

use App\Models\PasswordEntry;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class PasswordEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $new = new PasswordEntry();
        $new->setAttribute('saved_password',Crypt::encryptString($request->post('pwd')));
        $new->setAttribute('label',$request->post('label'));
        $new->setAttribute('user_id',$request->user()->id);
        $new->save();
        $users = DB::table('password_entries')->where('user_id', '=', $request->user()->id)->get();
        return view('dashboard', ['entries'=>$users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PasswordEntry  $passwordEntry
     * @return \Illuminate\Http\Response
     */
    public function show(PasswordEntry $passwordEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PasswordEntry  $passwordEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(PasswordEntry $passwordEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PasswordEntry  $passwordEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasswordEntry $passwordEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasswordEntry  $passwordEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(PasswordEntry $passwordEntry)
    {
        //
    }
}
