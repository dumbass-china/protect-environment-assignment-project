<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $table = 'donation'; // Explicitly set the table name

    protected $fillable = ['title', 'subtitle', 'picturetitle','picturesubtitle','picturesubtitle2','picturedescription','picturebutton','button','image'];
}
