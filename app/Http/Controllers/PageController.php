<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\subscription;
use App\Models\circle;
use App\Models\task;
use App\Models\purchase;
use App\Models\interest;
use App\Models\skill;
use App\Models\to_value;
use App\Models\habit;
use App\Models\to_habit;
use App\Models\destination;
use App\Models\note;
use App\Models\default_circle;
use App\Models\default_task;

class PageController extends Controller
{

    public function page($page = null, $id = 0, request $req){



        if($page == null){
            return redirect(Route('page', ['page' => 'BalanceWheel']));
        }
        $UserController = new UserController;
        $SubscriptionController = new SubscriptionController;
        $CheckAuth = $UserController->CheckAuth($req);
        $referer = $req->headers->get('referer');
        $title = "Профиль";
        
        $PageInfo = null;
        $url = Route('MainUrl');

        if(stristr($referer, Route('MainUrl')) === false){
            $referer = Route('page', ['page' => 'BalanceWheel']);
        }
        if($CheckAuth['status'] == false && $page != "register"){
            return redirect(Route('page', ['page' => 'register']));
        }
        if($CheckAuth['status'] == true && $page == "register"){
            return redirect(Route('page', ['page' => 'BalanceWheel']));
        }

        if($CheckAuth['status'] != false){

            $CheckSubscribe = $SubscriptionController->CheckSubscribe($CheckAuth['data']->id);
            if($CheckSubscribe['status'] == false && $page != "subscribe" && $CheckAuth['data']->name != null && $CheckAuth['data']->date != null && $CheckAuth['data']->sex != null && $CheckAuth['data']->weight != null && $CheckAuth['data']->first_task == 1){
                return redirect(Route('page', ['page' => 'subscribe']));
            }
            if($CheckSubscribe['status'] == true && $page == "subscribe"){
                return redirect(Route('page', ['page' => 'BalanceWheel']));
            }
            
            if(($CheckAuth['data']->name == null || $CheckAuth['data']->date == null || $CheckAuth['data']->sex == null) && $page != "ChangeProfile"){
                return redirect(Route('page', ['page' => 'ChangeProfile']));
            }
            if($CheckAuth['data']->name != null && $CheckAuth['data']->date != null && $CheckAuth['data']->sex != null && $page == "ChangeProfile"){
                return redirect(Route('page', ['page' => 'BalanceWheel']));
            }

            if($CheckAuth['data']->first_task == 0 && $page != "MakeFirstQuest" && $CheckAuth['data']->name != null && $CheckAuth['data']->date != null && $CheckAuth['data']->sex != null){
                return redirect(Route('page', ['page' => 'MakeFirstQuest']));
            }
            if($CheckAuth['data']->first_task == 1 && $page == "MakeFirstQuest"){
                return redirect(Route('page', ['page' => 'BalanceWheel']));
            }
        }

        if($page == "index"){
            $circles = circle::select()->where('user_id', $CheckAuth['data']->id)->get();
            $PageInfo = ['first' => [], 'second' => []];
            $i = 0;
            $numbers = count($circles);
            $numbers = $numbers / 2;
            foreach($circles as $key => $circle){
                $i++;
                $select_task = task::select()->where('circle_id', $circle->id)->get();
                $percent = 0;
                foreach($select_task as $result){
                    $percent += $result->percent;
                }
                $count = count($select_task);
                if($count > 0){
                    $percent = $percent / $count;
                } else {
                    $percent = 0;
                }
                $array_key = "first";
                if($numbers < $i){
                    $array_key = "second";
                }
                array_push($PageInfo[$array_key], ['info' => $circle, 'percent' => $percent]);
            }
        }
        if($page == "subscribe"){
            $PageInfo = subscription::select()->get();
        }
        if($page == "chooseWheels"){ 
            $title = "Ваши колёса";
        }
        if($page == "chooseBig"){
            $PageInfo = circle::select()->where(['user_id' => $CheckAuth['data']->id, 'id' => $id])->first();
            if($PageInfo != null){
                $select_task = task::select()->where('circle_id', $id)->get();
                $percent = 0;
                foreach($select_task as $result){
                    $percent += $result->percent;
                }
                if($percent > 0){
                    $count = count($select_task);
                    $percent = $percent / $count;
                    $percent = number_format($percent, 2, ',', ' ');
                }
                $PageInfo = ['id' => $id, 'circle' => $PageInfo, 'task' => $select_task, 'percent' => $percent];
            } else {
                return redirect(Route('page', ['page' => 'chooseWheels']));
            }
            $title = $PageInfo['circle']->name;

        }
        if($page == "BalanceWheel"){
            $circles = circle::select()->where('user_id', $CheckAuth['data']->id)->get();
            $PageInfo = [];
            foreach($circles as $circle){
                $select_task = task::select()->where('circle_id', $circle->id)->get();
                $percent = 0;
                foreach($select_task as $result){
                    $percent += $result->percent;
                }
                $count = count($select_task);
                if($count > 0){
                    $percent = $percent / $count;
                } else {
                    $percent = 0;
                }
                array_push($PageInfo, ['info' => $circle, 'percent' => $percent]);
            }

            $title = "Колесо баланса";
        }
        if($page == "MakeNewQuest"){
            $select_circle = circle::select()->where(['user_id' => $CheckAuth['data']->id, 'id' => $id])->first();
            if($select_circle != null){
                $PageInfo = ['circle' => $select_circle];
            } else {
                return redirect(Route('page', ['page' => 'chooseWheels']));
            }
            $title = $select_circle->name;
        }
        if($page == "MakeFirstQuest"){
            $PageInfo = circle::select()->where('user_id', $CheckAuth['data']->id)->get();
        }
        if($page == "SubscribeControll"){
            $purchase = purchase::select()->where('user_id', $CheckAuth['data']->id)->orderby('id', 'desc')->get();
            $PageInfo = [];
            foreach ($purchase as $key => $result) {
                $select_subscription = subscription::select()->where('id', $result->subscription_id)->first();
                if($select_subscription != null){
                    $now = time();
                    $subscribe = strtotime($result->created_at);
                    $left = $select_subscription->term;
                    $left = $left * 30 * 24 * 60 * 60;
                    $subscribe += $left;
                    $date = $this->TranslateUnixToDate($subscribe);
                    if($subscribe > $now){
                        $result = ['status' => "Активна", 'data' => $date, 'name' => $select_subscription->name, 'id' => $select_subscription->id, 'color' => '#65D189'];
                    } else {
                        $result = ['status' => 'Закончилась', 'data' => $date, 'name' => $select_subscription->name, 'id' => $select_subscription->id, 'color' => "#FF0000"];
                    }
                    array_push($PageInfo, $result);
                }
            }
            $title = "Подписки";
        }
        if($page == "interests"){
            $PageInfo = interest::select()->where('user_id', $CheckAuth['data']->id)->orderby('id', 'desc')->get();
        }
        if($page == "skils"){
            $PageInfo = skill::select()->where('user_id', $CheckAuth['data']->id)->orderby('id', 'desc')->get();
        }
        if($page == "values"){
            $PageInfo = to_value::select()->where('user_id', $CheckAuth['data']->id)->orderby('id', 'desc')->get();
        }
        if($page == "habits"){
            $PageInfo = habit::select()->where('user_id', $CheckAuth['data']->id)->orderby('id', 'desc')->get();
        }
        if($page == "want"){
            $PageInfo = to_habit::select()->where('user_id', $CheckAuth['data']->id)->orderby('id', 'desc')->get();
        }
        if($page == "destinations"){
            $PageInfo = destination::select()->where('user_id', $CheckAuth['data']->id)->orderby('id', 'desc')->get();
        }
        if($page == "notes"){
            $PageInfo = note::select()->where('user_id', $CheckAuth['data']->id)->orderby('id', 'desc')->get();
        }
        if($page == "MakeWheel"){
            $PageInfo = default_circle::select()->get();
            $select_task = default_task::select()->get();
            $PageInfo = ['circle' => $PageInfo, 'task' => $select_task];
        }

        return view('main')->with([
            'page' => $page,
            'user_info' => $CheckAuth['data'],
            'referer' => $referer,
            'PageInfo' => $PageInfo,
            'title' => $title
        ]);
    }

