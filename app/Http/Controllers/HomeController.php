<?php

namespace App\Http\Controllers;

use App\Models\ChecklistExecution;
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

        $ran_checklists = ChecklistExecution::all();
        return view('home', ['ran_checklists'=>$ran_checklists]);
    }
}
