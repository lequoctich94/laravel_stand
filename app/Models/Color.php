<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mobile;

class Color extends Model
{
    use HasFactory;

    protected $table = 'color';

    public $timestamps = false;

    public function relate_Mobile(){
        return $this->belongsToMany(
            Mobile::class, //bảng cần lấy
            'mobile_color', //bảng trung gian
            'color_id', //khóa ngoại của bảng trung gian:bảng hiện tại
            'mobile_id', //khóa ngoại bảng trung gian:bảng cần lấy
        );
    }
}
