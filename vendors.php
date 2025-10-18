<?php 

ob_start();
ob_clean();

session_start();

if(isset($_SESSION["is_user_logged"])){

include $_SERVER['DOCUMENT_ROOT'] . '/JVM/config.php';

    $vendors=json_decode($jvmClass->getVendors());
    $userPermissions=json_decode($jvmClass->getUserPermissions($_SESSION["user_id"]));
    $role_id=$_SESSION["role_id"];
    $role_perms=json_decode($jvmClass->getRolePermissions($role_id));
    if (in_array('2',$role_perms)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JVM | <?php echo ucwords(basename($_SERVER['PHP_SELF'], '.php')); ?></title>
       <link rel="stylesheet" href="../assets/css/form.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/plugins/Datatable/css/dataTables.bootstrap4.css">
    <!--Sidemenu css-->
	<link rel="stylesheet" href="../assets/plugins/toggle-menu/sidemenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .age{
            margin-left:30px;
        }
    </style>
</head>
<body class="app ">
    <div id="spinner"></div>
    <div id="app">
			<div class="main-wrapper" >
                <?php 
                        include "../nav.php";
                        include "../sidenav.php";
                ?>
    <div class="app-content">
        <div class="row mt-3">
            <div class="col-md-3 inv_btn_tab">
                <button type="button" class="btn btn-brand patient-tab" data-div="div1">Add Vendor </button>
            </div>
            <div class="col-md-3 inv_btn_tab">
                <button type="button" class="btn btn-brand patient-tab" data-div="div2">Show Vendor</button>
            </div>
        </div>
        <div class="row mt-3">

        </div>
        <div class="card div1 patient-table">
            <div class="card-header">
                <h2>Add Vendor </h2>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form method="POST">
                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Vendor Name</label>
                                <input type="text" name="vendor_name" class="form-control" required />
                            </div>
                            <div class="col-4">
                                <label>Contact Person Name</label>
                                <input type="text"  name="contact_name" class="form-control " />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Mobile</label>
                                <input type="number" name="mobile" class="form-control" required />
                            </div>
                            <div class="col-4">
                                <label>Email </label>
                                <input type="email" name="email" class="form-control" />
                            </div>
                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label>GST Number</label>
                                <input type="text" name="gst_number" class="form-control"  />
                            </div>
                            <div class="col-4">
                                <label>Drug License Number </label>
                                <input type="text" name="dl_num" class="form-control" />
                            </div>
                            
                        </div>
                         <div class="row mt-3">
                            <div class="col-4">
                                <label>Bank Name</label>
                                <input type="text" name="bank_name" class="form-control"  />
                            </div>
                            <div class="col-4">
                                <label>Bank Account number </label>
                                <input type="text" name="account_num" class="form-control" />
                            </div>
                            
                        </div>
                        <div class="row mt-3"></div>
                        <div class="col-6">
                            
                            <input type="submit" class="btn btn-form" name="register" value="Register" />
                        </div>
                        <div class="row mt-3"></div>
                    </form>
                </div>
            </div>
           
            
        </div>
        <div class="card div2 patient-table">
            <div class="card-header">
                <h2>Vendors</h2>
            </div>
            <div class="card-body div1">
                <div class="col-12">
                   <table id="example" class="table table-striped table-bordered border-t0 text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th class="wd-15p">Vendor Name</th>
                                <th class="wd-15p">Contact Person Name</th>
                                
                                <th class="wd-10p">Mobile</th>
                                <th class="wd-25p">E-mail</th>
                                <th class="wd-25p">Drug license Number</th>
                                <th class="wd-25p">Gst Number</th>
                                <th class="wd-25p">Bank Name</th>
                                <th class="wd-25p">Account number</th>
                                
                                <th class="wd-25p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($vendors as $vendor){ ?>
                                <?php if($vendor->result){ ?>
                            <tr>
                                <td><?php echo $vendor->vendor_name; ?></td>
                                <td><?php echo $vendor->contact_person; ?></td>
                               
                                <td><?php echo $vendor->phone; ?></td>
                                <td><?php echo $vendor->email; ?></td>
                                <td><?php echo $vendor->dl_number; ?></td>
                                <td><?php echo $vendor->gst_number; ?></td>
                                <td><?php echo $vendor->bank_name; ?></td>
                                <td><?php echo $vendor->account_number; ?></td>
                                
                                <td>
                                <?php if (in_array('20',$userPermissions)) { ?>    
                                <i class="fa fa-edit"></i>
                                <?php } ?>
                                <?php if (in_array('21',$userPermissions)) { ?>
                                    <i class="fa fa-trash"></i>
                                <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
           
            
        </div>
    </div>
        </div>
    </div>
    <?php include "../footer.php"; ?>
<?php 
date_default_timezone_set( 'Asia/Kolkata');
if(isset($_POST["register"])){
    
    
   
    
    $vendor_name=$_POST["vendor_name"];
    $contact_name=$_POST["contact_name"];
   
    $dl_num=$_POST["dl_num"];
    
    
    
    $mobile=$_POST["mobile"];
    if(isset($_POST["email"])){
        $email=$_POST["email"];
    }else{
        $email="";
    }
    
    if(isset($_POST["gst_number"])){
         $gst_number=$_POST["gst_number"];
    }else{
         $gst_number="";
    }

    if(isset($_POST["bank_name"])){
         $bank_name=$_POST["bank_name"];
    }else{
        $bank_name="";
    }

    if(isset($_POST["account_num"])){
         $account_num=$_POST["account_num"];
    }else{
        $account_num="";
    }
    
    $timestamp=date("Y-m-d H:i:s");
    $created_by=$_SESSION["user_name"];
    $jvmClass->insertVendor($vendor_name,$dl_num,$contact_name,$email,$mobile,$gst_number,$bank_name,$account_num,$created_by,$timestamp);
     header("Location: " . $_SERVER['PHP_SELF']);
    exit;

  
    
}

?>

<script src="../assets/js/jquery.min.js"></script>

		<!--popper js-->
		<script src="../assets/js/popper.js"></script>

		<!--Tooltip js-->
		<script src="../assets/js/tooltip.js"></script>

		<!--Bootstrap.min js-->
		<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery.nicescroll.min js-->
		<script src="../assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

		<!--Scroll-up-bar.min js-->
		<script src="../assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

		<!--Sidemenu js-->
		<script src="../assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--mCustomScrollbar js-->
		<script src="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
		
		<!-- jQuery Sparklines -->
		<script src="../assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

		<!-- ECharts -->
		<script src="../assets/plugins/echarts/dist/echarts.js"></script>
		
        <!--Jquery.knob js-->
		<script src="../assets/plugins/othercharts/jquery.knob.js"></script>
        <script src="../assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!--Morris js-->
		<script src="../assets/plugins/morris/morris.min.js"></script>
		<script src="../assets/plugins/morris/raphael.min.js"></script>	

		<!--Scripts js-->
		<script src="../assets/js/scripts.js"></script>

		<!--Dashboard js-->
		<script src="../assets/js/dashboard.js"></script>
		<script src="../assets/js/sparkline.js"></script>
		<script src="../assets/js/apexcharts.js"></script>
        <script src="../assets/plugins/Datatable/js/jquery.dataTables.js"></script>
		<script src="../assets/plugins/Datatable/js/dataTables.bootstrap4.js"></script>
        <script>
		    $('div.patient-table').not(':eq(0)').hide();

            $(".patient-tab").on("click",function(){
                var container=$(this).data('div');
                console.log(container);
                    $('.patient-table').hide().filter('.' + container).show();
            
            });
		</script>
        <script>
			$(function(e) {
				$('#example').DataTable();
			} );
		</script>
</body>
</html>
<?php 
 } else{
       header("location:../login.php");
	exit(); 
    }

}else{

	header("location:../login.php");
	exit();
}
 ?>