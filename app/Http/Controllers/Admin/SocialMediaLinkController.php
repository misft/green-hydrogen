<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialMediaLink;
use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialMediaLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SocialMediaLink::get();
        return view('admin.social_media_link.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socmed = ['LINKEDIN', 'INSTAGRAM', 'FACEBOOK', 'YOUTUBE', 'TWITTER'];
        return view('admin.social_media_link.create-edit', compact('socmed'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'name' => 'required',
            'source' => 'required',
            'link' => 'required'
        ];

        $validate = Validator::make($data, $rules);
        if($validate->fails())
        {
            return redirect(route('social_media.create'))->with('error', 'Silahkan lengkapi data dengan benar');
        }
        SocialMediaLink::create($data);
        return redirect(route('social_media.index'))->with('success', 'Berhasil menambahkan link baru');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialMediaLink  $socialMediaLink
     * @return \Illuminate\Http\Response
     */
    public function show(SocialMediaLink $socialMediaLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialMediaLink  $socialMediaLink
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMediaLink $socialMediaLink)
    {
        $data = $socialMediaLink;
        $socmed = ['LINKEDIN', 'INSTAGRAM', 'FACEBOOK', 'YOUTUBE', 'TWITTER'];
        return view('admin.social_media_link.create-edit', compact('socmed', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialMediaLink  $socialMediaLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialMediaLink $socialMediaLink)
    {
        $data = $request->all();
        $rules = [
            'name' => 'required',
            'source' => 'required',
            'link' => 'required'
        ];

        $validate = Validator::make($data, $rules);
        if($validate->fails())
        {
            return redirect(route('social_media.create'))->with('error', 'Silahkan lengkapi data dengan benar');
        }
        try{
            $socialMediaLink->update($data);
            return redirect(route('social_media.index'))->with('success', 'Berhasil update link Social Media');
        }catch(QueryException){
            return redirect(route('social_media.update', $socialMediaLink->id))->with('error', 'Gagal update link Social Media');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialMediaLink  $socialMediaLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMediaLink $socialMediaLink)
    {
        try{
            $socialMediaLink->delete();
            return redirect(route('social_media.index'))->with('success', 'Berhasil menghapus link');
        }catch(QueryException){
            return redirect(route('social_media.index'))->with('error', 'Gagal menghapus link');
        }
    }
}
