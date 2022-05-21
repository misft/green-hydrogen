<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AutoReplyNewsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutoReplyNewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autoReply = AutoReplyNewsletter::first();
        return view('admin.newsletter.autoreply.index', compact('autoReply'));
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
        $data = $request->all();
        $validate = Validator::make($data, ['content' => 'required', 'title' => 'required'], ['content.required' => 'Content Dibutuhkan', 'title.required' => 'Title Dibutuhkan']);
        $input = AutoReplyNewsletter::create($data);

        return redirect()->route('autoreply.index')->with('success', 'Berhasil Create Auto Reply Content');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AutoReplyNewsletter  $autoReplyNewsletter
     * @return \Illuminate\Http\Response
     */
    public function show(AutoReplyNewsletter $autoReplyNewsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AutoReplyNewsletter  $autoReplyNewsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(AutoReplyNewsletter $autoReplyNewsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AutoReplyNewsletter  $autoReplyNewsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutoReplyNewsletter $autoReplyNewsletter)
    {
        $data = $request->all();
        $validate = Validator::make($data, ['content' => 'required', 'title' => 'required'], ['content.required' => 'Content Dibutuhkan', 'title.required' => 'Title Dibutuhkan']);
        $update = $autoReplyNewsletter->update($data);

        return redirect()->route('autoreply.index')->with('success', 'Berhasil Update Auto Reply Content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AutoReplyNewsletter  $autoReplyNewsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutoReplyNewsletter $autoReplyNewsletter)
    {
        //
    }
}
