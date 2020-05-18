<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Event extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'member_id' => 'array',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start_date',
    ];

    /**
     * Get the admin that owns the event.
     */
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'created_by', 'id');
    }

    /**
     * Get the event type record associated with the event.
     */
    public function type()
    {
        return $this->hasOne('App\Models\EventType', 'id', 'type_id');
    }

    /**
     * Get the event's member.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getMembersAttribute()
    {
        return Admin::whereIn('id', $this->member_id)->get();
    }
}
