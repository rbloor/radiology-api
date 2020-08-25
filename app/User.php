<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $appends = [
        'unanswered_questions', 'questions_answered_wrong'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question', 'user_id');
    }

    public function submissions()
    {
        return $this->hasMany('App\Submission', 'user_id');
    }

    public function getUnansweredQuestionsAttribute() {
        $current = $this->submissions->pluck('question.id');
        return \App\Question::whereNotIn('id', $current)->get();
    }

    public function getQuestionsAnsweredWrongAttribute() {
        $current = $this->submissions->where('is_correct', 0)->pluck('question.id');
        return \App\Question::whereIn('id', $current)->pluck('id');
    }
}
