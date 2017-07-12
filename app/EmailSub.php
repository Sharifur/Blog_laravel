<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSub extends Model
{
    protected $table = 'email_subs';
    protected $fillable = ['email'];
}
