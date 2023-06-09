<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Instructor;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Requests\GenreData;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreData $request)
    {
        $genre = new Genre;

        $genre->name = $request->name;

        $genre->save();

        return redirect('/instructor/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(genre $genre)
    {
        //
    }
}
