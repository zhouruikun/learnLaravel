<?php
namespace  App;
use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    //指定表明
    protected $table = 'student';
    //
    protected  $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name','age'];
    public function getDateFormat()
    {
        return time();
    }
    protected function asDateTime($value)
    {
        return $value;
    }
}