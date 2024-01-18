<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subtitle', 'description','button1','button2','button3','button4','boxtitle','boxdescription','image'];
}
