<?php

namespace App\Models\Lookups;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    public $timestamps = false;

    protected $fillable = ['name'];
}
