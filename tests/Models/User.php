<?php namespace Cviebrock\EloquentLogLazyLoading\Test\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{

    protected $table = 'users';

    protected $fillable = ['group_id', 'name'];

    public $timestamps = false;
}
