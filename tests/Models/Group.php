<?php namespace Cviebrock\EloquentLogLazyLoading\Test\Models;

use Cviebrock\EloquentLogLazyLoading\LogLazyLoading;
use Illuminate\Database\Eloquent\Model;


class Group extends Model
{

    use LogLazyLoading;

    protected $table = 'groups';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
