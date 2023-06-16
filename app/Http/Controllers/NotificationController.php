<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function index() {
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        //Get notifications in db with user_id
        $notifications = DB::table('notifications')
        ->where('user_id', '=', auth()->user()->id)
        ->join('users', 'users.id', '=', 'notifications.users_id')
        ->get(['notifications.id as id', 'notifications.*', 'users.*']);

        return view('notification.notification', compact('notifications'));
    }
 
    //Notification no read
    public function noRead() {
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        //Get notifications in db with user_id
        $notifications = DB::table('notifications')
        ->where('user_id', '=', auth()->user()->id)
        ->where('statutNotification', '=', '0')
        ->join('users', 'users.id', '=', 'notifications.users_id')
        ->get(['notifications.id as id', 'notifications.*', 'users.*']);

        return view('layouts.app', compact('notifications'));
    }

    //nombre de notification
    public function countNotification() {
        //Get  nombre de notification where id_user = auth()->user()->id and status = 0
        $countNotification = DB::table('notifications')
        ->where('users_id', auth()->user()->id)
        ->where('statutNotification', 0)
        ->count();

        //return view('notification.nombre-notification', compact('notifications'));
        return response()->json([
            'nombreNotification' => $countNotification, 
        ]);
    }

    //vu notification
    public function updateNotification() {
        //vu notification where id = auth()->user()->id
        DB::table('notifications')
        ->where('users_id', auth()->user()->id)
        ->update(['statutNotification' => '1']);

        //return redirect()->route('notification.index');
    }

    

    //
    public function sendNotification() {
        if( auth()->check() ){
            if(auth()->user()){
                //let user
                $user = User::first();
                //send notification
                auth()->user()->notify(new AlertNotification($user));
            }
        }
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        

  
        $details = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from Nicesnippests.com',
            'thanks' => 'Thank you for using Nicesnippests.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];
  
        //Notification::send($user, new AlertNotification($details));
   
        //dd('done');
        //$user->notify(new AlertNotification($details));
        //dd($user->notifications);
    }




     
    public function send_Notification(Request $request) 
    {   
        $request->validate([
            'invoice_id'=>'required|exists:invoices,id',
        ]);
 
        $user = auth()->user();
 
        $invoice = Invoice::find($request->invoice_id)->first();
 
        $invoice['buttonText'] = 'View Invoice';
        $invoice['invoiceUrl'] = route('show.invoice');
        $invoice['thanks'] = 'Your thank you message';
   
        Notification::send($user, new Notif($invoice));
    
        return back()->with('You have successfully paid the invoice');
    }

    
}
