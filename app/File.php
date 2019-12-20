<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['model','photo','brand','releaseDate','cost','power','phoneNumber','descripton','booked','bookhov'];
}
