<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departements_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
