<?php 

ob_start();
ob_clean();

session_start();

if(isset($_SESSION["is_user_logged"])){

include $_SERVER['DOCUMENT_ROOT'] . '/JVM/config.php';

    $purchases=json_decode($jvmClass->getpurchases());
    $purchaseReturns=json_decode($jvmClass->getpurchaseReturns());
    $vendors=json_decode($jvmClass->getVendors());
    $items=json_decode($jvmClass->getPharmaItems());
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
         #returnModal label{
            display:inline-block;
        }
        #returnModal p{
            display:inline-block;
            text-transform:uppercase;
            font-weight: 500;
            letter-spacing: 1px;
            color: #024eb1;
        }
    </style>
    <style>
        table { border-collapse: collapse; width: 98%; margin:20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; margin-top:20px;}
        
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
                <button type="button" class="btn btn-brand patient-tab" data-div="div1">Add Purchase </button>
            </div>
            <div class="col-md-3 inv_btn_tab">
                <button type="button" class="btn btn-brand patient-tab" data-div="div2">Purchases</button>
            </div>
             <div class="col-md-3 inv_btn_tab">
                <button type="button" class="btn btn-brand patient-tab" data-div="div3">Purchase Returns</button>
            </div>
        </div>
        <div class="row mt-3">

        </div>
        <div class="card div1 patient-table">
            <div class="card-header">
                <h2>Purchase </h2>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form method="POST">
                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Vendor</label>
                                <select name="vendor_id" class="form-control">
                                <?php foreach($vendors as $vendor){ ?>
                                    <?php if($vendor->result){ ?>
                                        <option value="<?php echo $vendor->vendor_id; ?>"><?php echo $vendor->vendor_name; ?></option>
                                        <?php } ?>
                            <?php } ?>
                                </select>
                                
                            </div>
                             <div class="col-4">
                                <label>Invoice Number</label>
                                <input type="text"  name="invoice_num" class="form-control " />
                            </div>
                            <div class="col-4">
                                <label>Date of Purchase</label>
                                <input type="date"  name="purchase_date" class="form-control " />
                            </div>   
                            
                        </div>
                        <div class="row mt-3">
                            <table id="invoiceTable">
                                <tr>
                                    <th>Item</th>
                                    <th>Batch No</th>
                                    <th>Expiry date</th>
                                    
                                    <th>Pack</th>
                                    <th>Quantity</th>
                                    <th>Free Quantity</th>
                                    <th>Discount</th>
                                    <th>Unit Amount</th>
                                    <th>Selling Amount</th>
                                    <th>Action</th>
                                </tr>
                                <tr class="purchase_items_tr">
                                    <td >
                                        <select  class="form-control" name="item[]" id="item">
                                            <?php foreach($items as $item){ ?>
                                                <?php if($item->result){ ?>
                                                    <option value="<?php echo $item->item_id; ?>"><?php echo $item->item_name; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select></td>
                                    
                                    <td class="batch_td"><input type="text" class="form-control " name="batch_no[]"  required></td>
                                    <td class="expr_td"><input type="date" class="form-control " name="expiry_date[]" required></td>
                                    <td class="pack_td"><input type="number" class="form-control pack" name="pack[]" min="0" required></td>
                                    <td class="qty_td"><input type="number" class="form-control qty" name="quantity[]" min="1" required></td>
                                    <td class="fqty_td"><input type="number" class="form-control fqty" name="free_quantity[]" min="0" required></td>
                                    <td class="discount_td"><input type="number" class="form-control discount" step="0.01" name="discount[]" required></td>
                                    <td class="amount_td"><input type="number" class="form-control uamount" step="0.01" name="uamount[]" required></td>
                                    <td class="samount_td"><input type="number" class="form-control samount" step="0.01" name="samount[]" required></td>
                                    
                                    <td><button type="button" class="btn btn-primary " onclick="addRow()">+</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Total Amount</label>
                                <input type="number" name="total_amount" class="form-control total_amount" step="0.01"  />
                            </div>
                            <div class="col-4">
                                <label>Paid Amount</label>
                                <input type="number" name="paid_amount" class="form-control paid_amount" step="0.01"  />
                            </div>
                           <div class="col-4">
                                <label>Balance Amount</label>
                                <input type="number" name="balance_amount" class="form-control bal_amount"  step="0.01" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label>GST (%)</label>
                                <input type="number" name="gst_amount" class="form-control gst" step="0.01" min=0 value=0 />
                            </div>
                           
                        </div>
                         <div class="row mt-3"></div>
                        <div class="col-6">
                            
                            <input type="submit" class="btn btn-form" name="add" value="Add" />
                        </div>
                        <div class="row mt-3"></div>
                    </form>
                </div>
            </div>
           
            
        </div>
        <div class="card div2 patient-table">
            <div class="card-header">
                <h2>Purchases</h2>
            </div>
            <div class="card-body div1">
                <div class="col-12">
                   <table id="example" class="table table-striped table-bordered border-t0 text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th class="wd-15p">Vendor Name</th>
                                <th class="wd-15p">Purchase Date</th>
                                <th class="wd-15p">Total Amount</th>
                                <th class="wd-15p">Paid Amount</th>
                                <th class="wd-15p">Balance Amount</th>
                               
                                <th class="wd-25p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($purchases as $purchase){ ?>
                                <?php if($purchase->result){ ?>
                            <tr>
                                <td class="vendor_name"><?php echo $purchase->vendor_name; ?></td>
                                <td><?php echo $purchase->purchase_date; ?></td>
                                <td><?php echo $purchase->total_amount; ?></td>
                                <td><?php echo $purchase->paid_amount; ?></td>
                                <td><?php echo $purchase->bal_amount; ?></td>
                                
                                <td>
                                    <?php if (in_array('14',$userPermissions)) { ?>
                                        <i class="fa fa-edit"></i>
                                    <?php } ?>
                                    <a href="/JVM/pharmacy/purchase_bill.php?purchase_id=<?php echo $purchase->purchase_id; ?>"><i class="fa fa-print"></i></a>
                                    <i class="fa fa-eye" id="purchase_modal" data-toggle="modal" data-id="<?php echo $purchase->purchase_id; ?>" data-target="#largeModal"></i>
                                    <?php if (in_array('15',$userPermissions)) { ?>
                                    <i class="fa fa-trash"></i>
                                        <?php } ?>
                                    <i class="fa fa-undo" id="purchase_return_modal" data-toggle="modal" data-id="<?php echo $purchase->purchase_id; ?>" data-target="#returnModal"></i>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
           
            
        </div>
        <div class="card div3 patient-table">
            <div class="card-header">
                <h2>Purchase Returns</h2>
            </div>
            <div class="card-body div1">
                <div class="col-12">
                   <table id="examplereturns" class="table table-striped table-bordered border-t0 text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th class="wd-15p">Vendor Name</th>
                                <th class="wd-15p">Purchase Retrun Date</th>
                                <th class="wd-15p">Total Amount</th>
                                <th class="wd-15p">Reason</th>
                                <th class="wd-15p">Balance Amount</th>
                               
                                <th class="wd-25p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($purchaseReturns as $purchase){ ?>
                                <?php if($purchase->result){ ?>
                            <tr>
                                <td class="vendor_name"><?php echo $purchase->vendor_name; ?></td>
                                <td><?php echo $purchase->return_date; ?></td>
                                <td><?php echo $purchase->total_amount; ?></td>
                                <td><?php echo $purchase->reason; ?></td>
                                <td><?php echo $purchase->balance_amount; ?></td>
                                
                                <td>
                                    <?php if (in_array('14',$userPermissions)) { ?>
                                        <i class="fa fa-edit"></i>
                                    <?php } ?>
                                    <a href="/JVM/pharmacy/purchase_return_bill.php?purchase_id=<?php echo $purchase->return_id; ?>"><i class="fa fa-print"></i></a>
                                    <i class="fa fa-eye" id="purchase_modal" data-toggle="modal" data-id="<?php echo $purchase->purchase_id; ?>" data-target="#largeModal"></i>
                                    <?php if (in_array('15',$userPermissions)) { ?>
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
    <div id="returnModal" class="modal fade">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content ">
							<div class="modal-header pd-x-20">
								<h6 class="modal-title">Purchase Retruns</h6>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body pd-20">
								<form method="POST">
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Vendor</label>
                                            <p id="vendor"></p>
                                            
                                        </div>
                                         
                                        
                                    </div>
                                    <div class="row mt-3">
                                         <div class="col-4">
                                            <label>Purchase Id</label>
                                            <input type="number"  name="purchase_id" class="form-control purchase_id" readonly />
                                        </div> 
                                        <div class="col-4">
                                            <label>Purchase Return Date</label>
                                            <input type="date"  name="purchase_return_date" class="form-control " />
                                        </div>   
                                        
                                    </div>
                                    <div class="row mt-3">
                                        <table id="invoiceTable">
                                            <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Item Name</th>
                                                
                                                <th>Quantity</th>
                                                <th>Amount</th>
                                                <th>Total Item Amount</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody class="purchase_return_items_tr">
                                               
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Total Amount</label>
                                            <input type="number" name="total_amount" class="form-control total_amount" step="0.01" readonly  />
                                        </div>
                                        <div class="col-4">
                                            <label>Paid Amount</label>
                                            <input type="number" name="paid_amount" class="form-control paid_amount" step="0.01" readonly  />
                                        </div>
                                    <div class="col-4">
                                            <label>Balance Amount</label>
                                            <input type="number" name="balance_amount" class="form-control bal_amount"  step="0.01" readonly />
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                        <label>Reason</label>
                                        <input type="text" name="return_reason" class="form-control"  />
                                        </div>
                                    </div>
                                    <div class="row mt-3"></div>
                                    <div class="col-6">
                                        
                                        <input type="submit" class="btn btn-form" name="purchase_return" value="Return" />
                                    </div>
                                    <div class="row mt-3"></div>
                                </form>
							</div><!-- modal-body -->
							<div class="modal-footer">
								
							</div>
						</div>
					</div><!-- modal-dialog -->
				</div><!-- modal -->
    <div id="largeModal" class="modal fade">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content ">
							<div class="modal-header pd-x-20">
								<h6 class="modal-title">Purchase Details</h6>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body pd-20">
								<h5 class=" lh-3 mg-b-20"><a href="#" class="font-weight-bold">Tabular View</a></h5>
                                <table id="purchase_details" class="table table-striped table-bordered border-t0 text-nowrap w-100" >
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Item Name</th>
                                            <th class="wd-15p">Qunatity Date</th>
                                            <th class="wd-15p">Unit Price</th>
                                            <th class="wd-15p">Total Price</th>
                                        
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="purchase_tb">
                                        
                                    </tbody>
                                </table>
							</div><!-- modal-body -->
							<div class="modal-footer">
								
								<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div><!-- modal-dialog -->
				</div>
				<?php include "../footer.php"; ?>
<?php 
date_default_timezone_set( 'Asia/Kolkata');
if(isset($_POST["add"])){
    $number=0;
    if($jvmClass->getPurchaseLastOpID()){
            $number=$jvmClass->getPurchaseLastOpID();
            $number=$number+1;
        }else{
        
            $number=$number+1;
        }
        if($number>999){
            $uid=$number;
        }else{
            $uid=str_pad($number, 3, "0", STR_PAD_LEFT);
            
        }
    $bill_no="PHP".date("y").date("m").$uid;
    $vendor_id=$_POST["vendor_id"];
    $invoice_number=$_POST["invoice_num"];
    $purchase_date=$_POST["purchase_date"];
    
    $items=$_POST["item"];
    $batch_nos=$_POST["batch_no"];
    $expiry_dates=$_POST["expiry_date"];
    $pack=$_POST["pack"];
    $quantities=$_POST["quantity"];
    $free_quantities=$_POST["free_quantity"];
    $unit_amounts=$_POST["uamount"];
    $discount=$_POST["discount"];
    $sell_amounts=$_POST["samount"];
    $gst=$_POST["gst_amount"];
    
    
    
    
    $total_amount = $_POST["total_amount"];
    $paid_amount=$_POST["paid_amount"];
    $balance_amount=$_POST["balance_amount"];
    
   
    $timestamp=date("Y-m-d H:i:s");
    $created_by=$_SESSION["user_name"];
    $jvmClass->insertPurchase($bill_no,$vendor_id,$invoice_number,$purchase_date,$items,$batch_nos,$pack,$expiry_dates,$quantities,$free_quantities,$discount,$unit_amounts,$sell_amounts,$total_amount,$gst,$paid_amount,$balance_amount,$created_by,$timestamp);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;

  
    
}
if(isset($_POST["purchase_return"])){
    if($jvmClass->getPurchaseReturnsLastOpID()){
            $number=$jvmClass->getPurchaseReturnsLastOpID();
            $number=$number+1;
        }else{
        
            $number=$number+1;
        }
        if($number>999){
            $uid=$number;
        }else{
            $uid=str_pad($number, 3, "0", STR_PAD_LEFT);
            
        }
    $bill_no="PHPR".date("y").date("m").$uid;
    $purchase_id=$_POST["purchase_id"];
    $purchase_return_date=$_POST["purchase_return_date"];
    $item=$_POST["item_id"];
    $quantity=$_POST["quantity"];
    $amount=$_POST["amount"];
    $total_amount=$_POST["tamount"];
    $purchase_return_reason=$_POST["return_reason"];
    $created_by=$_SESSION["user_name"];
    $timestamp=date("Y-m-d H:i:s");
    $jvmClass->insertPurchaseReturn($bill_no,$purchase_id,$item,$quantity,$amount,$total_amount,$purchase_return_date,$purchase_return_reason,$created_by,$timestamp);
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
            $(function(e) {
				$('#examplereturns').DataTable();
			} );
            $(function(e) {
				$('#purchase_details').DataTable();
			} );
		</script>
        <script>
        function addRow() {
            

            let table = document.getElementById("invoiceTable");
            let row = table.insertRow();
            row.classList.add("purchase_items_tr");
            row.innerHTML = `
                <td> <select  class="form-control" name="item[]" id="item">
                                                            <?php foreach($items as $item){ ?>
                                                                <?php if($item->result){ ?>
                                                                    <option value="<?php echo $item->item_id; ?>"><?php echo $item->item_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select></td>
                 <td class="batch_td"><input type="text" class="form-control " name="batch_no[]"  required></td>
                                    <td class="expr_td"><input type="date" class="form-control " name="expiry_date[]" required></td>
                                    <td class="pack_td"><input type="number" class="form-control pack" name="pack[]" min="0" required></td>
                                    <td class="qty_td"><input type="number" class="form-control qty" name="quantity[]" min="1" required></td>
                                    <td class="fqty_td"><input type="number" class="form-control fqty" name="free_quantity[]" min="0" required></td>
                                    <td class="discount_td"><input type="number" class="form-control discount" step="0.01" name="discount[]" required></td>
                                    <td class="amount_td"><input type="number" class="form-control uamount" step="0.01" name="uamount[]" required></td>
                                    <td class="samount_td"><input type="number" class="form-control samount" step="0.01" name="samount[]" required></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">X</button></td>
            `;
        }
        function removeRow(btn) {
            btn.parentNode.parentNode.remove();
        }
    </script>
    <script>
            $(document).on("click","#purchase_modal",function(){
                    var purchase_id=$(this).attr("data-id");
                    $(".purchase_tb").html("");
                        
            
                            $.ajax({
                                type:"POST",
                                url:"get_purchase_items.php", 
                                dataType:"json",
                                data:{"purchase_id":purchase_id},
                                success:function(response){
                                    console.log(response)
                                    $.each(response,function(data){
                                            var result=response[data].result;
                                            if(result){
                                               $(".purchase_tb").append(`
                                               <tr>
                                                    <td>${response[data].item_name}</td>
                                                    <td>${response[data].quantity}</td>
                                                    <td>${response[data].unit_price}</td>
                                                    <td>${response[data].total_price}</td>
                                               
                                               </tr>
                                               
                                               `);
                                                
                                            }

                                            
                                                
                                                    
                                                    
                                        });
                                    
                                },
                                error:function(data){
                                    console.log(data);
                                },
                            });
                    })
        </script>
        <script>
            var gst=0;
            $(document).on("change",".uamount",function(){
                var total_amount=0;
                var mul_amount=0;
                
                $(".purchase_items_tr").each(function() {
                    var qty=$(this).children(".qty_td").children(".qty").val();
                    var pack=$(this).children(".pack_td").children(".pack").val();
                    var discount=parseFloat($(this).children(".discount_td").children(".discount").val());
                    var amount=$(this).children(".amount_td").children(".uamount").val();
                    mul_amount=parseInt(pack)*parseInt(qty)*parseFloat(amount);
                    mul_amount=mul_amount-((mul_amount*discount)/100);
                    
                    total_amount=total_amount+mul_amount;
                    
                });
                gst=(total_amount*parseFloat($(".gst").val()))/100;
                $(".total_amount").val(total_amount+gst);

            });
            var gstAmount=0;

            $(document).on("change",".gst",function(){
                var total_amount=0;
                var mul_amount=0;
                $(".purchase_items_tr").each(function() {
                    var qty=$(this).children(".qty_td").children(".qty").val();
                    var pack=$(this).children(".pack_td").children(".pack").val();
                    var discount=parseFloat($(this).children(".discount_td").children(".discount").val());
                    var amount=$(this).children(".amount_td").children(".uamount").val();
                    mul_amount=parseInt(pack)*parseInt(qty)*parseFloat(amount);
                    mul_amount=mul_amount-((mul_amount*discount)/100);
                    
                    total_amount=total_amount+mul_amount;
                    
                });
                gst=(total_amount*parseFloat($(".gst").val()))/100;
                $(".total_amount").val(total_amount+gst);
            });
           

            $(document).on("change",".paid_amount",function(){
                
                $(".bal_amount").val(parseFloat($(".total_amount").val())-parseFloat($(this).val()));
            });
            
        </script>
        <script>
            $(document).on("click","#purchase_return_modal",function(){
                    var purchase_id=$(this).attr("data-id");
                    $(".purchase_id").val(purchase_id);

                    var vendor_name=$(this).parent().siblings(".vendor_name").text();
                    $("#vendor").text(vendor_name);
                    $(".purchase_return_items_tr").html("");
                        
            
                            $.ajax({
                                type:"POST",
                                url:"get_purchase_items.php", 
                                dataType:"json",
                                data:{"purchase_id":purchase_id},
                                success:function(response){
                                    console.log(response)
                                    $.each(response,function(data){
                                            var result=response[data].result;
                                            if(result){
                                               $(".purchase_return_items_tr").append(`
                                               <tr>

                                                    <td><input type="text" name="item_id[]" class="form-control" value="${response[data].item_id}" readonly /></td>
                                                    <td><input type="text"  class="form-control" value="${response[data].item_name}" readonly /></td>
                                                    
                                                    <td class="qty_td"><input type="number" class="form-control qty" name="quantity[]" min="1" max="${response[data].quantity}" value="${response[data].quantity}" ></td>
                                                    <td class="amount_td"><input type="number" class="form-control samount" step="0.01" name="amount[]" value="${response[data].unit_price}" readonly></td>
                                                    <td class="tamount_td"><input type="number" class="form-control tamount" step="0.01" name="tamount[]" value="${response[data].total_price}" readonly></td>
                                                   
                                               
                                               </tr>
                                               
                                               `);
                                                
                                            }

                                            
                                                
                                                    
                                                    
                                        });
                                    
                                },
                                error:function(data){
                                    console.log(data);
                                },
                            });
                            $.ajax({
                                type:"POST",
                                url:"get_purchase_by_id.php", 
                                dataType:"json",
                                data:{"purchase_id":purchase_id},
                                success:function(response){
                                    console.log(response)
                                    $.each(response,function(data){
                                            var result=response[data].result;
                                            if(result){
                                               $(".total_amount").val(response[data].total_amount)
                                               $(".paid_amount").val(response[data].paid_amount)
                                               $(".bal_amount").val(response[data].bal_amount)
                                                
                                            }

                                            
                                                
                                                    
                                                    
                                        });
                                    
                                },
                                error:function(data){
                                    console.log(data);
                                },
                            });


                            $(document).on("change",".qty",function(){
                                var total_amount=0;
                                
                                var quantity=parseInt($(this).val());
                                var amount=parseFloat($(this).parent().siblings(".amount_td").children(".samount").val());
                                $(this).parent().siblings(".tamount_td").children(".tamount").val(quantity*amount);
                                $(".tamount").each(function() {
                                    total_amount+=parseFloat($(this).val()); 
                                });

                                if($(".total_amount").val()){
                                    
                                    $(".bal_amount").val((parseFloat($(".total_amount").val())-total_amount)-parseFloat($(".paid_amount").val()));
                                }else{
                                   $(".total_amount").val(total_amount);
                                   $(".bal_amount").val(parseFloat($(".total_amount").val())-parseFloat($(".paid_amount").val()));
                                }
                                
                                
                                
                            });
                    })
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