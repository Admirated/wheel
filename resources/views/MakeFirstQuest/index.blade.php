<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<div id="reg_menu" class="container" style="display: flex; justify-content: center; flex-direction: column">
    @csrf
    <h1>Добро пожаловать</h1>
    <h2 style="font-family: 'SF Pro Display',sans-serif;font-style: normal;font-weight: 600;font-size: 18px;line-height: 128.91%;/* or 23px */text-align: center;color: #000000;">Создайте вашу <span style="color: #007AFF;">первую цель</span> и начните <span style="color: #007AFF;">контролировать вашу жизнь</span> прямо сейчас </h2>

    <div class="container" style="background-color: #ffffff; height: 450px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">

        <div class="container">
            <input class="table_top_input" id="quest_name" type="text" style="width: 100%;" placeholder="Задача">
            <table style=" width: 100%;position: relative;top: 16px!important;">
                <tbody class="table_head">
                <tr>
                    <td style="border-bottom:2px solid #C4C4C4;">Блок</td>

                    <td style=" border-bottom:2px solid #C4C4C4;border-left: 1.5px solid #C4C4C4; padding-left: 8px;">



                        <div class="wrapper-dropdown row justify-content-between"><p class="quest_text" style="padding-bottom: 0; color: black; margin: 0; font-size: 16px; font-weight: 500">Выберите блок</p>
                            <i style="font-weight: bold;" class="fa fa-angle-down"></i>
                            <ul id="taskUl" class="dropdown" style="height: auto;">
                                @foreach($PageInfo as $result)
                                    <li  onclick="CircleId({{$result->id}})"><a style="margin-top: 15px;">{{$result->name}}</a></li>

                                @endforeach
                            </ul>

                        </div></td>
                </tr>
                <tr>
                    <td style="border-bottom:2px solid #C4C4C4;">Подблок</td>

                    <td style=" border-bottom:2px solid #C4C4C4;border-left: 1.5px solid #C4C4C4; padding-left: 8px;">



                        <div class="wrapper-dropdown row justify-content-between"><p class="quest_text" style="padding-bottom: 0; color: black; margin: 0; font-size: 16px; font-weight: 500">Выберите подблок</p>
                            <i style="font-weight: bold;" class="fa fa-angle-down"></i>
                            <ul id="taskUl" class="dropdown" style="height: auto;">
                                @foreach($PageInfo as $result)
                                    <li  onclick="CircleId({{$result->id}})"><a style="margin-top: 15px;">{{$result->name}}</a></li>

                                @endforeach
                            </ul>

                        </div></td>
                </tr>
                <tr>
                    <td style="border-bottom:2px solid #C4C4C4;">Срок</td>

                    <td style=" border-bottom:2px solid #C4C4C4;border-left: 1.5px solid #C4C4C4; padding-left: 8px;">


                        <input style="border: none; outline: none; font-size: 10px;  width: 95%; padding-top: 5px;padding-bottom: 5px; background-color: #ffffff; color: #000000;"  type="text" id="quest_deadline" name="appt"  required placeholder="Сегодня в"></td>
                </tr>
                <tr>
                    <td style="border-bottom:2px solid #C4C4C4;">Напомнить мне</td>

                    <td style=" border-bottom:2px solid #C4C4C4;border-left: 1.5px solid #C4C4C4; padding-left: 8px;">



                        <input onclick="DateTime()" style="border: none; outline: none; font-size: 10px;  padding-top: 5px;padding-bottom: 5px; background-color: #ffffff; color: #000000; width: 95%;"  type="text" id="quest_remind" name="appt"  required placeholder="Сегодня в"></td></td>
                </tr>
                <tr>
                    <td style="border-bottom:2px solid #C4C4C4;">Что мне это даст?</td>

                    <td style=" border-bottom:2px solid #C4C4C4;border-left: 1.5px solid #C4C4C4; padding-left: 8px;">




                            <input id="quest_descript" type="text" style="border:none;  outline: none; min-width: 100px; width: 100%" placeholder="Текст">

                        </td>
                </tr>
                <tr>
                    <td style="border-bottom:2px solid #C4C4C4;">Заметки/Мысли</td>

                    <td style=" border-bottom:2px solid #C4C4C4;border-left: 1.5px solid #C4C4C4; padding-left: 8px;">




                            <input id="quest_note" type="text" style="border:none;  outline: none; min-width: 100px; width: 100%" placeholder="Текст">

                       </td>
                </tr>
                <tr>
                    <td style="border-bottom:2px solid #C4C4C4;">Как это важно?</td>

                    <td style=" border-bottom:2px solid #C4C4C4;border-left: 1.5px solid #C4C4C4; padding-left: 8px;">



                        <div class="wrapper-dropdown row justify-content-between"><p class="quest_text" style="padding-bottom: 0; color: black; margin: 0; font-size: 16px; font-weight: 500">от 1 до 5</p>
                            <i style="font-weight: bold;" class="fa fa-angle-down"></i>
                            <ul class="dropdown">
                                <li onclick="Important('5')"><a >5</a></li>
                                <li onclick="Important('4')"><a >4</a></li>
                                <li onclick="Important('3')"><a >3</a></li>
                                <li onclick="Important('2')"><a >2</a></li>
                                <li onclick="Important('1')"><a >1</a></li>
                            </ul>

                        </div></td>
                </tr>
                <tr>
                    <td style="border-bottom:2px solid #C4C4C4;">Как это срочно?</td>

                    <td style=" border-bottom:2px solid #C4C4C4;border-left: 1.5px solid #C4C4C4; padding-left: 8px;">



                        <div class="wrapper-dropdown row justify-content-between"><p class="quest_text" style="padding-bottom: 0; color: black; margin: 0; font-size: 16px; font-weight: 500">от 1 до 5</p>
                            <i style="font-weight: bold;" class="fa fa-angle-down"></i>
                            <ul class="dropdown">
                                <li onclick="Urgently('5')"><a >5</a></li>
                                <li onclick="Urgently('4')"><a >4</a></li>
                                <li onclick="Urgently('3')"><a >3</a></li>
                                <li onclick="Urgently('2')"><a >2</a></li>
                                <li onclick="Urgently('1')"><a >1</a></li>
                            </ul>

                        </div></td>
                </tr>
                </tbody>

            </table>

        </div>
        <style>
            @media screen and (max-width: 350px) {


                #fonts
                {
                    font-size: 12px!important;
                }

            }
        </style>
