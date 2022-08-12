<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');
if(isset($_POST['btn_submit'])){

    if(isset($_GET['editid']))
    {
        $sql ="UPDATE prescription  SET prescription_id='$_POST[precription_id]',
        doctorid='$_POST[doctorid]',patientid='$_POST[patientid]',prescriptiondate='$_POST[prescriptiondate]',
        delivery_type='$_POST[delivery_type]', delivery_id=$_POST[delivery_id]',  status='$_POST[status]',appointmentid=$_POST[appointment] WHERE prescriptionid='$_GET[editid]'";
        if($qsql = mysqli_query($conn,$sql))
        {
            
?>
<div class="popup popup--icon -success js_success-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
        <h3 class="popup__content__title">
            Success
        </h3>
        <p>prescription record updated successfully</p>
        <p>
             <<a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a>
            <?php echo "<script>setTimeout(\"location.href = 'redirectprescription.php';\",1500);</script>"; ?>
        </p>
    </div>
</div> 
<?php
            
            header("Location: redirectprescription.php");
        
        }else
        {
            echo mysqli_error($conn);
        }   
    }
    else
    {
        
        
        $patientid = $_POST['patientid'];
        $treamentrecordid = $_POST['treatment_records_id'];
        
        $appointmentid = $_POST['appointmentid'];
        $doctorid = $_POST['doctorid'];
        $presciptiondate = $_POST['prescriptiondate'];
        $status = $_POST['status'];
        $delivery_id = $_POST['delivery_id'];
        $delivery_type =$_POST['delivery_type'];
        

        

       
    //    $sql = "INSERT INTO prescription ( treatment_records_id, doctorid, 
    //    patientid, delivery_type, delivery_id, prescriptiondate, status, appointmentid) 
    //    values( $treamentrecordid, $doctorid, $patientid, $delivery_type, $delivery_id,
    //    $presciptiondate,  $status, $appointmentid)";
       $sql = "INSERT INTO prescription (treatment_records_id, doctorid, patientid, delivery_type, delivery_id, prescriptiondate, status, appointmentid) 
       VALUES ($treamentrecordid, $doctorid, $patientid, '$delivery_type', $delivery_id, $presciptiondate, '$status', $appointmentid)";
    //    var_dump($sql);
    //    die;

      if($qsql = mysqli_query($conn,$sql))
        {  
            // var_dump($qsql);
            // die;
?>
<div class="popup popup--icon -success js_success-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
        <h3 class="popup__content__title">
            Success
        </h3>
        <p>Prescription record inserted successfully.</p>
        <p>
              <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> 
              <?php echo "<script>setTimeout(\"location.href = 'redirectprescription.php';\",1500);</script>"; ?>

        </p>
    </div>
</div>
<?php
             
        }
        
    }
    }

if(isset($_GET['editid']))
{
    $sql="SELECT * FROM prescription WHERE prescription_id='$_GET[editid]' ";
    $qsql = mysqli_query($conn,$sql);
    $rsedit = mysqli_fetch_array($qsql);
    
}
?>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Add Prescription </h4>
                                    <!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Prescription</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Add prescription </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
             

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card">
                                <div class="card-header">
                                    <!-- <h5>Basic Inputs Validation</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                </div>
                                <div class="card-block">
                                    <form id="main" method="post" action="redirectprescription.php" enctype="multipart/form-data">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Treatment Records_ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="treatment_records_id"
                                                    id="treatment_records_id"
                                                    value="<?php echo $_GET['treatment_records_id']; ?>" readonly>
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Doctor_ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="doctorid" id="doctorid"
                                                    value="<?php echo $_GET['doctorid']; ?>" readonly>
                                                <span class="messages"></span>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Patient ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="patientid" id="patientid"
                                                    value="<?php echo $_GET['patientid']; ?>" readonly>
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Delivery_Type</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="delivery_type"
                                                    id="delivery_type"
                                                    value="<?php if(isset($_GET['editid'])) { echo $rsedit['delivery_type']; } ?>">
                                                <span class="messages"></span>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Delivery_ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="delivery_id"
                                                    id="delivery_id"
                                                    value="<?php if(isset($_GET['editid'])) { echo $rsedit['delivery_id']; } ?>">
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Prescription Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="prescriptiondate"
                                                    id="prescriptiondate"
                                                    value="<?php if(isset($_GET['editid'])) { echo $rsedit['prescriptiondate']; } ?>" />
                                                <span class="messages"></span>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select name="status" id="status" class="form-control" required="">
                                                    <option value="">-- Select One -- </option>
                                                    <option value="Active" <?php if(isset($_GET['editid']))
        { if($rsedit['status'] == 'Active') { echo 'selected'; } } ?>>Active</option>
                                                    <option value="Inactive" <?php if(isset($_GET['editid']))
        { if($rsedit['status'] == 'Inactive') { echo 'selected'; } } ?>>Inactive</option>
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Appointment_ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="appointmentid"
                                                    id="appointmentid"
                                                    value="<?php echo $_GET['appointmentid'];?>" readonly>
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="btn_submit"
                                                    class="btn btn-primary m-b-0">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>

<script type="text/javascript">
$('#main').keyup(function() {
    $('#confirm-pw').html('');
});

$('#cnfirmpassword').change(function() {
    if ($('#cnfirmpassword').val() != $('#password').val()) {
        $('#confirm-pw').html('Password Not Match');
    }
});

$('#password').change(function() {
    if ($('#cnfirmpassword').val() != $('#password').val()) {
        $('#confirm-pw').html('Password Not Match');
    }
});
</script>