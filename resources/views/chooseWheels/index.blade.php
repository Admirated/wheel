<div class="container" style="padding-bottom: 220px;">


@csrf
        <div id="circle_contain_row" class="row justify-content-between ">



        </div>



</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.esm.js" integrity="sha512-iPOvgg5RoL9rL/XjfFdBqjAlStti+ik8BmLYu12vwlD5jgCCdw7R8kI9mtHU7fMUSaRwG+w56i0xrAm/tnVj7w==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.js" integrity="sha512-opXrgVcTHsEVdBUZqTPlW9S8+99hNbaHmXtAdXXc61OUU6gOII5ku/PzZFqexHXc3hnK8IrJKHo+T7O4GRIJcw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/helpers.esm.js" integrity="sha512-VzhPhsLWGZ8kBPi9bHEcIVPOryxNlYq0iPPKUO8gb1sXi8wYGBi4LWx+c8nN/CofeKjSDXWDDtNsABXV6Q3Jfg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/helpers.esm.min.js" integrity="sha512-4OeC7P+qUXB7Kpyeu1r5Y209JLXfCkwGKDpk8vnXzeNGMnpTr6hzOz2lMm7h0oxRBVu2ZCPRkCBPMmIlWsbaHg==" crossorigin="anonymous"></script>
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $( document ).ready(function() {
        const _token = document.getElementsByName("_token")[0].value;
        let persents = 100;
        let formData = new FormData();
        formData.append('_token', _token);

        const send = ts('{{Route('ChoosheWheels')}}', 'POST', formData);
        send.then((result) => {
            console.log(result);
            if (result.status == true) {

                console.log(result.data);
                let length = result.data.length;
                let arr = [];

                result.data.forEach((index,key) => {
                    let url = "'" + index.url + "'";
                    document.getElementById('circle_contain_row').innerHTML += '<div class="container response_iphone" style="max-width: 160px; height: 160px;"/> <canvas onclick="navigation('+ url +')" id="myChart_'+ key +'" width="155" height="155"></canvas> <div onclick="navigation('+ url +')" class="wheel_small_white"><h3>'+ Math.round(index.percent) + '%' +'</h3></div> <p style="min-width: 100%; text-align: center; margin-top: -85px;">'+ index.name +'</p> </div>'
                    arr.push(document.getElementById('myChart_'+key));
                   // console.log(document.getElementById('myChart_'+key));

                })
                    result.data.forEach((index,key) =>{


                    var ctx = document.getElementById('myChart_'+key);
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

                    //let sectors = persents / result.data.circles.length;

                    var newDataset = {

                        backgroundColor: [

                        ],
                        data: [100]
                    }

                    for(let i = 0; i < 5; i++) {


                        if (i === 0 ) {


                                if(index.percent < 80) {
                                    newDataset.backgroundColor.push('#E5E5E5');

                                }
                                if(index.percent >= 80) {
                                    newDataset.backgroundColor.push(index.color);

                                }

                            myChart.data.datasets.push({
                                data: newDataset.data,
                                backgroundColor: newDataset.backgroundColor
                            });
                        }
                        if (i === 1) {
                            newDataset.backgroundColor = [];


                                if(index.percent < 60) {
                                    newDataset.backgroundColor.push('#E5E5E5');
                                }
                                if(index.percent >=60) {
                                    newDataset.backgroundColor.push(index.color);
                                }


                            myChart.data.datasets.push({
                                data: newDataset.data,
                                backgroundColor: newDataset.backgroundColor
                            });
                        }
                        if (i === 2) {

                            newDataset.backgroundColor = [];


                                if(index.percent <40) {
                                    newDataset.backgroundColor.push('#E5E5E5');
                                }
                                if(index.percent >=40) {
                                    newDataset.backgroundColor.push(index.color);
                                }


                            myChart.data.datasets.push({
                                data: newDataset.data,
                                backgroundColor: newDataset.backgroundColor
                            });
                        }
                        if (i === 3) {
                            newDataset.backgroundColor = [];

                                if(index.percent <20) {
                                    newDataset.backgroundColor.push('#E5E5E5');
                                }
                                if(index.percent >=20) {
                                    newDataset.backgroundColor.push(index.color);
                                }


                            myChart.data.datasets.push({
                                data: newDataset.data,
                                backgroundColor: newDataset.backgroundColor
                            });
                        }
                        if (i === 4) {
                            newDataset.backgroundColor = [];


                                if(index.percent <= 0) {
                                    newDataset.backgroundColor.push('#E5E5E5');
                                }
                                if(index.percent >0) {
                                    newDataset.backgroundColor.push(index.color);
                                }


                            myChart.data.datasets.push({
                                data: newDataset.data,
                                backgroundColor: newDataset.backgroundColor
                            });
                        }


                    }

                    myChart.update();
                })

            }


            })
        })
    function navigation(url)
    {


        window.location.href = url;
    }
</script>
