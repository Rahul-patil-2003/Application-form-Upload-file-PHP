<?php
$con=mysqli_connect("localhost","root","");
if(mysqli_connect_errno()){
	echo("failed to connect to db:".mysqli_connect_error());
	exit();
}
else
	print("connection to mysql database sucessfull");
print("\n");
mysqli_select_db($con,"recruinment");
if(isset($_POST['submit']))
{
    $n=$_POST['name'];
    $yog=$_POST['year'];
    $y=2023-$yog;
    $no=$_POST['number'];
    $per=$_POST['percentage'];
    $file=$_FILES['file']['name'];
    $file_loc=$_FILES['file']['tmp_name'];
    $p="upload/";
    if($per>65 && $y<8){
        $sql="insert into applicant values('$n','$y','$per','$no')";
        if(move_uploaded_file($file_loc,$p.$file)){
            mysqli_query($con,$sql);
            echo "File uploaded sucessfully";
        }
        else{
            echo"$n,you are not succesfull";
        }
    }
    else{
        echo"Enter valid year";
    }
}
else{
    echo"There was a promblem in uploading";
}
?>