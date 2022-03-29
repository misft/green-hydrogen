<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyDirectory;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyDirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Auth::guard('company')->user();
        $regions = Region::pluck('name', 'id');

        return view('company.show', compact('company', 'regions'));
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
        //
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
        $company = CompanyDirectory::find($id);

        [$image, $photo] = [
            $request->hasFile('image') ? $request->file('image')->storePublicly('company_directory/image') : $company->image,
            $request->hasFile('photo') ? $request->file('photo')->storePublicly('company_directory/photo') : $company->photo
        ];

        $password = $company->password;
        if (
            $request->has('password') 
            && Hash::check($request->get('current_password'), $company->password) 
            && $request->get('password') == $request->get('confirm_password')
        ) {
            $password = Hash::make($request->get('password'));
        }

        $company->update(array_merge($request->all(), [
            'image' => $image,
            'photo' => $photo,
            'password' => $password
        ]));

        return back()->with('success', 'Successfully updating data');
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
