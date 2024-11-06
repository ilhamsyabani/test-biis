<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'nama',
        'nip',
        'place_birth',
        'date_birth',
        'address',
        'phone',
        'email',
        'id_departemen',
        'id_role',
        'joining_date',
        'status',
        'document',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'id_departemen');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
}
