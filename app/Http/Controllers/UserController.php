<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\Genre;
use App\User;
use App\Reservation;


use Illuminate\Http\Request;
use App\Http\Requests\UserData;
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
        $data= \DB::table('lessons')->get();

        $users = User::paginate(20);

        // 　　     // 検索フォームで入力された値を取得する
        $search = $request->input('user_name');
        
        //         // クエリビルダ
        $query = User::query();
        
        if ($search) {
        
            $spaceConversion = mb_convert_kana($search, 's');
        
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
        
        
            foreach($wordArraySearched as $value) {
                        $query->where('name', 'like', '%'.$value.'%');
            }
                
        
                    $users = $query->paginate(20);
                }

                $id = Auth::id();

                $reservations = \DB::table('reservations')->join('lessons', 'reservations.lesson_id','=', 'lessons.id')->select('lessons.*', 'reservations.*','lessons.id as lessonid')->get();


        
        if(Auth::user()->role == 0){
            return view('home',[
                'instructors' => $instructors,
                'data' => $data,
                'id' => $id,
            ]);
            
        }else{
            return view('admin',[
                
                'users' => $users,
                'search' => $search,
                'reservations' => $reservations
            ]);
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
        $user = Auth::user();
        $reservation = new Reservation;
        
        $reservations = \DB::table('reservations')->join('lessons', 'reservations.lesson_id','=', 'lessons.id')->select('lessons.*', 'reservations.*','lessons.id as lessonid')->get();
        // dd($reservations);

        return view('mypage',[
            'user' => $user,
            'reservations' =>$reservations
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $params = User::find($id);

        // dd($params);

        return view('user_edit',[
            'user' => $params,
            'result' => $params,


        ]);

    

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserData $request, User $user)
    {
        $columns = ['name', 'email'];        
        
        foreach($columns as $column) {
            $user->$column = $request->$column;
        }
        
        $user->save();


        return redirect()->route('user.show',['user'=>Auth::id()]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect('user');

    }
}
