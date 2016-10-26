<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;
use App\File;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::find(Auth::user()->id);
       return view('profil.profil', ['users' => $users]);        
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
        $this->validate($request, [
        'name' => 'required',
        'namalengkap' => 'required',
        'nomorhp' => 'required',
        'angkatan' => 'required',
        'ttl' => 'required',
        'alamatasli' => 'required',
        'alamatmalang' => 'required',
        'deskripsi' => 'required',
        ]);

        $users = User::find($id);
        $users->image= Input::get('image');
        If (Input::hasFile('gambar')) {
            $file=Input::file('gambar');
            $file->move('image', $file->getClientOriginalName());
            
        $users->name = $request->name;
        $users->namalengkap = $request->namalengkap;
        $users->nomorhp = $request->nomorhp;
        $users->angkatan = $request->angkatan;
        $users->ttl = $request->ttl;
        $users->alamatasli = $request->alamatasli;
        $users->alamatmalang = $request->alamatmalang;
        $users->deskripsi = $request->deskripsi;
        $users->image = $file->getClientOriginalName();
    }
        $users->save();
        return redirect('user/profile');
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
        $users = User::find($id);
        return view('profil.editprofile', ['users' => $users]);
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
        $this->validate($request, [
        'name' => 'required',
        'namalengkap' => 'required',
        'nomorhp' => 'required',
        'angkatan' => 'required',
        'ttl' => 'required',
        'alamatasli' => 'required',
        'alamatmalang' => 'required',
        'deskripsi' => 'required',
        ]);

        
        $users = User::find($id);
        $users->image= Input::get('image');
        If (Input::hasFile('gambar')) {
            $file=Input::file('gambar');
            $file->move('image', $file->getClientOriginalName());
            
        $users->name = $request->name;
        $users->namalengkap = $request->namalengkap;
        $users->nomorhp = $request->nomorhp;
        $users->angkatan = $request->angkatan;
        $users->ttl = $request->ttl;
        $users->alamatasli = $request->alamatasli;
        $users->alamatmalang = $request->alamatmalang;
        $users->deskripsi = $request->deskripsi;
        $users->image = $file->getClientOriginalName();
    }
        $users->save();
        return redirect('user/profile');
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
}
