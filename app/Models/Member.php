<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $with = ['organization', 'departement', 'position', 'user']; // Eager Lazy Loader
    protected $guarded = ['id'];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organizations_id');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departements_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
