<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index(Request $request) {
        $regions = Region::all();

        return view('admin.region.index', compact('regions'));
    }

    public function show(Request $request, Region $region) {

    }

    public function create(Request $request) {
        return view('admin.region.create-edit');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $region = Region::create($request->all());

        return back()->with('success', 'Successfully adding region');
    }

    public function edit(Request $request, Region $region) {
        return view('admin.region.create-edit', compact('region'));
    }

    public function update(Request $request, Region $region) {
        $request->validate([
            'name' => 'required'
        ]);

        $region->update($request->all());

        return back()->with('success', 'Successfully updating region');
    }

    public function destroy(Request $request, Region $region) {
        $region->delete();

        return back()->with('success', 'Successfully deleting region');
    }

}
