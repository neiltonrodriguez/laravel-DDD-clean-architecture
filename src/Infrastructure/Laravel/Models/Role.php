<?php

namespace App\Infrastructure\Laravel\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $table = 'roles';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}