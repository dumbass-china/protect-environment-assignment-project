<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentCauses extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subtitle','description','boxtitle','boxdescription','goal','raised','percentage','button1','button2','image'];
}
