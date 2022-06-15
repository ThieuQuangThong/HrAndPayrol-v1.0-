<?php

include_once('../ceo/connect.php'); 
$output = '';
$stmt = "select * from Employment  inner join Personal on Employment.Employee_ID = Personal.Employee_ID";
$sql_select = sqlsrv_query($connsqlsv,$stmt);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="glassmor.css">
    <link rel="stylesheet" href="cal.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="navbar">
            <ul>
                <li>
                    <span>
                        <i class="fa-solid fa-house"></i>
                    </span>
                </li>
                <li class="progress-bar">
                    <div class="progress" style="padding-top: 3px;"> 80% working </div>
                </li>
                <li>
                    <a><i class="fa-solid fa-bell"></i></a>
                    <a href="../ceo/home.php"><i class="fa-solid fa-user-gear"></i></a>
                </li>
            </ul>
        </div>
        <div style="text-align: center; margin-top: 20px;margin-bottom: 20px;">
            <h3>EMPLOYEE</h3>
            <div class="content">
                <div class="item-content">
                    <div class="schedule">
                        <!-- celender -->
                        <div class="calender">
                            <section>
                                <!-- <div class="box"> -->
                                <!-- <div class="container"> -->
                                <div id="calendar">

                                </div>

                                <!-- </div> -->
                                <!-- </div> -->

                            </section>

                            <script src="calendar.js"></script>
                            <script>
                                dycalendar.draw({
                                    target: '#calendar',
                                    type: 'month',
                                    dayformat: 'full',
                                    monthformat: 'full',
                                    highlighttargetdate: true,
                                    prevnextbutton: 'show'

                                })
                            </script>
                            <script>
                                    (function (i, s, o, g, r, a, m) {
                                        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                                            (i[r].q = i[r].q || []).push(arguments)
                                        }, i[r].l = 1 * new Date(); a = s.createElement(o),
                                            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
                                    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                                ga('create', 'UA-46156385-1', 'cssscript.com');
                                ga('send', 'pageview');

                            </script>
                        </div>


                        <div class="event">
                            <h5>EVENT</h5>
                            <ul>
                                <li>
                                    <p style="background-color: aqua;">31/02</p>
                                    <p>Thông's birthday</p>
                                </li>
                                <li>
                                    <p style="background-color: aqua;">30/02</p>
                                    <p>Thông's birthday</p>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="wholesales">
                        
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" style="width:80%">
                                MALE
                            </div>

                            <div class="progress-bar progress-bar-danger   " role="progressbar" style="width:20%">
                                FEMALE
                            </div>
                        </div>
                        <div class="image">
                            <img src="../img/lavatory.png"
                                alt="">

                            <div>
                                <p style="display:inline-block;margin-right: 60px;color: #4bcbe7;">573</p>
                                <p style="display:inline-block;color: #e74ba8;">295</p>
                            </div>


                        </div>
                    </div>
                </div>


                <a href="./add-newemployee.php">
                        <button class="btn btn-success"><img src="./images/add.png" alt=""> Add new</button>
                    </a>
                    <?php
        
        $output .= '
        
        <div class="table-responsive"> 
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Employee</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Hire Date</th>
                        <th scope="col">Pay Rate</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
        ';
            while($rows = sqlsrv_fetch_array($sql_select)){                
                $row_mysql_1 = mysqli_fetch_assoc(mysqli_query($connmysql,"Select * from employee where employee.idEmployee=".$rows['Employee_ID']));
                $row_mysql_2 = mysqli_fetch_assoc(mysqli_query($connmysql,"Select * from parollll.`pay_rates` where `idPay_Rates` = ".$row_mysql_1['PayRates_id']));
                $hire_date = $rows['Hire_Date'];
                $sumGenderM = 0;
                $sumGenderFM = 0;               
                    $gender = "";
                    if($rows['Gender']==0) $gender = "Nữ"; else $gender= "Nam";
                    $output .='                    
                     <tr>
                            <input type="hidden" class="form-control" name="idEmployee" value="'.$rows['Employee_ID'].'">
                            <td>'.$rows['First_Name'] ." ". $rows['Last_Name'].'</td>
                            <td>'.$rows['Address1'].'</td>
                            <td>'.$rows['City'].'</td>
                            <td>'.$rows['Phone_Number'].'</td>
                            <td>'.$gender.'</td>
                            <td>'.$hire_date->format('d-m-Y').'</td>
                            <td>'.$row_mysql_1['Pay_Rate'].'</td>
                         <td>
                             <a class="" href="./update-employee.php?id='.$rows['Employee_ID'].'"><img src="../images/edit.png" alt="" title="Edit"/></a>
                             <a class="" href="./employee-function.php?function=delete&id='.$rows['Employee_ID'].'"><img src="../images/delete.png" alt="" title="Delete"/></a>
                         </td>
                     </tr>
                 ';           
            }
        $output .='
            </tbody></table></div>
        ';
        echo $output;
?> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>