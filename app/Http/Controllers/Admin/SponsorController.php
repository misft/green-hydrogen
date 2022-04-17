<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Models\SponsorGroup;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsor = Sponsor::with('group')->get();
        return view('admin.sponsor.index', compact('sponsor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sponsorGroup = SponsorGroup::pluck('name', 'id');
        return view('admin.sponsor.create-edit', compact('sponsorGroup'));
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
            'name' => 'required',
            'image' => 'required',
            'link' => 'required',
            'sponsor_group_id' => 'required',

        ],[
            'name.required' => 'Dibutuhkan Nama',
            'image.required' => 'Dibutuhkan Image',
            'link.required' => 'Dibutuhkan Link',
            'sponsor_group_id.required' => 'Dibutuhkan Sposor Group'
        ]);

        $create = Sponsor::create(array_merge($request->toArray(),
            [ 'image' => $request->hasFile('image') ? $request->file('image')->storePublicly('sponsor') : null]));

        return redirect(route('sponsor.index'))->with('success', 'Berhasil Membuat Sponsor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        $sponsorGroup = SponsorGroup::pluck('name', 'id');
        return view('admin.sponsor.create-edit', compact('sponsor', 'sponsorGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'link' => 'required'
        ]);

        $update = $sponsor->update(array_merge($request->toArray(),
            [ 'image' => $request->hasFile('image') ? $request->file('image')->storePublicly('sponsor') : null]));

        return redirect(route('sponsor.index'))->with('success', 'Berhasil Update Sponsor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        try{
            $sponsor->delete();
            return back()->with('success', 'Berhasil Hapus Sponsor');
        }catch(QueryException $e){
            return back()->with('error', 'Gagal Hapus Sponsor');
        }
    }
}
