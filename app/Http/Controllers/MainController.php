<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\login;
use App\Models\message;
use App\Models\task;
use App\Models\circle;

class MainController extends Controller
{

    public function CreateTask(request $req){
        $UserController = new UserController;
        $CheckAuth = $UserController->CheckAuth($req);
        $result = ['status' => false, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
                $circle_id = addslashes($req['circle_id']);
                $name = addslashes($req['name']);
                $color = addslashes($req['color']);
                $descript = addslashes($req['descript']);
                $inportant = addslashes($req['inportant']);
                $remind = addslashes($req['remind']);
                $dedline = addslashes($req['dedline']);
                $urgently = addslashes($req['urgently']);
                $note = addslashes($req['note']);
                if($circle_id != null && $name != null && $color != null && $descript != null && $inportant != null && $remind != null && $dedline != null && $urgently != null && $note != null){
                    $check_circle = circle::select()->where(['id' => $circle_id, 'user_id' => $CheckAuth['data']->id])->first();
                    if($check_circle != null){
                        task::insert(['circle_id' => $circle_id, 'name' => $name, 'color' => $color, 'descript' => $descript, 'dedline' => $dedline, 'inportant' => $inportant, 'remind' => $remind, 'urgently' => $urgently, 'note' => $note]);
                        User::where('id', $CheckAuth['data']->id)->update(['first_task' => 1]);
                        $result = ['status' => true];
                    } else {
                        $result['error'] = "Такого круга не существует";
                    }
                } else {
                    $result['error'] = "Вы заполнили не все поля";
                }
        }
        $result = json_encode($result, true);
        return $result;
    }

    public function CreateCircle(request $req){
        $UserController = new UserController;
        $CheckAuth = $UserController->CheckAuth($req);
        $result = ['status' => false, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $SubscriptionController = new SubscriptionController;
            $CheckSubscribe = $SubscriptionController->CheckSubscribe($CheckAuth['data']->id);
            if($CheckSubscribe['status'] == true){
                $name = addslashes($req['name']);
                $color = addslashes($req['color']);
                if($name != null && $color != null){
                    circle::insert(['user_id' => $CheckAuth['data']->id, 'name' => $name, 'color' => $color]);
                    $result = ['status' => true];
                } else {
                    $result['error'] = "Вы заполнили не все параметры";
                }
            } else {
                $result['error'] = "Для начала приобретите подписку";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    public function MessageSendUrl(request $req){
        $result = json_encode($req->all(), true);
        file_put_contents('json.json', $result);
    }

}