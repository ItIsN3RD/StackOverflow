<?php
$date = date("Y/m/d");
$date = explode("/", $date);
$month = $date[1];
$year = $date[0];
$monthdays = cal_days_in_month(CAL_GREGORIAN, $month, $year);


$startCurrentMonth = strtotime($year . "-" . $month . "-01 00:00:00") * 1000;
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/left-nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>


<body>
<?php include('includes/left-nav.php'); ?>

<style>
    .card {
        background-image: linear-gradient(
                to bottom right, #39424a 15%, #3d4954 95%);
    }
</style>

<div id="main-content" onscroll="myFunction(this)" style="overflow: auto;" class="d-flex justify-content-center">
    <!--<div style="height: 900px; width: 50%; background-color: black;">

    </div>-->
    <div class="container" style="margin-top: 1.5rem; position: relative !important;">
        <div class="row">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header" style="background-color: #3b454f; border-bottom: none;padding-top: 1rem; padding-bottom: 0px;">
                        <div class="input-group">
                            <div>
                                <h6 style="text-align: left; color: white; width: 100%; margin: 0;">Gross Income</h6>
                                <div class="input-group" style="position: relative">
                                    <h3 style="text-align: left; color: white; padding-right: 5px; margin: 0;">$1350</h3>
                                    <h6 style="background-color: rgba(255,255,255,0); color: rgb(15,255,0); margin: 0; display: flex; justify-content: center; align-items: center; text-align: center; margin-top: 0.5rem; margin-bottom: 0.5rem;">+50%</h6>
                                </div>
                            </div>
                            <div style="right: 0; position: absolute;" class="dropdown">
                                <button id="billingButton" type="button" style="margin-bottom: 0; margin-top: 1rem;"
                                        class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Time Frame
                                </button>
                                <style>
                                    .dropdown-menu-center {
                                        left: 50% !important;
                                        right: auto !important;
                                        text-align: center !important;
                                        transform: translate(-50%, 0) !important;
                                    }
                                </style>
                                <script>
                                    function selectedPeriod(element) {
                                        // Hide active display selected graph
                                    }
                                </script>
                                <ul style="overflow-y: auto; max-height: 80vh; max-width: 25%;"
                                    class="list dropdown-menu dropdown-menu-center mt-4"
                                    aria-labelledby="dropdownMenuButton1">
                                    <div onclick="selectedPeriod(this)" class="servername" id="Weekly">
                                        <span class="mr-2 d-lg-inline text-600 large">Daily</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="Monthly">
                                        <span class="mr-2 d-lg-inline text-600 large">Monthly</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="3_Months">
                                        <span class="mr-2 d-lg-inline text-600 large">Quarter-Year</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="6_Months">
                                        <span class="mr-2 d-lg-inline text-600 large">Quarter-Year</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="Yearly">
                                        <span class="mr-2 d-lg-inline text-600 large">Yearly</span>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #3b454f; border-bottom-left-radius: 0.25rem !important; border-bottom-right-radius: 0.25rem !important;">
                        <canvas id="myChart1" width="1250" height="250"></canvas>
                        <script>
                            var ctx1 = document.getElementById('myChart1').getContext('2d');
                            const DATA_COUNT1 = 7;
                            const NUMBER_CFG1 = {count: DATA_COUNT1, min: -100, max: 100};

                            const data1 = {
                                <?php
                                echo "labels: [";
                                for($i = 1; $i <= 28; $i++){
                                    echo "'".$i."'".",";
                                }
                                echo "],";
                                ?>
                                datasets: [
                                    {
                                        label: 'Dataset 1',
                                        data: [30, 38, 31, 54, 27, 38, 120, 19, 30, 59, 200, 36, 120, 190, 30, 53, 25, 37, 128, 196, 35, 54, 23, 34, 566, 57, 56, 55, 55,10],
                                        backgroundColor: [
                                            'rgba(136,255,0,0.2)'

                                        ],
                                        borderColor: [
                                            'rgb(15,255,0)'
                                        ],
                                        fill: true,
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        pointStyle: 'circle',
                                        pointBackgroundColor: 'rgb(15,255,0)',
                                    },
                                    {
                                        label: 'Dataset 2',
                                        data: [1200, 190, 30, 50, 20, 30, 12, 19, 3, 5, 90, 3, 12, 19, 3, 5, 2, 3, 12, 19, 87, 37, 25, 3, 6, 5, 9, 4, 6,7],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)'

                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)'
                                        ],
                                        fill: true,
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        pointStyle: 'circle',
                                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                    }
                                ]
                            };

                            var myChart1 = new Chart(ctx1, {
                                type: 'line',
                                data: data1,
                                options: {
                                    responsive: true,
                                    interaction: {
                                        mode: 'index',
                                        intersect: false,
                                    },
                                    plugins: {
                                        tooltip:{
                                            xAlign: 'center',
                                            yAlign: 'bottom',
                                        },
                                        legend: {
                                            display: false,
                                            labels: {
                                                color: "#FFFFFF",
                                            },
                                        },
                                        title: {
                                            display: false,
                                            text: 'Gross Income',
                                            color: "#FFFFFF"
                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                display: false,
                                                drawOnChartArea: false,
                                            },
                                            ticks: {
                                                color: "white",
                                            },
                                        },
                                        y: {
                                            type: 'linear',
                                            display: false,
                                            position: 'left',
                                            grid: {
                                                drawOnChartArea: false,
                                            },
                                            ticks: {
                                                display: false,
                                                color: "white",
                                            },
                                        },
                                    }
                                },
                            });

                        </script>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div style="width: 50%;" class="col">
                <div class="card mb-4 rounded-3 shadow-sm" >
                    <div class="card-header" style="background-color: #3b454f; border-bottom: none;padding-top: 1rem; padding-bottom: 0px;">
                        <div class="input-group">
                            <div>
                                <h6 style="text-align: left; color: white; width: 100%; margin: 0;">Subscriptions</h6>
                                <div class="input-group" style="position: relative">
                                    <h3 style="text-align: left; color: white; padding-right: 5px; margin: 0;">134</h3>
                                    <h6 style="background-color: rgba(255,255,255,0); color: rgb(15,255,0); margin: 0; display: flex; justify-content: center; align-items: center; text-align: center; margin-top: 0.5rem; margin-bottom: 0.5rem;">+50%</h6>
                                </div>
                            </div>
                            <div style="right: 0; position: absolute;" class="dropdown">
                                <button id="billingButton" type="button" style="margin-bottom: 0; margin-top: 1rem;"
                                        class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Time Frame
                                </button>
                                <style>
                                    .dropdown-menu-center {
                                        left: 50% !important;
                                        right: auto !important;
                                        text-align: center !important;
                                        transform: translate(-50%, 0) !important;
                                    }
                                </style>
                                <script>
                                    function selectedPeriod(element) {
                                        // Hide active display selected graph
                                    }
                                </script>
                                <ul style="overflow-y: auto; max-height: 80vh; max-width: 25%;"
                                    class="list dropdown-menu dropdown-menu-center mt-4"
                                    aria-labelledby="dropdownMenuButton1">
                                    <div onclick="selectedPeriod(this)" class="servername" id="Weekly">
                                        <span class="mr-2 d-lg-inline text-600 large">Daily</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="Monthly">
                                        <span class="mr-2 d-lg-inline text-600 large">Monthly</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="3_Months">
                                        <span class="mr-2 d-lg-inline text-600 large">Quarter-Year</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="6_Months">
                                        <span class="mr-2 d-lg-inline text-600 large">Quarter-Year</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="Yearly">
                                        <span class="mr-2 d-lg-inline text-600 large">Yearly</span>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #3b454f; border-bottom-left-radius: 0.25rem !important; border-bottom-right-radius: 0.25rem !important;">
                        <canvas id="myChart3" width="625" height="250"></canvas>
                        <script>
                            var ctx3 = document.getElementById('myChart3').getContext('2d');
                            const DATA_COUNT3 = 7;
                            const NUMBER_CFG3 = {count: DATA_COUNT3, min: -100, max: 100};

                            const data3 = {
                                <?php
                                echo "labels: [";
                                for($i = 1; $i <= 28; $i++){
                                    echo "'".$i."'".",";
                                }
                                echo "],";
                                ?>
                                datasets: [
                                    {
                                        label: 'Dataset 1',
                                        data: [30, 38, 31, 54, 27, 38, 120, 19, 30, 59, 200, 36, 120, 190, 30, 53, 25, 37, 128, 196, 35, 54, 23, 34, 566, 57, 56, 55, 55,10],
                                        backgroundColor: [
                                            'rgba(136,255,0,0.2)'

                                        ],
                                        borderColor: [
                                            'rgb(15,255,0)'
                                        ],
                                        fill: true,
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        pointStyle: 'circle',
                                        pointBackgroundColor: 'rgb(15,255,0)',
                                    },
                                    {
                                        label: 'Dataset 2',
                                        data: [1200, 190, 30, 50, 20, 30, 12, 19, 3, 5, 90, 3, 12, 19, 3, 5, 2, 3, 12, 19, 87, 37, 25, 3, 6, 5, 9, 4, 6,7],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)'

                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)'
                                        ],
                                        fill: true,
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        pointStyle: 'circle',
                                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                    }
                                ]
                            };

                            var myChart3 = new Chart(ctx3, {
                                type: 'line',
                                data: data3,
                                options: {
                                    responsive: true,
                                    interaction: {
                                        mode: 'index',
                                        intersect: false,
                                    },
                                    plugins: {
                                        tooltip:{
                                            xAlign: 'center',
                                            yAlign: 'bottom',
                                        },
                                        legend: {
                                            display: false,
                                            labels: {
                                                color: "#FFFFFF",
                                            },
                                        },
                                        title: {
                                            display: false,
                                            text: 'Gross Income',
                                            color: "#FFFFFF"
                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                display: false,
                                                drawOnChartArea: false,
                                            },
                                            ticks: {
                                                color: "white",
                                            },
                                        },
                                        y: {
                                            type: 'linear',
                                            display: false,
                                            position: 'left',
                                            grid: {
                                                drawOnChartArea: false,
                                            },
                                            ticks: {
                                                display: false,
                                                color: "white",
                                            },
                                        },
                                    }
                                },
                            });

                        </script>
                    </div>
                </div>
            </div>
            <div style="width: 50%;" class="col">
                <div class="card mb-4 rounded-3 shadow-sm" >
                    <div class="card-header" style="background-color: #3b454f; border-bottom: none;padding-top: 1rem; padding-bottom: 0px;">
                        <div class="input-group">
                            <div>
                                <h6 style="text-align: left; color: white; width: 100%; margin: 0;">Trials</h6>
                                <div class="input-group" style="position: relative">
                                    <h3 style="text-align: left; color: white; padding-right: 5px; margin: 0;">543</h3>
                                    <h6 style="background-color: rgba(255,255,255,0); color: rgb(15,255,0); margin: 0; display: flex; justify-content: center; align-items: center; text-align: center; margin-top: 0.5rem; margin-bottom: 0.5rem;">+50%</h6>
                                </div>
                            </div>
                            <div style="right: 0; position: absolute;" class="dropdown">
                                <button id="billingButton" type="button" style="margin-bottom: 0; margin-top: 1rem;"
                                        class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Time Frame
                                </button>
                                <style>
                                    .dropdown-menu-center {
                                        left: 50% !important;
                                        right: auto !important;
                                        text-align: center !important;
                                        transform: translate(-50%, 0) !important;
                                    }
                                </style>
                                <script>
                                    function selectedPeriod(element) {
                                        // Hide active display selected graph
                                    }
                                </script>
                                <ul style="overflow-y: auto; max-height: 80vh; max-width: 25%;"
                                    class="list dropdown-menu dropdown-menu-center mt-4"
                                    aria-labelledby="dropdownMenuButton1">
                                    <div onclick="selectedPeriod(this)" class="servername" id="Weekly">
                                        <span class="mr-2 d-lg-inline text-600 large">Daily</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="Monthly">
                                        <span class="mr-2 d-lg-inline text-600 large">Monthly</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="3_Months">
                                        <span class="mr-2 d-lg-inline text-600 large">Quarter-Year</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="6_Months">
                                        <span class="mr-2 d-lg-inline text-600 large">Quarter-Year</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="Yearly">
                                        <span class="mr-2 d-lg-inline text-600 large">Yearly</span>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #3b454f; border-bottom-left-radius: 0.25rem !important; border-bottom-right-radius: 0.25rem !important;">
                        <canvas id="myChart2" width="625" height="250"></canvas>
                        <script>
                            var ctx2 = document.getElementById('myChart2').getContext('2d');
                            const DATA_COUNT2 = 7;
                            const NUMBER_CFG2 = {count: DATA_COUNT2, min: -100, max: 100};

                            const data2 = {
                                <?php
                                echo "labels: [";
                                for($i = 1; $i <= 28; $i++){
                                    echo "'".$i."'".",";
                                }
                                echo "],";
                                ?>
                                datasets: [
                                    {
                                        label: 'Dataset 1',
                                        data: [30, 38, 31, 54, 27, 38, 120, 19, 30, 59, 200, 36, 120, 190, 30, 53, 25, 37, 128, 196, 35, 54, 23, 34, 566, 57, 56, 55, 55,10],
                                        backgroundColor: [
                                            'rgba(136,255,0,0.2)'

                                        ],
                                        borderColor: [
                                            'rgb(15,255,0)'
                                        ],
                                        fill: true,
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        pointStyle: 'circle',
                                        pointBackgroundColor: 'rgb(15,255,0)',
                                    },
                                    {
                                        label: 'Dataset 2',
                                        data: [1200, 190, 30, 50, 20, 30, 12, 19, 3, 5, 90, 3, 12, 19, 3, 5, 2, 3, 12, 19, 87, 37, 25, 3, 6, 5, 9, 4, 6,7],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)'

                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)'
                                        ],
                                        fill: true,
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        pointStyle: 'circle',
                                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                    }
                                ]
                            };

                            var myChart2 = new Chart(ctx2, {
                                type: 'line',
                                data: data2,
                                options: {
                                    responsive: true,
                                    interaction: {
                                        mode: 'index',
                                        intersect: false,
                                    },
                                    plugins: {
                                        tooltip:{
                                            xAlign: 'center',
                                            yAlign: 'bottom',
                                        },
                                        legend: {
                                            display: false,
                                            labels: {
                                                color: "#FFFFFF",
                                            },
                                        },
                                        title: {
                                            display: false,
                                            text: 'Gross Income',
                                            color: "#FFFFFF"
                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                display: false,
                                                drawOnChartArea: false,
                                            },
                                            ticks: {
                                                color: "white",
                                            },
                                        },
                                        y: {
                                            type: 'linear',
                                            display: false,
                                            position: 'left',
                                            grid: {
                                                drawOnChartArea: false,
                                            },
                                            ticks: {
                                                display: false,
                                                color: "white",
                                            },
                                        },
                                    }
                                },
                            });

                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div style="width: 50%;" class="col">
                <div class="card mb-4 rounded-3 shadow-sm" >
                    <div class="card-header" style="background-color: #3b454f; border-bottom: none;padding-top: 1rem; padding-bottom: 0px;">
                        <div class="input-group">
                            <div>
                                <h6 style="text-align: left; color: white; width: 100%; margin: 0;">One-Time Payments</h6>
                                <div class="input-group" style="position: relative">
                                    <h3 style="text-align: left; color: white; padding-right: 5px; margin: 0;">134</h3>
                                    <h6 style="background-color: rgba(255,255,255,0); color: rgb(15,255,0); margin: 0; display: flex; justify-content: center; align-items: center; text-align: center; margin-top: 0.5rem; margin-bottom: 0.5rem;">+50%</h6>
                                </div>
                            </div>
                            <div style="right: 0; position: absolute;" class="dropdown">
                                <button id="billingButton" type="button" style="margin-bottom: 0; margin-top: 1rem;"
                                        class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Time Frame
                                </button>
                                <style>
                                    .dropdown-menu-center {
                                        left: 50% !important;
                                        right: auto !important;
                                        text-align: center !important;
                                        transform: translate(-50%, 0) !important;
                                    }
                                </style>
                                <script>
                                    function selectedPeriod(element) {
                                        // Hide active display selected graph
                                    }
                                </script>
                                <ul style="overflow-y: auto; max-height: 80vh; max-width: 25%;"
                                    class="list dropdown-menu dropdown-menu-center mt-4"
                                    aria-labelledby="dropdownMenuButton1">
                                    <div onclick="selectedPeriod(this)" class="servername" id="Weekly">
                                        <span class="mr-2 d-lg-inline text-600 large">Daily</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="Monthly">
                                        <span class="mr-2 d-lg-inline text-600 large">Monthly</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="3_Months">
                                        <span class="mr-2 d-lg-inline text-600 large">Quarter-Year</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="6_Months">
                                        <span class="mr-2 d-lg-inline text-600 large">Quarter-Year</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="Yearly">
                                        <span class="mr-2 d-lg-inline text-600 large">Yearly</span>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #3b454f; border-bottom-left-radius: 0.25rem !important; border-bottom-right-radius: 0.25rem !important;">
                        <canvas id="myChart5" width="625" height="250"></canvas>
                        <script>
                            var ctx5 = document.getElementById('myChart5').getContext('2d');
                            const DATA_COUNT5 = 7;
                            const NUMBER_CFG5 = {count: DATA_COUNT5, min: -100, max: 100};

                            const data5 = {
                                <?php
                                echo "labels: [";
                                for($i = 1; $i <= 28; $i++){
                                    echo "'".$i."'".",";
                                }
                                echo "],";
                                ?>
                                datasets: [
                                    {
                                        label: 'Dataset 1',
                                        data: [30, 38, 31, 54, 27, 38, 120, 19, 30, 59, 200, 36, 120, 190, 30, 53, 25, 37, 128, 196, 35, 54, 23, 34, 566, 57, 56, 55, 55,10],
                                        backgroundColor: [
                                            'rgba(136,255,0,0.2)'

                                        ],
                                        borderColor: [
                                            'rgb(15,255,0)'
                                        ],
                                        fill: true,
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        pointStyle: 'circle',
                                        pointBackgroundColor: 'rgb(15,255,0)',
                                    },
                                    {
                                        label: 'Dataset 2',
                                        data: [1200, 190, 30, 50, 20, 30, 12, 19, 3, 5, 90, 3, 12, 19, 3, 5, 2, 3, 12, 19, 87, 37, 25, 3, 6, 5, 9, 4, 6,7],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)'

                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)'
                                        ],
                                        fill: true,
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        pointStyle: 'circle',
                                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                    }
                                ]
                            };

                            var myChart5 = new Chart(ctx5, {
                                type: 'line',
                                data: data5,
                                options: {
                                    responsive: true,
                                    interaction: {
                                        mode: 'index',
                                        intersect: false,
                                    },
                                    plugins: {
                                        tooltip:{
                                            xAlign: 'center',
                                            yAlign: 'bottom',
                                        },
                                        legend: {
                                            display: false,
                                            labels: {
                                                color: "#FFFFFF",
                                            },
                                        },
                                        title: {
                                            display: false,
                                            text: 'Gross Income',
                                            color: "#FFFFFF"
                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                display: false,
                                                drawOnChartArea: false,
                                            },
                                            ticks: {
                                                color: "white",
                                            },
                                        },
                                        y: {
                                            type: 'linear',
                                            display: false,
                                            position: 'left',
                                            grid: {
                                                drawOnChartArea: false,
                                            },
                                            ticks: {
                                                display: false,
                                                color: "white",
                                            },
                                        },
                                    }
                                },
                            });

                        </script>
                    </div>
                </div>
            </div>
            <div style="width: 50%;" class="col">
                <div class="card mb-4 rounded-3 shadow-sm" >
                    <div class="card-header" style="background-color: #3b454f; border-bottom: none;padding-top: 1rem; padding-bottom: 0px;">
                        <div class="input-group">
                            <div>
                                <h6 style="text-align: left; color: white; width: 100%; margin: 0;">Subscription Cancellations</h6>
                                <div class="input-group" style="position: relative">
                                    <h3 style="text-align: left; color: white; padding-right: 5px; margin: 0;">543</h3>
                                    <h6 style="background-color: rgba(255,255,255,0); color: rgb(15,255,0); margin: 0; display: flex; justify-content: center; align-items: center; text-align: center; margin-top: 0.5rem; margin-bottom: 0.5rem;">+50%</h6>
                                </div>
                            </div>
                            <div style="right: 0; position: absolute;" class="dropdown">
                                <button id="billingButton" type="button" style="margin-bottom: 0; margin-top: 1rem;"
                                        class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Time Frame
                                </button>
                                <style>
                                    .dropdown-menu-center {
                                        left: 50% !important;
                                        right: auto !important;
                                        text-align: center !important;
                                        transform: translate(-50%, 0) !important;
                                    }
                                </style>
                                <script>
                                    function selectedPeriod(element) {
                                        // Hide active display selected graph
                                    }
                                </script>
                                <ul style="overflow-y: auto; max-height: 80vh; max-width: 25%;"
                                    class="list dropdown-menu dropdown-menu-center mt-4"
                                    aria-labelledby="dropdownMenuButton1">
                                    <div onclick="selectedPeriod(this)" class="servername" id="Weekly">
                                        <span class="mr-2 d-lg-inline text-600 large">Daily</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="Monthly">
                                        <span class="mr-2 d-lg-inline text-600 large">Monthly</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="3_Months">
                                        <span class="mr-2 d-lg-inline text-600 large">Quarter-Year</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="6_Months">
                                        <span class="mr-2 d-lg-inline text-600 large">Quarter-Year</span>
                                    </div>
                                    <div onclick="selectedPeriod(this)" class="servername" id="Yearly">
                                        <span class="mr-2 d-lg-inline text-600 large">Yearly</span>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #3b454f; border-bottom-left-radius: 0.25rem !important; border-bottom-right-radius: 0.25rem !important;">
                        <canvas id="myChart6" width="625" height="250"></canvas>
                        <script>
                            var ctx6 = document.getElementById('myChart6').getContext('2d');
                            const DATA_COUNT6 = 7;
                            const NUMBER_CFG6 = {count: DATA_COUNT6, min: -100, max: 100};

                            const data6 = {
                                <?php
                                echo "labels: [";
                                for($i = 1; $i <= 28; $i++){
                                    echo "'".$i."'".",";
                                }
                                echo "],";
                                ?>
                                datasets: [
                                    {
                                        label: 'Dataset 1',
                                        data: [30, 38, 31, 54, 27, 38, 120, 19, 30, 59, 200, 36, 120, 190, 30, 53, 25, 37, 128, 196, 35, 54, 23, 34, 566, 57, 56, 55, 55,10],
                                        backgroundColor: [
                                            'rgba(136,255,0,0.2)'

                                        ],
                                        borderColor: [
                                            'rgb(15,255,0)'
                                        ],
                                        fill: true,
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        pointStyle: 'circle',
                                        pointBackgroundColor: 'rgb(15,255,0)',
                                    },
                                    {
                                        label: 'Dataset 2',
                                        data: [1200, 190, 30, 50, 20, 30, 12, 19, 3, 5, 90, 3, 12, 19, 3, 5, 2, 3, 12, 19, 87, 37, 25, 3, 6, 5, 9, 4, 6,7],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)'

                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)'
                                        ],
                                        fill: true,
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        pointStyle: 'circle',
                                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                    }
                                ]
                            };

                            var myChart6 = new Chart(ctx6, {
                                type: 'line',
                                data: data6,
                                options: {
                                    responsive: true,
                                    interaction: {
                                        mode: 'index',
                                        intersect: false,
                                    },
                                    plugins: {
                                        tooltip:{
                                            xAlign: 'center',
                                            yAlign: 'bottom',
                                        },
                                        legend: {
                                            display: false,
                                            labels: {
                                                color: "#FFFFFF",
                                            },
                                        },
                                        title: {
                                            display: false,
                                            text: 'Gross Income',
                                            color: "#FFFFFF"
                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                display: false,
                                                drawOnChartArea: false,
                                            },
                                            ticks: {
                                                color: "white",
                                            },
                                        },
                                        y: {
                                            type: 'linear',
                                            display: false,
                                            position: 'left',
                                            grid: {
                                                drawOnChartArea: false,
                                            },
                                            ticks: {
                                                display: false,
                                                color: "white",
                                            },
                                        },
                                    }
                                },
                            });

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


</body>

<script src="js/mobile_check.js">
</script>

</html>
