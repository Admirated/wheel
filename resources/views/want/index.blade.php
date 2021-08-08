<div class="container" style="padding-bottom: 120px">

@csrf
    <div class="container" style="background-color: #ffffff; height: 195px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">

        <div class="container">
            <table class="custom_table">
                <tbody class="table_head">
                <tr>
                    <td style="border-bottom:2px solid #1DAE42;">Я хочу...</td>

                    <td style=" border-bottom:2px solid #1DAE42;border-left: 1.5px solid #C4C4C4; padding-left: 8px;">что я могу для этого сделать</td>
                </tr>
                </tbody>
                <tbody class="table_body">
                <tr>
                    <td style="border-bottom: 2px solid #C4C4C4;"> <input id="title" type="text" style="border:none;max-width: 120px; outline: none" placeholder="Текст"> </td>

                    <td style="border-left: 1.5px solid #C4C4C4;border-bottom: 2px solid #C4C4C4;"><input id="descript" type="text" style="border:none;  outline: none; max-width: 120px;" placeholder="Текст"></td>
                </tr>
                </tbody>
            </table>
            <div class="container top" style="padding-top: 40px">
                <div onclick="Add()" class="redact_title_buttons  " style="width: 131px;height: 38px;background: #FFFFFF;border: 1.5px solid #858589;border-radius: 100px;margin-top: 40px;">
                    <p>Coздать</p>
                </div>

            </div>
        </div>


    </div>
    <style>

        @media screen and (max-width: 350px){
            #title
            {
                max-width: 100px!important;
            }
            #descript
            {
                max-width: 100px!important;
            }

        }
        p{
            word-wrap: break-word!important;
        }
    </style>
    <div id="add">
    @foreach($PageInfo as $result)
        <div class="container row" style="background-color: #ffffff; height: auto; min-height:50px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 20px;">

            <div style="width: 50%; border-right: 2px solid #C4C4C4;" class="quest_text_block"><p>{{$result->title}}<p></div>
            <div style="width: 50%" class="quest_text_block row justify-content-between"><p style="width: 95%;">{{$result->descript}}<p>
                    <img style="max-width: 4px; max-height: 20px;" src="{{asset('assets/images/dots.png')}}"> </div>
        </div>
    @endforeach
</div>
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function Add()
    {
        const _token = document.getElementsByName("_token")[0].value;
        let title = document.getElementById('title').value;
        let descript = document.getElementById('descript').value;
        let formData = new FormData();
        formData.append('_token', _token);
        formData.append('title', title);
        formData.append('descript', descript);
        const send = ts('{{Route('CreateToHabit')}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == true) {
                let elem=' <div class="container row" style="background-color: #ffffff; height: auto; min-height:50px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 20px;">\n' +
                    '\n' +
                    '            <div style="width: 50%; border-right: 2px solid #C4C4C4;" class="quest_text_block"><p>'+ title +'<p></div>\n' +
                    '            <div style="width: 50%" class="quest_text_block row justify-content-between"><p style="width: 95%;">'+ descript +'<p>\n' +
                    '                    <img style="max-width: 4px; max-height: 20px;" src="{{asset('assets/images/dots.png')}}"> </div>\n' +
                    '        </div> '+ document.getElementById('add').innerHTML;
                document.getElementById('add').innerHTML = elem;
                document.getElementById('title').value = '';
                document.getElementById('descript').value = '';
            }
            else{
                alert(result.error)
            }
        })
    }
</script>