</div>
    <div class="container" style="text-align: center">
        <p style="margin-top: 25px;">Выберите цвет задачи</p>
    </div>
    <div class="container" style="background-color: #ffffff; height: 195px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: -15px; ">

        <div class="row">
            <div class="color_sector">
                <div onclick="Color('#FFFFFF')" style="background: #FFFFFF;" class="color_circle_small"></div>
                <div onclick="Color('#3531FF')" style="background: #3531FF;" class="color_circle_small"></div>
                <div onclick="Color('#31FF45')" style="background: #31FF45;" class="color_circle_small"></div>
                <div onclick="Color('#A431FF')" style="background: #A431FF;"class="color_circle_small"></div>
            </div>
            <div class="color_sector">
                <div onclick="Color('#B90000')" style="background: #B90000;" class="color_circle_small"></div>
                <div onclick="Color('#0007B9')" style="background: #0007B9;" class="color_circle_small"></div>
                <div onclick="Color('#00B912')" style="background: #00B912;" class="color_circle_small"></div>
                <div onclick="Color('#7300B9')" style="background: #7300B9;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div onclick="Color('#FF5A5A')" style="background: #FF5A5A;" class="color_circle_small"></div>
                <div onclick="Color('#5A61FF')" style="background: #5A61FF;" class="color_circle_small"></div>
                <div onclick="Color('#5EFF5A')" style="background: #5EFF5A;" class="color_circle_small"></div>
                <div onclick="Color('#CA5AFF')" style="background: #CA5AFF;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div onclick="Color('#FF4D00')" style="background: #FF4D00;" class="color_circle_small"></div>
                <div onclick="Color('#00F0FF')" style="background: #00F0FF;" class="color_circle_small"></div>
                <div onclick="Color('#FFE600')" style="background: #FFE600;" class="color_circle_small"></div>
                <div onclick="Color('#FF00D6')" style="background: #FF00D6;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div onclick="Color('#DB4200')" style="background: #DB4200;" class="color_circle_small"></div>
                <div onclick="Color('#00B3DB')" style="background: #00B3DB;" class="color_circle_small"></div>
                <div onclick="Color('#DBC500')" style="background: #DBC500;" class="color_circle_small"></div>
                <div onclick="Color('#d600db')" style="background: #D600DB;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div onclick="Color('#FF7A41')" style="background: #FF7A41;" class="color_circle_small"></div>
                <div onclick="Color('#41FFF4')" style="background: #41FFF4;" class="color_circle_small"></div>
                <div onclick="Color('#FBFF41')" style="background: #FBFF41;" class="color_circle_small"></div>
                <div onclick="Color('#FF41F7')" style="background: #FF41F7;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div onclick="Color('#FF988A')" style="background: #FF988A;" class="color_circle_small"></div>
                <div onclick="Color('#8AC7FF')" style="background: #8AC7FF;" class="color_circle_small"></div>
                <div onclick="Color('#A1FF8A')" style="background: #A1FF8A;" class="color_circle_small"></div>
                <div onclick="Color('#C58AFF')" style="background: #C58AFF;" class="color_circle_small"></div>

            </div>
            <div class="color_sector">
                <div onclick="Color('#FFAD8A')" style="background: #FFAD8A;" class="color_circle_small"></div>
                <div onclick="Color('#BBFFF3')" style="background: #BBFFF3;" class="color_circle_small"></div>
                <div onclick="Color('#FFF38A')" style="background: #FFF38A;" class="color_circle_small"></div>
                <div onclick="Color('#FD8AFF')" style="background: #FD8AFF;" class="color_circle_small"></div>

            </div>
        </div>

    </div>
    <button class="blue_btn" style="margin-top: 45px;margin-bottom: 100px;" onclick="Create()">Создать</button>
