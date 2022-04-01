<?php

namespace App\Http\Controllers\Tool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Repositories\CsvRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;

class ReponsitoryController extends Controller
{
    protected $csvRepo;
    protected $userRepo;

    public function __construct(CsvRepositoryInterface $csvRepo)
    {
        $this->csvRepo = $csvRepo;
       // $this->userRepo = $userRepo;
    }

    public function index()
    {
        $csv = $this->csvRepo->getAll();

        return $csv ;
    }
}
