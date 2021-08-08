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
<div id="auth_menu" class="container  d-none" style="display: flex; justify-content: center; flex-direction: column">
    <h1>Авторизация</h1>
    <img style="height: 82px; width: 58px; margin: 0 auto; margin-top: 30px;" src="{{asset('assets/images/Notepad.png')}}">

    <h2 style="margin-top: 15px">Введите код</h2>
    <p style="text-align: center; margin-top: 5px">Мы отправили SMS код для провери на Ваш телефон + 7 (123) 456-78-90</p>
    <div class="row" style="justify-content: center">
        <input class="code_input"  required
               minlength="1" maxlength="1" size="1">
        <input class="code_input"  required
               minlength="1" maxlength="1" size="1">
        <input class="code_input"  required
               minlength="1" maxlength="1" size="1">
        <input class="code_input"  required
               minlength="1" maxlength="1" size="1">
    </div>
    <p style="color:#2F80ED; margin: 0 auto; margin-top: 25px">Отправить код еще раз</p>
</div>
<div id="reg_menu" class="container d-none" style="display: flex; justify-content: center; flex-direction: column">
    <h1>Авторизация</h1>
    <h2>Для авторизации нам понадобиться ваше имя
        и телефон</h2>
    <input class="reg_input" type="text" placeholder="Ваше имя">
    <input class="reg_input" type="text" placeholder="Ваш телефон">

</div>
<div id="logo_container"  class="container">
<div  class="logo_container" style="text-align: center">
    <img style="height: 133px; width: 133px" src="{{asset('assets/images/RegLogo.png')}}">
    <h3 style="font-family: 'SF Pro Display', sans-serif;font-style: normal;font-weight: 600;font-size: 25px;line-height: 30px;margin-top: 20px;/* identical to box height */color: #000000;">Be Better</h3>
</div>

</div>
<div class="button_container" style="display: flex;
    margin-top: 100px;
    justify-content: center;
    padding-bottom: 35px;">
    <button style="width: 209px; height: 46px; margin: 0 auto; background: #007AFF;border-radius: 100px;font-family: 'SF Pro Display',sans-serif;font-style: normal; font-weight: normal;font-size: 16px; line-height: 18px; /* identical to box height, or 112% */text-align: center;  letter-spacing: -0.078px;color: #FFFFFF;border: none; outline: none;" id="go_reg" onclick="load()" class="blue_btn">Начать</button>
    <button style="width: 209px; height: 46px; margin: 0 auto; background: #007AFF;border-radius: 100px;font-family: 'SF Pro Display',sans-serif;font-style: normal; font-weight: normal;font-size: 16px; line-height: 18px; /* identical to box height, or 112% */text-align: center;  letter-spacing: -0.078px;color: #FFFFFF;border: none; outline: none;" id="go_auth" onclick="goAuth()" class="blue_btn d-none">Начать</button>
    <div id="spinner" class="spinner-border text-primary d-none" style="width: 3rem; height: 3rem;"  role="status" >
        <span class="sr-only">Loading...</span>

    </div>
