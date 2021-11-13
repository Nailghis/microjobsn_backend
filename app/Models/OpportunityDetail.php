<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpportunityDetail extends Model
{
    //
    public function opportunity(){
        return $this->belongsTo(Opportunity::class);
    }
}
