<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/blog.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="navigate_wrapper row justify-content-between left">
        <div style="margin-top: 15px;" class="back_block">
            <a href="subscribe"> <img width="24" height="24" style="max-width: 24px; max-height: 24px;" src="{{asset('assets/images/corner-up-left.png')}}"></a>
        </div>
        <div class="page_title_block">
            <h1>Профиль</h1>
            <p>Меню</p>
        </div>
        <div style="margin-top: 15px;" class="menu_block">
            <img style="max-width: 20px; max-height: 4px" src="{{asset('assets/images/title_dots.png')}}">
        </div>
    </div>

    <div class="container" style="background-color: #ffffff; height: 275px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">

        <div class="container">
            <input id="table_top_input" type="text" style="width: 100%;" placeholder="Текст для поиска">
            <table style=" width: 100%;position: relative;top: 16px!important;">
                <tbody class="table_head">
                <tr>

                    <td style=" border-bottom:2px solid #C4C4C4; padding-left: 8px; width: 100%">



                        <div class="wrapper-dropdown row justify-content-between" style="color:#858589">Тренировки
                            <span style="font-weight: bold; transform: rotate(90deg)">&#62;</span>
                            <ul class="dropdown">
                                <li><a href="#">Аватар</a></li>
                                <li><a href="#">Настройки</a></li>
                                <li><a href="#">Выйти</a></li>
                            </ul>

                        </div></td>
                </tr>
                <tr>

                    <td style=" border-bottom:2px solid #C4C4C4;padding-left: 8px; width: 100%">



                        <div class="wrapper-dropdown row justify-content-between" style="color:#858589">Тренировки
                            <span style="font-weight: bold; transform: rotate(90deg)">&#62;</span>
                            <ul class="dropdown" >
                                <li><a href="#">Аватар</a></li>
                                <li><a href="#">Настройки</a></li>
                                <li><a href="#">Выйти</a></li>
                            </ul>

                        </div></td>
                </tr>
                <tr>

                    <td style=" border-bottom:2px solid #C4C4C4; padding-left: 8px; width: 100%">


                        <div class="wrapper-dropdown row justify-content-between" style="color:#858589">Тренировки
                            <span style="font-weight: bold; transform: rotate(90deg)">&#62;</span>
                            <ul class="dropdown color">
                                <li><a href="#">Аватар</a></li>
                                <li><a href="#">Настройки</a></li>
                                <li><a href="#">Выйти</a></li>
                            </ul>

                        </div></td>
                </tr>

                </tbody>
            </table>



            <div class="row justify-content-between" style="margin-top: 50px;">
                <h4 class="confirm_text" >Показывать только просроченные</h4>

                            <input style="margin-top: 10px;" type="checkbox" class="checkbox" checked>
            </div>
        </div>


    </div>
    <div class="container top">
        <div class="redact_title_buttons  " style="width: 183px;height: 38px;background: #FFFFFF;border-radius: 100px;margin-top: 40px;">
            <p>Применить</p>
        </div>

    </div>

    <div class="container top">
        <div class="redact_title_buttons  " style="width: 183px;height: 38px;background: #FFFFFF;border-radius: 100px;margin-top: 80px;">
            <p>Очистить фильтр</p>
        </div>
    </div>
</div>
</body>
<script> const dropdown = document.getElementsByClassName('wrapper-dropdown');

dropdown[0].onclick = () => { dropdown[0].classList.toggle('active') };</script>
</html>
