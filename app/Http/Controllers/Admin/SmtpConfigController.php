<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SmtpConfig;
use Illuminate\Http\Request;

class SmtpConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smtpConfig = SmtpConfig::first();
        $port = [
            '25' => '25',
            '465' => '465',
            '587' => '587'
        ];

        $auth = [
            'NONE' => 'NONE',
            'TLS' => 'TLS',
            'SSL' => 'SSL'
        ];
        return view('admin.smtp.index', compact('smtpConfig', 'port', 'auth'));
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
        $request->validate([
            'smtp_server' => 'required',
            'smtp_port' => 'required',
            'smtp_username' => 'required',
            'smtp_password' => 'required',
            'smtp_auth' => 'required',
            'smtp_from' => 'required'
        ]);
        $port = $request->smtp_port == 'NONE' ? null : $request->smtp_port;
        SmtpConfig::create(array_merge($request->all(), ['smtp_port' => $port]));

        return redirect(route('smtp.index'))->with('success', 'Berhasil set up SMTP Server');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SmtpConfig  $smtpConfig
     * @return \Illuminate\Http\Response
     */
    public function show(SmtpConfig $smtpConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SmtpConfig  $smtpConfig
     * @return \Illuminate\Http\Response
     */
    public function edit(SmtpConfig $smtpConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SmtpConfig  $smtpConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmtpConfig $smtpConfig)
    {
        $request->validate([
            'smtp_server' => 'required',
            'smtp_port' => 'required',
            'smtp_username' => 'required',
            'smtp_password' => 'required',
            'smtp_auth' => 'required',
            'smtp_from' => 'required'
        ]);

        $port = $request->smtp_port == 'NONE' ? null : $request->smtp_port;
        $smtpConfig->update(array_merge($request->all(), ['smtp_port' => $port]));


        return redirect(route('smtp.index'))->with('success', 'Berhasil update SMTP Server');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SmtpConfig  $smtpConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmtpConfig $smtpConfig)
    {
        //
    }
}
