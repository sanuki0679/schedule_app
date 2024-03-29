<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'guest_count',
        'child_count',
        'seat',
        'customer_name',
        'customer_phone',
        'receptionist_name',
        'final_confirmation',
        'body',
        'start',
        'end',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function start_diff()
    {
        return(new Carbon($this->start))->diffForHumans();
    }

    public function getStartDateAttribute()
    {
        return(new Carbon($this->start))->toDateString();
    }

    public function getStartTimeAttribute()
    {
        return date_parse_from_format('%Y-%m-%d %H:%i', $this->start)["hour"]
            ? (new Carbon($this->start))->toTimeString()
            : '';
    }

    public function getEndDateAttribute()
    {
        return (new Carbon($this->end))->toDateString();
    }

    public function getEndTimeAttribute()
    {
        return date_parse_from_format('%Y-%m-%d %H:%i', $this->end)["hour"]
            ? (new Carbon($this->end))->toTimeString()
            : '';
    }
}
