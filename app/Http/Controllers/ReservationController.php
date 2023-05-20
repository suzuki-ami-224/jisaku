<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\Lesson;
use App\Genre;
use App\User;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $genre = $request->input('genre');
        $lesson = $request->input('lesson');

        $instructors = Instructor::all()->toArray();
        $genres = Genre::all()->toArray();
        $lessons = Lesson::all()->toArray();
        $a = \DB::table('reservations')->join('lessons', 'reservation.lesson_id','=', 'lessons.id')->select('lessons.*','reservations.*','reservations.id as reservationid')->get();


        $query = Instructor::query();
        //テーブル結合
        $query->join('lessons', function ($query) use ($request) {
            $query->on('instructors.id', '=', 'lessons.instructor_id');
            })->join('genres', function ($query) use ($request) {
            $query->on('instructors.genre_id', '=', 'genres.id');
            })->select('instructors.*','genres.name as genresname','lessons.*');

        if(!empty($name)) {
            $query->where('instructors.name', 'LIKE', $name);
        }

        if(!empty($genre)) {
            $query->where('genres.name', 'LIKE', $genre);
        }

        if(!empty($lesson)) {
            $query->where('lessons.start', 'LIKE', $lesson);
        }

        $items = $query->get();
        // dd($items);
        return view('yoyaku',[
            'items'=>$items,
            'instructors'=>$instructors,
            'name'=>$name,
            'genres'=>$genres,
            'lessons'=>$lessons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Reservation $reservation)
    {
        
        // $users = User::orderBy('id','desc')->get();
        
        
        // dd($lessons);
        
        // return view('reservation_create',[
            //     'users' => $users,
            //     'lessons' => $lessons,
            // ]);
            
            // $params = Lesson::find($id);
            $lessons = \DB::table('reservations')->join('lessons', 'reservation.lesson_id','=', 'lessons.id')->select('lessons.*','reservations.id as reservationid')->get();
            $lessons = Lesson::orderBy('id','desc')->get();
        dd($lessons);

        return view('lesson_edit',[
            'lesson' => $params,
            'instructors' => $instructors,
            'id' => $id,
        ]);



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
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
