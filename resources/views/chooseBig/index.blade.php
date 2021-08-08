<div class="container " style="padding-bottom: 120px; overflow-x: hidden">

    <div class="response_iphone" style="left: 0!important;">
    <a href="{{Route('chooseBig', ['page' => 'MakeNewQuest', 'id' => $PageInfo['id']])}}">
            <div class="container" style="max-width: 280px;margin: 0 auto; padding: 0">
                <div class="wrp" style="max-width: 280px; margin-top: 45px;">
                    @csrf
                    <div id="rotating">

                        <div id="circle" class="container" style=" position: relative; top:150px; left: 53px; transform: rotate(178deg)" ></div>
                        <div id="text_contain" style="    transform: rotate(30deg);  width: 0;  height: 0; top: 40px; position: relative; border-radius: 100%; margin-left: 20px;"></div>
                    </div>
                        <div style="max-width: 250px; max-height: 250px; min-width: 250px; min-height: 250px; margin: 0 auto; padding-top: -20px;"> <div class="wheel_center ">

                                <h3>{{$PageInfo['percent']}}%</h3>
                            </div> <canvas id="myChart" width="400" height="400"></canvas> </div>

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

                        width: 163px;
                        height: 60px;
                        transform-origin: 100% 26px;
                        position: absolute;
                    }

                    @media screen and (max-width: 350px){

                        .block {

                            width: 160px;
                            height: 60px;
                            transform-origin: 98% 26px;
                            position: absolute;
                            left: 0px;
                        }


                    }
                    .square {
                        background: yellow;

                        width: 50px;
                        height: 50px;
                        border-radius: 50%;
                    }

                </style>

                <script src="jquery-3.5.1.min.js"></script>

                <script>

                    $( document ).ready(function() {
                        const _token = document.getElementsByName("_token")[0].value;
                        let persents = 100;
                        let formData = new FormData();
                        formData.append('_token', _token);
                        formData.append('id', '{{$PageInfo["id"]}}');
                        const send = ts('{{Route('ChooseCircle')}}', 'POST', formData);
                        send.then((result) => {
                            console.log(result);
                            if (result.status == true) {
                                console.log('Result data', result.data);
                                var ctx = document.getElementById('myChart');
                                console.log('ctx', ctx);
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
                                       document.getElementById('text_contain').style.marginTop = '14px';

                                       left = -5;
                                       degs = deg * i - 5;
                                       small_rotate = -99;
                                   }
                                   let arr = result.data.circles[i].name.split('');
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
                                   result.data.circles[i].name = shortArr.join('');
                                   console.log(arr);
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
                                    document.getElementById(2).style.transform = 'rotate(-100deg)';
                                    document.getElementById(2).style.marginLeft = '0px';

                                }
                                if(counts === 4) {
                                    new CircleType(document.getElementById(0)).radius(120)
                                    new CircleType(document.getElementById(1)).radius(120)
                                    new CircleType(document.getElementById(2)).radius(120)
                                    new CircleType(document.getElementById(3)).radius(120)
                                    document.getElementById(0).style.marginLeft = '-10px';
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
                                    document.getElementById(0).style.marginLeft = '-7px';
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

                                    document.getElementById(5).style.transform = 'rotate(-83deg)';
                                    document.getElementById(5).style.marginLeft = '-10px';
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

                            for(let i = 0; i < 5; i++) {


                                if (i === 0 ) {
                                    newDataset.backgroundColor = [];
                                        result.data.circles.forEach((index,key) => {


                                            if(index.percent < 80) {
                                                newDataset.backgroundColor.push('#E5E5E5');
                                            }
                                            if(index.percent >= 80) {
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

                                        if(index.percent < 60) {
                                            newDataset.backgroundColor.push('#E5E5E5');
                                        }
                                        if(index.percent >=60) {
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

                                        if(index.percent <40) {
                                            newDataset.backgroundColor.push('#E5E5E5');
                                        }
                                        if(index.percent >=40) {
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

                                        if(index.percent <20) {
                                            newDataset.backgroundColor.push('#E5E5E5');
                                        }
                                        if(index.percent >=20) {
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

                                        if(index.percent <= 0) {
                                            newDataset.backgroundColor.push('#E5E5E5');
                                        }
                                        if(index.percent >0) {
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
                
                        const questionCheckbox = document.querySelectorAll('.question_checkbox')
                              
                        questionCheckbox.forEach(question => {
                            question.addEventListener('change', (e) => {
                                if (e.target.type === 'checkbox') {
                                    if (e.target.checked) {
                                        question.parentNode.querySelector('h5').classList.add('checked');
                                    } else {
                                        question.parentNode.querySelector('h5').classList.remove('checked');
                                    }
                                }
                            });
                        });
                        const dropdowns = document.querySelectorAll('.wrapper-dropdown'),
                              text = document.querySelectorAll('.quest_text'),
                              ul = document.querySelectorAll('.dropdown'),
                              deleteBtns = document.querySelectorAll('#deleteQuest'),
                              questionBlocks = document.querySelectorAll('.question_content_block');

                        text.forEach((dots, i) => {
                            dots.addEventListener('click', (e) => {
                                dropdowns.forEach((dropdown, index) => {
                                    if (index === i) {
                                        dropdown.classList.toggle('active');
                                    } else {
                                        if (dropdown.classList.contains('active')) {
                                            dropdown.classList.remove('active')
                                        }
                                    }
                                })
                            });
                            deleteBtns.forEach((btn, idx) => {
                            btn.addEventListener('click', () => {
                                if (idx === i) {
                                    questionBlocks[i].remove();
                                }
                            });
                        });
                        });
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
                    .checked {
                        text-decoration: line-through;
                    }
                    @-moz-keyframes dothabottomcheck {
                           0% {
                              height: 0;
                           }
                           100% {
                              height: 50px;
                           }
                     }
                     @-webkit-keyframes dothabottomcheck {
                           0% {
                              height: 0;
                           }
                           100% {
                              height: 50px;
                           }
                     }
                     @keyframes dothabottomcheck {
                           0% {
                              height: 0;
                           }
                           100% {
                              height: 50px;
                           }
                     }
                     @keyframes dothatopcheck {
                           0% {
                              height: 0;
                           }
                           50% {
                              height: 0;
                           }
                           100% {
                              height: 120px;
                           }
                     }
                     @-webkit-keyframes dothatopcheck {
                           0% {
                              height: 0;
                           }
                           50% {
                              height: 0;
                           }
                           100% {
                              height: 120px;
                           }
                     }
                     @-moz-keyframes dothatopcheck {
                           0% {
                              height: 0;
                           }
                           50% {
                              height: 0;
                           }
                           100% {
                              height: 120px;
                           }
                     }
                     input[type=checkbox] {
                        display: none;
                     }

                  .check-box {
                     height: 100px;
                     width: 100px;
                     background-color: transparent;
                     border: 10px solid #000;
                     border-radius: 5px;
                     position: absolute;
                     display: inline-block;
                     -moz-box-sizing: border-box;
                     -webkit-box-sizing: border-box;
                     box-sizing: border-box;
                     -moz-transition: border-color ease 0.2s;
                     -o-transition: border-color ease 0.2s;
                     -webkit-transition: border-color ease 0.2s;
                     transition: border-color ease 0.2s;
                     cursor: pointer;
                  }
                  .check-box::before, .check-box::after {
                     -moz-box-sizing: border-box;
                     -webkit-box-sizing: border-box;
                     box-sizing: border-box;
                     position: absolute;
                     height: 0;
                     width: 20px;
                     background-color: #34b93d;
                     display: inline-block;
                     -moz-transform-origin: left top;
                     -ms-transform-origin: left top;
                     -o-transform-origin: left top;
                     -webkit-transform-origin: left top;
                     transform-origin: left top;
                     border-radius: 5px;
                     content: " ";
                     -webkit-transition: opacity ease 0.5;
                     -moz-transition: opacity ease 0.5;
                     transition: opacity ease 0.5;
                  }
                  .check-box::before {
                     top: 72px;
                     left: 41px;

                     -moz-transform: rotate(-135deg);
                     -ms-transform: rotate(-135deg);
                     -o-transform: rotate(-135deg);
                     -webkit-transform: rotate(-135deg);
                     transform: rotate(-135deg);
                  }
                  .check-box::after {
                     top: 37px;
                     left: 5px;
                     -moz-transform: rotate(-45deg);
                     -ms-transform: rotate(-45deg);
                     -o-transform: rotate(-45deg);
                     -webkit-transform: rotate(-45deg);
                     transform: rotate(-45deg);
                  }

                  input[type=checkbox]:checked + .check-box,
                  .check-box.checked {
                     border-color: #34b93d;
                  }
                  input[type=checkbox]:checked + .check-box::after,
                  .check-box.checked::after {
                     height: 50px;
                     -moz-animation: dothabottomcheck 0.2s ease 0s forwards;
                     -o-animation: dothabottomcheck 0.2s ease 0s forwards;
                     -webkit-animation: dothabottomcheck 0.2s ease 0s forwards;
                     animation: dothabottomcheck 0.2s ease 0s forwards;
                  }
                  input[type=checkbox]:checked + .check-box::before,
                  .check-box.checked::before {
                     height: 120px;
                     -moz-animation: dothatopcheck 0.4s ease 0s forwards;
                     -o-animation: dothatopcheck 0.4s ease 0s forwards;
                     -webkit-animation: dothatopcheck 0.4s ease 0s forwards;
                     animation: dothatopcheck 0.4s ease 0s forwards;
                  }
                </style>
            </div>
        </a>
    <div style="margin-top: 15px;" class="row justify-content-between wheel_margin_top">

        <div onclick="Navigate('http://app.vprockit.ru/RandomText')" style="text-align: center">
            <div class="circle_block">
                <img style="max-width: 54px; max-height: 54px;" src="{{asset('assets/images/message.png')}}">
            </div>
            <p>Цитата</p>
        </div>
        <div onclick="Navigate('http://app.vprockit.ru/notes')" style="text-align: center">
            <div class="circle_block" style="padding: 12px;">
                <img style="max-width: 16px; max-height: 24px;" src="{{asset('assets/images/idea.png')}}">
            </div>
            <p>Идеи</p>
        </div>

    </div>
        <div class="question_containe">
            <div class="question_title row justify-content-between">
                <div class="question_title row">
                    <h1>Задачи</h1>
                    <div style="transform: rotate(87deg); margin-top: -5px;">
                        <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004; width: 12px" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg>
                    </div>
                </div>
                <a href="{{Route('chooseBig', ['page' => 'MakeNewQuest', 'id' => $PageInfo['id']])}}" style="color: black;"><div><i class="fa fa-plus" aria-hidden="true"></i></div></a>
            </div>
        @foreach($PageInfo['task'] as $result)
                <div class="question_content_block" style="border-bottom-color: {{$result->color}};">
                    
                    <div class="container row justify-content-between pe-0" style="flex-wrap: nowrap; width: 100%;">
                        <div class="col-7" style="color:{{$result->color}};">
                            <h5 style="margin-top:5px;">{{$result->name}}</h5>
                            <p style="margin-top:-5px;">{{$result->descript}}</p>
                        </div>
                        <div class="question_percent_block col-3 d-flex pt-3 style="max-height: 40px;">
                            <h3 style="margin-top:18px; color:{{$result->color}}; margin-right: 5px; align-items: center;">Завтра</h3>
                        </div>
                        <div class="question_checkbox col-2 px-0" style="max-height: 40px; padding-top: 16px; margin-left:10px; max-width: 40px;">
                            <input type="checkbox" id="a{{$result->id}}" onclick="Select({{$result->id}})" @if($result->percent == 100) checked @endif style="margin-top:3px;" />
                            <label onclick="Done('a{{$result->id}}')" style="transform: scale(0.2)!important; left: -50px; top: -23px;" for="a{{$result->id}}" class="check-box"></label>
                            <div class="wrapper-dropdown me-0" style="max-width: 15px; margin-left: 26px; margin-top: -5px; max-height: 8px; background: none;">
                                <img class="quest_text" style="max-width: 4px; max-height: 20px; margin-top: -12px;" src="{{asset('assets/images/dots.png')}}">
                                <ul class="dropdown" style="width: 100px;left: -85px; top: 29px;">
                                    <li style="line-height: 14px;margin-top: 5px;"><a>Редакти-<br>ровать</a></li>
                                    <li id="deleteQuest" style="line-height: 12px;margin-top: 5px;"><a onclick="Delete({{$result->id}})">Удалить</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach

    </div>
</div>
    <input type="hidden" id="iterration">
</div>

</div>
</div>


</div>
<script>
   function Navigate(href) {
      window.location.href = href;
   }
   function Done(id) {
      document.getElementById(id).classList.toggle('checked');
   }
   function Select(id){
        const _token = document.getElementsByName("_token")[0].value;
        let formData = new FormData();
        formData.append('_token', _token);
        formData.append('id', id);
        const send = ts('{{Route("AgreeTask")}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == false) {
                alert(result.error);
                document.getElementById('a' + id).checked = false;
            } else {
                location.reload();
            }
        });
    }
    function Delete(id){
        const _token = document.getElementsByName("_token")[0].value;
        let formData = new FormData();
        formData.append('_token', _token);
        formData.append('id', id);
        const send = ts('{{Route("DeleteTask")}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == false) {
                alert(result.error);
                document.getElementById('a' + id).checked = false;
            } else {
                location.reload();
            }
        });
    }
</script>
