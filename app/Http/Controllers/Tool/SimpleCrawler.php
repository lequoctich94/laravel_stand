<?php

namespace App\Http\Controllers\Tool;

use Illuminate\Http\Request;
use KubAT\PhpSimple\HtmlDomParser;
use App\Http\Controllers\Controller;
use App\Service\Crawler;

class SimpleCrawler extends Controller
{
    public function index(){
        return view('tool.crawler');
    }

    public function post(Crawler $crawlerSv,  Request $request){
        $content = file_get_contents("https://sample.kan-tek.com/blog.html");

        $htmlTargets = HtmlDomParser::str_get_html($content);
        //$data =  $htmlTargets->find('element','position');
        //$data->type
        $domTemplate = $crawlerSv->dom_template();

        $dataCrawlers = [];
        $loopElement = $domTemplate['loop_item']['dom'];
        unset( $domTemplate['loop_item']);
        if(empty($htmlTargets->find($loopElement))){
            return [];
        }

        if($request->max_item > 0){
            $maxCount = $request->max_item;
        }
       // dd($request->max_item);
        $count = 0;
        foreach ($htmlTargets->find($loopElement) as $htmlItem) {
            if($request->max_item > 0 &&  $maxCount == $count){
               break;
            }
            $dataCrawler = [];

            foreach($domTemplate as $itemName => $value){
                if(empty($htmlItem->find($value['dom'],0))){
                    $dataCrawler[$itemName] =  '' ;
                    continue;
                }
                $dataItem = $htmlItem->find($value['dom'],0);
                $type = $value['type'];
                if($itemName == "comment_count"){
                    $value =  trim(explode(":",$dataItem->$type)[1]," ");
                }else{
                    $value =   $dataItem->$type;
                }
                $dataCrawler[$itemName] =  $value ;
            }
            $count ++;
            $dataCrawlers[] =  $dataCrawler;
        }
        dd($dataCrawlers);
    }
}
