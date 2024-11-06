<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guaeded = [];

    public function employes()
    {
        return $this->hasMany(Employe::class);
    }
}
