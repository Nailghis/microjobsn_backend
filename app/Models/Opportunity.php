<?php

namespace App\Models;

use App\Models\Lookups\Category;
use App\Models\Lookups\Country;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    //casting to transfomr élements
    public $casts = [
      'deadline' => 'datetime'
    ];

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'country_id',
        'deadline',
        'organizer',
        'created_by'
    ];

    public function detail(){
        return $this->hasOne(OpportunityDetail::class);
    }

    //category relation
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //country relation
    public function country(){
        return $this->belongsTo(Country::class);
    }

    //user relation
    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
