<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuGroup;
use Illuminate\Http\Request;

class MenuGroupController extends Controller
{
    public function index(Request $request) {
        $groups = MenuGroup::all();
        
        return view('admin.menu.group.index', [
            'groups' => $groups
        ]);
    } 
    
    public function create(Request $request) {} 
    
    public function store(Request $request) {} 
    
    public function edit(Request $request, $id) {} 
    
    public function update(Request $request, $id) {} 
    
    public function destroy(Request $request) {} 
    
}
