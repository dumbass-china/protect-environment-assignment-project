<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievements extends Model
{
    use HasFactory;
    protected $table = 'achievements'; // Explicitly set the table name

    protected $fillable = ['title', 'description', 'boxtitle',

    'boxsubtitle', 'button', 'icon'];
}
