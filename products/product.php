<?php

    session_start();

    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }

    require_once '../tools/variables.php';
    $page_title = 'ShoeStocks | Show Products';
    $products = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
                <div class="charts">
                    <div class="chart">
                        <h2> Bar Graph </h2>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                        <body>

                        <canvas id="barChart" style="width:100%;max-width:900px"></canvas>

                        <script>
                        var xValues = ["World Balance", "Converse", "Adidas", "Air Jordan", "Puma", "Reebok", "Nike", "Vans"];
                        var yValues = [155, 180, 195, 205, 160, 175, 220, 200];
                        var barColors = ["red", "green","blue","orange","brown", "yellow", "indigo", "pink"];

                        new Chart("barChart", {
                        type: "bar",
                        data: {
                            labels: xValues,
                            datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                            }]
                        },
                        options: {
                            legend: {display: false},
                            title: {
                            display: true,
                            text: "SHOE TRENDS AS OF 2022"
                            }
                        }
                        });
                        </script>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>