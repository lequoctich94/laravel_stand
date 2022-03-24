<?php

namespace App\Http\Controllers\Tool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\CsvImport;
use App\Imports\QueueImport;
use App\Exports\CsvExport;
use App\Exports\CsvQueueExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\jobs\NotifyUserOfCompletedExport;

class ExcelController extends Controller
{
    public function index(Request $request){

        //sử dụng flag session để in thông báo
        $message = '';
        if($request->session()->get('message')){
            $message = $request->session()->get('message');
        }

        return view('Tool.excel',compact('message'));

    }
    public function basicImport(Request $request){

        try{
           Excel::import(new CsvImport, request()->file('import_basic'));
           $request->session()->flash('message', 'Task was successful!');
           return redirect('ExelModal');

        }catch(\Exception $ex){
            dd($ex);
        }

    }

    public function queueImport(Request $request){
        try{
            //upload file
            //doc https://laravel.com/docs/8.x/filesystem#file-uploads
            $path = Storage::putFile('csv', $request->file('import_queue'));
            //import file với queue
            Excel::queueImport(new QueueImport, $path);
            $request->session()->flash('message', 'Task is push to queue job!');
            //xóa file
            Storage::delete($path);
            return redirect('ExelModal');

         }catch(\Exception $ex){
             dd($ex);
         }

    }

    public function basicExport(Request $request)
    {
      try{
        $request->session()->flash('message', 'done export');
        return Excel::download(new CsvExport, 'users.xlsx');

     }catch(\Exception $ex){
         dd($ex);
     }
    }

    public function queueExport(Request $request){
        //Thực hiên hành động NotifyUserOfCompletedExport sau khi hoàn thành
        $fileName = "public/csv_".date("Ymdhis").".xlsx";

        (new CsvQueueExport)->queue($fileName)->chain([
            new NotifyUserOfCompletedExport($fileName),
        ]);


        return redirect('ExelModal');
    }
}
