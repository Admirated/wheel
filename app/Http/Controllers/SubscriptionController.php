<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\login;
use App\Models\message;
use App\Models\purchase;
use App\Models\subscription;

class SubscriptionController extends Controller
{

    public function CheckSubscribe($id){
        $check_purchase = purchase::select()->where('user_id', $id)->orderby('id', 'DESC')->first();
        $result = ['status' => false];
        if($check_purchase != null){
            $check_subscribe = subscription::select()->where('id', $check_purchase->subscription_id)->first();
            if($check_subscribe != null){
                $now = time();
                $subscribe = strtotime($check_purchase->created_at);
                $left = $check_subscribe->term;
                $left = $left * 30 * 24 * 60 * 60;
                $subscribe += $left;
                if($subscribe > $now){
                    $result = ['status' => true, 'data' => $subscribe];

                }
            }
        }
        return $result;
    }

}