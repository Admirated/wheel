<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\login;
use App\Models\message;
use App\Models\circle;
use App\Models\task;
use App\Models\default_task;
use App\Models\default_circle;
use App\Models\destination;
use App\Models\habit;
use App\Models\interest;
use App\Models\skill;
use App\Models\to_value;
use App\Models\not_habit;
use App\Models\to_habit;
use App\Models\note;

class UserController extends Controller
{

    private function CreateToken(){
        $token = md5(time() . rand() . "ewfdjOIU*U*(YEIUHUFHEIWUHF" . rand());
        $chech_login = login::select()->where('token', $token)->first();
        if($chech_login != null){
            $token = $this->CreateToken();
        }
        return $token;
    }

    public function CheckAuth($req){
        $token = $req->session()->get('token');
        $result = ['status' => false, 'data' => null];
        if($token != null){
            $chech_login = login::select()->where('token', $token)->first();
            if($chech_login != null){
                $check_user = User::select()->where('id', $chech_login->user_id)->first();
                if($check_user != null){
                    $result = ['status' => true, 'data' => $check_user];
                }
            }
        }
        return $result;
    }

    private function CreateSms($count){
        $symbol = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $number = "";
        for($i = 0; $i < $count; $i++){
            $number .= $symbol[rand(0, 9)];
        }
        $check_message = message::select()->where('sms', $number)->first();
        if($check_message != null){
            $number = $this->CreateSms($count);
        }
        return $number;
    }

