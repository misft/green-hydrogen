<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Traits\Response;
use Illuminate\Http\Request;
use Whoops\Run;

class ProjectController extends Controller
{
    use Response;

    public function index(Request $request) {
        $projects = Project::with(['country:id,name', 'region:id,name', 'category:id,name'])
            ->when($request->get('name'), function($query) use ($request) {
                $query->where('name', "%".$request->get('name')."%");
            })
            ->when($request->get('status'), function($query) use ($request) {
                $query->where('status', $request->get('status'));
            })
            ->when($request->get('company_name'), function($query) use ($request) {
                $query->where('company_name', '%'.$request->get('company_name').'%');
            })
            ->get();

        return $this->success(body: [
            'projects' => $projects
        ]);
    }

    public function names(Request $request) {
        $projectNames = Project::groupBy('name')->select('id', 'name', 'lat', 'lng')->get();

        return $this->success(body: [
            'project_names' => $projectNames
        ]);
    }

    public function status() {
        return $this->success(body: [
            'status' => ['PROJECT', 'PILOT_STUDY', 'FEASIBILITY_STUDY']
        ]);
    }
}
