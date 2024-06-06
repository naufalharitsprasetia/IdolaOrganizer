<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $table = 'organizations';
    protected $guarded = ['id'];

    public function members()
    {
        return $this->belongsToMany(User::class, 'members', 'organizations_id', 'user_id');
    }
    public function memberss()
    {
        return $this->hasMany(Member::class, 'organizations_id');
    }

    public function departements()
    {
        return $this->hasMany(Departement::class, 'organization_id');
    }
    // Relasi dengan user yang membuat organisasi
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