    public function AgreeReturn(request $req){
        $telephone = addslashes($req['telephone']);
        $result = ['status' => false, 'error' => 'Вы не заполнили все обязательные поля'];
        if($telephone != null){
            if(strripos($telephone, '+') === false){
                $telephone = "+" . $telephone;
            }
            $telephone = str_replace(' ', '', $telephone);
            $telephone = trim($telephone);
            $check_telephone = User::select()->where('telephone', $telephone)->first();
            if($check_telephone != null){
                message::where('user_id', $check_telephone->id)->delete();
                $sms = $this->CreateSms(4);
                message::insert(['user_id' => $check_telephone->id, 'sms' => $sms]);
                $result = ['status' => true];
            } else {
                $result['error'] = "Такого пользователя не существует!";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    public function Agree(request $req){
        $number = addslashes($req['number']);
        $telephone = addslashes($req['telephone']);
        $result = ['status' => false, 'error' => 'Вы не заполнили все обязательные поля'];
        if($number != null && $telephone != null){
            if(strripos($telephone, '+') === false){
                $telephone = "+" . $telephone;
            }
            $telephone = str_replace(' ', '', $telephone);
            $telephone = trim($telephone);
            $check_telephone = User::select()->where('telephone', $telephone)->first();
            if($check_telephone != null){
                $check_message = message::select()->where(['sms' => $number, 'user_id' => $check_telephone->id])->first();
                if($check_message != null){
                    message::where('id', $check_message->id)->delete();
                    $token = $this->CreateToken();
                    login::insert(['user_id' => $check_telephone->id, 'token' => $token]);
                    $req->session()->put('token', $token);
                    $result = ['status' => true, 'data' => $token];
                } else {
                    $result['error'] = "Такого кода не существует";
                }
            } else {
                $result['error'] = "Такого номера телефона не существует";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    public function CheckSession(request $req){
        $token = $req['token'];
        $result = ['status' => false, 'data' => null];
        if($token != null){
            $chech_login = login::select()->where('token', $token)->first();
            if($chech_login != null){
                $check_user = User::select()->where('id', $chech_login->user_id)->first();
                if($check_user != null){
                    $result = ['status' => true];
                }
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    public function Auth(request $req){
        $telephone = addslashes($req['phone']);
        $result = ['status' => false, 'error' => 'Вы не заполнили все обязательные поля'];
        if($telephone != null){
            if(strripos($telephone, '+') === false){
                $telephone = "+" . $telephone;
            }
            $telephone = str_replace(' ', '', $telephone);
            $telephone = trim($telephone);
            $check_user = User::select()->where('telephone', $telephone)->first();
            if($check_user != null){
                $sms = $this->CreateSms(4);
                $send =  file_get_contents('https://smsc.ru/sys/send.php?login=smscentre&psw=smscentre123&phones=' . $telephone . "&mes=Спасибо за регистрацию! Вас приветствует приложение Be Better. Подтвердите, что вы не робот - " . $sms);
                message::insert(['user_id' => $check_user->id, 'sms' => $sms]);
                $result = ['status' => true];
            } else {
                User::insert(['telephone' => $telephone]);
                
                $sms = $this->CreateSms(4);
                $check_user = User::select()->where('telephone', $telephone)->first();
                if($check_user != null){
                    $select_default_circle = default_circle::select()->get();
                    foreach ($select_default_circle as $circle) {
                        circle::insert(['user_id' => $check_user->id, 'name' => $circle->name, 'color' => $circle->color]);
                        $check_circle = circle::select()->where(['user_id' => $check_user->id, 'name' => $circle->name, 'color' => $circle->color])->orderby('id', 'DESC')->first();

                        if($check_circle != null){
                            $select_default_task = default_task::select()->where('circle_id', $check_circle->id)->get();
                            foreach ($select_default_task as $task) {
                                task::insert(['circle_id' => $check_circle->id, 'name' => $task->name, 'color' => $task->color, 'descript' => $task->descript]);
                            }
                        }
                    }
                    message::insert(['user_id' => $check_user->id, 'sms' => $sms]);
                    $send =  file_get_contents('https://smsc.ru/sys/send.php?login=smscentre&psw=smscentre123&phones=' . $telephone . '&mes=Спасибо за регистрацию! Вас приветствует приложение Be Better. Подтвердите, что вы не робот - ' . $sms);
                    $result = ['status' => true];
                } else {
                    $result['error'] = "Произошла непредвиденная ошибка";
                }
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    private function CreateFilename($endname, $user_id){
        $filename = md5(time() . "rtlnglfsdnglsdfg" . time() . rand() . rand() . time()) . "." . $endname;
        if(file_exists('assets/userfile/' . $user_id . '/' . $filename . '.' . $endname)){
            $filename = $this->CreateFilename($endname, $user_id);
        }
        return $filename;
    }

    public function ReplaceUserInfo(request $req){
        $CheckAuth = $this->CheckAuth($req);
        $result = ['status' => false, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $name = addslashes($req['name']);
            $date = addslashes($req['date']);
            $sex = addslashes($req['sex']);
            if($name != null && $date != null && $sex != null){
                $url = $CheckAuth['data']->image;
                if($req->hasFile('image')) {
                    $file = $req->file('image');
                    $endname = $file->getClientOriginalName();
                    $endname = explode('.', $endname);
                    $endname = end($endname);
                    $filename = $this->CreateFilename($endname, $CheckAuth['data']->id) . '.' . $endname;
                    $file->move('assets/userfile/' . $CheckAuth['data']->id . '/', $filename);
                    $url = asset('assets/userfile/' . $CheckAuth['data']->id . '/' . $filename);
                }
                User::where('id', $CheckAuth['data']->id)->update(['name' => $name, 'date' => $date, 'sex' => $sex,  'image' => $url]);
                $result = ['status' => true];
            } else {
                $result['error'] = "Вы заполнили не все обязательные поля";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }
    
    public function CreateDestinations(request $req){
        $CheckAuth = $this->CheckAuth($req);
        $result = ['status' => true, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $text = addslashes($req['text']);
            if($text != null){
                destination::insert(['user_id' => $CheckAuth['data']->id, 'text' => $text]);
                $result = ['status' => true];
            } else {
                $result['error'] = "Вы заполнили не все обязательные поля";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    public function CreateHabits(request $req){
        $CheckAuth = $this->CheckAuth($req);
        $result = ['status' => true, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $text = addslashes($req['text']);
            if($text != null){
                habit::insert(['user_id' => $CheckAuth['data']->id, 'text' => $text]);
                $result = ['status' => true];
            } else {
                $result['error'] = "Вы заполнили не все обязательные поля";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    
    public function CreateInterests(request $req){
        $CheckAuth = $this->CheckAuth($req);
        $result = ['status' => true, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $text = addslashes($req['text']);
            if($text != null){
                interest::insert(['user_id' => $CheckAuth['data']->id, 'text' => $text]);
                $result = ['status' => true];
            } else {
                $result['error'] = "Вы заполнили не все обязательные поля";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    
    public function CreateSkill(request $req){
        $CheckAuth = $this->CheckAuth($req);
        $result = ['status' => true, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $text = addslashes($req['text']);
            if($text != null){
                skill::insert(['user_id' => $CheckAuth['data']->id, 'text' => $text]);
                $result = ['status' => true];
            } else {
                $result['error'] = "Вы заполнили не все обязательные поля";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }
    
    public function CreateToValue(request $req){
        $CheckAuth = $this->CheckAuth($req);
        $result = ['status' => true, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $text = addslashes($req['text']);
            if($text != null){
                to_value::insert(['user_id' => $CheckAuth['data']->id, 'text' => $text]);
                $result = ['status' => true];
            } else {
                $result['error'] = "Вы заполнили не все обязательные поля";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }
    
    public function CreateNotHabit(request $req){
        $CheckAuth = $this->CheckAuth($req);
        $result = ['status' => true, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $title = addslashes($req['title']);
            $descript = addslashes($req['descript']);
            if($title != null && $descript != null){
                not_habit::insert(['user_id' => $CheckAuth['data']->id, 'title' => $title, 'descript' => $descript]);
                $result = ['status' => true];
            } else {
                $result['error'] = "Вы заполнили не все обязательные поля";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    public function CreateToHabit(request $req){
        $CheckAuth = $this->CheckAuth($req);
        $result = ['status' => true, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $title = addslashes($req['title']);
            $descript = addslashes($req['descript']);
            if($title != null && $descript != null){
                to_habit::insert(['user_id' => $CheckAuth['data']->id, 'title' => $title, 'descript' => $descript]);
                $result = ['status' => true];
            } else {
                $result['error'] = "Вы заполнили не все обязательные поля";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }

    public function CreateNote(request $req){
        $CheckAuth = $this->CheckAuth($req);
        $result = ['status' => true, 'error' => 'Для начала авторизуйтесь'];
        if($CheckAuth['status'] == true){
            $text = addslashes($req['text']);
            if($text != null){
                note::insert(['user_id' => $CheckAuth['data']->id, 'text' => $text]);
                $select_id = note::select()->where(['user_id' => $CheckAuth['data']->id, 'text' => $text])->orderby('id', 'desc')->first();
                $result = ['status' => true, 'data' => $select_id];
            } else {
                $result['error'] = "Вы заполнили не все обязательные поля";
            }
        }
        $result = json_encode($result, true);
        return $result;
    }
    
}