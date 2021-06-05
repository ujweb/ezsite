<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    // protected $table = 'tasks' // 因為Laravel會自動猜測Task複數型，所以不用寫
    protected $fillable = ['title', 'salary', 'desc', 'enabled'];
}