</div>
<style>
    @supports (-webkit-appearance: none) or (-moz-appearance: none) {
        input[type=checkbox],
        input[type=radio] {
            --active: #275EFE;
            --active-inner: #fff;
            --focus: 2px rgba(39, 94, 254, .3);
            --border: #BBC1E1;
            --border-hover: #275EFE;
            --background: #fff;
            --disabled: #F6F8FF;
            --disabled-inner: #E1E6F9;
            -webkit-appearance: none;
            -moz-appearance: none;
            height: 21px;
            outline: none;
            display: inline-block;
            vertical-align: top;
            position: relative;
            margin: 0;
            cursor: pointer;
            border: 1px solid var(--bc, var(--border));
            background: var(--b, var(--background));
            transition: background 0.3s, border-color 0.3s, box-shadow 0.2s;
        }
        input[type=checkbox]:after,
        input[type=radio]:after {
            content: "";
            display: block;
            left: 0;
            top: 0;
            position: absolute;
            transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s);
        }
        input[type=checkbox]:checked,
        input[type=radio]:checked {
            --b: var(--active);
            --bc: var(--active);
            --d-o: .3s;
            --d-t: .6s;
            --d-t-e: cubic-bezier(.2, .85, .32, 1.2);
        }
        input[type=checkbox]:disabled,
        input[type=radio]:disabled {
            --b: var(--disabled);
            cursor: not-allowed;
            opacity: 0.9;
        }
        input[type=checkbox]:disabled:checked,
        input[type=radio]:disabled:checked {
            --b: var(--disabled-inner);
            --bc: var(--border);
        }
        input[type=checkbox]:disabled + label,
        input[type=radio]:disabled + label {
            cursor: not-allowed;
        }
        input[type=checkbox]:hover:not(:checked):not(:disabled),
        input[type=radio]:hover:not(:checked):not(:disabled) {
            --bc: var(--border-hover);
        }
        input[type=checkbox]:focus,
        input[type=radio]:focus {
            box-shadow: 0 0 0 var(--focus);
        }
        input[type=checkbox]:not(.switch),
        input[type=radio]:not(.switch) {
            width: 21px;
        }
        input[type=checkbox]:not(.switch):after,
        input[type=radio]:not(.switch):after {
            opacity: var(--o, 0);
        }
        input[type=checkbox]:not(.switch):checked,
        input[type=radio]:not(.switch):checked {
            --o: 1;
        }
        input[type=checkbox] + label,
        input[type=radio] + label {
            font-size: 14px;
            line-height: 21px;
            display: inline-block;
            vertical-align: top;
            cursor: pointer;
            margin-left: 4px;
        }

        input[type=checkbox]:not(.switch) {
            border-radius: 7px;
        }
        input[type=checkbox]:not(.switch):after {
            width: 5px;
            height: 9px;
            border: 2px solid var(--active-inner);
            border-top: 0;
            border-left: 0;
            left: 7px;
            top: 4px;
            transform: rotate(var(--r, 20deg));
        }
        input[type=checkbox]:not(.switch):checked {
            --r: 43deg;
        }
        input[type=checkbox].switch {
            width: 38px;
            border-radius: 11px;
        }
        input[type=checkbox].switch:after {
            left: 2px;
            top: 2px;
            border-radius: 50%;
            width: 15px;
            height: 15px;
            background: var(--ab, var(--border));
            transform: translateX(var(--x, 0));
        }
        input[type=checkbox].switch:checked {
            --ab: var(--active-inner);
            --x: 17px;
        }
        input[type=checkbox].switch:disabled:not(:checked):after {
            opacity: 0.6;
        }

        input[type=radio] {
            border-radius: 50%;
        }
        input[type=radio]:after {
            width: 19px;
            height: 19px;
            border-radius: 50%;
            background: var(--active-inner);
            opacity: 0;
            transform: scale(var(--s, 0.7));
        }
        input[type=radio]:checked {
            --s: .5;
        }
    }
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
    .bootstrap-datetimepicker-widget
    {
        left: 0px!important;
    }

