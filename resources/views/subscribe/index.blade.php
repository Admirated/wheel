
<div class="container">

    <div class="container top text" style="background-color: #ffffff; height: 500px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">

        <div style="max-width: 285px; max-height: 100px; margin: 0 auto;" class="subscribe_logo_container">
            <img style="max-width: 285px; max-height: 100px; margin: 0 auto;" src="{{asset('assets/images/subscribe.png')}}">
        </div>
        <h3 style="margin: 0 auto; text-align: center">Оформить подписку</h3>
        <p style="text-align: center">Получите неограниченный доступ к функциям и встроенным приложениям</p>
        @foreach($PageInfo as $result)
            <div style="margin-top: 15px;" class="subscribe_button">
                <h3>{{$result->price}} USD</h3>
                <p>{{$result->term}} месяцев</p>
            </div>
        @endforeach

        <p style="text-align: center; margin-top: 10px;">Подписку можно отменить в любое время</p>
    </div>
</div>
<div class="container" style="padding-bottom: 120px;">

    <div class="container top text" style="background-color: #ffffff; height: 320px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">

        <h3 >Особенности подписки</h3>
        <div class="row justify-content-between" style="height: 60px">
            <img style="max-width:19px; max-height: 19px; " src="{{asset('assets/images/subscribe2.png')}}">
            <p style="width: 92%;">Неограниченное количество колес и сфер для заполнения </p>
        </div>
        <div class="row justify-content-between" style="height: 60px">
            <img style="max-width:16px; max-height: 20px;" src="{{asset('assets/images/subscribe3.png')}}">
            <p style="width: 92%;">Неограниченное количество колес и сфер для заполнения </p>
        </div>
        <div class="row justify-content-between" style="height: 60px">
            <img style="max-width:15px; max-height: 15px;" src="{{asset('assets/images/Group%2096.png')}}">
            <p style="width: 92%;">Неограниченное количество колес и сфер для заполнения </p>
        </div>
        <div class="row justify-content-between" style="height: 60px">
            <img style="max-width:19px; max-height: 19px;" src="{{asset('assets/images/subscribe4.png')}}">
            <p style="width: 92%;">Неограниченное количество колес и сфер для заполнения </p>
        </div>
    </div>
</div>
