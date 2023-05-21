<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\Lesson;
use App\Genre;
use App\User;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function create(int $id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = new Reservation;
        dd($reservation);
        $user = Auth::id();
        
        $reservation->user_id = $user;
        $reservation->lesson_id = $request->lesson_id;
        

        $reservation->save();

        return redirect('/reservation');

    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $reservation = new Reservation;
        
        $reservations = \DB::table('reservations')->join('lessons', 'reservations.lesson_id','=', 'lessons.id')->get();
        // dd($reservations);

        return view('mypage',[
            'user' => $user,
            'reservations' =>$reservations
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        
        // $lessons = Lesson::orderBy('id','desc')->get();
        
        // return view('lesson_edit',[
            //     'lesson' => $params,
            //     'id' => $id,
            // ]);
            
            $params = Lesson::find($id);
            $instructors = Instructor::all()->toArray();
            // dd($instructors);

        return view('/reservation',[
            'lesson' => $params,
            'instructors' => $instructors,
            'id' => $id,

        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $reservation = new Reservation;
        $user = Auth::id();
        
        $reservation->user_id = $user;
        $reservation->lesson_id = $id;
        
        $reservation->save();

        return redirect('/reservation');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $reservation = Reservation::find($id);
        // dd($reservation);
        $reservation->delete();
    
        return redirect()->route('user.show',['user'=>Auth::id()]);

    }
}
