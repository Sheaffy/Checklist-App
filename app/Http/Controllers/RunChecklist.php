<?php

namespace App\Http\Controllers;

use App\Models\ChecklistExecution;
use App\Models\ChecklistExecutionStep;
use App\Models\ChecklistTemplate;
use DateTime;
use Illuminate\Http\Request;

class RunChecklist extends Controller
{
    //

    public function run_checklist($id){
        $checklist_template = ChecklistTemplate::where('id', $id)->first();
        return view('run-template', ["template"=>$checklist_template]);
    }

    public function finalise_checklist(Request $request){

        $checklist_template_id = $request->input('checklist_template_id');
        $checklist_template = ChecklistTemplate::where('id', $checklist_template_id)->first();

        $checklist_execution = new ChecklistExecution();
        $checklist_execution->name = $request->input('name');
        $checklist_execution->checklist_template_id = $checklist_template->id;
        $checklist_execution->finished_at = date("Y-m-d h:i:s");
        $checklist_execution->save();

        for ($i=0; $i < count($checklist_template->ChecklistTemplateStep); $i++) { 
            $step = $checklist_template->ChecklistTemplateStep[$i];
            //create checklist_execution_step
            $execution_step = new ChecklistExecutionStep();
            $execution_step->checklist_execution_id = $checklist_execution->id;
            $execution_step->checklist_step_id = $step->id;
            $execution_step->checked = $request->has('checkbox_'.$step->id) ? true : false;
            $execution_step->save();

        }


        return redirect('/manage-checklists');

    }

    public function delete_execution($id){
        $execution = ChecklistExecution::where('id', $id)->first();
        $execution->delete();
        return redirect('/home');
    }

}
