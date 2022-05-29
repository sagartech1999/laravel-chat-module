<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['message','from_id','to_id','is_read'];

    public function fromMessage()
    {
        return $this->belongsTo('App\User','from_id');
    }

    public function toMessage()
    {
        return $this->belongsTo('App\User','to_id');
    }

    public function getFromReadMessageAttribute()
    {
        return self::where(['from_id'=>Auth::user()->id,'is_read'=>'0'])->count();
    }

    public function getToReadMessageAttribute()
    {
        return self::where(['to_id'=>Auth::user()->id,'is_read'=>'0'])->count();
    }
}
