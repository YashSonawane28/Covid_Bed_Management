
<?php
    
    

    //import database
    include("../connection.php");



    if($_POST){
        //print_r($_POST);
        //$result= $database->query("select * from webuser");
        $PatientName=$_POST['PatientName'];
        $oldemail=$_POST["oldemail"];
        //$bg=$_POST['bg'];
        $pemail=$_POST['pemail'];
        $Phone_no=$_POST['Phone_no'];
        $bedid=$_POST['bedid'];
        //$DOB=$_POST['DOB'];
       // $patientid=$_POST['patientid'];
        //echo($_SESSION('$PatientName'));
        //$sql1="insert into doctor(docemail,docname,docpassword,docnic,doctel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
        //$sql1="update patients set pemail='$pemail',PatientName='$PatientName',Phone_no='$Phone_no' where patientid=$patientid ;";
        $sql1="insert into patients(pemail,PatientName,Phone_no,bedid) VALUES('$pemail','$PatientName','$Phone_no','$bedid');";
        $database->query($sql1);

        $hosid1 = $database->query("select  patientid from patients where pemail = '$pemail';");
        for ($y=0;$y<$hosid1->num_rows;$y++){
            $row00 = $hosid1->fetch_assoc();
            $patientid = $row00["patientid"];
        }
        ;

        $sql2="update beds set patientid='$patientid' where bedid='$bedid' ;";
        $database->query($sql2);
        
        // $sql1="update webuser set email='$email' where email='$oldemail' ;";
        // $database->query($sql1);
        //echo $sql1;
        //echo $sql2;
        $error= '4';
        
        // if ($password==$cpassword){
        //     $error='3';
        //     $result= $database->query("select doctor.docid from doctor inner join webuser on doctor.docemail=webuser.email where webuser.email='$email';");
        //     //$resultqq= $database->query("select * from doctor where docid='$id';");
        //     if($result->num_rows==1){
        //         $id2=$result->fetch_assoc()["docid"];
        //     }else{
        //         $id2=$id;
        //     }
            
        //     echo $id2."jdfjdfdh";
        //     if($id2!=$id){
        //         $error='1';
        //         //$resultqq1= $database->query("select * from doctor where docemail='$email';");
        //         //$did= $resultqq1->fetch_assoc()["docid"];
        //         //if($resultqq1->num_rows==1){
                    
        //     }else{

        //         //$sql1="insert into doctor(docemail,docname,docpassword,docnic,doctel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
        //         $sql1="update doctor set docEmail='$email',doctorName='$name',contactno='$tele',specilization=$spec,experience='$experience' where docid=$id ;";
        //         $database->query($sql1);
                
        //         // $sql1="update webuser set email='$email' where email='$oldemail' ;";
        //         // $database->query($sql1);
        //         //echo $sql1;
        //         //echo $sql2;
        //         $error= '4';
                
        //     }
            
        // }else{
        //     $error='2';
        // }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: patient.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>