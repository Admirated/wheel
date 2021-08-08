<div class="container" style="padding-bottom: 120px">


    <div class="container" style="background-color: #ffffff; height: 570px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 11px; margin-top: 50px;">

        <div class="container top">
            <div class="redact_title_buttons row " style="  margin: 15px auto;">
                <div class="redact_title_button" style="width: 69px;height: 28px;left: 210px;top: 153px;background: #ffffff;border-radius: 100px;padding-left: 15px;">
                    Цвет
                </div>
                <div class="redact_title_button" style="width: 69px;height: 28px;left: 210px;top: 153px;background: #ffffff;border-radius: 100px; padding-left: 15px;">
                    Текст
                </div>
            </div>
        </div>


        <div class="container response_iphone" style="position: relative; top:40px">
            <input class="table_top_input" id="quest_name" type="text" style="width: 100%;" placeholder="Название колеса">
            <input class="table_top_input" id="quest_name" type="text" style="width: 100%; margin-top: 25px;" placeholder="Название выбраной секции">

            <div class="container" style="max-width: 310px;margin: 0 auto; padding: 0">
                <div class="wrp" style="max-width: 310px">

                </div>

            </div>
            <div class="container" style="max-width: 80px;margin: 0 auto;padding: 0;margin-top: -115px">
                <div class="wrp" style="max-width: 80px">
                    <div id="text_contain" style="    transform: rotate(30deg);  width: 0;  height: 0; top: 40px; position: relative; border-radius: 100%; margin-left: 20px;"></div>
                    <canvas id="myChart" width="400" height="400"></canvas>
                    <div class="wheel_center_white">
                        <h3>76%</h3>
                    </div>
                </div>

            </div>
            <div class="container circle_contain">
                <div class="first_small_redact_circle">

                    <img style="max-width: 9px; max-height: 9px; margin-left: 5px; margin-top: -5px" src="{{asset('assets/images/pen.png')}}">
                </div>
                <div class="second_small_redact_circle">
                    <img style="max-width: 9px; max-height: 9px; margin-left: 5px; margin-top: -5px" src="{{asset('assets/images/pen.png')}}">
                </div>
                <div class="third_small_redact_circle">
                    <img style="max-width: 9px; max-height: 9px; margin-left: 5px; margin-top: -5px" src="{{asset('assets/images/pen.png')}}">
                </div>
                <div class="four_small_redact_circle">
                    <img style="max-width: 9px; max-height: 9px; margin-left: 5px; margin-top: -5px" src="{{asset('assets/images/pen.png')}}">
                </div>
                <div class="fifth_small_redact_circle">
                    <img style="max-width: 9px; max-height: 9px; margin-left: 5px; margin-top: -5px" src="{{asset('assets/images/pen.png')}}">
                </div>
                <div class="six_small_redact_circle">
                    <img style="max-width: 9px; max-height: 9px; margin-left: 5px; margin-top: -5px;" src="{{asset('assets/images/pen.png')}}">
                </div>
                <div class="seven_small_redact_circle">
                    <img style="max-width: 9px; max-height: 9px; margin-left: 5px; margin-top: -5px" src="{{asset('assets/images/pen.png')}}">
                </div>
                <div class="eight_small_redact_circle">
                    <img style="max-width: 9px; max-height: 9px; margin-left: 5px; margin-top: -5px" src="{{asset('assets/images/pen.png')}}">
                </div>
            </div>

        </div>
    </div>
    <div class="container" style="padding-top: 50px; display: flex; justify-content: center">
        <button class="succes_add_button ">
            Coхранить
        </button>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.esm.js" integrity="sha512-iPOvgg5RoL9rL/XjfFdBqjAlStti+ik8BmLYu12vwlD5jgCCdw7R8kI9mtHU7fMUSaRwG+w56i0xrAm/tnVj7w==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.js" integrity="sha512-opXrgVcTHsEVdBUZqTPlW9S8+99hNbaHmXtAdXXc61OUU6gOII5ku/PzZFqexHXc3hnK8IrJKHo+T7O4GRIJcw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/helpers.esm.js" integrity="sha512-VzhPhsLWGZ8kBPi9bHEcIVPOryxNlYq0iPPKUO8gb1sXi8wYGBi4LWx+c8nN/CofeKjSDXWDDtNsABXV6Q3Jfg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/helpers.esm.min.js" integrity="sha512-4OeC7P+qUXB7Kpyeu1r5Y209JLXfCkwGKDpk8vnXzeNGMnpTr6hzOz2lMm7h0oxRBVu2ZCPRkCBPMmIlWsbaHg==" crossorigin="anonymous"></script>