    private function TranslateUnixToDate($date){
        $day = date("j", $date);
        $month = date("F", $date);
        $_monthsList = array(
            "1"=>"января","2"=>"февраля","3"=>"марта",
            "4"=>"апреля","5"=>"мая", "6"=>"июня",
            "7"=>"июля","8"=>"августа","9"=>"сентября",
            "10"=>"октября","11"=>"ноября","12"=>"декабря");
             
        $month = $_monthsList[date("n", $date)];
        $result = $day . " " . $month;
        return $result;
    }

    public function BalanceWheel(request $req){
        $UserController = new UserController;
        $SubscriptionController = new SubscriptionController;
        $CheckAuth = $UserController->CheckAuth($req);
        $result = ['status' => false, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $CheckSubscribe = $SubscriptionController->CheckSubscribe($CheckAuth['data']->id);
            if($CheckSubscribe['status'] == true){
                $circles = circle::select()->where('user_id', $CheckAuth['data']->id)->get();
                $count = count($circles);
                $PageInfo = ['count' => $count, 'circles' => []];
                foreach($circles as $circle){
                    $select_task = task::select()->where('circle_id', $circle->id)->get();
                    $percent = 0;
                    foreach($select_task as $result){
                        $percent += $result->percent;
                    }
                    $count = count($select_task);
                    if($count > 0){
                        $percent = $percent / $count;
                    } else {
                        $percent = 0;
                    }
                    array_push($PageInfo['circles'], ['id' => $circle->id, 'circle' => $circle->name, 'color' => $circle->color, 'percent' => $percent]);
                }
                $result = ['status' => true, 'data' => $PageInfo];
            } else {
                $result['error'] = "Приобретите подписку";
            }
        }
        $result = json_encode($result, true);
        return $result;
    } 

