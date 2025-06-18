<?php
session_start();

if ($_SESSION["umail"] == "" || $_SESSION["umail"] == NULL) {
    header('Location:AdminLogin.php');
}

$userid = $_SESSION["umail"];
?>
<?php include('adminhead.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
            <h4 class="page-header">Add New Faculty </h4>
            <?php include("database.php"); ?>
            <form action="" method="POST" name="update">
                <div class="form-group">
                    <label for="Faculty Name">Faculty Name : <span style="color: #ff0000;">*</span></label>
                    <input type="text" name="fname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="Father Name">Father Name :<span style="color: #ff0000;">*</span></label>
                    <input type="text" class="form-control" name="faname" required>
                </div>

                <div class="form-group">
                    <label for="Address">Address : <span style="color: #ff0000;">*</span></label>
                    <input type="text" class="form-control" name="addrs" required>
                </div>

                <div class="form-group">
                    <label for="Gender">Gender : &nbsp;</label>
                    <input type="radio" name="gender" value="Male" checked> Male
                    <input type="radio" name="gender" value="Female"> Female
                </div>

                <div class="form-group">
                    <label for="PhoneNumber">Contact : <span style="color: #ff0000;">*</span></label>
                    <input type="text" class="form-control" name="phno" maxlength="10" required>
                </div>

                <div class="form-group">
                    <label for="Joining Date">Joining Date : <span style="color: #ff0000;">*</span></label>
                    <input type="date" class="form-control" name="jdate" required>
                </div>

                <div class="form-group">
                    <label for="City">City : <span style="color: #ff0000;">*</span></label>
                    <input type="text" class="form-control" name="city" required>
                </div>

               

                <div class="form-group">
                    <label for="Password">Password :<span style="color: #ff0000;">*</span></label>
                    <input type="password" class="form-control" name="pass" required>
                </div>

                <div class="form-group">
                    <input type="submit" value="Add New Faculty" name="addnewfaculty" class="btn btn-success">
                </div>
            </form>

            <?php
            if (isset($_POST['addnewfaculty'])) {
                $tempfname = $_POST['fname'];
                $tempfaname = $_POST['faname'];
                $tempaddrs = $_POST['addrs'];
                $tempgender = $_POST['gender'];
                $tempphno = $_POST['phno'];
                $tempjdate = $_POST['jdate'];
                $tempcity = $_POST['city'];
    
                $temppass = $_POST['pass'];

                $sql = "INSERT INTO facultytable (FName, FaName, Addrs, Gender, JDate, City, Pass, PhNo) 
                        VALUES ('$tempfname', '$tempfaname', '$tempaddrs', '$tempgender', '$tempjdate', '$tempcity',  '$temppass', '$tempphno')";

                if (mysqli_query($connect, $sql)) 
               {
                    echo "<div class='alert alert-success'>
                           <strong>Success!</strong> New Faculty Added. Faculty ID: " . mysqli_insert_id($connect) . "
                         </div>";
                } 
                else {
                    echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Failed to add faculty. " . mysqli_error($connect) . "
                          </div>";
                }
                mysqli_close($connect);
            }
            ?>
        </div>

        <div class="col-md-4"></div>
    </div>
</div>

<?php include('allfoot.php'); ?>
