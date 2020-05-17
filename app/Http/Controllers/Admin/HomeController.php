<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController as Controller;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Meta::includePackages(['fullcalendar_css']);
        Meta::setTitleSeparator('|')
            ->setTitle(config('constants.APP_FULLNAME'))
            ->prependTitle('【Admin】Dashboard');

        return view('admin.index');
    }
}
