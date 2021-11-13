<?php

use Illuminate\Database\Seeder;
use App\Models\Opportunity;
use App\Models\OpportunityDetail;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Opportunity::class, 300)->create()->each(function ($opportunity){
            $opportunity->detail()->save(factory(OpportunityDetail::class)->make());
        });
    }
}
