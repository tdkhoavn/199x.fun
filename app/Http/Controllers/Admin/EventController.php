<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Http\Requests\Admin\EventTypeRequest;
use Butschster\Head\Facades\Meta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condition = [
            'page_number' => 4,
            'order_by'    => ['updated_at' => 'desc'],
            'with'        => ['admin', 'type'],
        ];

        $events = $this->__eventRepo->getByCondition($condition);

        Meta::setTitleSeparator('|')
            ->setTitle(config('constants.APP_FULLNAME'))
            ->prependTitle('【Admin】Danh sách Event');

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Meta::setTitleSeparator('|')
            ->setTitle(config('constants.APP_FULLNAME'))
            ->prependTitle('【Admin】Chỉnh sửa Event');

        $event_types = $this->__eventTypeRepo->getAll();
        $members     = $this->__adminRepo->getAll()->filter(function ($admin) {
            return $admin->id != Auth::id();
        });

        return view('admin.events.create', compact('event_types', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $data = [
            'start_date' => Carbon::createFromFormat('d-m-Y', $request->start_date),
            'member_id'  => $request->member_id,
            'type_id'    => $request->type_id,
            'total'      => int_value($request->total),
            'note'       => $request->note,
            'created_by' => Auth::id(),
        ];

        $this->__eventRepo->create($data);

        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EventTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeType(EventTypeRequest $request)
    {
        $data = [
            'name'       => $request->name,
            'created_by' => Auth::id(),
        ];
        $this->__eventTypeRepo->create($data);

        return redirect()->route('admin.events.create');
    }
}