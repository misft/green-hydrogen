<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SponsorGroup;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SponsorGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsorGroup = SponsorGroup::all();
        return view('admin.sponsor.sponsor_group.index', compact('sponsorGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsor.sponsor_group.create-edit');
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
        ]);

        $data = $request->all();

        $create = SponsorGroup::create($data);

        return redirect(route('group.index'))->with('success', 'Berhasil Membuat Group Sponsor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SponsorGroup  $sponsorGroup
     * @return \Illuminate\Http\Response
     */
    public function show(SponsorGroup $sponsorGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SponsorGroup  $sponsorGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(SponsorGroup $sponsorGroup)
    {
        return view('admin.sponsor.sponsor_group.create-edit', compact('sponsorGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SponsorGroup  $sponsorGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SponsorGroup $sponsorGroup)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();

        $update = $sponsorGroup->update($data);

        return redirect(route('group.index'))->with('success', 'Berhasil Update Group Sponsor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SponsorGroup  $sponsorGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(SponsorGroup $sponsorGroup)
    {
        try{
            $sponsorGroup->delete();
            return back()->with('success', 'Berhasil Menghapus Group Sponsor');
        }catch(QueryException $e){
            return back()->with('error', 'Gagal Hapus Group Sponsor');
        }
    }
}
