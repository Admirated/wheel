<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <title>WebApp</title>

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


<div class="container ">

  <div class="navigate_wrapper row justify-content-between left">
    <div style="margin-top: 15px;" class="back_block">
      <a href="BalanceWheel"> <img width="24" height="24" style="max-width: 24px; max-height: 24px;" src="{{asset('assets/images/corner-up-left.png')}}"></a>
    </div>
    <div class="page_title_block">
      <h1>Профиль</h1>
      <p>Меню</p>
    </div>
    <div style="margin-top: 15px;" class="menu_block">
      <img style="max-width: 20px; max-height: 4px" src="{{asset('assets/images/title_dots.png')}}">
    </div>
  </div>

  <div class="cabinet_info_wrapper row">
    <div class="profile_wrapper row">
    <div class="profile_logo">
      <img width="73" height="73" style="max-width: 73px; max-height: 73px;" src="{{asset('assets/images/Profile.png')}}">
    </div>
    <div class="profile_logo_text" style="margin-top: 10px;">
      <div class="title_profile_contain row">
      <h2>Степа Романов</h2>
        <img style="max-height: 14px; max-width: 14px; margin-left: 5px;" src="{{asset('assets/images/vector-pen.png')}}">
      </div>

      <p>Уровень 1</p>

    </div>
    </div>
  </div>

  <div class="general_info_block">
    <p style="margin-top: 30px;">Основное</p>
    <div class="general_block_content" style="margin-top: -15px;">
      <div class="container">
      <div class="row justify-content-between">
        <div class="first_piece_progress">
          <div>
            <div class="row height_control justify-content-between">
              <div class="row text-control">
              <img class="profile_display_img" src="{{asset('assets/images/health.png')}}" style="max-width: 15px; max-height: 14px;">
            <p>Здоровье</p>
              </div>
              <h3 class="progress_persent" style="color:#5DD27A;">25%</h3>
            </div>
      <div  class="myProgress">
        <div class="myBar" style="background: #5DD27A;"></div>
      </div>
          </div>
          <div>
            <div class="row height_control justify-content-between">
              <div class="row text-control">
              <img class="profile_display_img" src="{{asset('assets/images/spirit.png')}}" style="max-width: 15px; max-height: 14px;">

            <p>Духовность</p>
              </div>
              <h3 class="progress_persent" style="color:#5AC8FA;">25%</h3>
            </div>
            <div  class="myProgress">
              <div class="myBar" style="background: #5AC8FA;"></div>
            </div>
          </div>
          <div> <div class="row height_control justify-content-between">
            <div class="row text-control">
            <img class="profile_display_img" src="{{asset('assets/images/smile.png')}}" style="max-width: 15px; max-height: 14px;">
            <p>Окружение</p>
            </div>
            <h3 class="progress_persent" style="color:#FF9500;">25%</h3>
          </div>
            <div  class="myProgress">
              <div class="myBar" style="background: #FF9500;"></div>
            </div>
          </div>
          <div>
            <div class="row height_control justify-content-between">
              <div class="row text-control">
                <img class="profile_display_img" src="{{asset('assets/images/progress.png')}}" style="max-width: 15px; max-height: 14px;">
            <p>Саморазвитие</p>
              </div>
              <h3 class="progress_persent" style="color:#BF5AF2;">25%</h3>
            </div>
            <div  class="myProgress">
              <div class="myBar" style="background: #BF5AF2;"></div>
            </div>
          </div>
      </div>
        <div class="second_piece_progress">
          <div>
            <div class="row height_control justify-content-between">
              <div class="row text-control">
                <img class="profile_display_img" src="{{asset('assets/images/family.png')}}" style="max-width: 15px; max-height: 14px;">
            <p>Семья</p>
              </div>
              <h3 class="progress_persent" style="color:#FF008A;">25%</h3>
            </div>
            <div  class="myProgress">
              <div class="myBar" style="background: #FF008A;"></div>
            </div>
          </div>
          <div>
            <div class="row height_control justify-content-between">
              <div class="row text-control">
                <img class="profile_display_img" src="{{asset('assets/images/caryer.png')}}" style="max-width: 15px; max-height: 14px;">
            <p>Карьера</p>
              </div>
              <h3 class="progress_persent" style="color:#FF3131;">25%</h3>
            </div>
            <div  class="myProgress">
              <div class="myBar" style="background: #FF3131;"></div>
            </div>
          </div>
          <div>
            <div class="row height_control justify-content-between">
              <div class="row text-control">
                <img class="profile_display_img" src="{{asset('assets/images/finance.png')}}" style="max-width: 8px; max-height: 14px;">
            <p>Финансы</p>
              </div>
              <h3 class="progress_persent" style="color:#0066FF;">25%</h3>
            </div>
            <div  class="myProgress">
              <div class="myBar" style="background: #0066FF;"></div>
            </div>
          </div>
          <div>
            <div class="row height_control justify-content-between">
              <div class="row text-control">
                <img class="profile_display_img" src="{{asset('assets/images/free.png')}}" style="max-width: 15px; max-height: 14px;">
            <p>Досуг</p>
              </div>
              <h3 class="progress_persent" style="color:#FFD60A;">25%</h3>
            </div>
            <div  class="myProgress">
              <div class="myBar" style="background: #FFD60A;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

  <div class="about_me_block">
    <p style="margin-top: 30px;">Обо мне</p>
    <div class="about_me_content container" style="margin-top: -15px">
    <div  class="about_me_button row justify-content-between">
      <p>Ценности</p>
      <div>
        <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
    </div>
    </div>
      <div  class="about_me_button row justify-content-between">
        <p>Навыки</p>
        <div>
          <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
        </div>
      </div>
      <div  class="about_me_button row justify-content-between">
        <p>Интересы</p>
        <div>
          <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
        </div>
      </div>
      <div  class="about_me_button row justify-content-between">
        <p>Привычки</p>
        <div>
          <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
        </div>
      </div>
      <div  class="about_me_button row justify-content-between">
        <p>Я хочу...</p>
        <div>
          <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
        </div>
      </div>
      <div  class="about_me_button row justify-content-between">
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
        <div  class="about_me_button_small row justify-content-between">
          <p>О приложении</p>
          <div>
            <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
          </div>
        </div>
        <div class="about_me_button_small row justify-content-between">
          <p>Отзыв и предложение</p>
          <div>
            <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 15px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="footer">
  <div class="row justify-content-around">
    <a href="{{Route('page', ['page' => 'BalanceWheel'])}}"><img class="footer_atribute" src="{{asset('assets/images/first_footer_atribute.png')}}"></a>
    <img class="footer_atribute" src="{{asset('assets/images/second_footer_atribute.png')}}">
    <img class="footer_atribute" src="{{asset('assets/images/third_footer_atribute.png')}}">
    <img class="footer_atribute" src="{{asset('assets/images/fourth_footer_atribute.png')}}">
  </div>
</footer>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/blog.min.js"></script>


</body>

</html>
