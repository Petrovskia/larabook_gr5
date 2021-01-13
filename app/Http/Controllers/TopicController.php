<?php

namespace App\Http\Controllers;

use App\Block;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        return view('topic.index', ['topics'=>$topics, 'id'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = new Topic;
        return view('topic.create', ['topic'=>$topic]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = new Topic;
        // взаимодействуем с моделью
        $topic->topicname = $request->topicnameform; // заносим данные из поля в поле модели


        if(!$topic->save()) {
            $err = $topic->getErrors();
            // если проихойдет ошибка, то вас перенаправит(redirect) на url topic/create с передачей на страницу сообщения об ошибке и при использ. withInput() ваше поле формы останется заполненным
            // при ошибке в файле topic/create.blade.php будет передана переменная errors
            return redirect()->action('TopicController@create')->with('errors', $err)->withInput();
        }

//        try {
//            $topic->save();
//        } catch (\Exception $e) {
//
//        }
        // при успехе в файле topic/create.blade.php будет передана переменная message
        return redirect()->action('TopicController@create')->with('message', "New topic $topic->topicname has been added with ID $topic->id");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // SELECT * FROM blocks WHERE topicid = ?
        // выбираем все блоки соответствующие выбранному топику
        $blocks = Block::where('topicid', $id)->get();

        // получение всех топиков
        $topics = Topic::all(); // SELECT * FROM topics

        //$topicname = Topic::pluck('topicname', 'id')->get($id);
        // или
        $topicname = Topic::find($id)->topicname;


        return view('topic.index', ['topics'=>$topics, 'blocks'=>$blocks, 'id'=>$id, 'topicname'=>$topicname]);
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
