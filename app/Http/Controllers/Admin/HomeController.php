<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController as Controller;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

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

        $calendar_data = [];
        $events        = $this->__eventRepo->getAll()->load(['type', 'admin']);
        foreach ($events as $event) {
            $item = [
                'title'           => "【{$event->type->name}】{$event->admin->name}",
                'url'             => route('admin.events.show', $event->id),
                'start'           => $event->start_date,
                'backgroundColor' => $event->type->color,
                'borderColor'     => $event->type->color,
                'allDay'          => true,
            ];
            $calendar_data[] = $item;
        }

        return view('admin.index', compact('calendar_data'));
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function timeline()
    {
        Meta::includePackages(['fullcalendar_css']);
        Meta::setTitleSeparator('|')
            ->setTitle(config('constants.APP_FULLNAME'))
            ->prependTitle('【Admin】Timeline');

        return view('admin.timeline');
    }
}
