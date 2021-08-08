<div class="container " style="padding-bottom: 120px; overflow-x: hidden;">
   <div class="row justify-content-between wheel_margin_top">
      <div style="text-align: center">
         <div class="circle_block" onclick="Navigate('http://app.vprockit.ru/RandomText')">
            <img style="max-width: 54px; max-height: 54px;" src="{{asset('assets/images/message.png')}}">
         </div>
         <p>Цели</p>
      </div>
      <div onclick="Navigate('http://app.vprockit.ru/notes')" style="text-align: center">
         <div class="circle_block" style="padding: 12px;">
            <img style="max-width: 16px; max-height: 24px;" src="{{asset('assets/images/idea.png')}}">
         </div>
         <p>Задачи</p>
      </div>
   </div>
    <div class="container response_iphone"></div>
        <a href="{{Route('page', ['page' => 'chooseWheels'])}}">
            <div class="container" style="max-width: 280px;margin: 0 auto; padding: 0">
                <div class="wrp" style="max-width: 280px; margin-top: 0px">
                    @csrf
                    <div id="rotating">
                        <div id="circle" class="container" style=" position: relative; top:150px; left: 35px; transform: rotate(178deg)" ></div>
                        <div class="text-sections"></div>
                        <div id="text_contain" style="    transform: rotate(30deg);  width: 0;  height: 0; top: 40px; position: relative; border-radius: 100%; margin-left: 20px;"></div>
                    </div>
                        <div style="max-width: 250px; max-height: 250px; min-width: 250px; min-height: 250px; margin: 0 auto; padding-top: -20px;"> <div class="wheel_center ">
                                @php
                                    $percent = 0;
                                    $count = count($PageInfo);
                                    foreach($PageInfo as $result){
                                        $percent += $result['percent'];
                                    }
                                    if($count > 0){
                                        $percent = $percent / $count;
                                    } else {
                                        $percent = 100;
                                    }
                                    if(is_int($percent) == false){
                                        $percent = number_format($percent, 2, ',', '');
                                    }
                                @endphp
                                <h3>{{$percent}}%</h3>
                            </div>
                            
                                <canvas id="myChart" width="400" height="400"></canvas>
                          
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
                <style>
                    .block {

                        width: 179px;
                        height: 60px;
                        transform-origin: 100% 26px;
                        position: absolute;
                    }
                    .block2 {

                        width: 162px;
                        height: 60px;
                        transform-origin: 100% 26px;
                        position: absolute;
                    }
                    #rotating {
                        position: relative;
                    }
                    .text-sections {
                        width: 275px;
                        height: 275px;
                        overflow: hidden;
                        border-radius: 50%;
                        position: absolute;
                        z-index: -1;
                        top: -8px;
                        left: 3px;
                    }

                    .sector {
                        width: 50%;
                        height: 50%;
                        position: absolute;
                        left: 50%;
                        top: 0;
                        transform-origin: left bottom;
                    }

                    .text-sections:after {
                        content: '';
                        position: absolute;
                        width: 80%;
                        height: 80%;
                        background: #fff;
                        border-radius: 50%;
                        top: 11%;
                        left: 10%;
                    }

                    @media screen and (max-width: 350px){

                        .block {

                            width: 160px;
                            height: 60px;
                            transform-origin: 98% 26px;
                            position: absolute;
                            left: -3px;
                        }

                    }
                    .square {
                        background: yellow;

                        width: 50px;
                        height: 50px;
                        border-radius: 50%;
                    }

                </style>

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
                                for(let i = 0; i< counts; i++) {
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
                                        document.getElementById('text_contain').style.marginLeft = '233px';
                                        document.getElementById('text_contain').style.transform = 'rotate(115deg)';
                                        document.getElementById('text_contain').style.top = '-7px';

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
                                    let arr = result.data.circles[i].circle.split('');
                                    let shortArr = [];
                                    if(arr.length <= 9)
                                    {
                                        for(let i = 0; i < 7; i++)
                                        {
                                            shortArr.push(arr[i]);
                                        }
                                    }
                                    if(arr.length>9)
                                    {
                                        for(let i = 0; i < 7; i++)
                                        {
                                            shortArr.push(arr[i]);
                                        }

                                    }
                                    console.log(shortArr)
                                    result.data.circles[i].circle = shortArr.join('');
                                    let j = result.data.circles[i].id;
                                    document.getElementById('text_contain').innerHTML +='<a href="http://app.vprockit.ru/chooseBig/'+ j +'"><div style="transform: rotate('+degs+'deg)" class="block2"> <p style="margin-left: '+ left +'px; color: #ffffff;font-weight: 600; width: 100px; text-shadow: black 1px -1px 10px; transform: rotate('+ small_rotate +'deg)" id="'+ i +'"> '+ result.data.circles[i].circle +'</p> </div></a>';
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

                                    document.getElementById(0).style.transform = 'rotate(-88deg)';
                                    document.getElementById(1).style.transform = 'rotate(-88deg)';
                                    document.getElementById(2).style.transform = 'rotate(-88deg)';
                                    document.getElementById(3).style.transform = 'rotate(-88deg)';
                                    document.getElementById(4).style.transform = 'rotate(-88deg)';
                                    document.getElementById(4).style.marginLeft = '-8px';
                                    document.getElementById(5).style.transform = 'rotate(-88deg)';
                                    document.getElementById(6).style.transform = 'rotate(-88deg)';
                                    document.getElementById(7).style.transform = 'rotate(-88deg)';
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
                        let dataset = [
                            {
                                value: 12.5,
                                color: '#00B912'
                            }, {
                                value: 12.5,
                                color: '#7300B9'
                            }, {
                                value: 12.5,
                                color: '#FF00D6'
                            }, {
                                value: 12.5,
                                color: '#ffd200'
                            }, {
                                value: 12.5,
                                color: '#FF4D00'
                            }, {
                                value: 12.5,
                                color: '#02dae8'
                            }, {
                                value: 12.5,
                                color: '#B90000'
                            }, {
                                value: 12.5,
                                color: '#0007B9'
                            }
                                                ];

                        let maxValue = 25;
                        let container = $('.text-sections');

                        let addSector = function(data, startAngle, collapse) {
                            let sectorDeg = 3.6 * data.value;
                            let skewDeg = 90 + sectorDeg;
                            let rotateDeg = startAngle;
                            if (collapse) {
                                skewDeg++;
                            }

                            let sector = $('<div>', {
                                'class': 'sector'
                            }).css({
                                'background': data.color,
                                'transform': 'rotate(' + rotateDeg + 'deg) skewY(' + skewDeg + 'deg)'
                            });
                            container.append(sector);

                            return startAngle + sectorDeg;
                        };

                        dataset.reduce(function (prev, curr) {
                            return (function addPart(data, angle) {
                                if (data.value <= maxValue) {
                                    return addSector(data, angle, false);
                                }

                                return addPart({
                                    value: data.value - maxValue,
                                    color: data.color
                                }, addSector({
                                    value: maxValue,
                                    color: data.color,
                                }, angle, true));
                            })(curr, prev);
                        }, 0);

                        (function() {
                           const dropdown = document.querySelector('.wrapper-dropdown'),
                              trigger = document.querySelector('.dropdown-trigger'),
                              dropdownTitle = document.querySelector('.dropdown-title'),
                              dropdownLi = document.querySelectorAll('.dropdown-li'),
                              ul = document.querySelectorAll('.dropdown');
                              
                           trigger.addEventListener('click', (e) => {
                              dropdown.classList.toggle('active');
                           });

                           dropdownLi.forEach(li => {
                              li.addEventListener('click', (e) => {
                                 dropdown.classList.remove('active');
                                 switch (e.target.id) {
                                    case 'purposes':
                                       dropdownTitle.textContent = 'Цели';
                                       break;
                                    case 'quests':
                                       dropdownTitle.textContent = 'Задачи';
                                       break;
                                    case 'actions':
                                       dropdownTitle.textContent = 'Действия';
                                       break;
                                    default:
                                       break;   
                                 }
                              })
                           });
                        }());
                    });
                </script>

                <style>
                    .wheel_center
                    {
                        width: 120px;
                        height: 120px;
                        border-radius: 100%;
                        border: 7px solid #ffffff;
                        margin: 0 auto;
                        z-index: 9999;
                        position: absolute;
                        margin-top: 70px;
                        margin-left: 65px;
                        background: #3139FF;
                        padding: 30px;

                        display: flex;
                        justify-content: center;
                        align-items: center;
                        text-align: center;
                    }
                    .wheel_center>h3
                    {
                        font-family: 'SF Pro Display', sans-serif;
                        font-style: normal;
                        font-weight: bold;
                        font-size: 25px;
                        line-height: 30px;
                        /* identical to box height */
                        margin: auto;


                        color: #FFFFFF;
                    }
                </style>
            </div>
        </a>
    <div class="row justify-content-between wheel_margin_top" style="margin-top: 45px;">

        <div style="text-align: center">
            <div onclick="Navigate('http://app.vprockit.ru/RandomText')" class="circle_block">
                <img style="max-width: 54px; max-height: 54px;" src="{{asset('assets/images/message.png')}}">
            </div>
            <p>Цитата</p>
        </div>
        <div style="text-align: center">
            <div onclick="Navigate('http://app.vprockit.ru/notes')" class="circle_block" style="padding: 12px;">
                <img style="max-width: 16px; max-height: 24px;" src="{{asset('assets/images/idea.png')}}">
            </div>
            <p>Идеи</p>
        </div>

    </div>

    <div class="question_containe">
        <div class="question_title row justify-content-between">
            <div class="question_title row">
                <h1 class="dropdown-title">Цели</h1>
                <div style="margin-top: 0; background: none; margin-left: 5px;" class="question_dropdown wrapper-dropdown">
                  <div style="transform: rotate(89deg); background: none; margin-top: -5px;">
                    <svg class="dropdown-trigger" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 12px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                  </div>
                  <ul class="dropdown" style="width: 100px;left: -5px; top: 29px;">
                        <li class="dropdown-li" style="line-height: 14px;margin-top: 5px;"><a id="purposes">Цели</a></li>
                        <li class="dropdown-li" style="line-height: 12px;margin-top: 5px;"><a id="quests">Задачи</a></li>
                        <li class="dropdown-li" style="line-height: 12px;margin-top: 5px;"><a id="actions">Действия</a></li>
                  </ul>
                </div>
            </div>
            <a href="{{Route('page', ['page' => 'MakeWheel'])}}" style=" color: black;"><div><i class="fa fa-plus" aria-hidden="true"></i></div></a>
        </div>


         
        @foreach($PageInfo as $result)
            <a href="{{Route('chooseBig', ['page' => 'chooseBig', 'id' => $result['info']->id])}}">
            
                <div class="question_content_block" style="border-bottom-color: {{$result['info']->color}};">

                    <div class="container row justify-content-between">
                        <div>
                            <h5 style="margin-top:15px; ">{{$result['info']->name}}</h5>
                            <p style="margin-top:-5px;">{{$result['info']->small_descript}}</p>
                        </div>

                        <div class="question_percent_block" style="color: {{$result['info']->color}};">
                            <h2 style="margin-top:8px; color: {{$result['info']->color}};" >{{$result['percent']}}%</h2>
                            <h3 style="margin-top:-8px; margin-left: -10px; color: {{$result['info']->color}}">Завтра  <img style="max-width: 4px; max-height: 20px; margin-left: 10px; margin-top: -22px;" src="{{asset('assets/images/dots.png')}}"></h3>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
            



</div>
<script>
    function Navigate(href) {

        window.location.href = href;
    }
</script>
