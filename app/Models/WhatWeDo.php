<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatWeDo extends Model
{
    use HasFactory;

    protected $table = 'whatwedo'; // Explicitly set the table name

    protected $fillable = ['title', 'subtitle', 'picturetitle', 'picturedescription', 'button','button2', 'image'];
}
