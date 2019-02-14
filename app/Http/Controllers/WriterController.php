<?php

namespace App\Http\Controllers;

use App\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writers = Writer::all();
        $data = [
            "writers" => $writers
        ];
        return view('dashboard.writers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.writers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "name" => "required",
            "age" => "nullable",
            "username" => "required"
        ];

        $data = $this->validate($request, $rules);
        Writer::create($data);
        return Response::redirectTo("/dashboard/writers");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Writer $writer
     * @return \Illuminate\Http\Response
     */
    public function show(Writer $writer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Writer $writer
     * @return \Illuminate\Http\Response
     */
    public function edit(Writer $writer)
    {
        $data = [
            "writer"=>$writer
        ];
        return view('dashboard.writers.update',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Writer $writer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Writer $writer)
    {
        $rules = [
            "name" => "required",
            "age" => "nullable",
            "username" => "required"
        ];
        $data = $this->validate($request, $rules);
        $writer->update($data);
        return Response::redirectTo("/dashboard/writers");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Writer $writer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Writer $writer)
    {
        $writer->delete();
        return Response::redirectTo("/dashboard/writers");

    }
}
