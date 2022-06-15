<?php

    include_once("../ceo/connect.php");
    if(isset($_GET['function'])){
        if($_GET['function'] === "add"){
            $id = $_POST['ID'];
            $firstName = $_POST['FirstName'];
            $lastName = $_POST['LastName'];
            $email = $_POST['Email'];
            $address = $_POST['Address'];
            $city = $_POST['City'];
            $phone = $_POST['Phone'];
            $gender = $_POST['Gender'];
            $hireDate = $_POST['HireDate'];
            $payRate = $_POST['PayRate'];
            $payRates = $_POST['PayRates'];
            $birthday = $_POST['Birthday'];
            $default = 0;
            // var_dump($hireDate);
            // exit();
            //add into table Personal
            // $result1 = sqlsrv_query($connsqlsv,"INSERT INTO Personal (`Employee_ID`,`First_Name`, `Last_Name`, `Middle_Initial`, `Address1`, `Address2`, `City`, `State`, `Zip`, `Email`, `Phone_Number`, `Social_Security_Number`, `Drivers_License`, `Marital_Status`, `Gender`, `Shareholder_Status`, `Benefit_Plans`, `Ethnicity`,`Birthday`) 
            // VALUES ('$id','$firstName','$lastName',null,'$address',null,'$city',null,null,'$email','$phone',null,null,null,$gender,0,null,null, CAST('$birthday' as datetime))");
            $result1 = sqlsrv_query($connsqlsv,"INSERT INTO Personal
                       (Employee_ID
                       ,First_Name
                       ,Last_Name
                       ,Middle_Initial
                       ,Address1
                       ,Address2
                       ,City
                       ,State
                       ,Zip
                       ,Email
                       ,Phone_Number
                       ,Social_Security_Number
                       ,Drivers_License
                       ,Marital_Status
                       ,Gender
                       ,Shareholder_Status
                       ,Benefit_Plans
                       ,Ethnicity) 
            VALUES ('$id','$firstName','$lastName',null,'$address',null,'$city',null,null,'$email','$phone',null,null,null,$gender,0,null,null)");
            //add into table Employment
            $result2 = sqlsrv_query($connsqlsv,"INSERT into Employment (
            Employee_ID
            ,Employment_Status
            ,Hire_Date
            ,Workers_Comp_Code
            ,Termination_Date
            ,Rehire_Date
            ,Last_Review_Date)
            VALUES ('$id', null, CAST('$hireDate' AS datetime) , null, null, null, null)");

            //add into employee table (mysql)
            $result3 = mysqli_query($connmysql,"INSERT INTO employee (`Employee_Number`, `idEmployee`, `Last_Name`, `First_Name`, `SSN`, `Pay_Rate`, `PayRates_id`, `Vacation_Days`, `Paid_To_Date`, `Paid_Last_Year`) VALUES ('$id','$id','$lastName','$firstName','1','$payRate',$payRates,0,'1','1')");            

            if($result1 > 0 && $result2 > 0 && $result3 > 0)
                header("Location:http://localhost/HrAndPayrol(v1.0)/manager/");
        }
        else if($_GET['function'] === "delete"){
            $id = $_GET['id'];
            $result1  = sqlsrv_query($connsqlsv, "DELETE From Employment where Employee_ID=$id");
            $result2  = sqlsrv_query($connsqlsv, "DELETE From Personal where Employee_ID=$id");
            $result3  = mysqli_query($connmysql, "DELETE From employee where `idEmployee`=$id");
            if($result1 > 0 && $result2 > 0 && $result3 > 0)
                header('location: employee-management.php');
        }
        else if($_GET['function'] == "update"){
            $id = $_POST['ID'];
            $firstName = $_POST['FirstName'];
            $lastName = $_POST['LastName'];
            $middle = $_POST['Middle'];
            $address1 = $_POST['Address1'];
            $address2 = $_POST['Address2'];
            $city = $_POST['City'];
            $state = $_POST['State'];
            $zip = $_POST['Zip'];
            $email = $_POST['Email'];                     
            $phone = $_POST['Phone'];
            $social_security_number = $_POST['Social'];
            $driver_license = $_POST['Driver'];
            $marital_status = $_POST['Marital'];
            $gender = $_POST['Gender'];
            $shareholder = $_POST['shareholder_status'];
            $benefit_plan = $_POST['Benefit_plan'];
            $ethnicity = $_POST['Ethnicity'];
            $employment = $_POST['Employment_status'];
            $wcc = $_POST['Wcc'];
            $ter = $_POST['Ter'];
            $rehire = $_POST['Rehire'];
            $review = $_POST['Review'];
            $ssn = $_POST['SSN'];
            $payRate = $_POST['PayRate'];
            $payRates = $_POST['PayRates'];
            $vacationDay = $_POST['Vacation'];
            $paid2Date = $_POST['Paidtodate'];
            $paidLastYear = $_POST['Paidlastyear'];
            $birthday = $_POST['Birthday'];

            //Update table Personal
            $result1 = sqlsrv_query($connsqlsv,"UPDATE Personal SET
                First_Name = '$firstName',
                Last_Name = '$lastName',
                Middle_Initial = '$middle',
                Address1 = '$address1',
                Address2 = '$address2',
                City = '$city',
                State = '$state',
                Zip = $zip,
                Email = '$email',
                Phone_Number = '$phone',
                Social_Security_Number = '$social_security_number',
                Drivers_License = '$driver_license',
                Marital_Status = '$marital_status',
                Gender = $gender,
                Shareholder_Status = $shareholder,
                Benefit_Plans = $benefit_plan,
                Ethnicity = '$ethnicity')
            Where Employee_ID=$id");
            //Update table Employment
            $result2 = sqlsrv_query($connsqlsv, "UPDATE Employment SET
                Employment_Status = '$employment',
                Workers_Comp_Code = '$wcc',
                Termination_Date = CAST('$ter' AS datetime),
                Rehire_Date = CAST('$rehire' AS datetime),
                Last_Review_Date = CAST('$review' AS datetime)
            Where Employee_ID = $id");

            //Update table employee mysql
            $result3= mysqli_query($connmysql, "UPDATE employee SET
                `Last_Name` = '$lastName',
                `First_Name` = '$firstName',
                SSN = $ssn,
                `Pay_Rate` = $payRate,
                `PayRates_id` = $payRates,
                `Vacation_Days` = $vacationDay,
                `Paid_To_Date` = $paid2Date,
                `Paid_Last_Year` = $paidLastYear
            Where `idEmployee` = $id");


            

            if($result1>0 && $result2>0 && $result3>0)
                header('location: employee-management.php');
        }
    }
    
?>