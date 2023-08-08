<?php

namespace App\Http\Controllers;

use App\Http\Resources\RedirectResource;
use App\Models\Survey;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RedirectController extends Controller
{
    public function index(Request $request)
    {
        $surveyrs =  Survey::get();

        return view('backend.dashbord', [
            'surveys' => RedirectResource::collection($surveyrs)
        ]);
    }
    public function store(Request $request, $type)
    {
        $survey = new Survey;
        $survey->project_id = $request->pid;
        $survey->user_id = $request->uid;
        $survey->ip_address = $request->ip();
        $survey->status = $type;
        $survey->save();

        // return view('Project/Create', []);

        if ($survey) {
            return redirect('/dashboard')->with('flash', [
                'success' => true,
                'message' => 'Survey saved successfully'
            ]);
        }
    }
}
