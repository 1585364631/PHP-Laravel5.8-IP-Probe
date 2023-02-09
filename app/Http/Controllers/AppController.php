<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\info;
use Illuminate\Mail\Message;
use Mail;

class AppController extends Controller
{
    function send($title,$text,$email){
        Mail::raw($text, function (Message $message) use ($title,$email){
            $message->to($email)->subject($title);
        });
    }


    function getip(){
        // if (getenv('HTTP_CLIENT_IP')) {
        //     $ip = getenv('HTTP_CLIENT_IP');
        // }
        // if (getenv('HTTP_X_REAL_IP')) {
        //     $ip = getenv('HTTP_X_REAL_IP');
        // } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
        //     $ip = getenv('HTTP_X_FORWARDED_FOR');
        //     $ips = explode(',', $ip);
        //     $ip = $ips[0];
        // } elseif (getenv('REMOTE_ADDR')) {
        //     $ip = getenv('REMOTE_ADDR');
        // } else {
        //     $ip = '0.0.0.0';
        // }
        // return $ip;
        request()->setTrustedProxies(request()->getClientIps(),Request::HEADER_X_FORWARDED_FOR);
        return request()->getClientIp();
    }


    function index($id,Request $request){
        $ip = $this->getip();
        $time = now();
        info::insert([
            "keypwd"=>$id,
            "ip"=>$ip,
            'updated_at' => $time,
            'created_at' => $time,
        ]);
        $this->send("$ip","{$ip}的用户在{$time}访问了{$id}",'1585364631@qq.com');
    }

    function index1(){
        $ip = $this->getip();
        $id = "/";
        $time = now();
        info::insert([
            "keypwd"=>$id,
            "ip"=>$ip,
            'updated_at' => $time,
            'created_at' => $time,
        ]);
        $this->send("$ip","{$ip}的用户在{$time}访问了{$id}",'1585364631@qq.com');
    }
}
