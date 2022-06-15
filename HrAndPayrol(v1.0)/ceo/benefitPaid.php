<?php
    include_once('./connect.php');
    $query=$connmysql->query("
    SELECT 
    SUM(Vacation_Days) as sumVaca FROM employee;
  ");

  foreach($query as $data){
    $sumVaca[]=$data['sumVaca'];
  }

?>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEO</title>
    <link rel="icon" href="https://s3-alpha-sig.figma.com/img/c161/6950/1cd02bcb2ff06c4d83f3325b296e0545?Expires=1649635200&Signature=Q3I6OtLdKR9UA0ElSH2rZW0kML-UyPQyqASDs1yHhVmi8rt5FcbqQfKO~3HP0W3wGe~I6PHVBaSRBeiqE~I4WtdMdzxf6WTDt1JNQnNLM7zBRdDW-5Q8M7Md9JSktOh1srouOwn~SimLUIkRxmrd4AcEbb45yYiMcesTf8dRcqBKBJ2kCI2Y1MR0PKAyqWfROZ3bqIb~eTLB3TTjrLalpDq1Ji9icodjgZQZBZ7~s63xv55i2e6JkI3S24DxrNkytyzjhmEDIsKzTLhc0YidHT~rVuJ-DyO0h~BFfvWwGeZdX9WdJCvDY2HICDBQCSal-KDvH27NRIdGcg6BwYPnBA__&Key-Pair-Id=APKAINTVSUGEWH5XD5UA">
    <link rel="stylesheet" href="chart.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="./home.html">
    <link rel="stylesheet" href="./totalEarn.html">
</head>
<body>
    <div class="container">
    <div class="navbar">
            <ul>
                <li >
                    <a href="./home.php">  
                        <i class="fa-solid fa-house"></i>
                    </a>
                </li>
                <li>
                <a href="./totalEarn.php">
                        <p>TOTAL EARNING</p>
                        <p>$<i class="fa-solid fa-caret-up"></i>
                        </p>
                        <p>Last year</p>
                    </a>
                </li>
                <li>
                    <a href="./vacationDays.php">
                        <p>VOCATION DAY</p>
                        <p>Days<i class="fa-solid fa-caret-up"></i>
                        12 D</p>
                        <p>Last year</p>
                    </a>
                </li>
                <li>
                    <a href="./benefitPaid.php">
                        <p>BENEFIT PAID</p>
                        <p>80.000$ <i class="fa-solid fa-caret-up"></i> 1.02%</p>
                        <p>Last year</p>
                    </a>
                </li>
                <li>
                    <a href=""><i class="fa-solid fa-bell"></i></a>
                    <a href="../manager/index.php"><i class="fa-solid fa-user-gear"></i></a>
                </li>
            </ul>
        </div>
        <div class="homeChart">
            <div class="chart">
                <div class="bigChart">
                    <canvas id="benefitPaidChart"></canvas>
                </div>
                <div class="smallChart">
                    <div class="pieChart"><canvas id="genderChartBP" ></canvas></div>
                    <div class="pieChart"><canvas id="PTFTChartBP"></canvas></div>
                </div>
            </div>  
            
        </div>
    </div>

    <script >
        const labels3 = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

const data3 = {
  labels: labels3,
  datasets: [{
    fill:false,
    borderColor: "rgba(59, 141, 208, 1)",
    data: [60,70,40,<?php echo json_encode($sumVaca)?>],
  }]
};

const config3 = {
  type: 'line',
  data: data3,
  options: {
    legend: {display: false},
  title: {
    display: true,
    text: "BENEFIT PAID",
    fontSize: 20,
  },
  scales: {
    yAxes: [{ticks: {min: 0, max:200}}],
  },
  }
};

const myChart3 = new Chart(
  document.getElementById('benefitPaidChart'),
  config3
);
//GENDER CHART
var xValuesGender = ["M","FM"];
var yValuesGender = [300,60];
var barColors = [
  "#00aba9",
  "#b91d47"
];

new Chart("genderChartBP", {
  type: "pie",
  data: {
    labels: xValuesGender,
    datasets: [{
      backgroundColor: barColors,
      data: yValuesGender
    }]
  },
  options: {
    legend:{
      display:false
    },
    title: {
      display: true,
      text: "GENDER",

    }
  }
});
// ----------------------------------------------------//
// PART-TIME FULL-TIME CHART
var xValuesPTFT = ["P-T","F-T"];
var yValuesPTFT = [60,300];
var barColors = [
  "#F2B035",
  "#011C40"
];

new Chart("PTFTChartBP", {
  type: "pie",
  data: {
    labels: xValuesPTFT,
    datasets: [{
      backgroundColor: barColors,
      data: yValuesPTFT
    }]
  },
  options: {
    legend:{
      display:false
    },
    title: {
      display: true,
      text: "PART-TIME/FULL-TIME"
    }
  }
});
    </script>
</body>
</html>