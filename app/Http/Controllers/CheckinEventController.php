<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\EventCheck;
use App\EventQueue;

class CheckinEventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function checkinEvent($eventID, $userID){

       
        if(Auth::user()->role == 'ADMIN'){
                $user = User::where('id','=',$userID)->first();
                $check = EventCheck::where('event_id','=',$eventID)->where('user_id','=',$userID)->first();
                if($check == null){
                    return view('show-profile',compact('user','eventID'));
                }
                else{
                    return view('duplicate-checkin');
                }

        }

        else{
            return view('no-permission');
        }

    }

    public function checkinEventConfirm(Request $request){


        if(Auth::user()->role == 'ADMIN'){


            $check = EventCheck::where('event_id','=',$request->input('eventID'))->where('user_id','=',$request->input('userID'))->first();
            if($check == null){
                $eventCheck = new EventCheck;
                $eventQueue = EventQueue::where('event_id','=',$request->input('eventID'))->first();
                $queue = $eventQueue->current_queue;
                $eventCheck->event_id = $request->input('eventID');
                $eventCheck->user_id = $request->input('userID');
                $eventCheck->queue = $queue;
                $eventCheck->save();
                $updateQueue =  $queue+1;
                $eventQueue->current_queue = $updateQueue;
                $eventQueue->save();


                return view('show-queue',compact('queue'));
            }

            else{
                return view('duplicate-checkin');
            }

        }

        else{
            return view('no-permission');
        }

    }
}
