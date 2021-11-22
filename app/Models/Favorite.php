<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $fillable = [
        'user_id', 'opportunity_id'
    ];
     function user(){
         return $this->belongsTo(User::class, 'user_id');
     }

     public function opprtunity(){
         return $this->belongsTo(Opportunity::class);
     }
}
