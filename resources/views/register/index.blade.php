
<div style="padding-bottom: 120px">
<div id="auth_menu" class="container  d-none" style="display: flex; justify-content: center; flex-direction: column">
    <h1>Авторизация</h1>
    <img style="height: 82px; width: 58px; margin: 0 auto; margin-top: 30px;" src="{{asset('assets/images/Notepad.png')}}">

    <h2 style="margin-top: 15px">Введите код</h2>
    <p id="phone_info" style="text-align: center; margin-top: 5px">Мы отправили SMS код для провери на Ваш телефон + 7 (123) 456-78-90</p>
    <div class="row" style="justify-content: center">
        <input id="one" class="code_input"  required
               minlength="1" maxlength="1" size="1">
        <input id="two" class="code_input"  required
               minlength="1" maxlength="1" size="1">
        <input id="three" class="code_input"  required
               minlength="1" maxlength="1" size="1">
        <input id="four" class="code_input"  required
               minlength="1" maxlength="1" size="1">
    </div>
    <p id="codereturn" onclick="codeReturn()" style="color:#2F80ED; margin: 0 auto; margin-top: 25px">Отправить код еще раз</p>
    <h2 style="    font-family: 'SF Pro Display', sans-serif;
    font-style: normal;
    font-weight: normal;

    line-height: 2em;
    padding-bottom: 20px;
    letter-spacing: -0.078px;
    color: rgba(60, 60, 67, 0.6);" id="time"></h2>
</div>
<div id="reg_menu" class="container d-none" style="display: flex; justify-content: center; flex-direction: column">
    @csrf
    <h1>Авторизация</h1>
    <h2>Для авторизации нам понадобиться ваше имя
        и телефон</h2>

    <input id="phone_input" class="reg_input" type="tel" placeholder="Ваш телефон">

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
    <button style="width: 209px; height: 46px; margin: 0 auto; background: #007AFF;border-radius: 100px;font-family: 'SF Pro Display',sans-serif;font-style: normal; font-weight: normal;font-size: 16px; line-height: 18px; /* identical to box height, or 112% */text-align: center;  letter-spacing: -0.078px;color: #FFFFFF;border: none; outline: none;" id="go_join" onclick="goJoin()" class="blue_btn d-none">Отправить</button>
    <div id="spinner" class="spinner-border text-primary d-none" style="width: 3rem; height: 3rem;"  role="status" >
        <span class="sr-only">Loading...</span>

    </div>
</div>
<div style="display: flex; justify-content: center;padding-top: 25px;" class="container">
    <p  id="spinner_text"  class="d-none">Загрузка приложения</p>
</div>
</div>
<input type="hidden" id="phone">
<script>

    function goAuth() {


        const _token = document.getElementsByName("_token")[0].value;
        let phone = document.getElementById('phone_input').value;
        let formData = new FormData();
        formData.append('_token', _token);
        formData.append('phone', phone);
        document.getElementById('phone').value = phone;
        const send = ts('{{Route('Auth')}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == true) {
                document.getElementById('go_join').classList.remove('d-none');
                document.getElementById('go_auth').classList.add('d-none');
                document.getElementById('auth_menu').classList.remove('d-none');
                document.getElementById('reg_menu').classList.add('d-none');
                document.getElementById('phone_info').innerText = 'Мы отправили SMS код для провери на Ваш телефон '+ phone +'';
                $('input').keyup(function(){
                    if($(this).val().match(/^\d{1}$/)){
                        $(this).next('input').focus();
                    }else{
                        $(this).val('');
                    }
                });
            }
            else{
              alert(result.error)
            }
        })
    }
    function codeReturn() {
        const _token = document.getElementsByName("_token")[0].value;
        let phone = document.getElementById('phone').value;
        let formData = new FormData();
        formData.append('_token', _token);
        formData.append('telephone', phone);
        const send = ts('{{Route('AgreeReturn')}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == true) {
                var Minute = 60,
                    display = document.querySelector('#time');
                startTimer(Minute, display);

            }
            else{

                alert(result.error);
            }
        })
    }
    function goJoin() {

        let one = document.getElementById('one').value;
        let two = document.getElementById('two').value;
        let three = document.getElementById('three').value;
        let four = document.getElementById('four').value;
        let code = [];
        code.push(one);
        code.push(two);
        code.push(three);
        code.push(four);
        let codeStr = code.join('');
        const _token = document.getElementsByName("_token")[0].value;
        let phone = document.getElementById('phone').value;
        let formData = new FormData();
        formData.append('_token', _token);
        formData.append('telephone', phone);
        formData.append('number', codeStr);
        const send = ts('{{Route('Agree')}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == true) {
                window.location.href = '{{Route('page', ['page' => 'index'])}}'

            }
            else{

                alert(result.error);
            }
        })
    }
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
    function startTimer(duration, display) {
        document.getElementById('codereturn').classList.add('d-none');
        var timer = duration, minutes, seconds;
        let interval = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = 'повторно отправить код можно через:' + minutes + ":" + seconds;

            if (--timer < 0) {
                timer  = 60;
                display.textContent = '';
                document.getElementById('codereturn').classList.remove('d-none');
             stop(interval);
            }
        }, 1000);
    }
    function stop(interval)
    {
        clearInterval(interval);
    }
</script>
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
