<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Instructor;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;


class LessonController extends Controller
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
        $params = Instructor::orderBy('id','desc')->get();
        return view('lesson_create',[
            'instructors' => $params,
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
        $lesson = new Lesson;

        $lesson->instructor_id = $request->instructor_id;
        $lesson->title = $request->title;
        $lesson->start = $request->start;
        $lesson->finish = $request->finish;
        $lesson->color = $request->color;

        dd($lesson);

        $lesson->save();

        return redirect('lesson_create');


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

    public function lesson_creat(Request $request)
    {
        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);

        $calendarId = "3f8da0694d48abb2ac8cfc233b6a75b6b30c3e4096395d15771aef3657e76bfb@group.calendar.google.com";

        $title = $request->title;
        $instructor_id = $request->instructor_id;

        $start = $request->start;
        $finish = $request->finish;
        $event = new Google_Service_Calendar_Event(array(
            

       
            'summary' => $instructor_id,
            'description' =>$title,
            'start' => array(
            // 開始日時
            'dateTime' => $start.':00+09:00',
            'timeZone' => 'Asia/Tokyo',
            ),
            'end' => array(
            // 終了日時
            'dateTime' => $finish.':00+09:00',
            'timeZone' => 'Asia/Tokyo',
            ),
        ));

        $event = $service->events->insert($calendarId, $event);
        echo "イベントを追加しました";
        
    }

    private function getClient()
    {
        $client = new Google_Client();

        //アプリケーション名
        $client->setApplicationName('GoogleCalendarAPIのテスト');
        //権限の指定
        $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
        //JSONファイルの指定
        $client->setAuthConfig(storage_path('app/api-key/jisaku-lesson-361458fb3114.json'));

        return $client;
    }
}
