<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
