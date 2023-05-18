<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\Genre;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $instructor = new Instructor;
        // $genre= Genre::all()->toArray();
        // dd($genre);
        $instructors = $instructor;
        
        $instructors = \DB::table('instructors')->join('genres', 'instructors.genre_id','=', 'genres.id')->select('instructors.*','genres.name as genresname')->get();
        // dd($instructors);
        // $instructors = $instructors->join('genres', 'instructors.genre_id', 'genres.id')->get();
        // $instructors = Genre::join('instructors', 'genres.id', 'genre_id')->selectRaw('instructors.*','genres.name as genresname')->get();


        
        if(Auth::user()->role == 0){
            return view('home',[
                'instructors' => $instructors,
            ]);

        }else{
            return view('admin'
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