    public function ChooseCircle(request $req){
        $UserController = new UserController;
        $SubscriptionController = new SubscriptionController;
        $CheckAuth = $UserController->CheckAuth($req);
        $result = ['status' => false, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $CheckSubscribe = $SubscriptionController->CheckSubscribe($CheckAuth['data']->id);
            if($CheckSubscribe['status'] == true){
                $id = $req['id'];
                if($id != null){
                    $check_circle = circle::select()->where(['user_id' => $CheckAuth['data']->id, 'id' => $id])->first();
                    if($check_circle != null){
                        $select = task::select(['id', 'color', 'percent', 'name'])->where('circle_id', $id)->get();
                        $count = count($select);
                        $result = ['status' => true, 'data' => ['count' => $count, 'circles' => $select]];
                    } else {
                        $result['error'] = "Такого круга не существует";
                    }
                } else {
                    $result['error'] = "Вы не заполнили все обязательные параметры";
                }
            } else {
                $result['error'] = "Приобретите подписку";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    public function CreateTask(request $req){
        $UserController = new UserController;
        $SubscriptionController = new SubscriptionController;
        $CheckAuth = $UserController->CheckAuth($req);
        $result = ['status' => false, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $CheckSubscribe = $SubscriptionController->CheckSubscribe($CheckAuth['data']->id);
            if($CheckSubscribe['status'] == true){
                $id = addslashes($req['id']);
                $name = addslashes($req['name']);
                $descript = addslashes($req['descript']);
                $color = addslashes($req['color']);
                if($name != null && $id != null && $descript != null && $color != null){
                    $check_circle = circle::select('id')->where(['id' => $id, 'user_id' => $CheckAuth['data']->id])->first();
                    if($check_circle != null){
                        task::insert(['circle_id' => $id, 'name' => $name, 'descript' => $descript, 'percent' => 0, 'color' => $color]);
                        $select_task = task::select('id')->where(['circle_id' => $id, 'name' => $name, 'descript' => $descript, 'percent' => 0, 'color' => $color])->orderby('id', 'DESC')->first();
                        $result = ['status' => true, 'data' => $select_task];
                    } else {
                        $result['error'] = "Такого круга не существует";
                    }
                } else {
                    $result['error'] = "Вы не заполнили все поля";
                }
            } else {
                $result['error'] = "Приобретите подписку";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    public function ChoosheWheels(request $req){
        $UserController = new UserController;
        $SubscriptionController = new SubscriptionController;
        $CheckAuth = $UserController->CheckAuth($req);
        $result = ['status' => false, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $CheckSubscribe = $SubscriptionController->CheckSubscribe($CheckAuth['data']->id);
            if($CheckSubscribe['status'] == true){
                $select_circle = circle::select()->where('user_id', $CheckAuth['data']->id)->get();
                $info = [];
                foreach($select_circle as $result){
                    $select = task::select()->where('circle_id', $result->id)->get();
                    $percent = 0;
                    foreach($select as $task){
                        $percent += $task->percent;
                    }
                    if($percent > 0){
                        $count = count($select);
                        $percent = $percent / $count;
                    }
                    $url = Route('chooseBig', ['page' => 'chooseBig', 'id' => $result->id]);
                    array_push($info, ['name' => $result->name, 'color' => $result->color, 'percent' => $percent, 'id' => $result->id, 'url' => $url]);
                }
                $PageInfo = $info;
                $result = ['status' => true, 'data' => $info];
            } else {
                $result['error'] = "Приобретите подписку";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    public function CreateCircles(request $req){
        $UserController = new UserController;
        $SubscriptionController = new SubscriptionController;
        $CheckAuth = $UserController->CheckAuth($req);
        $result = ['status' => false, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $CheckSubscribe = $SubscriptionController->CheckSubscribe($CheckAuth['data']->id);
            if($CheckSubscribe['status'] == true){
                $color = addslashes($req['color']);
                $name = addslashes($req['name']);
                $circle_id = $req['circle_id'];
                if($color != null && $name != null){
                    if($circle_id != null){
                        $check_circle = default_circle::select()->where('id', $circle_id)->first();
                        if($check_circle != null){
                            default_task::insert(['circle_id' => $circle_id, 'name' => $name, 'color' => $color]);
                            $result = ['status' => true];
                        } else {
                            $result['error'] = "Такого круга не существует";
                        }
                    } else {
                        default_circle::insert(['name' => $name, 'color' => $color]);
                        $result = ['status' => true];
                    }
                } else {
                    $result['error'] = "Вы не заполнили не обязательные поля";
                }
            } else {
                $result['error'] = "Для начала приобретите подписку";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }
}