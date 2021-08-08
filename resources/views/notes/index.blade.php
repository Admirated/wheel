<div  style="padding-bottom: 130px!important;" class="container">

    @csrf
    <div class="container" style="background-color: #ffffff;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: -15px;padding-bottom: 25px;">

        <div class="container">
            <div class="row"> <input class="table_top_input" id="text" type="text" style="width: 85%;" placeholder="Заметки"> <button onclick="Add()" style="position: relative; top: 30px;left: 10px; transform: scale(0.7); background-color: #C5C7CD;
    border-color: #C5C7CD;" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button> </div>
            <div class="container top" style="padding-top: 15px; padding-bottom: 5px;">

            </div>
        </div>


    </div>
    <style>
        p{
            word-wrap: break-word!important;
        }
        .test {
            width: 25px;
            height: 25px;
            display:block;
            background-color: black;
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M8 8 L24 24 M8 24 L24 8'/%3E%3C/svg%3E");
        }
        @-moz-keyframes dothabottomcheck {
            0% {
                height: 0;
            }
            100% {
                height: 50px;
            }
        }
        @-webkit-keyframes dothabottomcheck {
            0% {
                height: 0;
            }
            100% {
                height: 50px;
            }
        }
        @keyframes dothabottomcheck {
            0% {
                height: 0;
            }
            100% {
                height: 50px;
            }
        }
        @keyframes dothatopcheck {
            0% {
                height: 0;
            }
            50% {
                height: 0;
            }
            100% {
                height: 120px;
            }
        }
        @-webkit-keyframes dothatopcheck {
            0% {
                height: 0;
            }
            50% {
                height: 0;
            }
            100% {
                height: 120px;
            }
        }
        @-moz-keyframes dothatopcheck {
            0% {
                height: 0;
            }
            50% {
                height: 0;
            }
            100% {
                height: 120px;
            }
        }
        input[type=checkbox] {
    display: none;
}

    .check-box {
        height: 100px;
        width: 100px;
        background-color: transparent;
        border: 10px solid #000;
        border-radius: 5px;
        position: absolute;
        display: inline-block;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -moz-transition: border-color ease 0.2s;
        -o-transition: border-color ease 0.2s;
        -webkit-transition: border-color ease 0.2s;
        transition: border-color ease 0.2s;
        cursor: pointer;
    }
    .check-box::before, .check-box::after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        position: absolute;
        height: 0;
        width: 20px;
        background-color: #34b93d;
        display: inline-block;
        -moz-transform-origin: left top;
        -ms-transform-origin: left top;
        -o-transform-origin: left top;
        -webkit-transform-origin: left top;
        transform-origin: left top;
        border-radius: 5px;
        content: " ";
        -webkit-transition: opacity ease 0.5;
        -moz-transition: opacity ease 0.5;
        transition: opacity ease 0.5;
    }
    .check-box::before {
        top: 72px;
        left: 41px;

        -moz-transform: rotate(-135deg);
        -ms-transform: rotate(-135deg);
        -o-transform: rotate(-135deg);
        -webkit-transform: rotate(-135deg);
        transform: rotate(-135deg);
    }
    .check-box::after {
        top: 37px;
        left: 5px;
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }

    input[type=checkbox]:checked + .check-box,
    .check-box.checked {
        border-color: #34b93d;
    }
    input[type=checkbox]:checked + .check-box::after,
    .check-box.checked::after {
        height: 50px;
        -moz-animation: dothabottomcheck 0.2s ease 0s forwards;
        -o-animation: dothabottomcheck 0.2s ease 0s forwards;
        -webkit-animation: dothabottomcheck 0.2s ease 0s forwards;
        animation: dothabottomcheck 0.2s ease 0s forwards;
    }
    input[type=checkbox]:checked + .check-box::before,
    .check-box.checked::before {
        height: 120px;
        -moz-animation: dothatopcheck 0.4s ease 0s forwards;
        -o-animation: dothatopcheck 0.4s ease 0s forwards;
        -webkit-animation: dothatopcheck 0.4s ease 0s forwards;
        animation: dothatopcheck 0.4s ease 0s forwards;
    }
        .textDone
        {
            text-decoration: line-through;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
        .btn-circle.btn-lg {
            width: 50px;
            height: 50px;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.33;
            border-radius: 25px;
        }
        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            font-size: 24px;
            line-height: 1.33;
            border-radius: 35px;
        }
    </style>
    <div id="add">

    @foreach($PageInfo as $result)
            <div id="{{$result->id}}" class="container row" style="background-color: #ffffff;  height: auto; min-height:30px;border-bottom: 4px solid #858589;border-radius: 11px; margin-top: 10px;">

                <div style="width: 100%" class="quest_text_block row justify-content-between"><div class="row" style="width: 95%">  <div style="position: relative; left: -90px;top: -40px;"> <input type="checkbox" id="a{{$result->id}}" />
                            <label onclick="Done('aaa{{$result->id}}')" style="transform: scale(0.2)!important; left: 45px" for="a{{$result->id}}" class="check-box"></label> </div>
                          <p id="aaa{{$result->id}}" style="width: 75%; height: fit-content; margin-left: 30px; padding: 0">{{$result->text}} </p></div><p style="margin: 0; padding: 0;">
                        <div class="wrapper-dropdown"><img class="quest_text" style="max-width: 4px; max-height: 20px; margin-top: -10px" src="{{asset('assets/images/dots.png')}}">
                    <ul class="dropdown" style="width: 100px;left: -85px;">
                        <li style="line-height: 14px;"><a >Создать цель</a></li>
                        <li style="line-height: 14px; margin-top: 5px;"><a href={{Route('page', ['page' => 'MakeNewQuest/'])}}>Создать задачу</a></li>
                        <li style="line-height: 14px;margin-top: 5px;"><a >Создать действие</a></li>
                        <li onclick="Delete({{$result->id}})" style="    line-height: 12px;margin-top: 5px;"><a >Удалить</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<input type="hidden" id="iterration">
