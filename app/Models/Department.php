<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guaeded = [];

    public function employes()
    {
        return $this->hasMany(Employe::class);
    }
}
