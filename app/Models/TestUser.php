<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
    //テーブル名

    protected $table = 'test_users';
    
    //可変項目
    protected $fillable =
    [
        'title',
        'content'
    ];
}
