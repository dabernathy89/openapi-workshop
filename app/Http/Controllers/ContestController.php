<?php

namespace App\Http\Controllers;

use App\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $contest = Contest::create(
            [
                'user_id' => \Auth::user()->id,
                'name' => $request->input('name'),
            ]
        );

        return response()->json($contest, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function show(Contest $contest)
    {
        return view('contest.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function edit(Contest $contest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contest $contest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest)
    {
        //
    }
}
