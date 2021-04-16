<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistExecution extends Model
{
    use HasFactory;

    protected $table = 'checklist_executions';

    public function ChecklistTemplate(){
        return $this->hasOne(ChecklistTemplate::class, 'id', 'checklist_template_id');
    }

    public function ChecklistExecutionSteps()
    {
        return $this->hasMany(ChecklistExecutionStep::class, 'checklist_execution_id', 'id');
    }

}
