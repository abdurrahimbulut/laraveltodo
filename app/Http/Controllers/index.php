<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

use function GuzzleHttp\Promise\task;

class index extends Controller
{
    public function index(){
        $yapilacaklar = Task::get();
        return view('index',compact('yapilacaklar'));
    }
    public function islemEkle(){
        $this->validate(request(),[
            'baslik' =>'required|min:5|max:25',
            'tanim'  =>'min:2|max:150'
        ]);

        $task = new Task();
        $task->setBaslik(request('baslik'));
        $task->setTanim(request('tanim'));
        $islem = $task->addTask();


        $yapilacaklar = Task::get();
        return view('index', compact('islem','yapilacaklar'));
    }
}