</div>
<div style="display: flex; justify-content: center;padding-top: 25px;" class="container">
<p  id="spinner_text"  class="d-none">Загрузка приложения</p>
</div>
<style>

    #logo_container
    {
        min-height: 350px; display: flex; justify-content: center; margin-top: 50px;
    }
    @media screen and (max-width: 395px) {

        .text-container
        {
            margin-left: -15px!important;
        }
    }
    @media screen and (max-width: 380px) {


        #textRed1
        {
            position: relative;
            top: 262px;
            left: 50px;
        }
        #textRed2
        {
            position: relative;
            top: 262px;
            left: 70px;
        }
        #textRed3
        {
            position: relative;
            top: 330px;
            left: 75px;
        }
        #textRed4
        {
            position: relative;
            top: 360px;
            left: 241px;
        }
        #textRed5
        {
            position: relative;
            top: 427px;
            left: 102px;
        }
        #textRed6
        {
            position: relative;
            top: 425px;
            left: -85px;
        }
        #textRed7
        {
            position: relative;
            top: 270px;
            left: -1px;
        }
        #textRed8
        {
            position: relative;
            top: 170px;
            left: -69px;
        }
    }
    @media screen and (max-width: 350px) {
        #big_circle_redact
        {

            margin-top: -42px!important;
        }

        .redact_text_text
        {
            margin-left: -42px!important;
            margin-top: -304px!important;
            max-width: 273px!important;
            min-width: 273px!important;
            max-height: 276px!important;
            min-height: 276px!important;
        }
        .small_container
        {
            top:127px!important;
            left: -26px;

        }
        .small_container>img
        {
            max-width: 139px!important;
            max-height: 144px!important;
            min-width: 139px!important;
            min-height: 144px!important;

        }
    }

    #reg_menu>h1
    {
        font-family: 'SF Pro Display',sans-serif;
        font-style: normal;
        font-weight: bold;
        font-size: 34px;
        line-height: 128.91%;
        /* identical to box height, or 44px */

        text-align: center;

        color: #000000;

        text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    #reg_menu>h2
    {
        font-family: 'SF Pro Display',sans-serif;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 128.91%;
        /* or 26px */

        text-align: center;

        color: #000000;
    }
    #reg_menu>h1:after
    {
        display: block;
        content: '';
        height: 3px;
        border-radius: 100%;
        width: 320px;
        margin-top: 25px;
        background: #2F80ED;
        margin: 0 auto;
    }
    @media screen and (max-width: 350px) {
        #reg_menu>h1:after
        {
            display: block;
            content: '';
            height: 3px;
            border-radius: 100%;
            width: 290px!important;
            margin-top: 25px;
            background: #2F80ED;
        }
    }
    .reg_input
    {
        border: 1px solid #DEDEDE;
        box-sizing: border-box;
        border-radius: 7px;
        background: #F3F3F3;
        width: 325px;
        height: 45px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 15px;
        line-height: 19px;

        outline: none;
        /* Серый для текста */
        padding-left: 15px;
        margin-top: 25px!important;
        color: #7C7C7C;
        margin: 0 auto;
    }
    @media screen and (max-width: 350px)
    {
        .reg_input
        {
            border: 1px solid #DEDEDE;
            box-sizing: border-box;
            border-radius: 7px;
            background: #F3F3F3;
            width: 290px!important;
            height: 45px;
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 15px;
            line-height: 19px;

            outline: none;
            /* Серый для текста */
            padding-left: 15px;
            margin-top: 25px!important;
            color: #7C7C7C;
            margin: 0 auto;
        }
    }
    #auth_menu>h1
    {
        font-family: 'SF Pro Display',sans-serif;
        font-style: normal;
        font-weight: bold;
        font-size: 34px;
        line-height: 128.91%;
        /* identical to box height, or 44px */

        text-align: center;

        color: #000000;

        text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    #auth_menu>h2
    {
        font-family: 'SF Pro Display',sans-serif;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 128.91%;
        /* or 26px */

        text-align: center;

        color: #000000;
    }
    #auth_menu>h1:after
    {
        display: block;
        content: '';
        height: 3px;
        border-radius: 100%;
        width: 320px;
        margin-top: 25px;
        background: #2F80ED;
        margin: 0 auto;
    }
    @media screen and (max-width: 350px) {
        #auth_menu>h1:after
        {
            display: block;
            content: '';
            height: 3px;
            border-radius: 100%;
            width: 290px!important;
            margin-top: 25px;
            background: #2F80ED;
        }
    }
    .code_input
    {
        outline: none;
        border: none;
        background: #F3F3F3;
        width: 32px;
        border-bottom: 2px solid #2F80ED;
        margin: 10px;
        margin-top: 0;
        text-align: center;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 128.91%;
    }

</style>
</body>
</html>
<script>
    function load() {
        document.getElementById('go_reg').classList.add('d-none');
        document.getElementById('spinner').classList.remove('d-none');
        document.getElementById('spinner_text').classList.remove('d-none');

        setTimeout(function () {

            document.getElementById('go_auth').classList.remove('d-none');
            document.getElementById('logo_container').classList.add('d-none');
            document.getElementById('spinner').classList.add('d-none');
            document.getElementById('spinner_text').classList.add('d-none');
            document.getElementById('reg_menu').classList.remove('d-none');
        },1000)
    }
    function goAuth() {
        document.getElementById('auth_menu').classList.remove('d-none');

        document.getElementById('reg_menu').classList.add('d-none');
    }
</script>
