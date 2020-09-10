<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class islem extends Controller
{
    public function index($islem,$id){
        if ($islem=="tamamla") {
            Task::where('id',$id)->update(['status' => 'Tamamlandı']);
        }elseif ($islem =="bekleme") {
            Task::where('id',$id)->update(['status' => 'Beklemede']);
        }elseif ($islem == "iptal") {
            Task::where('id',$id)->update(['status' => 'İptal']);
        }elseif ($islem == "sil") {
            Task::where('id', $id)->delete();
        }
        return redirect('/');


    }
}
