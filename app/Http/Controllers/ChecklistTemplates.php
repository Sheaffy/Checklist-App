<?php

namespace App\Http\Controllers;

use App\Models\ChecklistTemplate;
use App\Models\ChecklistTemplateStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistTemplates extends Controller
{
    //

    public function manage_templates(){

        return view('manage.manage-templates', [
            'templates' => ChecklistTemplate::where('user_id', Auth::user()->id)->get()
        ]);

    }

    public function view_create_template(){
        return view('manage.create-template');
    }

    public function create_template(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        $template = new ChecklistTemplate();
        $template->name = $validated['name'];
        $template->user_id = Auth::user()->id;
        $template->save();

        return redirect('/manage-checklists');
    }

 

    public function view_template($id){

        return view('manage.view-template', [
            'template' => ChecklistTemplate::where('id', $id)->first()
        ]);

    }

    public function add_step(Request $request){

        $validated = $request->validate([
            'checklist_template_id' => 'required',
            'description' => 'required|max:255',
        ]);

        $step = new ChecklistTemplateStep();
        $step->checklist_template_id = $validated['checklist_template_id'];
        $step->description = $validated['description'];
        $step->type = 1;
        $step->save();

        return redirect('/view-template/'.$validated['checklist_template_id']);
        
    }

    public function delete_step($id){

        $step = ChecklistTemplateStep::where('id', $id)->first();
        $template_id = $step->checklist_template_id;
        $step->delete();
        return redirect('/view-template/'.$template_id);

    }

}
