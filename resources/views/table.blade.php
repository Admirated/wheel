<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

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
<div class="container">

        <div class="navigate_wrapper row justify-content-between left">
            <div class="back_block">
                <a href="makeQuest"> <img width="24" height="24" style="max-width: 24px; max-height: 24px;" src="{{asset('assets/images/corner-up-left.png')}}"></a>
            </div>
            <div class="page_title_block">
                <h1>Be Better</h1>
                <p>Колесо баланса</p>
            </div>
            <div class="menu_block">
                <div class="contain_dots">
                    <div class="dot"></div>
                </div>
            </div>
        </div>

    <div class="container" style="background-color: #ffffff; height: 195px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">

        <div class="container">
            <table class="custom_table">
                <tbody class="table_head">
                <tr>
                    <td style="border-bottom:2px solid #1DAE42;">Я не хочу...</td>

                    <td style=" border-bottom:2px solid #1DAE42;border-left: 1.5px solid #C4C4C4; padding-left: 8px;">Как я могу это изменить</td>
                </tr>
                </tbody>
                <tbody class="table_body">
                <tr>
                    <td style="border-bottom: 2px solid #C4C4C4;"> <input id="inp" type="text" style="border:none;min-width: 100px; outline: none" placeholder="Текст"> </td>

                    <td style="border-left: 1.5px solid #C4C4C4;border-bottom: 2px solid #C4C4C4;"><input id="inp" type="text" style="border:none;  outline: none; min-width: 100px;" placeholder="Текст"></td>
                </tr>
                </tbody>
            </table>
            <div class="container top" style="padding-top: 40px">
                <div class="redact_title_buttons  " style="width: 131px;height: 38px;background: #FFFFFF;border: 1.5px solid #858589;border-radius: 100px;margin-top: 40px;">
                    <p>Coздать</p>
                </div>

            </div>
        </div>


    </div>
    <div class="container row" style="background-color: #ffffff; height: 75px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">

      <div style="width: 50%; border-right: 2px solid #C4C4C4;" class="quest_text_block"><p>Больше жить в Аскае<p></div>
        <div style="width: 50%" class="quest_text_block row justify-content-between"><p>Переехать<p>
        <img style="max-width: 4px; max-height: 20px;" src="{{asset('assets/images/dots.png')}}"> </div>
    </div>

    <div class="container row" style="background-color: #ffffff; height: 75px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">

        <div style="width: 50%; border-right: 2px solid #C4C4C4" class="quest_text_block"><p>Больше жить в Аскае<p></div>
        <div style="width: 50%" class="quest_text_block row justify-content-between"><p>Переехать<p>
                <img style="max-width: 4px; max-height: 20px;" src="{{asset('assets/images/dots.png')}}"> </div>
    </div>
    </div>

</div>

</body>
</html>