<script src="jquery-3.5.1.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('assets/js/jquery.lettering.js')}}"></script>
<script src="{{asset('assets/js/circletype.min.js')}}  "></script>
<script>
    $( document ).ready(function() {
        const _token = document.getElementsByName("_token")[0].value;
        let persents = 100;
        let formData = new FormData();
        formData.append('_token', _token);

        const send = ts('{{Route('BalanceWheel')}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == true) {
                console.log(result.data);
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',

                    data: {

                        datasets: [],
                        fillOpacity: .2,
                    },
                    options: {
                        responsive: true,

                    },

                });
                let sectors = persents / result.data.circles.length;

                var newDataset = {

                    backgroundColor: [

                    ],
                    data: []
                }
                // console.log(result.data);
                let counts = result.data.circles.length;
                for(let i = 0; i< 8; i++) {
                    let deg = 360/counts;
                    let left;
                    let degs = deg * i;
                    let small_rotate;
                    if(counts === 1) {
                        degs = 60;
                        left = -24
                        small_rotate = -85;
                    }
                    if(counts === 2) {
                        document.getElementById('text_contain').style.marginLeft = '295px';
                        document.getElementById('text_contain').style.transform = 'rotate(190deg)';
                        document.getElementById('text_contain').style.top = '180px';

                        left = 0;
                        degs = deg * i - 5;
                        small_rotate = -95;
                    }
                    if(counts === 3) {
                        document.getElementById('text_contain').style.marginLeft = '295px';
                        document.getElementById('text_contain').style.transform = 'rotate(160deg)';
                        document.getElementById('text_contain').style.top = '103px';

                        left = -5;
                        degs = deg * i - 5;
                        small_rotate = -92;
                    }
                    if(counts === 4) {
                        document.getElementById('text_contain').style.marginLeft = '280px';
                        document.getElementById('text_contain').style.transform = 'rotate(145deg)';
                        document.getElementById('text_contain').style.top = '65px';

                        left = -5;
                        degs = deg * i - 5;
                        small_rotate = -92;
                    }
                    if(counts === 5) {
                        document.getElementById('text_contain').style.marginLeft = '270px';
                        document.getElementById('text_contain').style.transform = 'rotate(135deg)';
                        document.getElementById('text_contain').style.top = '38px';

                        left = -5;
                        degs = deg * i - 5;
                        small_rotate = -92;
                    }
                    if(counts === 6) {
                        document.getElementById('text_contain').style.marginLeft = '253px';
                        document.getElementById('text_contain').style.transform = 'rotate(125deg)';
                        document.getElementById('text_contain').style.top = '15px';

                        left = -5;
                        degs = deg * i - 5;
                        small_rotate = -92;
                    }
                    if(counts === 7) {
                        document.getElementById('text_contain').style.marginLeft = '242px';
                        document.getElementById('text_contain').style.transform = 'rotate(120deg)';
                        document.getElementById('text_contain').style.top = '5px';


                        left = -5;
                        degs = deg * i - 5;
                        small_rotate = -92;
                    }
                    if(counts === 8) {
                        document.getElementById('text_contain').style.marginLeft = '242px';
                        document.getElementById('text_contain').style.transform = 'rotate(120deg)';
                        document.getElementById('text_contain').style.top = '5px';


                        left = -5;
                        degs = deg * i - 5;
                        small_rotate = -92;
                    }

                    if(counts === 9) {
                        document.getElementById('text_contain').style.marginLeft = '263px';
                        document.getElementById('text_contain').style.transform = 'rotate(130deg)';
                        document.getElementById('text_contain').style.top = '24px';


                        left = -5;
                        degs = deg * i - 5;
                        small_rotate = -99;
                    }
                    if(counts === 10) {
                        document.getElementById('text_contain').style.marginLeft = '253px';
                        document.getElementById('text_contain').style.transform = 'rotate(125deg)';
                        document.getElementById('text_contain').style.top = '15px';

                        left = -5;
                        degs = deg * i - 5;
                        small_rotate = -99;
                    }
                    if(counts > 10) {
                        document.getElementById('text_contain').style.marginLeft = '252px';
                        document.getElementById('text_contain').style.transform = 'rotate(125deg)';
                        document.getElementById('text_contain').style.top = '14px';

                        left = -5;
                        degs = deg * i - 5;
                        small_rotate = -99;
                    }
                    document.getElementById('text_contain').innerHTML +='<div style="transform: rotate('+degs+'deg)" class="block2"> <p style="margin-left: '+ left +'px; color: '+ result.data.circles[i].color +'; width: 100px; transform: rotate('+ small_rotate +'deg)" id="'+ i +'"> '+ result.data.circles[i].name +'</p> </div>';
                }

                if(counts === 1) {
                    new CircleType(document.getElementById(0)).radius(120)
                }
                if(counts === 2) {
                    new CircleType(document.getElementById(0)).radius(120)
                    new CircleType(document.getElementById(1)).radius(120)
                }
                if(counts === 3) {
                    new CircleType(document.getElementById(0)).radius(120)
                    new CircleType(document.getElementById(1)).radius(120)
                    new CircleType(document.getElementById(2)).radius(120)
                    document.getElementById(2).style.transform = 'rotate(-99deg)';
                }
                if(counts === 4) {
                    new CircleType(document.getElementById(0)).radius(120)
                    new CircleType(document.getElementById(1)).radius(120)
                    new CircleType(document.getElementById(2)).radius(120)
                    new CircleType(document.getElementById(3)).radius(120)
                    document.getElementById(2).style.marginLeft = '5px';
                    document.getElementById(2).style.transform = 'rotate(-96deg)';
                    document.getElementById(3).style.transform = 'rotate(-97deg)';

                }
                if(counts === 5) {
                    new CircleType(document.getElementById(0)).radius(120)
                    new CircleType(document.getElementById(1)).radius(120)
                    new CircleType(document.getElementById(2)).radius(120)
                    new CircleType(document.getElementById(3)).radius(120)
                    new CircleType(document.getElementById(4)).radius(120)
                    document.getElementById(3).style.transform = 'rotate(-96deg)';
                    document.getElementById(3).style.marginLeft = '0px';
                    document.getElementById(1).style.marginLeft = '0px';
                    document.getElementById(0).style.transform = 'rotate(-94deg)';
                    document.getElementById(0).style.marginLeft = '0px';
                }
                if(counts === 6) {
                    new CircleType(document.getElementById(0)).radius(120)
                    new CircleType(document.getElementById(1)).radius(120)
                    new CircleType(document.getElementById(2)).radius(120)
                    new CircleType(document.getElementById(3)).radius(120)
                    new CircleType(document.getElementById(4)).radius(120)
                    new CircleType(document.getElementById(5)).radius(120)
                }
                if(counts === 7) {
                    new CircleType(document.getElementById(0)).radius(180)
                    new CircleType(document.getElementById(1)).radius(180)
                    new CircleType(document.getElementById(2)).radius(180)
                    new CircleType(document.getElementById(3)).radius(180)
                    new CircleType(document.getElementById(4)).radius(180)
                    new CircleType(document.getElementById(5)).radius(180)

                    document.getElementById(5).style.transform = 'rotate(-88deg)';
                    document.getElementById(5).style.marginLeft = '-5px';
                    document.getElementById(0).style.marginLeft = '-10px';
                    document.getElementById(1).style.marginLeft = '-10px';
                    document.getElementById(2).style.marginLeft = '-10px';
                    document.getElementById(3).style.marginLeft = '-10px';
                    document.getElementById(4).style.marginLeft = '-10px';
                    new CircleType(document.getElementById(6)).radius(180)
                }
                if(counts === 8) {
                    new CircleType(document.getElementById(0)).radius(180)
                    new CircleType(document.getElementById(1)).radius(180)
                    new CircleType(document.getElementById(2)).radius(180)
                    new CircleType(document.getElementById(3)).radius(180)
                    new CircleType(document.getElementById(4)).radius(180)
                    new CircleType(document.getElementById(5)).radius(180)
                    new CircleType(document.getElementById(6)).radius(180)
                    new CircleType(document.getElementById(7)).radius(180)
                    document.getElementById(0).style.transform = 'rotate(-87deg)';
                    document.getElementById(0).style.marginLeft = '-7px';
                    document.getElementById(3).style.transform = 'rotate(-90deg)';
                    document.getElementById(3).style.marginLeft = '-7px';
                    document.getElementById(7).style.transform = 'rotate(-87deg)';
                    document.getElementById(7).style.marginLeft = '-7px';
                }
                if(counts === 9) {

                }
                if(counts === 10) {

                }
                if(counts >=6)
                {
                    for(let i = 0; i< counts; i++)
                    {
                        document.getElementById(i).style.fontSize = '12px';
                        if(counts === 8)
                        {
                            document.getElementById(i).style.fontSize = '10px';
                        }
                    }
                }
                result.data.circles.forEach((index,key) =>{

                    newDataset.backgroundColor.push(index.color);
                    newDataset.data.push(sectors);
                    let degr = 360/counts;
                    let deg = degr * key;



                    let small_deg = deg + 179;
                    if(result.data.circles.length === 3)
                    {
                        small_deg = deg + 145;
                    }
                    if(result.data.circles.length === 4)
                    {
                        small_deg = deg + 130;
                    }
                    if(result.data.circles.length === 5)
                    {
                        small_deg = deg + 120;
                    }
                    if(result.data.circles.length === 6)
                    {
                        small_deg = deg + 115;
                    }
                    if(result.data.circles.length > 6)
                    {
                        small_deg = deg + 115;
                    }
                    if(result.data.circles.length > 9)
                    {
                        small_deg = deg + 105;
                    }
                    if(result.data.circles.length > 11)
                    {
                        small_deg = deg + 100;
                    }
                    if(key == 0)
                    {
                        document.getElementById('circle').style.left = '40px';
                    }
                    if(key == 1)
                    {
                        document.getElementById('circle').style.left = '56px';
                        if(window.innerWidth <=350)
                        {
                            document.getElementById('circle').style.left = '39px';
                        }
                    }


                    if(key === 2)
                    {

                        document.getElementById('circle').style.transform = 'rotate(145deg)';

                        document.getElementById('circle').style.top = '115px';
                        if(window.innerWidth <350)
                        {
                            document.getElementById('circle').style.left = '46px';
                        }
                        else {
                            document.getElementById('circle').style.left = '54px';
                        }


                    }
                    if(key === 3)
                    {

                        document.getElementById('circle').style.transform = 'rotate(133deg)';
                        document.getElementById('circle').style.left = '53px';
                        if(window.innerWidth <350)
                        {
                            document.getElementById('circle').style.top = '120px';
                        }
                        else {
                            document.getElementById('circle').style.top = '110px';
                        }

                    }
                    if(key === 4)
                    {

                        document.getElementById('circle').style.transform = 'rotate(124deg)';

                        if(window.innerWidth <350)
                        {
                            document.getElementById('circle').style.left = '42px';
                            document.getElementById('circle').style.top = '114px';
                        }


                        else {
                            document.getElementById('circle').style.left = '49px';
                            document.getElementById('circle').style.top = '98px';
                        }

                    }
                    if(key === 5)
                    {
                        document.getElementById('circle').style.transform = 'rotate(118deg)';
                        if(window.innerWidth <350)
                        {
                            document.getElementById('circle').style.top = '110px';
                        }

                        else {
                            document.getElementById('circle').style.top = '95px';
                        }
                        document.getElementById('circle').style.left = '48px';

                    }
                    if(key === 6)
                    {
                        document.getElementById('circle').style.transform = 'rotate(115deg)';
                        if(window.innerWidth <350)
                        {
                            document.getElementById('circle').style.top = '107px';
                        }

                        else {
                            document.getElementById('circle').style.top = '95px';
                        }
                        document.getElementById('circle').style.left = '44px';
                    }
                    if(key === 7)
                    {
                        document.getElementById('circle').style.transform = 'rotate(110deg)';

                        document.getElementById('circle').style.top = '92px';
                        document.getElementById('circle').style.left = '44px';
                    }
                    if(key === 8)
                    {
                        document.getElementById('circle').style.transform = 'rotate(110deg)';

                        document.getElementById('circle').style.top = '92px';
                        document.getElementById('circle').style.left = '44px';
                    }
                    if(key === 9)
                    {
                        document.getElementById('circle').style.transform = 'rotate(105deg)';

                        document.getElementById('circle').style.top = '90px';
                        document.getElementById('circle').style.left = '38px';
                    }
                    if(key >= 10)
                    {
                        document.getElementById('circle').style.transform = 'rotate(105deg)';

                        document.getElementById('circle').style.top = '90px';
                        document.getElementById('circle').style.left = '38px';
                    }
                    // let small_deg = deg + 40;

                    document.getElementById('circle').innerHTML+=' <div class="block" style="transform: rotate('+ deg +'deg);">  <div  class="small_eight_elipse" style="background-color: '+ index.color +'; transform: rotate(-'+ small_deg +'deg)">\n' +
                        '            <h3 style="margin: 0 auto; min-width: 34px!important; margin-left: 8px;">'+ index.percent +'%</h3>\n' +
                        '        </div> </div>'
                })

                for(let i = 0; i < 10; i++) {


                    if (i === 0 ) {
                        newDataset.backgroundColor = [];
                        result.data.circles.forEach((index,key) => {


                            if(index.percent < 99) {
                                newDataset.backgroundColor.push('#E5E5E5');
                            }
                            if(index.percent >= 99) {
                                newDataset.backgroundColor.push(index.color);
                            }
                        })

                        myChart.data.datasets.push({
                            data: newDataset.data,
                            backgroundColor: newDataset.backgroundColor
                        });
                    }
                    if (i === 1) {
                        newDataset.backgroundColor = [];
                        result.data.circles.forEach((index,key) => {

                            if(index.percent < 90) {
                                newDataset.backgroundColor.push('#E5E5E5');
                            }
                            if(index.percent >=90) {
                                newDataset.backgroundColor.push(index.color);
                            }
                        })

                        myChart.data.datasets.push({
                            data: newDataset.data,
                            backgroundColor: newDataset.backgroundColor
                        });
                    }
                    if (i === 2) {

                        newDataset.backgroundColor = [];
                        result.data.circles.forEach((index,key) => {

                            if(index.percent <80) {
                                newDataset.backgroundColor.push('#E5E5E5');
                            }
                            if(index.percent >=80) {
                                newDataset.backgroundColor.push(index.color);
                            }
                        })

                        myChart.data.datasets.push({
                            data: newDataset.data,
                            backgroundColor: newDataset.backgroundColor
                        });
                    }
                    if (i === 3) {
                        newDataset.backgroundColor = [];
                        result.data.circles.forEach((index,key) => {

                            if(index.percent <70) {
                                newDataset.backgroundColor.push('#E5E5E5');
                            }
                            if(index.percent >=70) {
                                newDataset.backgroundColor.push(index.color);
                            }
                        })

                        myChart.data.datasets.push({
                            data: newDataset.data,
                            backgroundColor: newDataset.backgroundColor
                        });
                    }
                    if (i === 4) {
                        newDataset.backgroundColor = [];
                        result.data.circles.forEach((index,key) => {

                            if(index.percent <= 60) {
                                newDataset.backgroundColor.push('#E5E5E5');
                            }
                            if(index.percent >60) {
                                newDataset.backgroundColor.push(index.color);
                            }
                        })

                        myChart.data.datasets.push({
                            data: newDataset.data,
                            backgroundColor: newDataset.backgroundColor
                        });
                    }
                    if (i === 5) {
                        newDataset.backgroundColor = [];
                        result.data.circles.forEach((index,key) => {

                            if(index.percent <= 50) {
                                newDataset.backgroundColor.push('#E5E5E5');
                            }
                            if(index.percent > 50) {
                                newDataset.backgroundColor.push(index.color);
                            }
                        })

                        myChart.data.datasets.push({
                            data: newDataset.data,
                            backgroundColor: newDataset.backgroundColor
                        });
                    }
                    if (i === 6) {
                        newDataset.backgroundColor = [];
                        result.data.circles.forEach((index,key) => {

                            if(index.percent <= 40) {
                                newDataset.backgroundColor.push('#E5E5E5');
                            }
                            if(index.percent > 40) {
                                newDataset.backgroundColor.push(index.color);
                            }
                        })

                        myChart.data.datasets.push({
                            data: newDataset.data,
                            backgroundColor: newDataset.backgroundColor
                        });
                    }
                    if (i === 7) {
                        newDataset.backgroundColor = [];
                        result.data.circles.forEach((index,key) => {

                            if(index.percent <= 30) {
                                newDataset.backgroundColor.push('#E5E5E5');
                            }
                            if(index.percent > 30) {
                                newDataset.backgroundColor.push(index.color);
                            }
                        })

                        myChart.data.datasets.push({
                            data: newDataset.data,
                            backgroundColor: newDataset.backgroundColor
                        });
                    }
                    if (i === 8) {
                        newDataset.backgroundColor = [];
                        result.data.circles.forEach((index,key) => {

                            if(index.percent <= 20) {
                                newDataset.backgroundColor.push('#E5E5E5');
                            }
                            if(index.percent > 20) {
                                newDataset.backgroundColor.push(index.color);
                            }
                        })

                        myChart.data.datasets.push({
                            data: newDataset.data,
                            backgroundColor: newDataset.backgroundColor
                        });
                    }
                    if (i === 9) {
                        newDataset.backgroundColor = [];
                        result.data.circles.forEach((index,key) => {

                            if(index.percent <= 10) {
                                newDataset.backgroundColor.push('#E5E5E5');
                            }
                            if(index.percent > 10) {
                                newDataset.backgroundColor.push(index.color);
                            }
                        })

                        myChart.data.datasets.push({
                            data: newDataset.data,
                            backgroundColor: newDataset.backgroundColor
                        });
                    }


                }

                myChart.update();

            } else {
                alert(result.error);
            }
        })
    });
</script>
