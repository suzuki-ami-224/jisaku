<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use App\Instructor;
use App\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;

use Image;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructor =new Instructor;

        $all = $instructor->all()->toArray();

        return view('instructor',[
            'instructors' => $all,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = Genre::orderBy('id','desc')->get();
        return view('instructor_create',[
            'genres' => $params,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  _App\Http\Requests\CreateData $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        $instructor = new Instructor;

        $instructor->name = $request->name;
        $instructor->comment = $request->comment;

        $dir = 'picture';
        $file_name =$request->file('picture')->getClientOriginalName();
        $request->file('picture')->storeAs('public/' . $dir, $file_name);

        
            $instructor->picture = $file_name;
            $instructor->save();

        return redirect('instructor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        $params = Genre::orderBy('id','desc')->get();
        // dd($instructor['id']);



        return view('instructor_edit',[
            'genres' => $params,
            'result' => $instructor,
            'id' => $instructor,

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, Instructor $instructor)
    {
            $columns = ['name', 'genre_id', 'comment'];

            $dir = 'picture';
            $file_name =$request->file('picture')->getClientOriginalName();
            $request->file('picture')->storeAs('public/' . $dir, $file_name);
            
            
            
            foreach($columns as $column) {
                $instructor->$column = $request->$column;
            }
            $instructor->picture = $file_name;
            
            $instructor->save();
    
    
            return redirect('/instructor');
    
        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
    
        return redirect('instructor');
    }
}