</style>
<input type="hidden" id="iterration">
<input type="hidden" id="circles">
<input type="hidden" id="color">
<input type="hidden" id="important">
<input type="hidden" id="urgently">
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>

</script>
<script>

</script>
<script>

    function DateTime() {
        document.getElementsByClassName('bootstrap-datetimepicker-widget')[0].innerHTML +=' <input id="c1" type="checkbox">\n' +
            '    <label for="c1">Отключить напоминания</label>';
    }

    const dropdown = document.getElementsByClassName('wrapper-dropdown');
    const text = document.getElementsByClassName('quest_text');
    const ul = document.getElementsByClassName('dropdown');
for(let i=0; i< dropdown.length; i++) {

    dropdown[i].onclick = () => {
        let cont = i;
        for(let k=0; k< dropdown.length; k++) {
            if(cont !== k) {
                dropdown[k].classList.remove('active')
            }
        }
        document.getElementById('iterration').value = i;

        dropdown[i].classList.toggle('active')

    };
}
    $(".dropdown > li").click(function(){
        let k =  document.getElementById('iterration').value;
        $(".quest_text").eq( k ).text($(this).text())
    });

function CircleId(id) {
    document.getElementById('circles').value = id;

}
function Color(color) {

    document.getElementById('color').value = color;
}
function Important(count) {
document.getElementById('important').value = count;
}
function Urgently(number) {

    document.getElementById('urgently').value = number;
}
    function Create(){
        const _token = document.getElementsByName("_token")[0].value;
        let name = document.getElementById("quest_name").value;
        let descript = document.getElementById('quest_descript').value;
        let remind = document.getElementById('quest_remind').value;
        let deadline = document.getElementById('quest_deadline').value;
        let important = document.getElementById('important').value;
        let note = document.getElementById('quest_note').value;
        let urgently = document.getElementById('urgently').value;
        let color = document.getElementById('color').value;
        let id = document.getElementById('circles').value;
        let formData = new FormData();
        formData.append('_token', _token);
        formData.append('circle_id', id);
        formData.append('name', name);
        formData.append('color', color);
        formData.append('descript', descript);
        formData.append('inportant', important);
        formData.append('remind', remind);
        formData.append('dedline', deadline);
        formData.append('urgently', urgently);
        formData.append('note', note);
        const send = ts('{{Route('CreateTask')}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == true) {
                alert('Ваше первое задание' + name + 'успешно создано!')
               window.location.href = 'http://app.vprockit.ru/chooseBig/'+ id;
            } else {
                alert(result.error);
            }
        });
    }

    $('#quest_deadline').datetimepicker({locale: 'ru',});
    $('#quest_remind').datetimepicker({locale: 'ru',});


</script>
