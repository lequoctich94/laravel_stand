<?php

namespace App\Http\Controllers\Tool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Mobile;
use App\Models\Series;
use App\Models\Color;

class RelationEloquent extends Controller
{
    public function index(Mobile $mobile){

        //quan hệ 1-1
        //số seri từ tên điện thoại
        //sử dụng hasone, 1 điện thoại có 1 số seris
        $seriFromMobile = Mobile::find(1)->relationSeri->seri_number;

        //1-1 nghịch đảo
        //1 số series thuộc về 1 điện thoại
        //list tên điện thoại từ số seri
        $nameMobileFromSeri = Series::find(1)->relationMobile->name;
        //1-n
        //1 branch có nhiều mobile
        //list các điện thoại của Brand có id 1

        $mobileOfBrand = Brand::find(1)->relate_mobile;
        //1-n nghịch đảo
        //1 mobile thuộc về 1 branch
        //get branch name của điện thoại có id 1

        $brandOfMobile = Mobile::find(1)->relationBrand->name;
        //get branch name của điện thoại có id 1
        $brandOfMobileAll = $mobile::all()[1]->relationBrand->name;

        //1-1 xuyên thấu, 1 mobile - 1 series, 1 series - 1 series detail, quan hệ giữa mobile và series detail

        $seriesNumber = Mobile::find(1)->relationSeriesNumber->series_info;
        //1-n xuyên thấu, 1 brand - n mobile, 1 mobile- n phone number, brand and phone number ??
        $phoneNumberOfBrand = Brand::find(1)->relate_phoneNumber;

        //quan hệ n-n, giữa mobile và color
        $colorOfMonile = Mobile::find(1)->relate_Color;
        //quan hệ nn, giữ mobile và color
        $mobileHaveColor = Color::find(1)->relate_Mobile;
        //lấy bảng trung gian
        $mobile = Mobile::find(1)->relate_Color[0]->pivot;

        return view("Tool.blank",["data"=>$mobile]);
    }
}
