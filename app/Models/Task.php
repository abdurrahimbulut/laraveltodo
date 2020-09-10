<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table="task";
    protected $guarded=[];


    public $baslik,$tanim;
    public function setBaslik($value){
        $this->baslik = $value;
    }
    public function setTanim($value){
        $this->tanim = $value;
    }



    /**
     * Yapılacak bir İşi ekler.
     * Adds new task.
     *
     *
     * @return bool
     */
    public function addTask(){
        $task = Task::create([
            'task_name'         => $this->baslik,
            'task_description'  => $this->tanim,
            'status'            => 'Beklemede'
        ]);
        return $task->exists ? true : false;
    }
}
