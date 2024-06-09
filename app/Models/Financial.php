<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}