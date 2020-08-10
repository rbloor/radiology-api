<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
  protected $fillable = [
      'user_id', 'question_id', 'is_correct'
  ];

  protected $casts = [
      'is_correct' => 'boolean',
  ];

  public function user()
  {
      return $this->belongsTo('App\User', 'user_id');
  }

  public function question()
  {
      return $this->belongsTo('App\Question', 'question_id');
  }

}
