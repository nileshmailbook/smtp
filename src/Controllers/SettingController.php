<?php

namespace Neil\mailSetting\Controllers;

use Neil\mailSetting\Models\Setting;
use Illuminate\Http\Request; 
use Mail;


class SettingController
{ 
 	public function index()
 	{
 		return view('mailsetting::smtp.smtpconfig',['smtp'=> Setting::all()->first()]);
 	}

 	public function store(Request $request)
 	{
 		Setting::create($request->all());
 		return redirect()->back()->with('status','details saved successsfully');
 	}

 	public function update(Request $request, $id)
 	{  
 		Setting::findOrfail($id)->fill($request->all())->save();
 		return redirect()->back()->with('status','details update successsfully');
 	}

  public function smtpCheck(Request $request)
  {
      
    Mail::send('mailsetting::smtp.testsmtp',$request->all(), function ($message) use($request) {          
      $message->from(config('mail.username'),config('mail.from.name'));
      $message->subject('Test Mail');
      $message->to($request->email);
    });     
    return redirect()->back()->with('status','mail sent, please check email','info');
  }
}
