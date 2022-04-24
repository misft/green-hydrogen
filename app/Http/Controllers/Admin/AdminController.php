<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $data = Admin::get();
        return view('admin.manage_admin.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ];
        $message = [
            'name.required' => 'Silahkan isi kolom nama terlebih dahulu',
            'email.required' => 'Silahkan isi kolom email terlebih dahulu',
            'password.required' => 'SIlahkan isi kolom password terlebih dahulu'
        ];

        $validator = Validator::make($data, $rules, $message);
        if($validator->fails()){
            return redirect(route('manage_admin.create'))->with('error', $validator->errors()->first())->withInput();
        }

        $data['password'] = bcrypt($data['password']);

        $created = Admin::create($data);

        if($created->id){
            return redirect(route('manage_admin.index'))->with('success', 'Berhasil Membuat Admin');
        }else{
            return redirect(route('manage_admin.index'))->with('error', 'Gagal Membuat Admin');
        }
    }

    public function update(Request $request, Admin $admin)
    {
        $data = $request->all();
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'sometimes|string'
        ];
        $message = [
            'name.required' => 'Silahkan isi kolom nama',
            'email.required' => 'Silahkan isi kolom email',
        ];
        Validator::make($data, $rules, $message);
        if($data['password']){
            $data['password'] = bcrypt($data['password']);
        }

        // $updated = Admin::whereId($id)->update($data);
        $updated = $admin->update($data);
        if($updated){
            return redirect(route('manage_admin.index'))->with('success', 'Berhasil update Admin');
        }else{
            return redirect(route('manage_admin.index'))->with('error', 'Gagal update admin');
        }
    }

    public function edit(Admin $admin){
        // $data = Admin::whereId($id)->get();
        $data = $admin;
        return view('admin.manage_admin.create-edit', compact('data'));
    }

    public function create(){
        return view('admin.manage_admin.create-edit');
    }

    public function destroy(Admin $admin)
    {
        try{
            // $user = Admin::whereId($id);
            $admin->delete();
            // $user->delete();
            return redirect(route('manage_admin.index'))->with('success', 'Berhasil menghapus Admin');
        } catch (QueryException){
            return redirect(route('manage_admin.index'))->with('error', 'Gagal menghapus Admin');
        }
    }

}
