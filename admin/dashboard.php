<?php

    session_start();

    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }

    require_once '../tools/variables.php';
    $page_title = 'Shoestocks | Dashboard';
    $dashboard = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Products</div>
                    <div class="number">358</div>
                    <div class="indicator">

                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-shopping-bag'></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Orders</div>
                    <div class="number">209</div>
                    <div class="indicator">

                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-cart-download'></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Stocks</div>
                    <div class="number">126</div>
                    <div class="indicator">

                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-coin-stack'></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Revenue</div>
                    <div class="number">23</div>
                    <div class="indicator">

                    <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-bar-chart'></i>
            </div>
        </div>

    </div>
                <div class="charts">
                    <div class="chart">
                        <h2> Total Stock Sale (Monthly)</h2>
                        <br>
                        </br>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                        <body>
                        <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>

                        <script>
                        var xValues = ["Jan","Feb","March","April","May","June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];
                        var yValues = [77,88,88,99,99,101,105,111,114,114,125, 128];

                        new Chart("myChart", {
                        type: "line",
                        data: {
                            labels: xValues,
                            datasets: [{
                            fill: false,
                            lineTension: 0,
                            backgroundColor: "green",
                            borderColor: "blue",
                            data: yValues
                            }]
                        },
                        options: {
                            legend: {display: false},
                            scales: {
                            yAxes: [{ticks: {min: 70, max:130}}],
                            }
                        }
                        });
                        </script>

                        </body>
                    </div>
                </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>
