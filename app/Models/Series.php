<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mobile;

class Series extends Model
{
    use HasFactory;
    protected $table = 'series';

    public $timestamps = false;

    //Quan hệ 1-1 Đảo ngược, 1 số seri thuộc về 1 điện thoại nào đó
    //return $this->belongsTo(Mobile::class, "khóa ngoại của Series","khóa chính của bảng mobile");
    public function relationMobile(){
        return $this->belongsTo(Mobile::class, "mobile_id","id");
    }
}
