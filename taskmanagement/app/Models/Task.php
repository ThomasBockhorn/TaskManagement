<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'task_name',
        'priority',
    ];

    /**
     * Many to one relationship with users.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
