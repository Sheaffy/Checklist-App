<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistExecutionStep extends Model
{
    use HasFactory;

    protected $table = 'checklist_execution_steps';

    public function ChecklistTemplateStep(){
        return $this->hasOne(ChecklistTemplateStep::class, 'id', 'checklist_step_id');
    }
}
