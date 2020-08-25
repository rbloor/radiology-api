<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    protected $fillable = [
        'name', 'source', 'type', 'is_checked', 'user_id', 'category_id'
    ];

    protected $appends = [
        'short_name'
    ];

    protected $casts = [
        'is_checked' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer', 'question_id');
    }

    public function submissions()
    {
        return $this->hasMany('App\Submission', 'question_id');
    }

    public function getShortNameAttribute()
    {
        return Str::limit($this->name, 100);
    }
}
