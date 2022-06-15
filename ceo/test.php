<?php
    include_once('./connect.php');
    // $stmt = "select * from employee";
    // $sql_select = mysqli_query($connmysql,$stmt);
    //Total earning default
        //To date
        $stmt = "select * from Personal";
        $sql_select = sqlsrv_query($connsqlsv,$stmt);
        //create variable
        $to_date_1=0; $to_date_2=0; $last_year_1=0; $last_year_2=0;
        $soluong_shareholder = 0; $soluong_nonshareholder = 0;
        //end create variable
        while($rows = sqlsrv_fetch_array($sql_select)){
            $id = $rows['Employee_ID'];
            if($rows['Shareholder_Status'] == 1){
                $mysql_select = mysqli_fetch_array(mysqli_query($connmysql,"SELECT * from employee where `idEmployee`=$id"));
                $to_date_1 += $mysql_select['Paid_To_Date'];
                $last_year_1 += $mysql_select['Paid_Last_Year'];
                $soluong_shareholder++;
            }
            else{
                $mysql_select = mysqli_fetch_array(mysqli_query($connmysql,"SELECT * from employee where `idEmployee`=$id"));
                $to_date_2 += $mysql_select['Paid_To_Date'];
                $last_year_2 += $mysql_select['Paid_Last_Year'];
                $soluong_nonshareholder++;
            }
        }
        //Last year
    // End total earning default
    
    //Total number of vacation days default
    $stmt_vacation = "SELECT * FROM employee";
    $to_date_vacation_1=0; $to_date_vacation_2=0;
    $sql_select_vacation = mysqli_query($connmysql,$stmt_vacation);
    while($rows_vacation = mysqli_fetch_array($sql_select_vacation)){
        $id = $rows_vacation['idEmployee'];
        $stmt_1 = "select * from Personal where Employee_ID = $id";
        $sql_select_1 = sqlsrv_query($connsqlsv,$stmt_1);     
        if(sqlsrv_fetch_array($sql_select_1)['Shareholder_Status'] == 1){
            $to_date_vacation_1 += $rows_vacation['Vacation_Days'];
        }
        else{
            $to_date_vacation_2 += $rows_vacation['Vacation_Days'];
        }
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
    <link rel="stylesheet" href="home.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>
<div class="container">
    <div class="navbar">
        <ul>
            <li >
                <a href="#">  
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li>
                <a href="./totalEarn.html">
                    <p>TOTAL EARNING</p>
                    <p>$<?php echo ($to_date_1+$to_date_2)*12 ?>.000<i class="fa-solid fa-caret-up">
                    </i> <?php echo (($to_date_1+$to_date_2)*12)/($last_year_1+$last_year_2) ?>%</p>
                    <p>Last year</p>
                </a>
            </li>
            <li>
                <a href="./vacationDays.html">
                    <p>VOCATION DAY</p>
                    <p><?php echo ($to_date_vacation_1+$to_date_vacation_2) ?>Days<i class="fa-solid fa-caret-up"></i> 
                    <?php echo ($to_date_vacation_1+$to_date_vacation_2)-10 ?> D</p>
                    <p>Last year</p>
                </a>
            </li>
            <li>
                <a href="./benefitPaid.html">
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
        
            <!-- <div class="chart" >
                <a href="./totalEarn.php" id="contain-chart"></a>
                    <div class="bigChart">
                        <canvas id="totalChart"></canvas>
        
                    </div>
                    <div class="smallChart">
                        <div class="pieChart"><canvas id="genderChart" ></canvas></div>
                        <div class="pieChart"><canvas id="PTFTChart"></canvas></div>
                    </div>
                </a>
            </div>   -->
            <div class="chart" >
                <!-- <a href="./totalEarn.php" id="contain-chart"></a> -->
                    <div class="bigChart">
                        <canvas id="totalChart"></canvas>
                    </div>
                    <!-- <a href=""><?php  echo json_encode($last_year_1) ?>Hi</a>
                    <a href=""><?php  echo json_encode( $to_date_1) ?>Hello</a> -->
                    <div class="smallChart">
                        <div class="pieChart"><canvas id="genderChart" ></canvas></div>
                        <div class="pieChart"><canvas id="PTFTChart"></canvas></div>
                    </div>
                </a>
            </div>  

    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // TOTAL EARNING

new Chart("totalChart", {
    const labels = Utils.months({count: 7});
const data = {
  labels: labels,
  datasets: [{
    label: 'My First Dataset',
    data: [65, 59, 80, 81, 56, 55, 40],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
};
// </block:setup>

// <block:config:0>
const config = {
  type: 'line',
  data: data,
};
// </block:config>

module.exports = {
  actions: [],
  config: config,
};
});
const myChart = new Chart(
    document.getElementById('totalChart'),
    config
  );
</script>
<?php 

?>

</body>
</html>
