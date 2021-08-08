
<div class="container" id="container" style="min-height: 550px">


@csrf

        <div class="container" style="background-color: #ffffff; height: 380px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: -15px; padding-bottom: 80px ">
            <input class="table_top_input"  type="text" id="circle_name" style="width: 100%; margin-top: 5px;" placeholder="Название круга">
            <div class="wrapper-dropdown row justify-content-between" style="margin-top: 35px"><p id="section_name" class="quest_text" style="padding-bottom: 0; color: black; margin: 0; font-size: 16px; font-weight: 500">Выберите секцию</p>
                <i style="font-weight: bold;" class="fa fa-angle-down"></i>
                <ul class="dropdown">
                @foreach($PageInfo['circle'] as $result)
                        <li id="li{{$result->id}}" onclick="GetId({{$result->id}})" value="{{$result->id}}"> <a>{{$result->name}} </a></li>
                @endforeach
                </ul>
            </div>

                <p style="margin-top: 45px;
    text-align: center;">Выберите цвет круга</p>

            <div class="row" style="margin-top: -30px;">
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
                    <div onclick="Color('#D600DB')" style="background: #D600DB;" class="color_circle_small"></div>

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
            <div class="container" style="display: flex; justify-content: center; margin-top: 55px;">
                <button onclick="Create()" class="succes_add_button" style="outline: none">
                    Создать
                </button>
            </div>

        </div>

        <div>
            <p>Круг</p>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>К чему относится</th>
                    <th>Цвет</th>
                </tr>
                @foreach($PageInfo['circle'] as $result)
                    <tr>
                        <td>{{$result->id}}</td>
                        <td>{{$result->name}}</td>
                        <td>Родитель</td>
                        <td><p style="color: {{$result->color}}">Цвет</p></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div>
            <p>Круг в круге</p>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>К чему относится</th>
                    <th>Цвет</th>
                </tr>
                @foreach($PageInfo['task'] as $result)
                    <tr>
                        <td>{{$result->id}}</td>
                        <td>{{$result->name}}</td>
                        <td>{{$result->id}}</td>
                        <td><p style="color: {{$result->color}}">Цвет</p></td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
<input type="hidden" id="color">
<input type="hidden" id="iterration">
<input type="hidden" id="CicrleId">

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


    function GetId(id) {
       document.getElementById('CicrleId').value = id;
       let text = document.getElementById('li'+id).innerText;
       document.getElementById('section_name').innerText = text;

    }
    function Color(color) {

        document.getElementById('color').value = color;
    }
    function Create(){
        const _token = document.getElementsByName("_token")[0].value;
        let name = document.getElementById("circle_name").value;
        let color = document.getElementById('color').value;
        let id = document.getElementById('CicrleId').value;
        let formData = new FormData();
        formData.append('_token', _token);
        formData.append('name', name);
        formData.append('color', color);
        formData.append('circle_id', id);
        const send = ts('{{Route('CreateCircles')}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == true) {
               alert('Колесо'+ ' '+ name +' ' + 'успешно создано!');
               window.location.reload();
            } else {
                alert(result.error);
            }
        });
    }
</script>
