<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body>
    @if($page != "ChangeProfile" && $page != "MakeFirstQuest")
        <div class="container ">
            <div class="navigate_wrapper row justify-content-between left">
                <div style="margin-top: 15px;" class="back_block">
                    <button class="back-button" onclick="window.history.back()" style="padding: 0;"><img width="22" height="22" style="max-width: 24px; max-height: 24px;" src="{{asset('assets/images/corner-up-left.png')}}"></button>
                </div>
                <div class="page_title_block">
                    <h1>{{$title}}</h1>
                    <p>Меню</p>
                </div>
                <div style="margin-top: 15px;" class="menu_block">
                    <img style="max-width: 20px; max-height: 4px" src="{{asset('assets/images/title_dots.png')}}">
                </div>
            </div>
        </div>
    @endif
<!-- Header part end-->
    @include($page . '/index')


    @if($page != "ChangeProfile" && $page != "MakeFirstQuest")
        <footer class="footer">
            <div class="row justify-content-around">
                <a href="{{Route('page', ['page' => 'BalanceWheel'])}}"><img class="footer_atribute" src="{{asset('assets/images/first_footer_atribute.png')}}"></a>

                <a href="{{Route('page', ['page' => 'RedactProfile'])}}"><img class="footer_atribute" src="{{asset('assets/images/third_footer_atribute.png')}}"></a>
                <a href="{{Route('page', ['page' => 'index'])}}"><img class="footer_atribute" src="{{asset('assets/images/fourth_footer_atribute.png')}}"></a>
            </div>
        </footer>
    @endif
        <script>

            async function ts(url,method,data){
                try {
                    const response = await fetch(url, {
                        method: method,
                        body: data
                    });
                    const json = await response.json();
                    return json;
                } catch (error) {
                    console.error('Error toServer:', error);
                    return error;
                }
            }

        </script>


