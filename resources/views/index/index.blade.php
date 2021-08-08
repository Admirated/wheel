<div class="container " style="padding-bottom: 120px;">


    <div class="cabinet_info_wrapper row">
        <div class="profile_wrapper row">
            <div class="profile_logo">
                <img id="profile_img" width="73" height="73" style="max-width: 73px; border-radius: 100%; max-height: 73px;" src="@if($user_info->image == null) {{asset('assets/images/profile.jpg')}} @else {{$user_info->image}} @endif">
            </div>
            <div class="profile_logo_text" style="margin-top: 10px;">
                <div class="title_profile_contain row">
                    <h2>{{$user_info->name}}</h2>
                    <img  onclick="navigate('http://app.vprockit.ru/RedactProfile')" style="max-height: 14px; max-width: 14px; margin-left: 5px;" src="{{asset('assets/images/vector-pen.png')}}">
                </div>

                <p>Уровень 1</p>

            </div>
        </div>
    </div>

    <div class="general_info_block">
        <p style="margin-top: 30px;">Основное</p>
        <div class="general_block_content" style="margin-top: -15px; height: auto!important;
    padding-bottom: 15px;">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="first_piece_progress">
                        @foreach($PageInfo['first'] as $key => $result)
                            <div>
                                <div class="row height_control justify-content-between">
                                    <div class="row text-control">
                                        <p>{{$result['info']->name}}</p>
                                    </div>
                                    <h3 class="progress_persent" style="color:{{$result['info']->color}};">{{$result['percent']}}%</h3>
                                </div>
                                <div  class="myProgress">
                                    <div class="myBar" style="background: {{$result['info']->color}}; width: {{$result['percent']}}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="second_piece_progress">
                        @foreach($PageInfo['second'] as $key => $result)
                            <div>
                                <div class="row height_control justify-content-between">
                                    <div class="row text-control">
                                        <p>{{mb_substr($result['info']->name, 0, 10)}}</p>
                                    </div>
                                    <h3 class="progress_persent" style="color:{{$result['info']->color}};">{{$result['percent']}}%</h3>
                                </div>
                                <div  class="myProgress">
                                    <div class="myBar" style="background:{{$result['info']->color}}; width: {{$result['percent']}}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about_me_block">
        <p style="margin-top: 30px;">Обо мне</p>
        <div class="about_me_content container" style="margin-top: -15px">
            <div onclick="navigate('http://app.vprockit.ru/values')" class="about_me_button row justify-content-between">
                <p>Ценности</p>
                <div>
                    <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                </div>
            </div>
            <div onclick="navigate('http://app.vprockit.ru/skils')" class="about_me_button row justify-content-between">
                <p>Навыки</p>
                <div>
                    <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                </div>
            </div>
            <div onclick="navigate('http://app.vprockit.ru/interests')"  class="about_me_button row justify-content-between">
                <p>Интересы</p>
                <div>
                    <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                </div>
            </div>
            <div onclick="navigate('http://app.vprockit.ru/habits')"  class="about_me_button row justify-content-between">
                <p>Привычки</p>
                <div>
                    <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                </div>
            </div>
            <div onclick="navigate('http://app.vprockit.ru/want')"  class="about_me_button row justify-content-between">
                <p>Я хочу...</p>
                <div>
                    <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                </div>
            </div>
            <div onclick="navigate('http://app.vprockit.ru/destinations')" style="border: none"  class="about_me_button row justify-content-between">
                <p>Предназначение</p>
                <div>
                    <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                </div>
            </div>
        </div>

        <div class="about_me_block">
            <p style="margin-top: 25px;">Приложение</p>
            <div class="about_me_content_small container" style="margin-top: -15px;">
                <div  class="about_me_button_small row justify-content-between">
                    <p>Настройки</p>
                    <div>
                        <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                    </div>
                </div>
                <div class="about_me_button_small row justify-content-between">
                    <p>Покупки</p>
                    <div>
                        <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                    </div>
                </div>
                <div onclick="navigate('http://app.vprockit.ru/Version')"  class="about_me_button_small row justify-content-between">
                    <p>О приложении</p>
                    <div>
                        <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                    </div>
                </div>
                <div class="about_me_button_small row justify-content-between" style="border: none">
                    <p>Отзыв и предложение</p>
                    <div>
                        <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    @media screen and (max-width: 500px){

        #profile_img {
           width: 73px!important;
            height: 73px!important;
            border-radius: 100%;
        }

    }
</style>
<script>
    function navigate(href)
    {
        window.location.href = href;
    }
</script>
