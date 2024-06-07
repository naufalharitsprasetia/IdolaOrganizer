<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkProgram extends Model
{
    use HasFactory;
    protected $table = 'work_programs';
    protected $guarded = ['id'];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departements_id');
    }
}
