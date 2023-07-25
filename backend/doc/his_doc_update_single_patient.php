<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_patient']))
		{
            $pat_id = $_GET['pat_id'];
            $pat_fname=$_POST['pat_fname'];
            $pat_lname=$_POST['pat_lname'];
            $pat_dob = $_POST['pat_dob'];
            $pat_age = $_POST['pat_age'];
            $pat_number=$_POST['pat_number'];
            $pat_gen = $_POST['pat_gen'];
            $pat_status = $_POST['pat_status'];
            $pat_occ = $_POST['pat_occ'];
            $pat_addr = $_POST['pat_addr'];
            $pat_email = $_POST['pat_email'];
            $pat_phone=$_POST['pat_phone'];
            $pat_type=$_POST['pat_type'];
            $pat_service=$_POST['pat_service'];
            $pat_diagnosis = $_POST['pat_diagnosis'];
            $pat_mop = $_POST['pat_mop'];
            $pat_snum = $_POST['pat_snum'];
            //sql to insert captured values
            $query="UPDATE  his_patients  SET pat_fname=?, pat_lname=?,pat_dob=?,pat_age=?,pat_number=?, pat_gen=?, pat_status=?, pat_occ=?,pat_addr=?, pat_email=?,pat_phone=? ,pat_type=? ,pat_service=?, pat_diagnosis=? ,  pat_mop=? ,pat_snum=? WHERE pat_id = ?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssssssssssssssi', $pat_fname, $pat_lname, $pat_dob, $pat_age, $pat_number, $pat_gen, $pat_status, $pat_occ,  $pat_addr, $pat_email, $pat_phone, $pat_type, $pat_service, $pat_diagnosis, $pat_mop, $pat_snum, $pat_id);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Patient Details Updated";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                            <li class="breadcrumb-item active">Manage Patients</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Update Patient Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                        <?php
                            $pat_number=$_GET['pat_number'];
                            $ret="SELECT  * FROM his_patients WHERE pat_number=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$pat_number);
                            $stmt->execute() ;//ok
                            $res=$stmt->get_result();
                            //$cnt=1;
                            while($row=$res->fetch_object())
                            {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->pat_fname;?>" name="pat_fname" class="form-control" id="inputEmail4" placeholder="Patient's First Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_lname;?>" name="pat_lname" class="form-control"  id="inputPassword4" placeholder="Patient`s Last Name">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Date Of Birth</label>
                                                    <input type="text" required="required" value="<?php echo $row->pat_dob;?>" name="pat_dob" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_age;?>" name="pat_age" class="form-control"  id="inputPassword4" placeholder="Patient`s Age">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Gender</label>
                                                    <select id="inputState" required="required" name="pat_gen" class="form-control">
                                                        
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Marital Status</label>
                                                    <select id="inputState" required="required" name="pat_status"  class="form-control">
                                                        
                                                        <option>Single</option>
                                                        <option>Married</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">occupation</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_occ;?>" name="pat_occ" class="form-control"  id="inputPassword4" placeholder="Occupation">
                                                </div>



                                            </div>

                                            <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Physical Address</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_addr;?>" name="pat_addr" class="form-control"  id="inputPassword4" placeholder="Physical Address">
                                                </div>

                                            <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Email Address</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_email;?>" name="pat_email" class="form-control"  id="inputPassword4" placeholder="Email">
                                                </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Mobile Number</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_phone;?>" name="pat_phone" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Patient's Type</label>
                                                    <select id="inputState" required="required" name="pat_type" class="form-control">
                                                        
                                                        <option>InPatient</option>
                                                        <option>Home Based</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="service" class="col-form-label">Service</label>
                                                    <select id="service" required="service" name="pat_service"  <?php echo $row->pat_age;?> class="form-control">
                                                        
                                                        <option>Physiotherapy</option>
                                                        <option>Women's Health</option>
                                                        <option>Psychotherapy</option>
                                                        <option>Ergonomics</option>
                                                        <option>Speech therapy</option>
                                                        <option>Men & Women's Health</option>
                                                        <option>Occupational therapy</option>
                                                        <option>Fitness Training</option>
                                                        <option>Mental Health</option><
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Diognosis</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_diagnosis;?>" name="pat_diagnosis" class="form-control" id="inputCity">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Mode of Payment


                                                    </label>
                                                    
                                                    <select id="inputState" required="required" name="pat_mop" class="form-control">
                                                        
                                                        <option>MASM</option>
                                                        <option>MEDHEALTH</option>
                                                        <option>LIBERTY</option>
                                                        <option>ESCOM</option>
                                                        <option>WATCHTOWER</option>
                                                        <option>CASH</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Scheme Number</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_snum;?>" name="pat_snum" class="form-control" id="inputCity">
                                                </div>
                                                
                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Patient Number</label>
                                                    <input type="text" name="pat_number" value="<?php echo $patient_number;?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>

                                            <button type="submit" name="update_patient" class="ladda-button btn btn-success" data-style="expand-right">Update Patient</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <?php  }?>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>