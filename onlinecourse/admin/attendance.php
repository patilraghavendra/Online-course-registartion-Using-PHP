<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

//Code for Insertion
if(isset($_POST['submit']))
{
@$studentname=$_POST['studentname'];
@$registrationnumber=$_POST['registrationnumber'];
@$attendancereport=$_POST['attendancereport'];
$ret=mysqli_query($con,"insert into attendance(studentname,registrationnumber,attendancereport,datemarked) values('$studentname','$registrationnumber','$attendancereport','$datemarked')");
if($ret)
{
 echo '<script>alert("attendance submitted Successfully !!")</script>';
 echo '<script>window.location.href=attendance.php</script>';
 }else {
 echo '<script>alert("Error : attendance not submitted!!")</script>';
 echo '<script>window.location.href=attendance.php</script>';
 }
}

//Code for Insertion
if(isset($_GET['del']))
{
mysqli_query($con,"delete from attendance where id = '".$_GET['id']."'");
echo '<script>alert("attendance deleted!!")</script>';
echo '<script>window.location.href=attendance.php</script>';
      }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin | Course</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">attendance  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           attendance
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
 <div class="form-group">
    <label for="Student name">Student name  </label>
    <input type="text" class="form-control" id="Studentname" name="Student name" placeholder="Student name" required />
  </div>

  <div class="form-group">
    <label for="Registration Number">Registration Number  </label>
    <input type="text" class="form-control" id="RegistrationNumber" name="Registration Number" placeholder="Registration Number" required />
  </div>

<div class="form-group">
    <label for="Attendance report">Attendance report  </label>
    <input type="text" class="form-control" id="Attendancereport" name="Attendance report" placeholder="Attendance report" required />
  </div>   

 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Attendance
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student name</th>
                                            <th>Registration Number </th>
                                            <th>Attendance report</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from attendance");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['studentname']);?></td>
                                            <td><?php echo htmlentities($row['registrationnumber']);?></td>
                                            <td><?php echo htmlentities($row['attendancereport']);?></td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
                </div>
            </div>





        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>
<?php } ?>

