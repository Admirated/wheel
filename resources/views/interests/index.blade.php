<div  style="padding-bottom: 130px!important;" class="container">

    @csrf
    <div class="container" style="background-color: #ffffff; height: 150px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">

        <div class="container">
            <input class="table_top_input" id="text" type="text" style="width: 100%;" placeholder="Интересы">
            <div class="container top" style="padding-top: 40px">
                <div onclick="Add()" class="redact_title_buttons  " style="width: 131px;height: 38px;background: #FFFFFF;border: 1.5px solid #858589;border-radius: 100px;margin-top: 30px!important;">
                    <p>Добавить</p>
                </div>

            </div>
        </div>


    </div>
    <style>
        p{
            word-wrap: break-word!important;
        }
    </style>
    <div id="add">
    @foreach($PageInfo as $result)
    <div class="container row" style="background-color: #ffffff;  height: auto; min-height:50px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 20px;">

        <div style="width: 100%" class="quest_text_block row justify-content-between"><p style="width: 98%; word-break: break-word">{{$result->text}}<p>
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
        let text = document.getElementById('text').value;
        let formData = new FormData();
        formData.append('_token', _token);
        formData.append('text', text);
        const send = ts('{{Route('CreateInterests')}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == true) {
                let elem='    <div class="container row" style="background-color: #ffffff;  height: auto; min-height:50px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 20px;">\n' +
                    '\n' +
                    '        <div style="width: 100%" class="quest_text_block row justify-content-between"><p style="width: 98%; word-break:break-word;">'+ text +'<p>\n' +
                    '                <img style="max-width: 4px; max-height: 20px;" src="{{asset('assets/images/dots.png')}}"> </div>\n' +
                    '    </div>'+ document.getElementById('add').innerHTML;
                document.getElementById('add').innerHTML = elem;
                document.getElementById('text').value = '';
            }
            else{
                alert(result.error)
            }
        })
    }
</script>



