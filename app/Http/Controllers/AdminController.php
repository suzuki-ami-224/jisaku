<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $users = User::query();
        // $a = Auth::id();
        // $query = $users->where('id',$a)->where('role', '0');

        // $user = $request->input('user_name');
        // if(isset($user)) {
        //     $query->where("name","like","%".$users."%");
        // }

        // $users =$query->get();

        // return view('admin',compact('users'));


        // return view('admin',[
        //     'users' =>$users,
        // ]);

        // $users = User::paginate(20);

        // // 　　     // 検索フォームで入力された値を取得する
        // $search = $request->input('user_name');
        
        // //         // クエリビルダ
        // $query = User::query();
        
        // if ($search) {
        
        //     $spaceConversion = mb_convert_kana($search, 's');
        
        //     $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
        
        
        //     foreach($wordArraySearched as $value) {
        //                 $query->where('name', 'like', '%'.$value.'%');
        //     }
                
        
        //             $users = $query->paginate(20);
        //         }
        // return view('admin',[
        
        //     'users' => $users,
        //     'search' => $search,
        // ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
