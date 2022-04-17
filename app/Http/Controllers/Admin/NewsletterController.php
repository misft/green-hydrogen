<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\Newsletter;
use App\Models\NewsletterSubscriber;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletter = Newsletter::all();
        return view('admin.newsletter.index', ['newsletter' => $newsletter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsletter.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = NewsletterSubscriber::whereIsActive(1)->pluck('email')->toArray();

        $request->validate([
            'subject' => 'required',
            'content' => 'required',
            'send_at' => 'required',
            'attachments' => 'sometimes'
        ]);

        $files = $request->file('attachments') ?? [];
        $saveFile = array();
        foreach($files as $file) {
            $saveFile[] = $file->storePublicly('newsletter');
        }

        $newsletter = Newsletter::create(array_merge($request->toArray(), [
            'attachments' => json_encode($saveFile)
        ]));

        $data = $request->all();
        $data['title'] = env('MAIL_FROM_NAME', 'Green Hydrogen');

        Mail::to($email)->send(new SendEmail($data, $request->attachments));

        return redirect(route('newsletter.index'))->with('success', 'Berhasil mengirim Newsletter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        return view('admin.newsletter.create-edit', [ 'newsletter' => $newsletter]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        return view('admin.newsletter.create-edit', [ 'newsletter' => $newsletter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        // $request->validate([
        //     'subject' => 'required',
        //     'content' => 'required',
        //     'send_at' => 'required',
        //     'attachments' => 'sometimes'
        // ]);

        // $file = $request->file('attachments') ? json_encode($request->file('attachments')->storePublicly('newsletter')) : "";

        // $newsletter = $newsletter->update(array_merge($request->toArray(), [
        //     'attachments' => $file
        // ]));

        // return redirect(route('newsletter.index'))->with('success', 'Berhasil mengupdate jadwal Newsletter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        try{
            $newsletter->delete();
            return back()->with('success', 'Berhasil menghapus history Newsletter');
        }catch(QueryException $e){
            return back()->with('error', 'Gagal menghapus history Newsletter');
        }
    }
}
