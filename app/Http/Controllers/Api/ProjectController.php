<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Whoops\Run;

class ProjectController extends Controller
{
    use Response;

    public function index(Request $request) {
        $projects = Project::select(
                DB::raw('id, country_id, region_id, project_category_id, name as project_name, company_name as funding_institution, status, email as commissioned_by, total_budget, city_id, lat, lng, image as image_cover, logo as logo_funding_institution,  member_of_image as logo_commissioned')
            )
            ->with(['country:id,name', 'region:id,name', 'category:id,name','translations'])
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
