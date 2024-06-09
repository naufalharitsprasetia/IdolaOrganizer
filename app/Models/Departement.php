<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $table = 'departements';
    protected $guarded = ['id'];


    public function events()
    {
        return $this->hasMany(Event::class, 'departements_id');
    }
    public function members()
    {
        return $this->hasMany(Member::class, 'departements_id');
    }
    public function prokers()
    {
        return $this->hasMany(WorkProgram::class, 'departements_id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'departements_id');
    }
    public function positions()
    {
        return $this->hasMany(Position::class, 'departements_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }
    public function children()
    {
        return $this->hasMany(Departement::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Departement::class, 'parent_id');
    }
}
