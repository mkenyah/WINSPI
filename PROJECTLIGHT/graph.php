<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphs Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
        .graphs {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }
        canvas {
            max-width: 600px;
            max-height: 400px;
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <!-- <header>
        <div class="logo">
            <img src="./images/logo.png" alt="">
        </div>
        <a class="logoutbtn" href="./welcome.php">Log out</a>
    </header> -->

    <main>
        <!-- <h1 class="dwelcome">Graphs Dashboard</h1> -->
    </main>

    <div class="graphs">
        <canvas id="salesChart"></canvas>
        <canvas id="profitChart"></canvas>
    </div>

    <script>
        // Fetch the data from fetchData.php
        fetch('fetchData.php')
            .then(response => response.json())
            .then(data => {
                // Extract data for the charts
                const salesData = data.salesData;  // Sales data for each month
                const profitData = data.profitData; // Profit data for each month
                const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

                // Create the Sales Chart (Bar Chart)
                const salesCtx = document.getElementById('salesChart').getContext('2d');
                const salesChart = new Chart(salesCtx, {
                    type: 'bar',  // Set type to 'bar' for bar chart
                    data: {
                        labels: months, // Use months as labels
                        datasets: [{
                            label: 'Sales (Ksh)',
                            data: salesData, // sales data for each month
                            backgroundColor: 'rgba(75, 192, 192, 0.5)', // Bar color
                            borderColor: 'rgba(75, 192, 192, 1)', // Bar border color
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Sales by Month'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true, // Ensure the Y-axis starts at zero
                                }
                            }]
                        }
                    }
                });

                // Create the Profit Chart (Bar Chart)
                const profitCtx = document.getElementById('profitChart').getContext('2d');
                const profitChart = new Chart(profitCtx, {
                    type: 'bar',  // Set type to 'bar' for bar chart
                    data: {
                        labels: months,  // Use months as labels
                        datasets: [{
                            label: 'Profit (Ksh)',
                            data: profitData, // profit data for each month
                            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Bar color
                            borderColor: 'rgba(54, 162, 235, 1)', // Bar border color
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Profit by Month'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    </script>
</body>
</html>
