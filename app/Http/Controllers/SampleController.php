<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sample::all()->toArray();
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sample = new Sample();

        $sample[Sample::HOGE] = $request->input(Sample::HOGE);
        $sample[Sample::FUGA] = $request->input(Sample::FUGA);
        $sample[Sample::PIYO] = $request->input(Sample::PIYO);

        $sample->save();
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return Sample::find($id);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Sample  $sample
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Sample $sample)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $sample = Sample::find($id);

        $sample[Sample::HOGE] = $request->input(Sample::HOGE);
        $sample[Sample::FUGA] = $request->input(Sample::FUGA);
        $sample[Sample::PIYO] = $request->input(Sample::PIYO);

        $sample->save();
    }

    /**
     * Remove the specified resource from storage.
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Sample::find($id)->delete();
    }
}
