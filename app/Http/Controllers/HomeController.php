<?php

namespace App\Http\Controllers;

use App\Models\ChecklistExecution;
use App\Models\ChecklistTemplate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $templates = ChecklistTemplate::all()->count();
        $ran_checklists = ChecklistExecution::latest()->take(10)->get();
        return view('home', ['ran_checklists'=>$ran_checklists, 'number_of_templates'=>$templates]);
    }
}
