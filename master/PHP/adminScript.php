<?php
    
    //Make bool value to return true if admin is sending.
    //$isAdmin = filter_input(INPUT_POST, 'admincontrol', FILTER_VALIDATE_BOOL);
    $isAdmin = filter_input(INPUT_POST, 'adminaccess', FILTER_VALIDATE_BOOL);
    $host = "localhost";
    $dbname = "rom_database";
    $username = "root";
    $password = "12354";
    $conn = mysqli_connect($host, $username, $password, $dbname);
        
    //if (mysqli_connect_errno()) { die("Connection error: " . mysqli_connect_error()); }   


    if($isAdmin){
        $servicevalue = $_POST["service"];
        $unitsvalue = filter_input(INPUT_POST, 'units', FILTER_VALIDATE_INT);
        $paymentvalue = filter_input(INPUT_POST, 'payment', FILTER_VALIDATE_BOOL);
        $yearlyvalue = filter_input(INPUT_POST, 'yearlycost', FILTER_VALIDATE_INT);
        $weeklyvalue = filter_input(INPUT_POST, 'weeklycost', FILTER_VALIDATE_INT);
        $startvalue = $_POST["dosstart"];
        $endvalue = $_POST["dosend"];
        $descvalue = $_POST['description'];
        //$nestedArray = [["Service 6", 2, 3], ["Service 2", 5, 6]];
        //$servicearray = [["Service "],[]];      
        //foreach($nestedArray as $subArray) {
            //foreach ($subArray as $element) {
                //echo $element . "\n";
                //echo $index . "\n";
        $sql = "INSERT INTO message ($servicevalue, 
                                            $unitsvalue, 
                                            $paymentvalue, 
                                            $yearlyvalue, 
                                            $weeklyvalue, 
                                            $startvalue, 
                                            $endvalue, 
                                            $descvalue)
                                            VALUES (?,?,?,?,?,?,?,?)";
        //}
        
        $stmt = mysqli_stmt_init($conn);
        if ( ! mysqli_stmt_prepare($stmt, $sql)) { die(mysqli_error($conn)); }
        mysqli_stmt_bind_param($stmt,'siiiisss',
            $servicevalue, $unitsvalue, $paymentvalue,
            $yearlyvalue, $weeklyvalue, $startvalue,
            $endvalue, $descvalue
        );
        mysqli_stmt_execute($stmt);
        echo "Admin record(s) saved.";
    }
    else{
        $customeremail = $_POST['customeremail'];
        $projectname = $_POST['projectname']; 
        $regname = $_POST['regularname'];
        $tpmname = $_POST['tpm'];
        $financialanalyst = $_POST['financial'];
        $fileupload = $_POST['pathname'];
        echo $customeremail;
        echo $projectname;
        echo $regname;
        echo $tpmname;
        echo $financialanalyst;
        echo $fileupload;
        $sql = "INSERT INTO message ($customeremail, 
                                            $projectname, 
                                            $regname, 
                                            $tpmname, 
                                            $financialanalyst, 
                                            $fileupload, 
                                            )
                                            VALUES (?,?,?,?,?,?)";
        //}
        $stmt = mysqli_stmt_init($conn);
        if ( ! mysqli_stmt_prepare($stmt, $sql)) { die(mysqli_error($conn)); }
        mysqli_stmt_bind_param($stmt,'ssssss',
        $customeremail, 
        $projectname, 
        $regname, 
        $tpmname, 
        $financialanalyst, 
        $fileupload
        );
        mysqli_stmt_execute($stmt);
        echo "Admin record(s) saved.";
    }