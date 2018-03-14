<?php
namespace App\http\Controllers;

use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

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

    public function  request1(Request $request){
                //1.取值
                   // echo $request->input('name');
                    //echo $request->input('namae',"weizhi");
/*        if($request->has('name'))
        {
            echo $request->input('name');
        }
        else
        {
            echo '无参数';
        }*/
       // dd( $request->all());
        //2.判断请求类型
        echo  $request->url();
    }
    public function session1(Request $request){
        //1
//          $request->session()->put('key1','velue1');
//        echo $request->session()->get('key1');
//        Session::put('key2','velue2');
//        echo  Session::get('key2');
      //  session()->put('key3','velue3');
     //   echo session()->get('key3');
//        Session::push('student','zk');
//        Session::push('student','zk2');
//        $res= Session::all();
//        dd($res);
        //session()->forget('key1');
        session()->flush();
        Session::flash('key_flash','value_flash');
    }
    public function session2(Request $request){
        echo Session::get('message','nodata');

    }
    public function response(){
//        $data = [
//            'errCode' => 0,
//            'errMsg' => 'success',
//            'name' => 'zhoukun',
//            ];
//        return response()->json($data);
    //    return redirect('session2')->with('message','shuju');
//    return redirect()->action('StudentController@session2')->with('message','shuju');
    return redirect()->back();
   }
    public function activity0(){
        return '活动快要开始了 敬请期待';
    }
    public function activity1(){
        return '活动开始了 敬请期待';
    }
    public function activity2(){
        return '活动借宿';
    }
}