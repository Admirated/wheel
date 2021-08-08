<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\login;
use App\Models\message;
use App\Models\task;
use App\Models\circle;

class CircleController extends Controller
{

    public function AgreeTask(request $req){
        $result = ['status' => false, 'error' => 'Для начала авторизуйтесь'];
        $UserController = new UserController;
        $CheckAuth = $UserController->CheckAuth($req);
        if($CheckAuth['status'] == true){
            $id = $req['id'];
            $check_task = task::select()->where(['id' => $id])->first();
            if($check_task != null){
                $check_circle = circle::select()->where(['id' => $check_task->circle_id, 'user_id' => $CheckAuth['data']->id])->first();
                if($check_circle != null){
                    $value_task = $check_task->percent;
                    if($value_task == 0){
                        task::where(['id' => $id])->update(['percent' => 100]);
                    } else {
                        task::where(['id' => $id])->update(['percent' => 0]);
                    }
                    $result = ['status' => true];
                } else {
                    $result['error'] = "Такого задания не существует";
                }
            } else {
                $result['error'] = "Такого задания не существует";
            }
        }
        return json_encode($result, true);
    }

    public function DeleteTask(request $req){
        $result = ['status' => false, 'error' => 'Для начала авторизуйтесь'];
        $UserController = new UserController;
        $CheckAuth = $UserController->CheckAuth($req);
        if($CheckAuth['status'] == true){
            $id = $req['id'];
            $check_task = task::select()->where(['id' => $id])->first();
            if($check_task != null){
                $check_circle = circle::select()->where(['id' => $check_task->circle_id, 'user_id' => $CheckAuth['data']->id])->first();
                if($check_circle != null){
                    task::where(['id' => $id])->delete();
                    $result = ['status' => true];
                } else {
                    $result['error'] = "Такого задания не существует";
                }
            } else {
                $result['error'] = "Такого задания не существует";
            }
        }
        return json_encode($result, true);
    }

}