<?php
namespace App\http\Controllers;

use App\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function test1(){

//        $bool = DB::insert('insert into student(name,age) values(?,?)'
//            ,['zhoukun',119]);
//        var_dump($bool);
//        $num = DB::update('update student set age = ? where name = ?',
//            [12,'zhoukun']);
//        var_dump($num);

        DB::delete('delete from student where id = ?',[1]);
        $students = DB::select('select * from student');
        dd($students);
    }
    public function query1(){
//        $bool= DB::table('student')->insertGetId(
//                ['name'=> 'zhoukun','age'=>19]
//            );
//            var_dump($bool);
        DB::table('student')->insert(
            ['name'=> 'zhoukun','age'=>19],
            ['name'=> 'zhoukun','age'=>19],
            ['name'=> 'zhoukun','age'=>19]
        );
    }
    public function query2(){
//        DB::table('student')
//            ->where('id',3)
//            ->update(['name'=>'zhoukun1']);
        $num = DB::table('student')
            ->where('id',3)
            ->decrement('age',3,['name'=>'haha']);
            var_dump($num);
    }
    public function query3(){
//        $num = DB::table('student')
//            ->where('id','>',4)->delete();
        $num = DB::table('student')->truncate();
        var_dump($num);
    }
    public function query4(){
      //  $student = DB::table('student') ->get();
      //  $student = DB::table('student') ->first();
//        $student = DB::table('student')
//            ->orderBy('id','desc')
//            ->first();
//        $students = DB::table('student')
//         ->where('id','>=',2)
//          ->get();
//        $students = DB::table('student')
//            ->whereRaw('id = ? and age >= ?',[1,119])
//            ->get();
//        $names = DB::table('student')
//
//            ->pluck('name');
//        $lists = DB::table('student')
//
//            ->pluck('name','id');
//        $lists = DB::table('student')
//            ->select('id','age')
//            ->get();
        $lists = DB::table('student')->orderBy('name','desc')->chunk(2,function ($students){
                    dd($students);
            });


    }
    public function query5(){
        //$num = DB::table('student')->count();
        $num = DB::table('student')->max('age');
        dd($num);
    }
    public function orm1()
    {
        //   $students = Student::find(21);
        // $students = Student::findOrFail(21);
        //  $students = Student::get();
//        $students = Student::where('id','>',2)->
//            orderBy('age','desc')
//            ->get();
//        Student::orderBy('name', 'desc')->chunk(2, function ($students) {
//            dd($students);
//        });
    }
    public function orm2(){
//    $student = new Student();
//    $student->name = 'zhoukun';
//    $student->age = 22;
//    $bool = $student->save();
//    dd($bool);
//        $students = Student::find(9);
//        echo date('Y-m-d H:i:s',$students->created_at);
//        $students= Student::create(
//            ['name'=>'zhoukun','age'=>22]
//        );
        $students=  Student::firstOrCreate(
            ['name'=>'2211','age'=>22]
        );
        dd($students);
    }
}