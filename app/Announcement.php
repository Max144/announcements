<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($val)
    {
        return Carbon::parse($val)->format('j F Y');
    }

    public function getRawDescriptionAttribute()
    {
        return nl2br(str_replace(' ', '&nbsp;', e($this->description)));
    }
}
