<?php
    session_start();
    include('assets/inc/config.php');
        if(isset($_POST['add_patient']))
        {
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
            $query="insert into his_patients (pat_fname,pat_lname,pat_dob,pat_age,pat_number,pat_gen,pat_status,pat_occ,pat_addr,pat_email,pat_phone,pat_type,pat_service,pat_diagnosis,pat_mop,pat_snum) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssssssssssssss', $pat_fname,$pat_lname,$pat_dob,$pat_age,$pat_number,$pat_gen,$pat_status,$pat_occ,$pat_addr,$pat_email,$pat_phone,$pat_type,$pat_service,$pat_diagnosis,$pat_mop,$pat_snum);
            $stmt->execute();
            
            /*Use Sweet Alerts Instead Of This  Javascript Alerts*/
            echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
             
            //declare a varible which will be passed to alert function
            if($stmt)
            {
                $success = "Patient Details Added";
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
                                            <li class="breadcrumb-item"><a href="his_doc_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                            <li class="breadcrumb-item active">Add Patient</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Patient Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
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
                                                    <input type="text" required="required" name="pat_fname" class="form-control" id="inputEmail4" placeholder="Patient's First Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" name="pat_lname" class="form-control"  id="inputPassword4" placeholder="Patient`s Last Name">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputdateofbirth" class="col-form-label">Date Of Birth</label>
                                                    <input type="Date" required="required" name="pat_dob" class="form-control" id="Date" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputage" class="col-form-label">Age</label>
                                                    <input required="required" type="text" name="pat_age" class="form-control"  id="inputPassword4" placeholder="Patient`s Age">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputgender" class="col-form-label"></label>
                                                    <select id="inputState" required="required" name="pat_gen" class="form-control">
                                                        <option>GENDER</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label"></label>
                                                    <select id="inputstatus" required="required" name="pat_status" class="form-control">
                                                        <option>MARITAL STATUS</option>
                                                        <option>Single</option>
                                                        <option>Married</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                <label for="inputoccupation" class="col-form-label">OCCUPATION</label>
                                                <input required="required" type="text" class="form-control" name="pat_occ" id="inputoccupation" placeholder="Occupation">
                                            </div>


                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Address</label>
                                                <input required="required" type="text" class="form-control" name="pat_addr" id="inputAddress" placeholder="Patient's Addresss">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail4" class="col-form-label">Email Address</label>
                                                <input required="required" type="text" class="form-control" name="pat_email" id="inputAddress" placeholder="Patient's Email Addresss">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Mobile Number</label>
                                                    <input required="required" type="text" name="pat_phone" class="form-control" id="inputCity">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Patient Type</label>
                                                    <select id="pat_type" required="required" name="pat_type" class="form-control">
                                                        <option>Patient Type</option>
                                                        <option>Home Visits</option>
                                                        <option>In-Patient</option>
                                                
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Services Type</label>
                                                    <select id="inputState" required="required" name="pat_service" class="form-control">
                                                        <option>Type of Service</option>
                                                        <option>Physiotherapy</option>
                                                        <option>Women's Health</option>
                                                          <option>Cardiac Rehabilitation</option>
                                                        <option>Psychotherapy</option>
                                                        <option>Ergonomics</option>
                                                        <option>Speech therapy</option>
                                                        <option>Sports Injury Rehabilitation</option>
                                                        <option>Occupational therapy</option>
                                                        <option>Fitness Training</option>
                                                        <option>Mental Health</option>



                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Diagnosis</label>
                                                    <input required="required" type="text" name="pat_diagnosis" class="form-control" id="inputCity">
                                                </div>



                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Mode Payment</label>
                                                    <select id="inputState" required="required" name="pat_mop" class="form-control">
                                                        <option>Mode of Payment</option>
                                                        <option>MASM</option>
                                                        <option>MEDHEALTH</option>
                                                        <option>LIBERTY</option>
                                                        <option>ESCOM</option>
                                                        <option>WATCHTOWER</option>
                                                        <option>EGENCO</option>
                                                        <option>CASH</option>
                                                    </select>
                                                </div>

                                                 

                                                <div class="form-group col-md-4">
                                                    <label for="inputsnum" class="col-form-label">Scheme Number</label>
                                                    <input required="required" type="text" name="pat_snum" class="form-control" id="inputCity">
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

                                            <button type="submit" name="add_patient" class="ladda-button btn btn-primary" data-style="expand-right">Add Patient</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
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