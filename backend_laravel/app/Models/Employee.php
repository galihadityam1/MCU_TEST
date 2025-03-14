<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasFactory;
    use HasApiTokens, Notifiable;

    protected $fillable = ['name', 'position'];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'employee_id');
    }
}
