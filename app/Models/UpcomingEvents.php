<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingEvents extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subtitle','location','date','boxtitle','boxdescription','button','image'];

}
