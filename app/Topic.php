<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

// подключение модуля для валидации полей
use \Esensi\Model\Model;

class Topic extends Model
{
    protected $primaryKey = 'id'; // указываем ключевое поле таблицы topics
    protected $table = 'topics';
    protected $fillable = ['topicname', 'created_at', 'updated_at'];

    // esensi ограничения для полей
    protected $rules = ['topicname'=>['required', 'max: 128', 'unique']];
}
