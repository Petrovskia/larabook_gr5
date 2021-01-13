<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public $primaryKey = 'id';
    public $table = 'blocks';
    // проверить имеет ли значение последовательность
    public $fillable = ['title', 'content', 'imagepath', 'topicid', 'created_at', 'updated_at'];
}
