<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker-standalone.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<div class="profile_wrapper row" style="margin-top: -30px;">
    <div id="reg_menu" class="container" style="display: flex; justify-content: center; flex-direction: column">
        @csrf
        <h2 style="font-family: 'SF Pro Display',sans-serif;font-style: normal;font-weight: 600;font-size: 18px;line-height: 128.91%;/* or 23px */text-align: center;color: #000000;">Редактируйте <span style="color: #007AFF;">свои</span> данные </h2>

        <div id="img_container" class="profile_logo" style="display: flex; justify-content: center">
            <img id="image" onclick="ImageRedact()" width="73" height="73" style="max-width: 73px; max-height: 73px; border: 2px solid #2F80ED; border-radius: 100%" src="@if($user_info->image == null) {{asset('assets/images/profile.jpg')}} @else {{$user_info->image}} @endif">
        </div>
        <input onchange="ReplaceImg(event)" style="display: none" id="img" type="file">
        <input class="input_response" id="name" value="{{$user_info->name}}" style="border: 1px solid #DEDEDE;box-sizing: border-box;border-radius: 7px;width:100%!important;height: 43px; padding-left: 15px; margin: 0 auto; margin-top: 15px!important; background-color: #ffffff; outline: none" type="text" placeholder="Введите ваше имя">
        <input class="input_response" id="date"  style="border: 1px solid #DEDEDE;box-sizing: border-box;border-radius: 7px;width:100%!important;height: 43px; margin-top: 15px!important; margin: 0 auto; padding-left: 15px;background-color: #ffffff; outline: none" type="text" placeholder="Дата рождения">
        <div class="dropdownbox">
            <p id="sex">Выберите пол</p>
        </div>
        <ul class="menu">
            <li style="    margin-top: 5px;">Мужской</li>
            <li style="    margin-top: 4px;">Женский</li>
        </ul>
        <button class="blue_btn" style="margin-top: 45px;margin-bottom: 100px;" onclick="ReplaceUserInfo()">Редактировать</button>
    </div>
</div>
<style>
    @media screen and (max-width: 500px){

        #image {
            width: 73px!important;
            height: 73px!important;
            border-radius: 100%;
        }

    }
</style>
@csrf
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    $(document).ready(function(){
        $(".dropdownbox").click(function(){
            $(".menu").toggleClass("showMenu");
            $(".menu > li").click(function(){
                $(".dropdownbox > p").text($(this).text());
                $(".menu").removeClass("showMenu");
            });
        });

    });
    function ImageRedact() {
        document.getElementById('img').click();
    }


    function ReplaceImg(event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById("image");
        imgtag.title = selectedFile.name;

        reader.onload = function(event) {
            imgtag.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    }
    function ReplaceUserInfo(){
        let name = document.getElementById('name').value;
        let date = document.getElementById('date').value;
        let sex = document.getElementById('sex').innerText;
        let img = document.getElementById('img').files[0];
        const _token = document.getElementsByName("_token")[0].value;
        let formData = new FormData();
        formData.append('_token', _token);
        formData.append('date', date);
        formData.append('name', name);
        formData.append('image', img);
        if(sex !='Выберите пол') {
            formData.append('sex', sex);
        }
        const send = ts('{{Route("ReplaceUserInfo")}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == true) {
                alert("Вы успешно изменили информацию о себе");
                window.location.href = 'http://app.vprockit.ru/index';
            } else {
                alert(result.error);
            }
        });
    }

    $('#date').datepicker({locale: 'ru',});
</script>
<style>

    .wrapper {
        margin: 30px auto;
        max-width: 600px;
    }
    .dropdownbox {
        margin: 0 auto;
        width: 400px;
        margin-top: 40px;
        border: 1px solid #DEDEDE;box-sizing: border-box;border-radius: 7px;width:100%;height: 43px; padding-left: 15px; margin: 0 auto; margin-top: 15px!important; background-color: #ffffff;
        cursor: pointer;
    }

    .dropdownbox > p {
        padding: 5px 0px;
        font-size: 1.25em;
        line-height: 1.4em;
        user-select: none;
        -moz-user-select:none;
        /* Safari */
        -khtml-user-select: none;
    }

    ul.menu {
        position: relative;
        margin: 0 auto;
        width: 100%;
        overflow: hidden;
        height: 0;

        border-radius: 7px;
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        -o-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
        /*-moz-transform:scale(0); */
        background-color: #ffffff;
        color: #000000;
        cursor: pointer;
        user-select: none;
        -moz-user-select:none;
        /* Safari */
        -khtml-user-select: none;
        text-decoration: none;
    }

    ul.menu li {
        padding: 2px 10px;
        font-size: 1.25em;
        line-height: 1.4em;
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        -o-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
        text-decoration: none;
        list-style-type: none;
        margin-left: -35px!important;
    }
    ul.menu li:hover {
        padding-left: 20px;

    }

    .menu.showMenu {
        /*-moz-transform:scale(1);*/
        height: 70px;
    }

    @media screen and (max-width: 350px)
    {
        .input_response
        {
            width: 80% !important;
        }


    }

    .new {
        padding: 50px;
    }

    .form-group {
        display: block;
        margin-bottom: 15px;
        margin-top: 20px!important;
    }

    @media screen and (max-width: 350px){

        .form-group
        {
            max-width: 80%;
        }
    }
    .form-group input {
        padding: 0;
        height: initial;
        width: initial;
        margin-bottom: 0;
        display: none;
        cursor: pointer;
    }

    .form-group label {
        position: relative;
        cursor: pointer;
    }

    .form-group label:before {
        content:'';
        -webkit-appearance: none;
        background-color: transparent;
        border: 2px solid #0079bf;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
        padding: 10px;
        display: inline-block;
        position: relative;
        vertical-align: middle;
        cursor: pointer;
        margin-right: 5px;
    }

    .form-group input:checked + label:after {
        content: '';
        display: block;
        position: absolute;
        top: 2px;
        left: 9px;
        width: 6px;
        height: 14px;
        border: solid #0079bf;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }
    .bootstrap-datetimepicker-widget {
        top: 0;
        left: 100px;
        width: 250px;
        padding: 4px;
        margin-top: 1px;
        z-index: 99999 !important;
        border-radius: 4px;
    }

    .menu.showMenu {
        /*-moz-transform:scale(1);*/
        height: 70px;
    }
    .bootstrap-datetimepicker-widget
    {
        left: 0px!important;
    }
    .datepicker
    {
        max-width: 230px;
    }
    .table-condensed>tbody>tr>td>span {
        padding: 5px;
        display: block;

    }
</style>
