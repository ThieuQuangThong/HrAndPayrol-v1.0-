<?php
    include_once ("../ceo/connect.php");
    $payrates = mysqli_query($connmysql,"Select * from parollll.`pay_rates`");
    $d=0;
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
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

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
        <div class="container-fluid pt-4  ">
                <h1>Add new Employee</h1>
                <form action="./employee-function.php?function=add" enctype="multipart/form-data" method="post" id="form">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Employee ID</label>
                        <input type="number" class="form-control" name="ID" placeholder="" id="employeeId">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">First Name</label>
                        <span id="err_name"></span>
                        <input type="text" class="form-control" name="FirstName" placeholder="" id="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Last Name</label>
                        <span id="err_lastname"></span>
                        <input type="text" class="form-control" name="LastName" placeholder="" id="lastname">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Birthday</label>
                        <span id="err_date"></span>
                        <input type="date" class="form-control" name="Birthday" placeholder="" id="date">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <span id="err_email"></span>
                        <input type="email" class="form-control" name="Email" placeholder="name@example.com" id="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Address</label>
                        <span id="err_address"></span>
                        <input type="text" class="form-control" name="Address" placeholder="" id="address">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">City</label>
                        <span id="err_city"></span>
                        <input type="text" class="form-control" name="City" placeholder="" id="city">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone</label>
                        <span id="err_phone"></span>
                        <input type="text" class="form-control" name="Phone" placeholder="" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gender</label>
                        <select class="form-select" aria-label="Default select example" name="Gender">
                            <option value="1" selected>Male</option>
                            <option value="0">Female</option>
                        </select>
                    </div>                   
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Hire Date</label>
                        <span id="err_date"></span>
                        <input type="date" class="form-control" name="HireDate" placeholder="" id="date">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Pay Rate</label>
                        <span id="err_pay"></span>
                        <input type="numeric" class="form-control" name="PayRate" placeholder="" id="payrate">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Pay Type</label>
                        <select class="form-select" aria-label="Default select example" name="PayRates" id="paytype">
                            <?php while($item = mysqli_fetch_array($payrates)){ 
                                if($d==0){ ?>
                                <option value="<?php echo $item['idPay_Rates'] ?>" selected><?php echo $item['Pay_Rate_Name']; ?></option>
                            <?php  $d++;}
                                else{ ?>
                                <option value="<?php echo $item['idPay_Rates'] ?>" ><?php echo $item['Pay_Rate_Name']; ?></option>
                            <?php    }?>
                                
                            <?php }  ?>
                          
                        </select>
                    </div> 
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><img src="../images/add.png" alt=""> &nbsp;Add</button>
                    </div>
                </form>
                
            </div>

    </div>

</body>
</html>