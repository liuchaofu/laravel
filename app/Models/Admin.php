<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //添加可以修改得字段

    protected $fillable=["author","intro","content"];
}
