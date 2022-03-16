<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'due_date',
        'completed'
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
