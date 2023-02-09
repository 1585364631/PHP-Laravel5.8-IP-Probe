<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    //
    protected $table = 'info';
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;
    protected $guarded = [];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    //时间戳格式设置
    protected $dateFormat = 'U';
}
