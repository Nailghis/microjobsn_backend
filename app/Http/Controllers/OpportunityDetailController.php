<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpportunityDetailRequest;
use App\Models\OpportunityDetail;
use App\Http\Resources\OpportunityDetail as OpportunityDetailResource;
use Illuminate\Http\Request;

class OpportunityDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //we don't really need to see opportunity detail index till we don't need to see the admin panel
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //we don't need this to
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpportunityDetailRequest $request)
    {
        $opportunityDetail = OpportunityDetail::create([
            'opportunity_id' => $request->opportunityId,
            'benefits' => $request->benefits,
            'application_process' => $request->applicationProcess,
            'eligibilities' => $request->eligibilities,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'official_link' => $request->officialLink,
            'further_queries' => $request->furtherQueries,
            'eligible_regions' => json_encode($request->eligibleRegions)
        ]);

        return new OpportunityDetailResource($opportunityDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpportunityDetail  $opportunityDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OpportunityDetail $opportunityDetail)
    {
        return new OpportunityDetailResource($opportunityDetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpportunityDetail  $opportunityDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OpportunityDetail $opportunityDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OpportunityDetail  $opportunityDetail
     * @return \Illuminate\Http\Response
     */
    public function update(OpportunityDetailRequest $request, OpportunityDetail $opportunityDetail)
    {
        $opportunityDetail->update([
            'opportunity_id' => $request->opportunityId,
            'benefits' => $request->benefits,
            'application_process' => $request->applicationProcess,
            'eligibilities' => $request->eligibilities,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'official_link' => $request->officialLink,
            'further_queries' => $request->furtherQueries,
            'eligible_regions' => json_encode($request->eligibleRegions)
        ]);

        return new OpportunityDetailResource($opportunityDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpportunityDetail  $opportunityDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpportunityDetail $opportunityDetail)
    {
        //we don't need to delete oportunity resource
    }
}
