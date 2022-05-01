<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Series;
use App\Models\SeriesDetail;
use App\Models\Color;
class Mobile extends Model
{
    use HasFactory;
    protected $table = 'mobile';

    public $timestamps = false;

    //hasone cho quan hệ 1-1
    // 1 mobile có 1 series
    // $this->hasOne(Series::class,"khóa ngoại của series","khóa chính của mobile");
    //quen hệ nghịch đảo(nếu khóa ngoại nằm ở bảng nào thì nó là quan hệ nghịch đảo), 1 seri thuộc về 1 mobile
    public function relationSeri(){
        return $this->hasOne(Series::class,"mobile_id","id");
    }

    //belong to cho quan hệ 1-n nghịch đảo (vì khóa ngoại nằm ở Mobile nên mối quan hệ nghịch đảo ở đây)
    //1 mobile chỉ có 1 branch
    //$this->belongsTo(Brand::class, "khóa ngoại của mobile","khóa chính của brand")
    public function relationBrand()
    {
        return $this->belongsTo(Brand::class, "brand_id","id");
    }

    //Quan hệ 1-1 gián tiếp
    //1 mobile có 1 series, 1 series có 1 series detail, vậy quan hệ giữa mobile và phone series detail
    //Với tham số thứ nhất được truyền vào là tên của model mà chúng ta muốn truy cập, tham số thứ 2 là model trung gian
    public function relationSeriesNumber(){
        return $this->hasOneThrough(
            SeriesDetail::class, //bảng cần lấy
            Series::class,//bảng trung gian
            'mobile_id', // khóa ngoại bản trung gian - Series
            'series_id', // Khóa ngoại bản cần lấy - SeriesDetail
            'id', // Khóa chính cần lấy của bảng Hiện Tại - Mobile
            'id' // Khóa chính bản trung gian - Series
        );
    }

    //  Quan hệ n-n. mobile và color

    public function relate_Color(){
        return $this->belongsToMany(
            Color::class, //bảng cần lấy
            'mobile_color', //bảng trung gian
            'mobile_id', //khóa ngoại của bảng trung gian:bảng hiện tại
            'color_id', //khóa ngoại của bảng trung gian:bảng cần lấy
        );
    }


}
