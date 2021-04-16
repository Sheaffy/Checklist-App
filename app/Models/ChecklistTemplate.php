<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistTemplate extends Model
{
    use HasFactory;

    protected $table = 'checklist_templates';

    /**
     * checklist steps relationship setup
     */
    public function ChecklistTemplateStep()
    {
        return $this->hasMany(ChecklistTemplateStep::class, 'checklist_template_id', 'id');
    }
}
