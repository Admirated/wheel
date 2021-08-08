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
            <a href="textRedact"> <img width="24" height="24" style="max-width: 24px; max-height: 24px;" src="{{asset('assets/images/corner-up-left.png')}}"></a>
        </div>
        <div class="page_title_block">
            <h1>Профиль</h1>
            <p>Меню</p>
        </div>
        <div style="margin-top: 15px;" class="menu_block">
            <img style="max-width: 20px; max-height: 4px" src="{{asset('assets/images/title_dots.png')}}">
        </div>
    </div>
</div>
<div class="container">

    <div class="container top" style="background-color: #ffffff; height: 362px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">

        <div class="redact_title_buttons row " style=" margin: 0 auto; left: 27%; top:22px">
            <div class="redact_title_button" style="width: 69px;height: 28px;left: 210px;top: 153px;background: #ffffff;border-radius: 100px;padding-left: 15px;">
                Цвет
            </div>
            <div class="redact_title_button" style="width: 69px;height: 28px;left: 210px;top: 153px;background: #ffffff;border-radius: 100px; padding-left: 15px;">
                Текст
            </div>
        </div>
        <div class="slidecontainer" style="transform: rotate(90deg)">
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">

        </div>
        <div class="color_circle">

        </div>
    </div>

    <div class="container" style="text-align: center">
    <p style="margin-top: 25px;">Выберите цвет</p>
    </div>
    <div class="container" style="background-color: #ffffff; height: 195px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: -15px; ">

        <div class="row">
            <div class="color_sector">
                <div style="background: #FFFFFF;" class="color_circle_small"></div>
                <div style="background: #3531FF;" class="color_circle_small"></div>
                <div style="background: #31FF45;" class="color_circle_small"></div>
                <div style="background: #A431FF;"class="color_circle_small"></div>
            </div>
            <div class="color_sector">
                <div style="background: #B90000;" class="color_circle_small"></div>
                <div style="background: #0007B9;" class="color_circle_small"></div>
                <div style="background: #00B912;" class="color_circle_small"></div>
                <div style="background: #7300B9;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div style="background: #FF5A5A;" class="color_circle_small"></div>
                <div style="background: #5A61FF;" class="color_circle_small"></div>
                <div style="background: #5EFF5A;" class="color_circle_small"></div>
                <div style="background: #CA5AFF;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div style="background: #FF4D00;" class="color_circle_small"></div>
                <div style="background: #00F0FF;" class="color_circle_small"></div>
                <div style="background: #FFE600;" class="color_circle_small"></div>
                <div style="background: #FF00D6;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div style="background: #DB4200;" class="color_circle_small"></div>
                <div style="background: #00B3DB;" class="color_circle_small"></div>
                <div style="background: #DBC500;" class="color_circle_small"></div>
                <div style="background: #D600DB;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div style="background: #FF7A41;" class="color_circle_small"></div>
                <div style="background: #41FFF4;" class="color_circle_small"></div>
                <div style="background: #FBFF41;" class="color_circle_small"></div>
                <div style="background: #FF41F7;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div style="background: #FF988A;" class="color_circle_small"></div>
                <div style="background: #8AC7FF;" class="color_circle_small"></div>
                <div style="background: #A1FF8A;" class="color_circle_small"></div>
                <div style="background: #C58AFF;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div style="background: #FFAD8A;" class="color_circle_small"></div>
                <div style="background: #BBFFF3;" class="color_circle_small"></div>
                <div style="background: #FFF38A;" class="color_circle_small"></div>
                <div style="background: #FD8AFF;" class="color_circle_small"></div>

            </div>
        </div>
    </div>
    <div class="container" style="padding-top: 50px;">
    <div class="redact_title_buttons  " style="width: 131px;height: 38px;background: #FFFFFF;border: 1.5px solid #858589;border-radius: 100px;top:40px;">
        <p>Coхранить</p>
    </div>
    </div>
</div>

</body>
</html>
