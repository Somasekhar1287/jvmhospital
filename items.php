<?php 

ob_start();
ob_clean();

session_start();

if(isset($_SESSION["is_user_logged"])){

include $_SERVER['DOCUMENT_ROOT'] . '/JVM/config.php';

    $items=json_decode($jvmClass->getPharmaItems());
    $categories=json_decode($jvmClass->getCategories());
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
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3 inv_btn_tab">
                <button type="button" class="btn btn-brand patient-tab" data-div="div1">Add Items </button>
            </div>
            <div class="col-md-3 inv_btn_tab">
                <button type="button" class="btn btn-brand patient-tab" data-div="div2">Show Items</button>
            </div>
        </div>
        <div class="row mt-3">

        </div>
        <div class="card div1 patient-table">
            <div class="card-header">
                <h2>Pharmacy Items</h2>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form method="POST">
                        <div class="row mt-3">
                            <div class="col-4">
                                <label>HSN Number</label>
                                <input type="number" name="hsn_number" class="form-control" min=0  required />
                            </div>
                            <div class="col-4">
                                <label>Item Name</label>
                                <input type="text" name="item_name" class="form-control" required />
                            </div>
                            <div class="col-4">
                                <label>Generic Name</label>
                                <input type="text"  name="generic_name" class="form-control " />
                            </div>
                             <div class="col-4">
                                <label>Manufactured</label>
                                <input type="text"  name="generic_name" class="form-control " />
                            </div>
                            
                            <div class="col-4 ">
                                <label>Category</label>
                                <select class="form-control" name="category">
                                    <option>Select Categories</option>
                                    <?php foreach($categories as $category){ ?>
                                        <?php if($category->result){  ?>
                                    <option><?php echo $category->cat_name; ?></option>
                                          <?php } ?>  

                                    <?php }  ?>
                                </select>            
                        
                            </div>
                            
                        </div>
                        <!--<div class="row mt-3">
                            <div class="col-4">
                                <label>Batch no</label>
                                <input type="text" name="batch_no" class="form-control" required />
                            </div>
                            <div class="col-4">
                                <label>Expiry Date</label><span class="age"></span>
                                <input type="date"  name="expiry_date" class="form-control date" />
                            </div>
                            
                        </div>
                        
                       <div class="row mt-3">
                            <div class="col-4">
                                <label>Unit Price</label>
                                <input type="number" step="0.01" name="unit_price" min="0" class="form-control" required />
                            </div>
                            <div class="col-4">
                                <label>Selling Price</label>
                                <input type="number" step="0.01"  name="sell_price" min="0" class="form-control " />
                            </div>
                            <div class="col-4">
                                <label>Stock Quantity </label>
                                <input type="number" name="quantity" min="0" class="form-control" />
                            </div>
                           
                        </div>-->
                        <div class="row mt-3">

                        </div>
                        <div class="col-6">
                            
                            <input type="submit" class="btn btn-form" name="add" value="Add" />
                        </div>
                        <div class="row mt-3">

                        </div>
                         
                    </form>
                </div>
            </div>
           
            
        </div>
        <div class="col-lg-12">
        <div class="card   div2 patient-table">
            <div class="card-header">
                <h2>Items</h2>
            </div>
            <div class="card-body div1">
                <div class="col-12">
                     <div class="table-responsive">
                   <table id="example" class="table table-striped table-bordered border-t0 text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th class="wd-15p">Hsn Number</th>
                                <th class="wd-15p">Item Name</th>
                                <th class="wd-15p">Item Code</th>
                                <th class="wd-15p">Generic Name</th>
                                <th class="wd-15p">Category</th>
                                
                                <th class="wd-25p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($items as $item){ ?>
                                <?php if($item->result){ ?>
                            <tr>
                                <td><?php echo $item->hsn_number; ?></td>
                                <td><?php echo $item->item_name; ?></td>
                                <td><?php echo $item->item_code; ?></td>
                                <td><?php echo $item->generic_name; ?></td>
                                <td><?php echo $item->category; ?></td>
                               
                                <td><?php if (in_array('11',$userPermissions)) { ?>
                                    <i class="fa fa-edit"></i>
                                    <?php } ?>
                                    <?php if (in_array('12',$userPermissions)) { ?>
                                    <i class="fa fa-trash"></i></td>
                                    <?php } ?>
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
        </div>
    </div>
    <?php include "../footer.php"; ?>
<?php 
date_default_timezone_set( 'Asia/Kolkata');
if(isset($_POST["add"])){
    $number=0;
    if($jvmClass->getItemLastID()){
        $number=$jvmClass->getItemLastID();
        $number=$number+1;
    }else{
       
        $number=$number+1;
    }
    if($number>999){
        $itemCode=$number;
    }else{
        $itemCode=str_pad($number, 3, "0", STR_PAD_LEFT);
        
    }
    $item_Code="jvmph".$itemCode;
    $item_name=$_POST["item_name"];
    $hsn_num=$_POST["hsn_number"];
    $generic_name=$_POST["generic_name"];
    $category=$_POST["category"];
    //$batch_no=$_POST["batch_no"];
    //$expiry_date=$_POST["expiry_date"];
    //$unit_price=$_POST["unit_price"];
    //$sell_price=$_POST["sell_price"];
    //$batch_no,$expiry_date,$unit_price,$sell_price,$quantity
    //$quantity=$_POST["quantity"];
    
    $timestamp=date("Y-m-d H:i:s");
    $created_by=$_SESSION["user_name"];
    $jvmClass->insertPharmaItem($item_Code,$hsn_num,$number,$item_name,$generic_name,$category,$created_by,$timestamp);
     header("Location: " . $_SERVER['PHP_SELF']);
    exit;

   
    
}

?>
<script>
    var date_of_birth=document.querySelector(".date");
    date_of_birth.addEventListener("change",function(){
        let dob=new Date(this.value);
        const cur_date=new Date();
        dob.setHours(0,0,0,0);
        cur_date.setHours(0,0,0,0);
        if(cur_date>dob || cur_date.getTime()===dob.getTime()){
            alert("Enter a date More than today date");
        }
        document.querySelector(".age").innerHTML=dob.getFullYear()-cur_date.getFullYear()+" years";
    });

    /*function calculateAge() {
    const dobInput = document.getElementById('dob').value;
    if (!dobInput) {
        document.getElementById('ageResult').textContent = "Please enter your date of birth.";
        return;
    }

    const dob = new Date(dobInput);
    const currentDate = new Date();

    let ageYears = currentDate.getFullYear() - dob.getFullYear();
    let ageMonths = currentDate.getMonth() - dob.getMonth();
    let ageDays = currentDate.getDate() - dob.getDate();

    // Adjust for months
    if (ageDays < 0) {
        ageMonths--;
        const lastDayOfPrevMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0).getDate();
        ageDays = lastDayOfPrevMonth - dob.getDate() + currentDate.getDate();
    }

    // Adjust for years
    if (ageMonths < 0) {
        ageYears--;
        ageMonths = 12 + ageMonths;
    }

    document.getElementById('ageResult').textContent = `${ageYears} years, ${ageMonths} months, and ${ageDays} days old.`;
}
*/


</script>
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