</div>

<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
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

    function Add()
    {
        const _token = document.getElementsByName("_token")[0].value;
        let text = document.getElementById('text').value;
        let formData = new FormData();
        formData.append('_token', _token);
        formData.append('text', text);
        const send = ts('{{Route('CreateNote')}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == true) {
                let elem='        <div id="' + result.data.id + '" class="container row" style="background-color: #ffffff;  height: auto; min-height:30px;border-bottom: 4px solid #858589;border-radius: 11px; margin-top: 10px;">\n' +
                    '\n' +
                    '                <div style="width: 100%" class="quest_text_block row justify-content-between"><div class="row" style="width: 95%">  <div style="position: relative; left: -90px;top: -40px;"> <input type="checkbox" id="a' + result.data.id + '" />\n' +
                    '                            <label onclick="Done()" style="transform: scale(0.2)!important; left: 45px" for="a' + result.data.id + '" class="check-box"></label> </div>\n' +
                    '                          <p id="aaa' + result.data.id + '" style="width: 75%; height: fit-content; margin-left: 30px; padding: 0">'+ text +'</p></div><p style="margin: 0; padding: 0;">\n' +
                    '                        <div class="wrapper-dropdown"><img class="quest_text" style="max-width: 4px; max-height: 20px; margin-top: -10px" src="{{asset('assets/images/dots.png')}}">\n' +
                    '                    <ul class="dropdown" style="width: 100px;\n' +
                    '    left: -85px;">\n' +
                    '                        <li style="    line-height: 14px;"><a >Создать цель</a></li>\n' +
                    '                        <li style="    line-height: 14px; margin-top: 5px;"><a >Создать задачу</a></li>\n' +
                    '                        <li style="    line-height: 14px;margin-top: 5px;"><a >Создать действие</a></li>\n' +
                    '                        <li onclick="Delete(' + result.data.id + ')" style="    line-height: 12px;margin-top: 5px;"><a >Удалить</a></li>\n' +
                    '                    </ul>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>' + document.getElementById('add').innerHTML;
                document.getElementById('add').innerHTML = elem;
                document.getElementById('text').value = '';
            }
            else{
                alert(result.error)
            }
        })
    }
    function Delete(id) {
        document.getElementById(id).remove();

    }
    function Done(id)
    {

        document.getElementById(id).classList.toggle('textDone');
    }
</script>


