<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletterSubscriber = NewsletterSubscriber::get();
        return view('admin.newsletter.subscriber.index', ['subscriber' => $newsletterSubscriber]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsletter.subscriber.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['email' => 'required']);

        $subscriber = NewsletterSubscriber::create($request->all());

        return redirect(route('subscriber.index'))->with('success', 'Berhasil membuat subscriber');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsletterSubscriber  $newsletterSubscriber
     * @return \Illuminate\Http\Response
     */
    public function show(NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsletterSubscriber  $newsletterSubscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsletterSubscriber $newsletterSubscriber)
    {
        return view('admin.newsletter.subscriber.create-edit', ['subscriber' => $newsletterSubscriber]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsletterSubscriber  $newsletterSubscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsletterSubscriber $newsletterSubscriber)
    {
        $request->validate(['email' => 'required', 'is_active' => 'sometimes']);

        $subscriber = $newsletterSubscriber->update($request->all());

        return redirect(route('subscriber.index'))->with('success', 'Berhasil update subscriber');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsletterSubscriber  $newsletterSubscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        try{
            $newsletterSubscriber->delete();
            return redirect(route('subscriber.index'))->with('success', 'Berhasil menghapus subscriber');
        }catch(QueryException $e)
        {
            return redirect(route('subscriber.index'))->with('error', 'Gagal menghapus subscriber');
        }
    }
}
