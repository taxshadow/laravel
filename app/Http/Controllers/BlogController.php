<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Kategori;
use App\User;
use App\Http\Requests;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recents = Artikel::orderBy('created_at', 'DESC')->take(4)->get();
        $artikels = Artikel::orderBy('created_at', 'DESC')->paginate(8);
        $mostpop = Artikel::orderBy('pageview', 'DESC')->take(4)->get();
        $kategoris = Kategori::all();
        $kategoris = Kategori::withCount('artikel')->get();
        // $randoms = Artikel::orderByRaw('RAND()')->take(1)->get();
        return view('blog.indexblog', ['artikels' => $artikels, 'kategoris'=>$kategoris, 'recents' => $recents, 'mostpop' => $mostpop,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function show($judulartikel)
    {
        $recents = Artikel::orderBy('created_at', 'DESC')->take(4)->get();
        $mostpop = Artikel::orderBy('pageview', 'DESC')->take(4)->get();
        $kategoris = Kategori::all();
        $kategoris = Kategori::withCount('artikel')->get();
        $artikel = Artikel::where('slug', $judulartikel)->first();
        $relatedartikel = Artikel::where('kategori_id', $artikel->kategori_id)->where('id', '!=', $artikel->id)->take(3)->get();
        if(!$artikel){
            abort(503);
        }

        $artikel->increment('pageview');
        $artikel->save();
        return view('blog.singleblog', ['artikel' => $artikel, 'kategoris' => $kategoris, 'relatedartikel' => $relatedartikel, 'recents' => $recents, 'mostpop' => $mostpop]); 
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

    public function seacrh(request $request)
    {
        $cari = $request->get('search');
        $hasil = Artikel::where('judulartikel', 'LIKE', '%' . $cari . '%')->paginate(5);
        return view('artikel.indexblog')->with('hasil', $hasil);
    }

    public function getAuthor($id)
    {
        $recents = Artikel::orderBy('created_at', 'DESC')->take(4)->get();
        $kategoris = Kategori::all();
        $mostpop = Artikel::orderBy('pageview', 'DESC')->take(4)->get();
        $kategoris = Kategori::withCount('artikel')->get();
        $user = User::find($id);
        return view ('blog.artikeluser', ['user' => $user, 'kategoris' => $kategoris, 'recents' => $recents, 'mostpop' => $mostpop]);
    }

    public function getKategori($id)
    {   
        $recents = Artikel::orderBy('created_at', 'DESC')->take(4)->get();
        $artikel = Artikel::where('kategori_id', $id)->paginate(8);
        $mostpop = Artikel::orderBy('pageview', 'DESC')->take(4)->get();
        $kategoris = Kategori::all();
        $kategoris = Kategori::withCount('artikel')->get();
        return view ('blog.kontenkategori', ['kategoris' => $kategoris, 'artikel' => $artikel, 'recents' => $recents, 'mostpop' => $mostpop]);
    }

    public function getKontak()
    {
         return view ('blog.contactus');
    }
}
