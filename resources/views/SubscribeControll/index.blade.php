<div class="container">

    <div class="container" style="background-color: #ffffff;height: 148px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">
        @foreach($PageInfo as $result)
            <div class="container">
                <h3 style="font-family: 'SF Pro Display',sans-serif;font-style: normal;font-weight: 600;font-size: 20px;line-height: 20px;/* Темносерый */color: #333333; padding-top: 15px;">{{$result['name']}}</h3>
                <p>Подписка @if($result['status'] == "Активна") закончиться @else закончилась @endif {{$result['data']}}</p>
                <p style="color: {{$result['color']}};">{{$result['status']}}</p>


            </div>
        @endforeach
    </div>
</div>

<div class="redact_title_buttons  " style="width: 183px;height: 38px;background: #FFFFFF;border-radius: 100px;position: relative; display: flex ; justify-content: center; vertical-align: middle;
    top: 150px;
    ">
    <p>Другие планы</p>
</div>
 