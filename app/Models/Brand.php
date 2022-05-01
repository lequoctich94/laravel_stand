<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mobile;
use App\Models\PhoneNumber;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand_mobile';

    protected $fillable = [
        'id', 'name', 'brand_id'
    ];

    public $timestamps = false;

    //hasmany được sử dụng cho quan hệ 1:n
    //1 brand như samsung có nhiều nhiều điên thoại
    //$this->hasMany(Mobile::class,"khóa ngoại của Mobile","khóa local của Brand");
    //nếu đứng ở mobile, là quan hệ belong to (thuộc về), sẽ sét ở model Mobile App/Models/mobile

    public function relate_mobile()
    {
        return $this->hasMany(Mobile::class,"brand_id","id");
    }

    //Quan hệ 1-n xuyên thấu
    //1 brand - n mobile. 1 mobile - n phone number, 1 band ?? phone number
    //
    public function relate_phoneNumber(){
        return $this->hasManyThrough(
            PhoneNumber::class, //table cần lấy dữ liệu
            Mobile::class, //table trung gian
            "brand_id", //khóa ngoại bản trung gian
            "mobile_id", //khóa ngoại bản cần lấy
            "id", //khóa chính của bảng hiện tại - mobile
            "id" //j=khóa chính của bảng trung gian
        );
    }
}
