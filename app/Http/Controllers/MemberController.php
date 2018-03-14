<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/12
 * Time: 13:26
 */

namespace App\Http\Controllers;

use App\Member;

class MemberController extends Controller
{
    public function info(){
        return Member::getMember();
        //return view('member/info');

    }
}