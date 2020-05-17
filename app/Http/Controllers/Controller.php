<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use App\Repositories\EventTypeRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $__eventRepo;
    protected $__eventTypeRepo;

    public function __construct()
    {
        $this->__eventRepo     = new EventRepository;
        $this->__eventTypeRepo = new EventTypeRepository;
        Carbon::setLocale('vi_VN');
    }
}
