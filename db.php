<?php 

class JVMClass{
    private $db_name;
	private $username;
	private $password;
	private $servername;
	private $db_conn;

    function __construct($servername,$username,$password,$db_name){
		
		$this->servername=$servername;
		$this->username=$username;
		$this->password=$password;
		$this->db_name=$db_name;
		
		
		
		$this->connectDb();
        

        
       
       
        
	}

    function connectDb(){
        
        $this->db_conn=new mysqli($this->servername,$this->username,$this->password,$this->db_name);
        if($this->db_conn->connect_error){
            die("connection failed".$this->dbconn);
        }
        
    
        
    }


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////      CREATE                 ///////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    
  

   

    
    function insertPatient($umr_id,$count,$patient_name,$email,$mobile,$gender,$dob,$age,$address,$status,$created_by,$timestamp){
        $insert=$this->db_conn->query("INSERT INTO jvm_patient(
                                                                umr_id,
                                                                count,
                                                                patient_name,
                                                                email,
                                                                mobile,
                                                                gender,
                                                                dob,
                                                                age,
                                                                address,
                                                                status,
                                                                created_by,
                                                                created_on
                                                                )
                                                        values(
                                                                '$umr_id',
                                                                $count,
                                                                '$patient_name',
                                                                '$email',
                                                                '$mobile',
                                                                '$gender',
                                                                '$dob',
                                                                '$age',
                                                                '$address',
                                                                '$status',
                                                                '$created_by',
                                                                '$timestamp')           
                                                                ");
        if($insert==true){

        }else{
            echo "Insertion errors".$this->db_conn->error;
        }

    }


    function insertOPatient($op_bill,$umr_id,$number,$op_id,$patient_name,$consultant,$department,$op_amount,$total_amount,$payment_mode,$status,$created_by,$timestamp){
        $insert=$this->db_conn->query("INSERT INTO jvm_op_patient(
                                                                op_bill,
                                                                umr_id,
                                                                count,
                                                                op_id,
                                                                patient_name,
                                                                consultant_name,
                                                                department,
                                                                op_amount,
                                                                total_amount,
                                                                payment_mode,
                                                                status,
                                                                created_by,
                                                                created_on
                                                                )
                                                        values(
                                                                '$op_bill',
                                                                '$umr_id',
                                                                $number,
                                                                '$op_id',
                                                                '$patient_name',
                                                                '$consultant',
                                                                '$department',
                                                                $op_amount,
                                                                $total_amount,
                                                                
                                                                '$payment_mode',
                                                                '$status',
                                                                '$created_by',
                                                                '$timestamp')           
                                                                ");
        if($insert==true){

        }else{
            echo "Insertion errors".$this->db_conn->error;
        }

    }

    function insertInPatient($ip_bill,$umr_id,$number,$ip_id,$patient_name,$consultant,$department,$ward,$bed_no,$patient_type,$payment_mode,$amount,$admission_date,$status,$created_by,$timestamp){
        $insert=$this->db_conn->query("INSERT INTO jvm_in_patient(
                                                                ip_bill,
                                                                umr_id,
                                                                count,
                                                                ip_id,
                                                                patient_name,
                                                                consultant_name,
                                                                department,
                                                                ward_name,
                                                                bed_no,
                                                                amount,
                                                                patient_type,
                                                                payment_mode,
                                                                date_of_admission,
                                                                status,
                                                                created_by,
                                                                created_on
                                                                )
                                                        values(
                                                                '$ip_bill',
                                                                '$umr_id',
                                                                $number,
                                                                '$ip_id',
                                                                '$patient_name',
                                                                '$consultant',
                                                                '$department',
                                                                '$ward',
                                                                '$bed_no',
                                                                $amount,
                                                                '$patient_type',
                                                                '$payment_mode',
                                                                '$admission_date',
                                                                '$status',
                                                                '$created_by',
                                                                '$timestamp')           
                                                                ");
        if($insert==true){
            return "success";
        }else{
            return "Insertion errors".$this->db_conn->error;
        }

    }


    function insertDischargeSummary($bill_no,
                                    $umr_id,
                                    $ip_id,
                                    $discharge_date,
                                    $final_diagnosis,
                                    $procedure,
                                    $drug_allergy,
                                    $chief_complaint,
                                    $history,
                                    $medical_history,
                                    $personal_history,
                                    $family_history,
                                    $physical_exam,
                                    $lab_investigations,
                                    $imaging,
                                    $conditions,
                                    $course,
                                    $review,
                                    $advice,
                                    $diet,
                                    
                                    $drugs,
                                    $mornings,
                                    $afternoons,
                                    $evenings,
                                    $nights,
                                    $days,
                                    $frequency,
                                    $foods,

                                    $created_by,$timestamp){
        $final_diagnosis = $this->db_conn->real_escape_string($final_diagnosis);
        $procedure = $this->db_conn->real_escape_string($procedure);
        $drug_allergy = $this->db_conn->real_escape_string($drug_allergy);
        $chief_complaint = $this->db_conn->real_escape_string($chief_complaint);
        $history = $this->db_conn->real_escape_string($history);
        $medical_history = $this->db_conn->real_escape_string($medical_history);
        $personal_history = $this->db_conn->real_escape_string($personal_history);
        $family_history = $this->db_conn->real_escape_string($family_history);
        $physical_exam = $this->db_conn->real_escape_string($physical_exam);
        $lab_investigations = $this->db_conn->real_escape_string($lab_investigations);
        $imaging = $this->db_conn->real_escape_string($imaging);
        $conditions = $this->db_conn->real_escape_string($conditions);
        $course = $this->db_conn->real_escape_string($course);
        $review = $this->db_conn->real_escape_string($review);
        $advice = $this->db_conn->real_escape_string($advice);
        $diet = $this->db_conn->real_escape_string($diet);
        
        $insert=$this->db_conn->query("INSERT INTO jvm_discharge_summary(
                                                                bill_no,
                                                                umr_id,
                                                                ip_id,
                                                                date_of_discharge,
                                                                FINALDIAGNOSIS, 
                                                                DISPROCEDURE,
                                                                DRUGALLERGY,
                                                                Chiefcomplaint,
                                                                HISTORY,
                                                                PASTMEDICALHISTORY,
                                                                PERSONALHISTORY,
                                                                FAMILYHISTORY,
                                                                
                                                                PHYSICALEXAMINATION,
                                                                LABINVESTIGATIONS,
                                                                IMAGING,
                                                                CONDITIONONDISCHARGE,
                                                                COURSEINTHEHOSPITAL,
                                                                Review,
                                                                Advice,
                                                                Diet,
                                                                created_by,
                                                                created_on
                                                                )
                                                        values(
                                                                '$bill_no',
                                                                '$umr_id',
                                                                '$ip_id',
                                                                '$discharge_date',
                                                                '$final_diagnosis',
                                                                '$procedure',
                                                                '$drug_allergy',
                                                                '$chief_complaint',
                                                                '$history',
                                                                '$medical_history',
                                                                '$personal_history',
                                                                '$family_history',
                                                                '$physical_exam',
                                                                '$lab_investigations',
                                                                '$imaging',
                                                                '$conditions',
                                                                '$course',
                                                                '$review',
                                                                '$advice',
                                                                '$diet',
                                                                '$created_by',
                                                                '$timestamp')           
                                                                ");
        if($insert==true){
           $select=$this->db_conn->query("SELECT LAST_INSERT_ID()");
            $id=$select->fetch_assoc();
            $this->insertDischargeMedications($id["LAST_INSERT_ID()"],$drugs,$mornings,$afternoons,$evenings,$nights,$days,$frequency,$foods,$created_by,$timestamp);
        }else{
            return "Insertion errors".$this->db_conn->error;
        }
    }

    function insertDischargeMedications($id,$drugs,$mornings,$afternoons,$evenings,$nights,$days,$frequency,$foods,$created_by,$timestamp){
       for($i=0;$i<count($drugs);$i++){
        $drug=$drugs[$i];
        $morning=$mornings[$i];
        $afternoon=$afternoons[$i];
        $evening=$evenings[$i];
        $night=$nights[$i];
        $day=$days[$i];
        $freq=$frequency[$i];
        $food=$foods[$i];
        $insert=$this->db_conn->query("INSERT INTO jvm_discharge_medications(
                                                                             dis_id,
                                                                                drugs,
                                                                                morning,
                                                                                afternoon,
                                                                                evening,
                                                                                night,
                                                                                ndays,
                                                                                freq,
                                                                                food,
                                                                                created_by,
                                                                                created_on
        
                                                                                )
                                                                        values(
                                                                            $id,
                                                                            '$drug',
                                                                            '$morning',
                                                                            '$afternoon',
                                                                            '$evening',
                                                                            '$night',
                                                                            '$day',
                                                                            '$freq',
                                                                            '$food',
                                                                            '$created_by',
                                                                            '$timestamp'
                                                                        )
                                                                                ");
        if($insert=true){

        }else{
            echo "Insertion errors".$this->db_conn->error;
        }
       }

    }
    function insertInServices($bill_id,$umr_id,$ip_id,$date,$service,$quantity,$amount,$discount_amount,$created_by,$created_on){
        $total_amount=0;
        for($i=0;$i<count($service);$i++){
            $s = $this->db_conn->real_escape_string($service[$i]);
            $q=(int)$quantity[$i];
            $a=(float)$amount[$i];
            $d=(float)$discount_amount[$i];
            $total_amount+=($q*$a)-$d;
                 $insert=$this->db_conn->query("INSERT INTO jvm_ip_services(
                                                                bill_id,
                                                                umr_id,
                                                                ip_id,
                                                                date,
                                                                service,
                                                                quantity,
                                                                amount,
                                                                total_amount,
                                                                discount_amount,
                                                                created_by,
                                                                created_on
                                                                )
                                                        values(
                                                                $bill_id,
                                                                '$umr_id',
                                                                '$ip_id',
                                                                '$date[$i]',
                                                                '$s',
                                                                $q,
                                                                $a,
                                                                $q*$a,
                                                                $d,
                                                                '$created_by',
                                                                '$created_on')           
                                                                ");
            if($insert==true){
                
            }else{
                echo "Insertion errors".$this->db_conn->error;
            }        
        }

        $update=$this->db_conn->query("UPDATE jvm_in_patient SET
                                                        amount= IF(amount - $total_amount < 0, 0, amount - $total_amount) WHERE ip_id='$ip_id'");
        if($update==true){

        }else{
            echo "Updation errors".$this->db_conn->error;
        }


    }

    function insertOpServices($bill_id,$umr_id,$op_id,$date,$service,$amount,$total_amount,$created_by,$created_on){
        $updateOP=$this->db_conn->query("UPDATE jvm_op_patient SET total_amount=total_amount+$total_amount where op_id='$op_id' ");
        if($updateOP==true){

        }else{
            echo "Updation errors".$this->db_conn->error;
        }
        for($i=0;$i<count($service);$i++){
            $s = $this->db_conn->real_escape_string($service[$i]);
            $a=(float)$amount[$i];
                 $insert=$this->db_conn->query("INSERT INTO jvm_op_services(
                                                                bill_id,
                                                                umr_id,
                                                                op_id,
                                                                date,
                                                                service,
                                                                amount,
                                                                created_by,
                                                                created_on
                                                                )
                                                        values(
                                                                $bill_id,
                                                                '$umr_id',
                                                                '$op_id',
                                                                '$date',
                                                                '$s',
                                                                $a,
                                                                '$created_by',
                                                                '$created_on')           
                                                                ");
            if($insert==true){
            
            }else{
                echo "Insertion errors".$this->db_conn->error;
            }        
        }
    }


    //////////////////////////////////////////////////////////////////////////////////// pharma ///////////////////////////////////////////////////////////////////////////////////////////
    function insertCategory($category,$cat_desc,$timestamp){
        $insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_category(
                                                                        category,
                                                                        cat_desc,
                                                                        created_on) 
                                                    VALUES(
                                                            '$category',
                                                            '$cat_desc',
                                                            '$timestamp')");
        if($insert==true){

        }else{
                echo "Insertion errors".$this->db_conn->error;
        }  
    }
    function insertPharmaItem($item_Code,$hsn_num,$number,$item_name,$generic_name,$category,$created_by,$timestamp){
        $item_name=$this->db_conn->real_escape_string($item_name);
        $generic_name=$this->db_conn->real_escape_string($generic_name);
        $insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_items(
                                                                        item_Code,
                                                                        count,
                                                                        hsn_number,
                                                                        item_name,
                                                                        generic_name,
                                                                        category,
                                                                       
                                                                        created_by,
                                                                        created_on) 
                                                    VALUES(
                                                            '$item_Code',
                                                            $number,
                                                            $hsn_num,
                                                            '$item_name',
                                                            '$generic_name',
                                                            '$category',
                                                           
                                                            '$created_by',
                                                            '$timestamp')");
        if($insert==true){

        }else{
                echo "Insertion errors".$this->db_conn->error;
        }  
    }
    function insertVendor($vendor_name,$dl_num,$contact_name,$email,$mobile,$gst_number,$bank_name,$account_num,$created_by,$timestamp){
        $insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_vendors(
                                                                        vendor_name,
                                                                        dl_number,
                                                                        contact_person,
                                                                        phone,
                                                                        email,
                                                                        gst_number,
                                                                        bank_name,
                                                                        bank_account_number,
                                                                        created_by,
                                                                        created_on) 
                                                    VALUES(
                                                            '$vendor_name',
                                                            '$dl_num',
                                                            '$contact_name',
                                                            '$mobile',
                                                            '$email',
                                                            '$gst_number',
                                                            '$bank_name',
                                                            '$account_num',
                                                            '$created_by',
                                                            '$timestamp')");
        if($insert==true){

        }else{
                echo "Insertion errors".$this->db_conn->error;
        }  
    }

    function insertPurchase($bill_no,$vendor_id,$invoice_number,$purchase_date,$items,$batch_nos,$packs,$expiry_dates,$quantities,$free_quantities,$discounts,$unit_amounts,$sell_amounts,$total_amount,$gst,$paid_amount,$balance_amount,$created_by,$timestamp){
        $pur_insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_purchases(
                                                                bill_no,
                                                                invoice_number,
                                                                vendor_id,
                                                                purchase_date,
                                                                total_amount,
                                                                gst,
                                                                paid_amount,
                                                                balance_amount,
                                                                created_by,
                                                                created_on
                                                                )
                                                        values(
                                                                '$bill_no',
                                                                '$invoice_number',
                                                                '$vendor_id',
                                                                '$purchase_date',
                                                                $total_amount,
                                                                $gst,
                                                                $paid_amount,
                                                                $balance_amount,
                                                                '$created_by',
                                                                '$timestamp')           
                                                                ");

         if($pur_insert==true){
            $select=$this->db_conn->query("SELECT LAST_INSERT_ID()");
                $id=$select->fetch_assoc();
                $purchase_id=$id["LAST_INSERT_ID()"];
                
                for($i=0;$i<count($items);$i++){
                    $item = $items[$i];
                    $batch_no = $batch_nos[$i];
                    $expiry_date = $expiry_dates[$i];
                    $p=(int)$packs[$i];
                    $q=(int)$quantities[$i];
                    $fq=(int)$free_quantities[$i];
                    $a=(float)$unit_amounts[$i];
                    $d=(float)$discounts[$i];
                    $sa=(float)$sell_amounts[$i];

                    $total_price=($p*$q)*$a;
                    $total_discount_price=$total_price-($total_price*($d/100));
                    $this->insertItemDetails($item,$batch_no,$expiry_date,($p*$q)+$fq,$a,$sa,$created_by,$timestamp);
                    $insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_purchase_items(
                                                                        purchase_id,
                                                                        item_id,
                                                                        pack,
                                                                        quantity,
                                                                        free_quantity,
                                                                        total_quantity,
                                                                        unit_price,
                                                                        discount,
                                                                        total_price,
                                                                        created_by,
                                                                        created_on
                                                                        )
                                                                values(
                                                                        $purchase_id,
                                                                        $item,
                                                                        $p,
                                                                        $q,
                                                                        $fq,
                                                                        ($p*$q)+$fq,
                                                                        $a,
                                                                        $d,
                                                                        $total_discount_price,
                                                                        '$created_by',
                                                                        '$timestamp')           
                                                                        ");
                    
                if($insert==true){
                
                }else{
                    echo "Insertion errors".$this->db_conn->error;
                }  
                }     
            }else{
                echo "Insertion errors".$this->db_conn->error;
            }     
                                                                
                                                                
        
        


    }
    function insertItemDetails($item,$batch_no,$expiry_date,$q,$a,$sa,$created_by,$timestamp){
        $insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_items_details(
                                                                        item_id,
                                                                        batch_no,
                                                                        stock_quantity,
                                                                        unit_price,
                                                                        selling_price,
                                                                        expiry_date,
                                                                        created_by,
                                                                        created_on
                                                                        )
                                                                values(
                                                                       
                                                                        $item,
                                                                        '$batch_no',
                                                                        $q,
                                                                        $a,
                                                                        $sa,
                                                                        '$expiry_date',
                                                                        '$created_by',
                                                                        '$timestamp')           
                                                                        ");
        if($insert==true){
                
        }else{
            echo "Insertion errors".$this->db_conn->error;
        }  
    }


    function insertSale($bill_no,$umr_id,$patient_type,$sale_date,$items,$quantities,$amounts,$total_amount,$created_by,$timestamp){
        $sale_insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_sales(
                                                                            bill_no,
                                                                            patient_type,
                                                                            patient_id,
                                                                            sale_date,
                                                                            total_amount,
                                                                            created_by,
                                                                            created_on
                                                                            ) 
                                                                            VALUES(
                                                                            '$bill_no',
                                                                            '$patient_type',
                                                                            '$umr_id',
                                                                            '$sale_date',
                                                                            $total_amount,
                                                                            '$created_by',
                                                                            '$timestamp'
                                                                            
                                                                            )");
        if($sale_insert==true){
            $select=$this->db_conn->query("SELECT LAST_INSERT_ID()");
                $id=$select->fetch_assoc();
                $sale_id=$id["LAST_INSERT_ID()"];
                for($i=0;$i<count($items);$i++){
                    $item = $items[$i];
                    $qty=(int)$quantities[$i];

                    $amnt=(float)$amounts[$i];
                    $Stock_quantity=$this->getStockByItemID($item);
                    $stock_difference=(int)$Stock_quantity-(int)$qty;
                    $update=$this->db_conn->query("UPDATE jvm_pharmacy_items_details SET stock_quantity=$stock_difference WHERE item_id=$item");
                    if($update==true){

                    }else{
                        echo "updation errors".$this->db_conn->error;
                    }
                    $insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_sales_items(
                                                                        sale_id,
                                                                        item_id,
                                                                        quantity,
                                                                        unit_price,
                                                                        total_price,
                                                                        created_by,
                                                                        created_on
                                                                        )
                                                                values(
                                                                        $sale_id,
                                                                        $item,
                                                                        $qty,
                                                                        $amnt,
                                                                        $qty*$amnt,
                                                                        '$created_by',
                                                                        '$timestamp')           
                                                                        ");
                        if($insert==true){
                
                        }else{
                            echo "Insertion errors".$this->db_conn->error;
                        }  
                }
        }
        else{
                echo "Insertion errors".$this->db_conn->error;
            }  
    }


    function insertStockAdjustment($item,$stock_adjustment,$quantity,$reason,$timestamp,$created_by){
        $insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_stock_adjustment(
                                                                                item_id,
                                                                                adjustment_type,
                                                                                quantity,
                                                                                reason,
                                                                                created_by,
                                                                                created_on
                                                                                
                                                                                )
                                                                            values(
                                                                            $item,
                                                                            '$stock_adjustment',
                                                                            '$quantity',
                                                                            '$reason',
                                                                            
                                                                            '$created_by',
                                                                           '$timestamp'
                                                                            )   
                                                                                ");
        if($insert==true){

        }else{
            echo "Insertion errors".$this->db_conn->error;
        }
    }
    function insertSaleReturn($bill_no,$sale_id,$items,$quantities,$amounts,$total_amount,$sale_return_date,$sale_return_reason,$created_by,$timestamp){
        $total_return_amount=array_sum($total_amount);
        $insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_sales_returns(
                                                                                bill_no,
                                                                                sale_id,
                                                                                return_amount,
                                                                                return_date,
                                                                                returned_by,
                                                                                created_on,
                                                                                reason
                                                                                
                                                                                )
                                                                            values(
                                                                            '$bill_no',
                                                                            $sale_id,
                                                                            $total_return_amount,
                                                                            '$sale_return_date',
                                                                            '$created_by',
                                                                           '$timestamp',
                                                                           '$sale_return_reason'
                                                                            )   
                                                                                ");
        if($insert==true){
                $select=$this->db_conn->query("SELECT LAST_INSERT_ID()");
                $id=$select->fetch_assoc();
                $return_id=$id["LAST_INSERT_ID()"];

            for($i=0;$i<count($items);$i++){
                $item=$items[$i];
                $quantity=$quantities[$i];
                $amount=$amounts[$i];
                $items_insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_sales_returns_items(
                                                                                return_id,
                                                                                sale_id,
                                                                                item_id,
                                                                                qty,
                                                                                amount,
                                                                                returned_by,
                                                                                created_on
                                                                                
                                                                                
                                                                                )
                                                                            values(
                                                                            $return_id,
                                                                            $sale_id,
                                                                            $item,
                                                                            $quantity,
                                                                            $amount,
                                                                            '$created_by',
                                                                           '$timestamp'
                                                                            )   
                                                                                ");
                    
            }
            $update=$this->db_conn->query("UPDATE jvm_pharmacy_items_details SET stock_quantity=stock_quantity+$quantity WHERE item_id=$item");
            if($update==true){

            }else{
                echo "Updation Errors".$this->db_conn->error;
            }

        }else{
            echo "Insertion errors".$this->db_conn->error;
        }


        

        
        $update_sales=$this->db_conn->query("UPDATE jvm_pharmacy_sales SET total_amount=total_amount-$total_return_amount WHERE sale_id = $sale_id");
        if($update_sales==true){

        }else{
            echo "Updation Errors".$this->db_conn->error;
        }
        
    }
    function insertPurchaseReturn($bill_no,$purchase_id,$items,$quantities,$amounts,$total_amount,$purchase_return_date,$purchase_return_reason,$created_by,$timestamp){
        $total_return_amount=array_sum($total_amount);
        $return_insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_purchase_returns(
                                                                                bill_no,
                                                                                purchase_id,
                                                                                total_amount,
                                                                                return_date,
                                                                                returned_by,
                                                                                created_on,
                                                                                reason
                                                                                
                                                                                )
                                                                            values(
                                                                            '$bill_no',
                                                                            $purchase_id,
                                                                            $total_return_amount,
                                                                            '$purchase_return_date',
                                                                            '$created_by',
                                                                           '$timestamp',
                                                                           '$purchase_return_reason'
                                                                            )   
                                                                            ");
        if($return_insert==true){
            $select=$this->db_conn->query("SELECT LAST_INSERT_ID()");
                $id=$select->fetch_assoc();
                $return_id=$id["LAST_INSERT_ID()"];
                for($i=0;$i<count($items);$i++){
                        $item=$items[$i];
                        $quantity=$quantities[$i];
                        $amount=$amounts[$i];
                        $insert=$this->db_conn->query("INSERT INTO jvm_pharmacy_purchase_returns_items(
                                                                                return_id,
                                                                                purchase_id,
                                                                                item_id,
                                                                                return_qty,
                                                                                return_amount,
                                                                                returned_by,
                                                                                created_on
                                                                               
                                                                                
                                                                                )
                                                                            values(
                                                                            $return_id,
                                                                            $purchase_id,
                                                                            $item,
                                                                            $quantity,
                                                                            $amount,
                                                                            '$created_by',
                                                                           '$timestamp'
                                                                          
                                                                            )   
                                                                            ");

                if($insert==true){
                    $update=$this->db_conn->query("UPDATE jvm_pharmacy_items_details SET stock_quantity=stock_quantity-$quantity WHERE item_id=$item");
                    if($update==true){

                    }else{
                        echo "Updation Errors".$this->db_conn->error;
                    }

                }else{
                    echo "Insertion errors".$this->db_conn->error;
                }
            }
            $update_sales=$this->db_conn->query("UPDATE jvm_pharmacy_purchases SET total_amount=total_amount-$total_return_amount,balance_amount=total_amount-paid_amount WHERE purchase_id = $purchase_id");
            if($update_sales==true){

            }else{
                echo "Updation Errors".$this->db_conn->error;
            }
        }else{
                    echo "Insertion errors".$this->db_conn->error;
                }
        

        
        
        
    }


    ////////////////////////////////////////////////////////////////////////////// Lab ////////////////////////////////////////////////////////////////////////

    function insertLabCategory($category,$cat_desc,$price,$timestamp){
        $insert=$this->db_conn->query("INSERT INTO jvm_lab_category(
                                                                        category,
                                                                        cat_desc,
                                                                        price,
                                                                        created_on) 
                                                    VALUES(
                                                            '$category',
                                                            '$cat_desc',
                                                            $price,
                                                            '$timestamp')");
        if($insert==true){

        }else{
                echo "Insertion errors".$this->db_conn->error;
        }  
    }


    function insertLabTests($category,$tests,$units,$nvalues,$timestamp){
        for($i=0;$i<count($tests);$i++){
            $test=$tests[$i];
            $unit=$units[$i];
            $nvalue=$nvalues[$i];
            $insert=$this->db_conn->query("INSERT INTO jvm_lab_tests(
                                                                            category,
                                                                            test_name,
                                                                            units,
                                                                            normal_values,
                                                                            created_on) 
                                                        VALUES(
                                                                '$category',
                                                                '$test',
                                                                '$unit',
                                                                '$nvalue',
                                                                '$timestamp')");
            if($insert==true){

            }else{
                    echo "Insertion errors".$this->db_conn->error;
            } 

        }
    }
    function insertOpTests($umr_id,$op_id,$date,$tests,$amounts,$total_amount,$created_by,$created_on){
        $updateOP=$this->db_conn->query("UPDATE jvm_op_patient SET total_amount=total_amount+$total_amount where op_id='$op_id' ");
        for($i=0;$i<count($tests);$i++){
            $test=$tests[$i];
            $amount=$amounts[$i];
            $insert=$this->db_conn->query("INSERT INTO jvm_op_tests(
                                                                    umr_id, 
                                                                    op_id, 
                                                                    date, 
                                                                    test, 
                                                                    amount, 
                                                                    created_by, 
                                                                    created_on) 
                                                        VALUES(
                                                                '$umr_id',
                                                                '$op_id',
                                                                '$date',
                                                                '$test',
                                                                '$amount',
                                                                '$created_by',
                                                                '$created_on')");
            if($insert==true){
                return "Tests Added";
            }else{
                return "Insertion errors".$this->db_conn->error;
            } 
        }
    }


    function insertOpInvestigations($op_id,$start_date,$tests,$status,$created_by,$created_on){
        for($i=0;$i<count($tests);$i++){
            $test=$tests[$i];
            $insert=$this->db_conn->query("INSERT INTO jvm_op_investigations(
                                                                    
                                                                    op_id, 
                                                                    start_date, 
                                                                    test, 
                                                                    status, 
                                                                    created_by, 
                                                                    created_on) 
                                                        VALUES(
                                                                '$op_id',
                                                                '$start_date',
                                                                '$test',
                                                                '$status',
                                                                '$created_by',
                                                                '$created_on')");
            if($insert==true){
                    return "Added to Investigations";
            }else{
                    return "Insertion errors".$this->db_conn->error;
            } 
        }
    }

    function insertOpInvestigationResults($id,$test_date,$test_type,$tests,$units,$nvalues,$results,$created_by,$timestamp){
        $update=$this->db_conn->query("UPDATE jvm_op_investigations SET end_date='$test_date',status='Completed' WHERE id=$id ");
        if($update==true){
            $db_response="Updated Successfully \n";
        }else{
            $db_response="Updation errors: ".$this->db_conn->error."\n";
        }
        for($i=0;$i<count($tests);$i++){
            $test=$tests[$i];
            $unit=$units[$i];
            $nvalue=$nvalues[$i];
            $result=$results[$i];
            $insert=$this->db_conn->query("INSERT INTO jvm_op_investigations_results(
                                                                    
                                                                    investigation_id, 
                                                                    test_type, 
                                                                    test, 
                                                                    units, 
                                                                    normal_values, 
                                                                    result, 
                                                                    created_by, 
                                                                    created_on) 
                                                        VALUES(
                                                                '$id',
                                                                '$test_type',
                                                                '$test',
                                                                '$unit',
                                                                '$nvalue',
                                                                '$result',
                                                                '$created_by',
                                                                '$timestamp')");
            if($insert==true){
                    $db_response.= "Added to Investigations \n";
            }else{
                    $db_response.= "Insertion errors: ".$this->db_conn->error."\n";
            } 
        }
        return $db_response;
    }

    function insertIpInvestigationResults($id,$test_date,$test_type,$tests,$units,$nvalues,$results,$created_by,$timestamp){
        $update=$this->db_conn->query("UPDATE jvm_ip_investigations SET end_date='$test_date',status='Completed' WHERE id=$id ");
        if($update==true){
            $db_response="Updated Successfully \n";
        }else{
            $db_response="Updation errors: ".$this->db_conn->error."\n";
        }
        for($i=0;$i<count($tests);$i++){
            $test=$tests[$i];
            $unit=$units[$i];
            $nvalue=$nvalues[$i];
            $result=$results[$i];
            $insert=$this->db_conn->query("INSERT INTO jvm_ip_investigations_results(
                                                                    
                                                                    investigation_id, 
                                                                    test_type, 
                                                                    test, 
                                                                    units, 
                                                                    normal_values, 
                                                                    result, 
                                                                    created_by, 
                                                                    created_on) 
                                                        VALUES(
                                                                '$id',
                                                                '$test_type',
                                                                '$test',
                                                                '$unit',
                                                                '$nvalue',
                                                                '$result',
                                                                '$created_by',
                                                                '$timestamp')");
            if($insert==true){
                    $db_response.= "Added to Investigations \n";
            }else{
                    $db_response.= "Insertion errors: ".$this->db_conn->error."\n";
            } 
        }
        return $db_response;
    }


    function insertIpTests($umr_id,$ip_id,$dates,$tests,$amounts,$total_amount,$created_by,$created_on){
        $updateOP=$this->db_conn->query("UPDATE jvm_in_patient SET amount=amount+$total_amount where ip_id='$ip_id' ");
        for($i=0;$i<count($tests);$i++){
            $test=$tests[$i];
            $date=$dates[$i];
            $amount=$amounts[$i];
            $insert=$this->db_conn->query("INSERT INTO jvm_ip_tests(
                                                                    umr_id, 
                                                                    ip_id, 
                                                                    date, 
                                                                    test, 
                                                                    amount, 
                                                                    created_by, 
                                                                    created_on) 
                                                        VALUES(
                                                                '$umr_id',
                                                                '$ip_id',
                                                                '$date',
                                                                '$test',
                                                                '$amount',
                                                                '$created_by',
                                                                '$created_on')");
            if($insert==true){
                return "Tests Added";
            }else{
                return "Insertion errors".$this->db_conn->error;
            } 
        }
    }

    function insertIpInvestigations($ip_id,$dates,$tests,$status,$created_by,$created_on){
        for($i=0;$i<count($tests);$i++){
            $test=$tests[$i];
            $date=$dates[$i];
            $insert=$this->db_conn->query("INSERT INTO jvm_ip_investigations(
                                                                    
                                                                    ip_id, 
                                                                    start_date, 
                                                                    test, 
                                                                    status, 
                                                                    created_by, 
                                                                    created_on) 
                                                        VALUES(
                                                                '$ip_id',
                                                                '$date',
                                                                '$test',
                                                                '$status',
                                                                '$created_by',
                                                                '$created_on')");
            if($insert==true){
                    return "Added to Investigations";
            }else{
                    return "Insertion errors".$this->db_conn->error;
            } 
        }
    }

    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function getLogin($user_name,$password){
        $user=[];
        $select=$this->db_conn->query("SELECT *FROM jvm_users WHERE username='$user_name' and password='$password'");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $user[]=array(
                    "result"=>true,
                    "role_id"=>$row["role_id"],
                    "user_id"=>$row["id"],
                    "username"=>$row["username"],
                    
                );
            }
        }else{
            $user[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($user);
    }

    function getSummaryTemplates(){
            $services=[];
            $select=$this->db_conn->query("SELECT *FROM jvm_summary_templates");
            if($select!=false && $select->num_rows>0){
                while($row=$select->fetch_assoc()){
                    $services[]=array(
                        "result"=>true,
                        "template_name"=>$row["template_name"],
                        "template_text"=>$row["template_text"],
                        
                    );
                }
            }else{
                $services[]=array(
                        "result"=>false,
                    
                );
            }
            return json_encode($services);
        }
    function getTemplateSummary($template){
        $select=$this->db_conn->query("SELECT template_text FROM jvm_summary_templates where template_name LIKE '$template' ");
            if($select!=false && $select->num_rows>0){
                $row=$select->fetch_assoc();
                return $row["template_text"];
                
            }else{
                return false;
            }
            
    }

    function getRoles(){
        $roles=[];
        $select=$this->db_conn->query("SELECT *FROM jvm_roles");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $roles[]=array(
                    "result"=>true,
                    "id"=>$row["id"],
                    "name"=>$row["name"],
                    
                );
            }
        }else{
            $roles[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($roles);
    } 

  
    function getUsers(){
        $users=[];
        $select=$this->db_conn->query("SELECT *FROM jvm_users");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $users[]=array(
                    "result"=>true,
                    "id"=>$row["role_id"],
                    "name"=>$row["username"],
                    
                );
            }
        }else{
            $users[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($users);
    } 
    function getDoctors(){
        $users=[];
        $select=$this->db_conn->query("SELECT *FROM jvm_doctors");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $users[]=array(
                    "result"=>true,
                    "name"=>$row["doctor"],
                    
                );
            }
        }else{
            $users[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($users);
    } 
    function getDepartments(){
        $users=[];
        $select=$this->db_conn->query("SELECT *FROM jvm_department");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $users[]=array(
                    "result"=>true,
                    "name"=>$row["department"],
                    
                );
            }
        }else{
            $users[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($users);
    }
     function getServices(){
        $services=[];
        $select=$this->db_conn->query("SELECT *FROM jvm_services");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $services[]=array(
                    "result"=>true,
                    "name"=>$row["service_name"],
                    
                    
                );
            }
        }else{
            $services[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($services);
    }
    function getPatients(){
        $patients=[];
        $select=$this->db_conn->query("SELECT *FROM jvm_patient");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $patients[]=array(
                    "result"=>true,
                    "umr_id"=>$row["umr_id"],
                    "name"=>$row["patient_name"],
                    "email"=>$row["email"],
                    "mobile"=>$row["mobile"],
                    "gender"=>$row["gender"],
                    "dob"=>$row["dob"],
                    "age"=>$row["age"],
                    "address"=>$row["address"],
                );
            }
        }else{
            $patients[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($patients);
    }

    function getOutPatients(){
        $patients=[];
        $select=$this->db_conn->query("SELECT 
                                            jvm_patient.*,
                                            jvm_op_patient.op_bill,
                                            jvm_op_patient.consultant_name,
                                            jvm_op_patient.department,
                                            jvm_op_patient.op_id,
                                            
                                            jvm_op_patient.total_amount,
                                            jvm_op_patient.payment_mode

                                            
                                             FROM jvm_patient,jvm_op_patient WHERE jvm_patient.umr_id = jvm_op_patient.umr_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $patients[]=array(
                    "result"=>true,
                    "op_bill"=>$row["op_bill"],
                    "name"=>$row["patient_name"],
                    "email"=>$row["email"],
                    "mobile"=>$row["mobile"],
                    "gender"=>$row["gender"],
                    "dob"=>$row["dob"],
                    "age"=>$row["age"],
                    "address"=>$row["address"],
                    "consultant_name"=>$row["consultant_name"],
                    "department"=>$row["department"],
                    "op_id"=>$row["op_id"],
                    
                    "amount"=>$row["total_amount"],
                    "payment_mode"=>$row["payment_mode"],
                    "umr_id"=>$row["umr_id"],
                );
            }
        }else{
            $patients[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($patients);
    }

    function getOutPatient($op_id){
        $patients=[];
        $select=$this->db_conn->query("SELECT 
                                            jvm_patient.*,
                                            jvm_op_patient.op_bill,
                                            jvm_op_patient.consultant_name,
                                            jvm_op_patient.department,
                                            jvm_op_patient.op_id,
                                            
                                            jvm_op_patient.op_amount,
                                            jvm_op_patient.total_amount,
                                            jvm_op_patient.payment_mode

                                            
                                             FROM jvm_patient,jvm_op_patient WHERE jvm_patient.umr_id = jvm_op_patient.umr_id and jvm_op_patient.op_id='$op_id' ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $patients[]=array(
                    "result"=>true,
                    "op_bill"=>$row["op_bill"],
                    "name"=>$row["patient_name"],
                    "email"=>$row["email"],
                    "mobile"=>$row["mobile"],
                    "gender"=>$row["gender"],
                    "dob"=>$row["dob"],
                    "age"=>$row["age"],
                    "address"=>$row["address"],
                    "consultant_name"=>$row["consultant_name"],
                    "department"=>$row["department"],
                    "op_id"=>$row["op_id"],
                   
                    "op_amount"=>$row["op_amount"],
                    "total_amount"=>$row["total_amount"],
                    "payment_mode"=>$row["payment_mode"],
                    "umr_id"=>$row["umr_id"],
                    "reg_date"=>$row["created_on"],
                );
            }
        }else{
            $patients[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($patients);
    }

    function getOutPatientServices($bill_id){
        $patients=[];
        $select=$this->db_conn->query("SELECT 
                                            jvm_patient.*,
                                            jvm_op_services.date,
                                            jvm_op_services.service,
                                            jvm_op_patient.consultant_name,
                                            jvm_op_patient.department,
                                            jvm_op_services.amount,
                                            jvm_op_services.op_id,
                                            jvm_op_services.bill_id,
                                            jvm_op_services.umr_id
                                            
                                            

                                            
                                             FROM jvm_patient,jvm_op_services,jvm_op_patient WHERE jvm_patient.umr_id = jvm_op_services.umr_id and jvm_op_patient.op_id=jvm_op_services.op_id and jvm_op_services.bill_id=$bill_id  ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
               
               $patients[] = $row;
            }
        }else{
             $patients[] =false;
        }
        return json_encode($patients);
    }

    function getInPatientServices($bill_id){
        $patients=[];
        $select=$this->db_conn->query("SELECT 
                                            jvm_patient.*,
                                            jvm_ip_services.date,
                                            jvm_ip_services.service,
                                            jvm_in_patient.consultant_name,
                                            jvm_in_patient.department,
                                            jvm_ip_services.amount,
                                            jvm_ip_services.ip_id,
                                            jvm_ip_services.bill_id,
                                            jvm_ip_services.quantity,
                                            jvm_ip_services.total_amount,
                                            jvm_ip_services.discount_amount,
                                            jvm_ip_services.umr_id
                                            
                                            

                                            
                                             FROM jvm_patient,jvm_ip_services,jvm_in_patient WHERE jvm_patient.umr_id = jvm_ip_services.umr_id and jvm_in_patient.ip_id=jvm_ip_services.ip_id and jvm_ip_services.bill_id=$bill_id  ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
               
               $patients[] = $row;
            }
        }else{
             $patients[] =false;
        }
        return json_encode($patients);
    }

    function getInPatients(){
        $patients=[];
        $select=$this->db_conn->query("SELECT 
                                            jvm_patient.*,
                                            jvm_in_patient.consultant_name,
                                            jvm_in_patient.department,
                                            jvm_in_patient.ip_id,
                                            jvm_in_patient.ward_name,
                                            jvm_in_patient.bed_no,
                                            jvm_in_patient.date_of_admission,
                                            jvm_in_patient.date_of_discharge,
                                            jvm_in_patient.status,
                                            jvm_in_patient.patient_type

                                            
                                             FROM jvm_patient,jvm_in_patient WHERE jvm_patient.umr_id = jvm_in_patient.umr_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $patients[]=array(
                    "result"=>true,
                    "name"=>$row["patient_name"],
                    "email"=>$row["email"],
                    "mobile"=>$row["mobile"],
                    "gender"=>$row["gender"],
                    "dob"=>$row["dob"],
                    "age"=>$row["age"],
                    "address"=>$row["address"],
                    "consultant_name"=>$row["consultant_name"],
                    "department"=>$row["department"],
                    "ip_id"=>$row["ip_id"],
                    "ward"=>$row["ward_name"],
                    "bed_no"=>$row["bed_no"],
                    "patient_type"=>$row["patient_type"],
                    "doa"=>$row["date_of_admission"],
                    "dod"=>$row["date_of_discharge"],
                    "umr_id"=>$row["umr_id"],
                    "status"=>$row["status"],
                );
            }
        }else{
            $patients[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($patients);
    }

    function getdischargeSummary($id){
        $discharge_summary=[];
        $select=$this->db_conn->query("SELECT jvm_patient.*,
                                              jvm_in_patient.consultant_name,
                                              jvm_in_patient.ward_name,
                                              jvm_in_patient.bed_no,
                                              jvm_in_patient.type_of_discharge,
                                              jvm_in_patient.department,
                                              jvm_in_patient.date_of_admission,
                                              jvm_in_patient.ip_id,
                                              jvm_discharge_summary.id,
                                              jvm_discharge_summary.umr_id,
                                              jvm_discharge_summary.bill_no,
                                              jvm_discharge_summary.ip_id,
                                              jvm_discharge_summary.date_of_discharge,
                                              jvm_discharge_summary.FINALDIAGNOSIS,
                                              jvm_discharge_summary.DISPROCEDURE,
                                              jvm_discharge_summary.DRUGALLERGY,
                                              jvm_discharge_summary.Chiefcomplaint,
                                              jvm_discharge_summary.HISTORY,
                                              jvm_discharge_summary.PASTMEDICALHISTORY,
                                              jvm_discharge_summary.PERSONALHISTORY,
                                              jvm_discharge_summary.FAMILYHISTORY, 
                                              jvm_discharge_summary.PHYSICALEXAMINATION,
                                              jvm_discharge_summary.LABINVESTIGATIONS,
                                              jvm_discharge_summary.IMAGING,
                                              jvm_discharge_summary.CONDITIONONDISCHARGE,
                                              jvm_discharge_summary.COURSEINTHEHOSPITAL,
                                              jvm_discharge_summary.Review,
                                              jvm_discharge_summary.Advice,
                                              jvm_discharge_summary.Diet,
                                              jvm_discharge_summary.created_on
                                              FROM jvm_patient,jvm_in_patient,jvm_discharge_summary

                                              where jvm_patient.umr_id = jvm_in_patient.umr_id and jvm_discharge_summary.umr_id = jvm_patient.umr_id and jvm_discharge_summary.id = $id and jvm_in_patient.ip_id=jvm_discharge_summary.ip_id
                                            
                                            
                                            
                                            ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $discharge_summary[]=array(
                    "result"=>true,
                    "id"=>$row["id"],
                    "name"=>$row["patient_name"],
                    "email"=>$row["email"],
                    "mobile"=>$row["mobile"],
                    "gender"=>$row["gender"],
                    "dob"=>$row["dob"],
                    "age"=>$row["age"],
                    "address"=>$row["address"],
                    "consultant_name"=>$row["consultant_name"],
                    "department"=>$row["department"],
                    "ip_id"=>$row["ip_id"],
                    "ward_name"=>$row["ward_name"],
                    "bed_no"=>$row["bed_no"],
                    "type_of_discharge"=>$row["type_of_discharge"],
                    "created_on"=>$row["created_on"],
                    "bill_no"=>$row["bill_no"],
                    "doa"=>$row["date_of_admission"],
                    "dod"=>$row["date_of_discharge"],
                    "umr_id"=>$row["umr_id"],
                    "final_diagnosis"=>$row["FINALDIAGNOSIS"],
                    "DISPROCEDURE"=>$row["DISPROCEDURE"],
                    "DRUGALLERGY"=>$row["DRUGALLERGY"],
                    "Chiefcomplaint"=>$row["Chiefcomplaint"],
                    "HISTORY"=>$row["HISTORY"],
                    "PASTMEDICALHISTORY"=>$row["PASTMEDICALHISTORY"],
                    "PERSONALHISTORY"=>$row["PERSONALHISTORY"],
                    "FAMILYHISTORY"=>$row["FAMILYHISTORY"],
                    "PHYSICALEXAMINATION"=>$row["PHYSICALEXAMINATION"],
                    "LABINVESTIGATIONS"=>$row["LABINVESTIGATIONS"],
                    "IMAGING"=>$row["IMAGING"],
                    "CONDITIONONDISCHARGE"=>$row["CONDITIONONDISCHARGE"],
                    "COURSEINTHEHOSPITAL"=>$row["COURSEINTHEHOSPITAL"],
                    "Review"=>$row["Review"],
                    "Diet"=>$row["Diet"],
                    "Advice"=>$row["Advice"]
                    
                );
            }
        }else{
            $discharge_summary[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($discharge_summary);

    }

    function getdischargeMedications($id){
        $select=$this->db_conn->query("SELECT *FROM jvm_discharge_medications where dis_id=$id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $meds[]=array(
                    "result"=>true,
                    "id"=>$row["id"],
                    "drugs"=>$row["drugs"],
                    "morning"=>$row["morning"],
                    "afternoon"=>$row["afternoon"],
                    "evening"=>$row["evening"],
                    "night"=>$row["night"],
                    "ndays"=>$row["ndays"],
                    "freq"=>$row["freq"],
                    "food"=>$row["food"],
                    
                );
            }
        }else{
                $meds[]=array(
                    "result"=>false,
                    
                    
                );
        }
        return json_encode($meds);
    }

    function getdischargeSummaries(){
        $discharge_summary=[];
        $select=$this->db_conn->query("SELECT jvm_patient.*,
                                              jvm_in_patient.consultant_name,
                                              jvm_in_patient.department,
                                              jvm_in_patient.date_of_admission,
                                              jvm_in_patient.ip_id,
                                              jvm_discharge_summary.id as discharge_id,
                                              jvm_discharge_summary.umr_id,
                                              jvm_discharge_summary.ip_id,
                                              jvm_discharge_summary.date_of_discharge
                                              
                                              FROM jvm_patient,jvm_in_patient,jvm_discharge_summary

                                              where jvm_patient.umr_id = jvm_in_patient.umr_id and jvm_discharge_summary.umr_id = jvm_patient.umr_id and  jvm_in_patient.ip_id=jvm_discharge_summary.ip_id
                                            
                                            
                                            
                                            ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $discharge_summary[]=array(
                    "result"=>true,
                    "id"=>$row["discharge_id"],
                    "name"=>$row["patient_name"],
                    "email"=>$row["email"],
                    "mobile"=>$row["mobile"],
                    "gender"=>$row["gender"],
                    "dob"=>$row["dob"],
                    "age"=>$row["age"],
                    "address"=>$row["address"],
                    "consultant_name"=>$row["consultant_name"],
                    "department"=>$row["department"],
                    "ip_id"=>$row["ip_id"],
                    
                    
                    "doa"=>$row["date_of_admission"],
                    "dod"=>$row["date_of_discharge"],
                    "umr_id"=>$row["umr_id"],
                    
                    
                );
            }
        }else{
            $discharge_summary[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($discharge_summary);

    }



















    function getPatient($umr_no){
        $patients=[];
        $select=$this->db_conn->query("SELECT *FROM jvm_patient where umr_id LIKE '$umr_no' ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $patients[]=array(
                    "result"=>true,
                    "name"=>$row["patient_name"],
                    "email"=>$row["email"],
                    "mobile"=>$row["mobile"],
                    "gender"=>$row["gender"],
                    "dob"=>$row["dob"],
                    "age"=>$row["age"],
                    "address"=>$row["address"],
                );
            }
        }else{
            $patients[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($patients);
    }
    function getInPatient($umr_no){
        $patients=[];
        $select=$this->db_conn->query("SELECT jvm_patient.*,jvm_in_patient.ip_id,jvm_in_patient.date_of_discharge FROM jvm_patient,jvm_in_patient where jvm_patient.umr_id LIKE '$umr_no' and  jvm_patient.umr_id=jvm_in_patient.umr_id ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $patients[]=array(
                    "result"=>true,
                    "name"=>$row["patient_name"],
                    "email"=>$row["email"],
                    "mobile"=>$row["mobile"],
                    "gender"=>$row["gender"],
                    "dob"=>$row["dob"],
                    "age"=>$row["age"],
                    "ip_id"=>$row["ip_id"],
                    "dod"=>$row["date_of_discharge"],
                    "address"=>$row["address"],
                );
            }
        }else{
            $patients[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($patients);
    }
    function getIpPatient($id){
        $patients=[];
        $select=$this->db_conn->query("SELECT 
                                            jvm_patient.*,
                                            jvm_in_patient.ip_bill,
                                            jvm_in_patient.consultant_name,
                                            jvm_in_patient.department,
                                            jvm_in_patient.ip_id,
                                            jvm_in_patient.bed_no,
                                            jvm_in_patient.date_of_admission,
                                            jvm_in_patient.date_of_discharge,
                                            jvm_in_patient.payment_mode,
                                            jvm_in_patient.patient_type,
                                            jvm_in_patient.amount,
                                            jvm_in_patient.status,
                                            jvm_in_patient.created_on as reg_date

                                            
                                             FROM jvm_patient,jvm_in_patient WHERE jvm_patient.umr_id = jvm_in_patient.umr_id and jvm_in_patient.ip_id = '$id' or jvm_in_patient.umr_id = '$id' ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $patients[]=array(
                    "result"=>true,
                    "id"=>$row["id"],
                    "ip_bill"=>$row["ip_bill"],
                    "umr_id"=>$row["umr_id"],
                    "name"=>$row["patient_name"],
                    "email"=>$row["email"],
                    "mobile"=>$row["mobile"],
                    "gender"=>$row["gender"],
                    "dob"=>$row["dob"],
                    "age"=>$row["age"],
                    "address"=>$row["address"],
                    "amount"=>$row["amount"],
                    "reg_date"=>$row["reg_date"],
                    "date_of_admission"=>$row["date_of_admission"],
                    "date_of_discharge"=>$row["date_of_discharge"],
                    "payment_mode"=>$row["payment_mode"],
                    "consultant_name"=>$row["consultant_name"],
                    "department"=>$row["department"],
                    "status"=>$row["status"],
                );
            }
        }else{
            $patients[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($patients);
    }

    function getUserPermissions($user_id){
        $user_permissions=[];
        $select=$this->db_conn->query("SELECT *FROM jvm_user_permissions where user_id = $user_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
               
                array_push($user_permissions, $row["permission_id"]);
            }
        }else{
            $user_permissions[]=array(
                    false
                   
            );
        }
        return json_encode($user_permissions);
    }
    function getRolePermissions($role_id){
        $user_permissions=[];
        $select=$this->db_conn->query("SELECT *FROM jvm_role_permissions where role_id = $role_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
               
                array_push($user_permissions, $row["permission_id"]);
            }
        }else{
            $user_permissions[]=array(
                    false
                   
            );
        }
        return json_encode($user_permissions);
    }

    function getServiceAmount($service){
        $services=[];
        $select=$this->db_conn->query("SELECT service_amount FROM jvm_services where service_name='$service'");
        if($select!=false && $select->num_rows>0){
            $row=$select->fetch_assoc();
            return $row["service_amount"];
        }else{
            return false;
        }
        
    }

    function getTestAmount($test){
        $services=[];
        $select=$this->db_conn->query("SELECT price FROM jvm_lab_category where category='$test'");
        if($select!=false && $select->num_rows>0){
            $row=$select->fetch_assoc();
            return $row["price"];
        }else{
            return false;
        }
        
    }
    function getIPServices($ip_id){
        $services=[];
        $select=$this->db_conn->query("SELECT * FROM jvm_ip_services WHERE ip_id='$ip_id' ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $services[]=array(
                    "result"=>true,
                    "id"=>$row["id"],
                    "umr_id"=>$row["umr_id"],
                    "date"=>$row["date"],
                    "service"=>$row["service"],
                    "quantity"=>$row["quantity"],
                    "amount"=>$row["amount"],
                    "total_amount"=>$row["total_amount"],
                    "discount_amount"=>$row["discount_amount"],
                    
                );
            }
        }else{
            $services[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($services);
    }
    function getIPServicesList($ip_id){
        $services=[];
        $select=$this->db_conn->query("SELECT DISTINCT bill_id FROM jvm_ip_services WHERE ip_id='$ip_id' ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $services[]=array(
                    "result"=>true,
                   "bill_id"=>$row["bill_id"]
                    
                );
            }
        }else{
            $services[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($services);
    }
    function getOPServices($op_id){
        $services=[];
        $select=$this->db_conn->query("SELECT DISTINCT bill_id FROM jvm_op_services where op_id='$op_id'; ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $services[]=array(
                    "result"=>true,
                    "bill_id"=>$row["bill_id"]
                    
                );
            }
        }else{
            $services[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($services);
    }


    ///pharma//// CASE WHEN stock_quantity < 50 THEN 1 ELSE 0 END AS item_status
    function getPharmaItems(){
        $Items=[];
        $select=$this->db_conn->query("SELECT * FROM jvm_pharmacy_items ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $Items[]=array(
                    "result"=>true,
                    "item_id"=>$row["item_id"],
                    "item_code"=>$row["item_code"],
                    "generic_name"=>$row["generic_name"],
                    "category"=>$row["category"],
                    "item_name"=>$row["item_name"],
                    "hsn_number"=>$row["hsn_number"],
                    "created_by"=>$row["created_by"],
                    "created_on"=>$row["created_on"],
                    
                );
            }
        }else{
            $Items[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($Items);
    }

    function getPharmaItemDetails(){
        $Items=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_items.*,jvm_pharmacy_items_details.* FROM jvm_pharmacy_items,jvm_pharmacy_items_details where jvm_pharmacy_items_details.item_id=jvm_pharmacy_items.item_id ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $Items[]=array(
                    "result"=>true,
                    "item_id"=>$row["item_id"],
                    "item_code"=>$row["item_code"],
                    "item_name"=>$row["item_name"],
                    "batch_no"=>$row["batch_no"],
                    "unit_price"=>$row["unit_price"],
                    "selling_price"=>$row["selling_price"],
                    "stock_quantity"=>$row["stock_quantity"],
                    "expiry_date"=>$row["expiry_date"],
                    "created_by"=>$row["created_by"],
                    "created_on"=>$row["created_on"],
                    
                );
            }
        }else{
            $Items[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($Items);
    }

    function getItemDetails($item_code){
        $Items=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_items_details.*,jvm_pharmacy_items.* FROM jvm_pharmacy_items,jvm_pharmacy_items_details where item_code = '$item_code' and jvm_pharmacy_items.item_id=jvm_pharmacy_items_details.item_id ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $Items[]=array(
                    "result"=>true,
                    "item_id"=>$row["item_id"],
                    "item_name"=>$row["item_name"],
                    "expiry_date"=>$row["expiry_date"],
                    "batch_no"=>$row["batch_no"],
                    "generic_name"=>$row["generic_name"],
                    "category"=>$row["category"],
                    "unit_price"=>$row["unit_price"],
                    "selling_price"=>$row["selling_price"],
                    "stock_quantity"=>$row["stock_quantity"],
                    "created_by"=>$row["created_by"],
                    "created_on"=>$row["created_on"],
                    
                );
            }
        }else{
            $Items[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($Items);
    }

    function getCategories(){
        $categories=[];
        $select=$this->db_conn->query("SELECT * FROM jvm_pharmacy_category ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $categories[]=array(
                    "result"=>true,
                    "cat_name"=>$row["category"],
                    "cat_desc"=>$row["cat_desc"],
                    
                    
                );
            }
        }else{
            $categories[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($categories);
    }
    function getVendors(){
        $vendors=[];
        $select=$this->db_conn->query("SELECT * FROM jvm_pharmacy_vendors ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $vendors[]=array(
                    "result"=>true,
                    "vendor_id"=>$row["vendor_id"],
                    "vendor_name"=>$row["vendor_name"],
                    "contact_person"=>$row["contact_person"],
                    "phone"=>$row["phone"],
                    "email"=>$row["email"],
                    "dl_number"=>$row["dl_number"],
                    "gst_number"=>$row["gst_number"],
                    "bank_name"=>$row["bank_name"],
                    "account_number"=>$row["bank_account_number"]
                );
            }
        }else{
            $vendors[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($vendors);
    }


    function getExpiryMedicines($duration){
        $med_stock=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_items.*,jvm_pharmacy_items_details.* FROM jvm_pharmacy_items,jvm_pharmacy_items_details where jvm_pharmacy_items_details.item_id=jvm_pharmacy_items.item_id and  jvm_pharmacy_items_details.expiry_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL $duration MONTH)");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $med_stock[]=array(
                    "result"=>true,
                   "item_name"=>$row["item_name"],
                    "generic_name"=>$row["generic_name"],
                    "category"=>$row["category"],
                    "batch_no"=>$row["batch_no"],
                    
                    "expiry_date"=>$row["expiry_date"],
                    "quantity"=>$row["stock_quantity"],
                    "unit_price"=>$row["unit_price"],
                    "selling_price"=>$row["selling_price"],
                    "created_on"=>$row["created_on"],
                );
            }
        }else{
            $med_stock[]=array(
                "result"=>false,
               
            );
        }
        return json_encode($med_stock);
    }
    function getpurchases(){
        $purchases=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_purchases.*,jvm_pharmacy_vendors.vendor_name FROM jvm_pharmacy_purchases,jvm_pharmacy_vendors WHERE jvm_pharmacy_purchases.vendor_id=jvm_pharmacy_vendors.vendor_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $purchases[]=array(
                    "result"=>true,
                    "purchase_id"=>$row["purchase_id"],
                    "vendor_id"=>$row["vendor_id"],
                    "vendor_name"=>$row["vendor_name"],
                    "purchase_date"=>$row["purchase_date"],
                    "total_amount"=>$row["total_amount"],
                    "paid_amount"=>$row["paid_amount"],
                    "bal_amount"=>$row["balance_amount"],
                    "created_on"=>$row["created_on"],
                    
                    
                );
            }
        }else{
            $purchases[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($purchases);
    }
    function getpurchaseReturns(){
        $purchases=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_purchase_returns.*,jvm_pharmacy_purchases.balance_amount,jvm_pharmacy_purchases.purchase_date,jvm_pharmacy_purchases.purchase_id,jvm_pharmacy_purchases.vendor_id,jvm_pharmacy_vendors.* FROM jvm_pharmacy_purchase_returns,jvm_pharmacy_purchases,jvm_pharmacy_vendors WHERE jvm_pharmacy_purchases.purchase_id=jvm_pharmacy_purchase_returns.purchase_id and jvm_pharmacy_purchases.vendor_id=jvm_pharmacy_vendors.vendor_id ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $purchases[]=array(
                    "result"=>true,
                    "purchase_id"=>$row["purchase_id"],
                    "return_id"=>$row["return_id"],
                    "return_date"=>$row["return_date"],
                    "vendor_id"=>$row["vendor_id"],
                    "vendor_name"=>$row["vendor_name"],
                    "purchase_date"=>$row["purchase_date"],
                    "total_amount"=>$row["total_amount"],
                    "balance_amount"=>$row["balance_amount"],
                    "reason"=>$row["reason"],
                    
                    "created_on"=>$row["created_on"],
                    
                    
                );
            }
        }else{
            $purchases[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($purchases);
    }
    function getPurchaseReturnsByID($return_id){
         $purchases=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_purchase_returns.*,jvm_pharmacy_purchases.balance_amount,jvm_pharmacy_purchases.purchase_date,jvm_pharmacy_purchases.purchase_id,jvm_pharmacy_purchases.vendor_id,jvm_pharmacy_vendors.* FROM jvm_pharmacy_purchase_returns,jvm_pharmacy_purchases,jvm_pharmacy_vendors WHERE jvm_pharmacy_purchases.purchase_id=jvm_pharmacy_purchase_returns.purchase_id and jvm_pharmacy_purchases.vendor_id=jvm_pharmacy_vendors.vendor_id and jvm_pharmacy_purchase_returns.return_id=$return_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $purchases[]=array(
                    "result"=>true,
                    "purchase_id"=>$row["purchase_id"],
                    "return_id"=>$row["return_id"],
                    "bill_no"=>$row["bill_no"],
                    "return_date"=>$row["return_date"],
                    "vendor_id"=>$row["vendor_id"],
                    "vendor_name"=>$row["vendor_name"],
                    "email"=>$row["email"],
                    "mobile"=>$row["phone"],
                    "purchase_date"=>$row["purchase_date"],
                    "total_amount"=>$row["total_amount"],
                    "balance_amount"=>$row["balance_amount"],
                    "reason"=>$row["reason"],
                    "created_on"=>$row["created_on"],
                    
                    
                );
            }
        }else{
            $purchases[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($purchases);
    }
    function getPurchaseItemsByPurchaseId($purchase_id){
        $purchases=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_purchase_items.*,jvm_pharmacy_items.item_name FROM jvm_pharmacy_purchase_items,jvm_pharmacy_items WHERE jvm_pharmacy_purchase_items.item_id=jvm_pharmacy_items.item_id and jvm_pharmacy_purchase_items.purchase_id=$purchase_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $purchases[]=array(
                    "result"=>true,
                    "purchase_item_id"=>$row["purchase_item_id"],
                    "item_id"=>$row["item_id"],
                    "item_name"=>$row["item_name"],
                    "pack"=>$row["pack"],
                    "quantity"=>$row["quantity"],
                    "total_quantity"=>$row["total_quantity"],
                    "free_quantity"=>$row["free_quantity"],
                    "discount"=>$row["discount"],
                    "unit_price"=>$row["unit_price"],
                    "total_price"=>$row["total_price"],
                    "created_on"=>$row["created_on"],
                    
                    
                );
            }
        }else{
            $purchases[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($purchases);
    }
    function getPurchaseReturnsItemsByPurchaseId($return_id){
        $purchases=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_purchase_returns_items.*,jvm_pharmacy_items.item_name FROM jvm_pharmacy_purchase_returns_items,jvm_pharmacy_items WHERE jvm_pharmacy_purchase_returns_items.item_id=jvm_pharmacy_items.item_id and jvm_pharmacy_purchase_returns_items.return_id=$return_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $purchases[]=array(
                    "result"=>true,
                    "item_id"=>$row["item_id"],
                    "item_name"=>$row["item_name"],
                    "quantity"=>$row["return_qty"],
                    "unit_price"=>$row["return_amount"],
                    "created_on"=>$row["created_on"],
                    
                    
                );
            }
        }else{
            $purchases[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($purchases);
    }
    function getpurchasesByPurchaseId($purchase_id){
        $purchases=[];
        $select=$this->db_conn->query("SELECT * FROM jvm_pharmacy_purchases WHERE purchase_id=$purchase_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $purchases[]=array(
                    "result"=>true,
                    "total_amount"=>$row["total_amount"],
                    "paid_amount"=>$row["paid_amount"],
                    "bal_amount"=>$row["balance_amount"],
                   
                    
                    
                );
            }
        }else{
            $purchases[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($purchases);
    }
    function getPurchasesByID($purchase_id){
        $sale=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_purchases.*,jvm_pharmacy_vendors.* FROM jvm_pharmacy_purchases,jvm_pharmacy_vendors WHERE  jvm_pharmacy_vendors.vendor_id=jvm_pharmacy_purchases.vendor_id and jvm_pharmacy_purchases.purchase_id=$purchase_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $sale[]=array(
                    "result"=>true,
                    "vendor_name"=>$row["vendor_name"],
                    "contact_person"=>$row["contact_person"],
                    "dl_number"=>$row["dl_number"],
                    "bank_name"=>$row["bank_name"],
                    "bank_account_number"=>$row["bank_account_number"],
                    "gst_number"=>$row["gst_number"],
                    "bill_no"=>$row["bill_no"],
                    "invoice_number"=>$row["invoice_number"],
                    "purchase_id"=>$row["purchase_id"],
                    "mobile"=>$row["phone"],
                    "email"=>$row["email"],
                    "purchase_date"=>$row["purchase_date"],
                    "total_amount"=>$row["total_amount"],
                    "gst"=>$row["gst"],
                    "paid_amount"=>$row["paid_amount"],
                    "balance_amount"=>$row["balance_amount"]
                    


                );
            }
        }else{
            $sale[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($sale);
    }

    
    

    function getItemBatch($item_id){
        $select=$this->db_conn->query("SELECT batch_no FROM jvm_pharmacy_items_details WHERE item_id=$item_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $batches[]=array(
                    "result"=>true,
                    "batch"=>$row["batch_no"]
                );
            }
        }else{
            $batches[]=array(
                    "result"=>false
                    
                );
        }
        return json_encode($batches);
    }

    function getItemAmount($batch_no){
        $select=$this->db_conn->query("SELECT selling_price FROM jvm_pharmacy_items_details WHERE batch_no = '$batch_no'");
        if($select!=false && $select->num_rows>0){
            $row=$select->fetch_assoc();
            return $row["selling_price"];
        }else{
            return false;
        }
    }

    function getSales(){
        $sales=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_sales.*,jvm_patient.* FROM jvm_pharmacy_sales,jvm_patient WHERE jvm_pharmacy_sales.patient_id=jvm_patient.umr_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $sales[]=array(
                    "result"=>true,
                    "umr_id"=>$row["umr_id"],
                    "sale_id"=>$row["sale_id"],
                    "patient_name"=>$row["patient_name"],
                    "mobile"=>$row["mobile"],
                    "gender"=>$row["gender"],
                    "age"=>$row["age"],
                    "patient_type"=>$row["patient_type"],
                    "sale_date"=>$row["sale_date"],
                    "total_amount"=>$row["total_amount"],


                );
            }
        }else{
            $sales[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($sales);
    }

    function getSalesItemsBySaleId($sale_id){
        $items=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_sales_items.*,jvm_pharmacy_items.item_name FROM jvm_pharmacy_sales_items,jvm_pharmacy_items WHERE jvm_pharmacy_sales_items.item_id=jvm_pharmacy_items.item_id and jvm_pharmacy_sales_items.sale_id=$sale_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $items[]=array(
                    "result"=>true,
                    "item_name"=>$row["item_name"],
                    "item_id"=>$row["item_id"],
                    "quantity"=>$row["quantity"],
                    "unit_price"=>$row["unit_price"],
                    "total_price"=>$row["total_price"]
                );
            }
        }else{
            $items[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($items);
    }


    function getSalesByID($sale_id){
        $sale=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_sales.*,jvm_patient.* FROM jvm_pharmacy_sales,jvm_patient WHERE jvm_pharmacy_sales.patient_id=jvm_patient.umr_id and jvm_pharmacy_sales.sale_id=$sale_id");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $sale[]=array(
                    "result"=>true,
                    "umr_id"=>$row["umr_id"],
                    "bill_no"=>$row["bill_no"],
                    "sale_id"=>$row["sale_id"],
                    "patient_name"=>$row["patient_name"],
                    "mobile"=>$row["mobile"],
                    "email"=>$row["email"],
                    "gender"=>$row["gender"],
                    "age"=>$row["age"],
                    "address"=>$row["address"],
                    "patient_type"=>$row["patient_type"],
                    "sale_date"=>$row["sale_date"],
                    "total_amount"=>$row["total_amount"],
                    


                );
            }
        }else{
            $sale[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($sale);
    }
     function getStockAdjustments($user){
        $stock=[];
        $select=$this->db_conn->query("SELECT jvm_pharmacy_stock_adjustment.*,jvm_pharmacy_items.item_name from jvm_pharmacy_stock_adjustment,jvm_pharmacy_items where jvm_pharmacy_stock_adjustment.item_id=jvm_pharmacy_items.item_id and jvm_pharmacy_stock_adjustment.created_by='$user'");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $stock[]=array(
                    "result"=>true,
                    "adjustment_type"=>$row["adjustment_type"],
                    "quantity"=>$row["quantity"],
                    "reason"=>$row["reason"],
                    "created_by"=>$row["created_by"],
                    "created_on"=>$row["created_on"],
                    "item_name"=>$row["item_name"]
                    
                    


                );
            }
        }else{
            $stock[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($stock);
    }



    ///////////////////////////////////////////////////////////////////////////////////////////////// Lab //////////////////////////////////////////////////////////////////////////////////


    function getLabCategories(){
        $categories=[];
        $select=$this->db_conn->query("SELECT * FROM jvm_lab_category ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $categories[]=array(
                    "result"=>true,
                    "id"=>$row["id"],
                    "name"=>$row["category"],
                    "cat_desc"=>$row["cat_desc"],
                    "price"=>$row["price"],
                    
                    
                );
            }
        }else{
            $categories[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($categories);
    }

    function getTests(){
        $tests=[];
        $select=$this->db_conn->query("SELECT *FROM jvm_lab_category");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $tests[]=array(
                    "result"=>true,
                    "name"=>$row["category"],
                    
                    
                );
            }
        }else{
            $tests[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($tests);
    }

    function getLabTests(){
        $tests=[];
        $select=$this->db_conn->query("SELECT jvm_lab_category.category as cat_name,jvm_lab_tests.* FROM jvm_lab_category,jvm_lab_tests where jvm_lab_tests.category=jvm_lab_category.id ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $tests[]=array(
                    "result"=>true,
                    "id"=>$row["id"],
                    "category"=>$row["cat_name"],
                    "test_name"=>$row["test_name"],
                    "units"=>$row["units"],
                    "normal_values"=>$row["normal_values"],
                    
                    
                );
            }
        }else{
            $tests[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($tests);
    }



    function getCategoryTests($test_type){
        $tests=[];
        $select=$this->db_conn->query("SELECT * FROM jvm_lab_tests where jvm_lab_tests.category=$test_type");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $tests[]=array(
                    "result"=>true,
                    "id"=>$row["id"],
                    "category"=>$row["category"],
                    "test_name"=>$row["test_name"],
                    "units"=>$row["units"],
                    "normal_values"=>$row["normal_values"],
                    
                    
                );
            }
        }else{
            $tests[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($tests);
    }

    function getPendingOpInvestigations(){
        $tests=[];
        $select=$this->db_conn->query("SELECT * FROM jvm_op_investigations where status='Pending' or status='Processing' ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $tests[]=array(
                    "result"=>true,
                    "id"=>$row["id"],
                    "op_id"=>$row["op_id"],
                    "start_date"=>$row["start_date"],
                    "end_date"=>$row["end_date"],
                    "test"=>$row["test"],
                    "status"=>$row["status"],
                    
                    
                );
            }
        }else{
            $tests[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($tests);
    }
    
    function getOpInvestigations(){
        $tests=[];
        $select=$this->db_conn->query("SELECT * FROM jvm_op_investigations  ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $tests[]=array(
                    "result"=>true,
                    "id"=>$row["id"],
                    "op_id"=>$row["op_id"],
                    "start_date"=>$row["start_date"],
                    "end_date"=>$row["end_date"],
                    "test"=>$row["test"],
                    "status"=>$row["status"],
                    
                    
                );
            }
        }else{
            $tests[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($tests);
    }
    function getPendingIpInvestigations(){
        $tests=[];
        $select=$this->db_conn->query("SELECT * FROM jvm_ip_investigations where status='Pending' or status='Processing' ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $tests[]=array(
                    "result"=>true,
                    "id"=>$row["id"],
                    "ip_id"=>$row["ip_id"],
                    "start_date"=>$row["start_date"],
                    "end_date"=>$row["end_date"],
                    "test"=>$row["test"],
                    "status"=>$row["status"],
                    
                    
                );
            }
        }else{
            $tests[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($tests);
    }

    function getIpInvestigations(){
            $tests=[];
            $select=$this->db_conn->query("SELECT * FROM jvm_ip_investigations  ");
            if($select!=false && $select->num_rows>0){
                while($row=$select->fetch_assoc()){
                    $tests[]=array(
                        "result"=>true,
                        "id"=>$row["id"],
                        "ip_id"=>$row["ip_id"],
                        "start_date"=>$row["start_date"],
                        "end_date"=>$row["end_date"],
                        "test"=>$row["test"],
                        "status"=>$row["status"],
                        
                        
                    );
                }
            }else{
                $tests[]=array(
                        "result"=>false,
                       
                );
            }
            return json_encode($tests);
        }
        
        
    function getOutPatientTests($id){
        
        
            $select=$this->db_conn->query("SELECT 
                                                 jvm_op_investigations.*,jvm_op_tests.amount as test_amount,jvm_op_tests.date as test_date,
                                                 
                                                 jvm_op_patient.*,jvm_patient.*
                                                 FROM jvm_op_investigations,jvm_op_patient,jvm_op_tests,jvm_patient
                                                 where  jvm_op_investigations.op_id=jvm_op_patient.op_id and jvm_op_investigations.id = $id and jvm_op_tests.op_id=jvm_op_investigations.op_id and jvm_patient.umr_id=jvm_op_patient.umr_id;
                                                 
                                                 ");
            if($select!=false && $select->num_rows>0){
                while($row=$select->fetch_assoc()){
                    $tests[]=array(
                        "result"=>true,
                        "id"=>$row["id"],
                        "umr_id"=>$row["umr_id"],
                        "op_id"=>$row["op_id"],
                        
                        "patient_name"=>$row["patient_name"],
                        "age"=>$row["age"],
                        "gender"=>$row["gender"],
                        "consultant_name"=>$row["consultant_name"],
                        "start_date"=>$row["start_date"],
                        "end_date"=>$row["end_date"],
                        "test"=>$row["test"],
                        "status"=>$row["status"],
                        "date"=>$row["test_date"],
                        "test_amount"=>$row["test_amount"],
                        
                        
                    );
                }
            }else{
                $tests[]=array(
                        "result"=>false,
                       
                );
            }
            return json_encode($tests);
        
    }
    
    
    function getOPTestResults($id){
         $select=$this->db_conn->query("select * from jvm_op_investigations_results where investigation_id=$id
                                                 
                                                 ");
            if($select!=false && $select->num_rows>0){
                while($row=$select->fetch_assoc()){
                    $tests[]=array(
                        "result"=>true,
                        "id"=>$row["id"],
                        "units"=>$row["units"],
                        "normal_values"=>$row["normal_values"],
                        "test_result"=>$row["result"],
                        "test_name"=>$row["test"],
                        
                        
                        
                        
                    );
                }
            }else{
                $tests[]=array(
                        "result"=>false,
                       
                );
            }
            return json_encode($tests);
    }


function getInPatientTests($id){
        
        
            $select=$this->db_conn->query("SELECT 
                                                 jvm_ip_investigations.*,jvm_ip_tests.amount as test_amount,jvm_ip_tests.date as test_date,
                                                 
                                                 jvm_in_patient.*,jvm_patient.*
                                                 FROM jvm_ip_investigations,jvm_in_patient,jvm_ip_tests,jvm_patient
                                                 where  jvm_ip_investigations.ip_id=jvm_in_patient.ip_id and jvm_ip_investigations.id = $id and jvm_ip_tests.ip_id=jvm_ip_investigations.ip_id and jvm_patient.umr_id=jvm_in_patient.umr_id;
                                                 
                                                 ");
            if($select!=false && $select->num_rows>0){
                while($row=$select->fetch_assoc()){
                    $tests[]=array(
                        "result"=>true,
                        "id"=>$row["id"],
                        "umr_id"=>$row["umr_id"],
                        "ip_id"=>$row["ip_id"],
                        
                        "patient_name"=>$row["patient_name"],
                        "age"=>$row["age"],
                        "gender"=>$row["gender"],
                        "consultant_name"=>$row["consultant_name"],
                        "start_date"=>$row["start_date"],
                        "end_date"=>$row["end_date"],
                        "test"=>$row["test"],
                        "status"=>$row["status"],
                        "date"=>$row["test_date"],
                        "test_amount"=>$row["test_amount"],
                        
                        
                    );
                }
            }else{
                $tests[]=array(
                        "result"=>false,
                       
                );
            }
            return json_encode($tests);
        
    }
    
    function getIPTestResults($id){
         $select=$this->db_conn->query("select * from jvm_ip_investigations_results where investigation_id=$id
                                                 
                                                 ");
            if($select!=false && $select->num_rows>0){
                while($row=$select->fetch_assoc()){
                    $tests[]=array(
                        "result"=>true,
                        "id"=>$row["id"],
                        "units"=>$row["units"],
                        "normal_values"=>$row["normal_values"],
                        "test_result"=>$row["result"],
                        "test_name"=>$row["test"],
                        
                        
                        
                        
                    );
                }
            }else{
                $tests[]=array(
                        "result"=>false,
                       
                );
            }
            return json_encode($tests);
    }







    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function getPateintIpId($umr_id){
        $select=$this->db_conn->query("SELECT ip_id from jvm_in_patient where umr_id = '$umr_id' ");
        if($select!=false && $select->num_rows>0){
            $row=$select->fetch_assoc();
            return $row["ip_id"];
        }else{ 
            return false;
        }
    }
    
    function getPatientLastID(){
        $select=$this->db_conn->query("SELECT count from jvm_patient ORDER BY id DESC LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $count=$select->fetch_assoc();
            $count=$count["count"];
            
            return $count;
        }else{
           
            return false;
        }
    }
    function getPatientLastOpID(){
        $select=$this->db_conn->query("SELECT count from jvm_op_patient ORDER BY id DESC LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $count=$select->fetch_assoc();
            $count=$count["count"];
            
            return $count;
        }else{
           
            return false;
        }
    }
    function getPatientLastOpServiceID(){
        $select=$this->db_conn->query("SELECT id from jvm_op_services ORDER BY id DESC LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $count=$select->fetch_assoc();
            $count=$count["id"];
            
            return $count;
        }else{
           
            return false;
        }
    }
    function getPatientLastIpID(){
        $select=$this->db_conn->query("SELECT count from jvm_in_patient ORDER BY id DESC LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $count=$select->fetch_assoc();
            $count=$count["count"];
            
            return $count;
        }else{
           
            return false;
        }
    }
    function getPatientLastIpServiceID(){
        $select=$this->db_conn->query("SELECT id from jvm_ip_services ORDER BY id DESC LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $count=$select->fetch_assoc();
            $count=$count["id"];
            
            return $count;
        }else{
           
            return false;
        }
    }
    function getDischargeLastOpID(){
        $select=$this->db_conn->query("SELECT id from jvm_discharge_summary ORDER BY id DESC LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $count=$select->fetch_assoc();
            $count=$count["id"];
            
            return $count;
        }else{
           
            return false;
        }
    }



    function getRoleName($id){
        $select=$this->db_conn->query("SELECT name from jvm_roles WHERE id = $id");
        if($select!=false && $select->num_rows>0){
            $name=$select->fetch_assoc();
            $name=$name["name"];
            
            return $name;
        }else{
           
            return false;
        }
    }
    function getWards(){
        $wards=[];
        $select=$this->db_conn->query("SELECT DISTINCT ward_name
                                            
                                            FROM jvm_beds
                                            ");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $wards[]=array(
                    "result"=>true,
                    "ward_name"=>$row["ward_name"],
                   
                    
                );
            }
        }else{
            $wards[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($wards);
    }
    function getBedOccupancy(){
        $beds=[];
        $select=$this->db_conn->query("SELECT 
                                            ward_name,
                                            COUNT(*) AS total_beds,
                                            SUM(CASE WHEN is_occupied = TRUE THEN 1 ELSE 0 END) AS occupied_beds,
                                            SUM(CASE WHEN is_occupied = FALSE THEN 1 ELSE 0 END) AS available_beds
                                            FROM jvm_beds
                                            GROUP BY ward_name");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $beds[]=array(
                    "result"=>true,
                    "ward_name"=>$row["ward_name"],
                    "total_beds"=>$row["total_beds"],
                    "occupied_beds"=>$row["occupied_beds"],
                    "available_beds"=>$row["available_beds"],
                    
                );
            }
        }else{
            $beds[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($beds);
    }
    function getAvialableRooms($ward_name){
        $beds=[];
        $select=$this->db_conn->query("SELECT 
                                            bed_number
                                            
                                            FROM jvm_beds
                                            WHERE ward_name LIKE '$ward_name' and is_occupied=FALSE");
        if($select!=false && $select->num_rows>0){
            while($row=$select->fetch_assoc()){
                $beds[]=array(
                    "result"=>true,
                    "bed_number"=>$row["bed_number"]
                   
                    
                );
            }
        }else{
            $beds[]=array(
                    "result"=>false,
                   
            );
        }
        return json_encode($beds);
    }

    function getIPBed($ip_id){
        $select=$this->db_conn->query("SELECT bed_no from jvm_in_patient where ip_id='$ip_id' ");
        if($select!=false && $select->num_rows>0){
            $row=$select->fetch_assoc();
            return $row["bed_no"];
        }else{
            return false;
        }
    }


    ///////////////////////////////////////////////////////////////////////////  pharmacy //////////////////////////////////////////////////////////////////////////////////////////
    function getStockByItemID($item){
        $select=$this->db_conn->query("SELECT stock_quantity FROM jvm_pharmacy_items_details where item_id=$item");
        if($select!=false && $select->num_rows>0){
            $row=$select->fetch_assoc();
            return $row["stock_quantity"];
        }else{
            return false;
        }
    }


    function getSaleLastOpID(){
        $select=$this->db_conn->query("SELECT count from jvm_pharmacy_sales ORDER BY sale_id DESC LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $count=$select->fetch_assoc();
            $count=$count["count"];
            
            return $count;
        }else{
           
            return false;
        }
    }
    function getSaleReturnsLastOpID(){
        $select=$this->db_conn->query("SELECT return_id from jvm_pharmacy_sales_returns ORDER BY return_id DESC LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $count=$select->fetch_assoc();
            $count=$count["return_id"];
            
            return $count;
        }else{
           
            return false;
        }
    }
    function getPurchaseLastOpID(){
        $select=$this->db_conn->query("SELECT count from jvm_pharmacy_purchases ORDER BY purchase_id DESC LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $count=$select->fetch_assoc();
            $count=$count["count"];
            
            return $count;
        }else{
           
            return false;
        }
    }
    function getPurchaseReturnsLastOpID(){
        $select=$this->db_conn->query("SELECT return_id from jvm_pharmacy_purchase_returns ORDER BY return_id DESC LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $count=$select->fetch_assoc();
            $count=$count["return_id"];
            
            return $count;
        }else{
           
            return false;
        }
    }

    function getTotalUserCollections($user){
        $users=[];
        $select=$this->db_conn->query("SELECT 
                                               
                                                (SUM(op_total) + SUM(ip_total) + SUM(pharmacy_total) ) AS grand_total
                                            FROM (
                                                -- OP Billing
                                                SELECT created_by AS user_id,
                                                    SUM(total_amount) AS op_total,
                                                    0 AS ip_total,
                                                    0 AS pharmacy_total
                                                    
                                                FROM jvm_op_patient  where created_by='$user'
                                                GROUP BY created_by 

                                                UNION ALL

                                                -- IP Billing
                                                SELECT created_by AS user_id,
                                                    0,
                                                    SUM(amount),
                                                    0
                                                    
                                                FROM jvm_in_patient  where created_by='$user'
                                                GROUP BY created_by 

                                                UNION ALL

                                                -- Pharmacy Sales
                                                SELECT created_by AS user_id,
                                                    0,
                                                    0,
                                                    SUM(total_price)
                                                    
                                                FROM jvm_pharmacy_sales_items  where created_by='$user'
                                                GROUP BY created_by

                                                UNION ALL

                                                -- IP Services
                                                SELECT created_by AS user_id,
                                                    0,
                                                    SUM(total_amount),
                                                    0
                                                    
                                                FROM jvm_ip_services  where created_by='$user'
                                                GROUP BY created_by
                                            ) AS combined
                                            GROUP BY user_id;");
        if($select!=false && $select->num_rows>0){
           $row=$select->fetch_assoc();
           return $row["grand_total"];
                           
            
                
        }else{
               return false;
        }
        
    }
    function getTodayUserCollections($user){
        $users=[];
        $select=$this->db_conn->query("SELECT 
                                               
                                                (SUM(op_total) + SUM(ip_total) + SUM(pharmacy_total) ) AS grand_total
                                            FROM (
                                                -- OP Billing
                                                SELECT created_by AS user_id,
                                                    SUM(total_amount) AS op_total,
                                                    0 AS ip_total,
                                                    0 AS pharmacy_total
                                                    
                                                FROM jvm_op_patient  where created_by='$user' and DATE(created_on)=CURRENT_DATE
                                                GROUP BY created_by 

                                                UNION ALL

                                                -- IP Billing
                                                SELECT created_by AS user_id,
                                                    0,
                                                    SUM(amount),
                                                    0
                                                    
                                                FROM jvm_in_patient  where created_by='$user' and DATE(created_on)=CURRENT_DATE
                                                GROUP BY created_by 

                                                UNION ALL

                                                -- Pharmacy Sales
                                                SELECT created_by AS user_id,
                                                    0,
                                                    0,
                                                    SUM(total_price)
                                                    
                                                FROM jvm_pharmacy_sales_items  where created_by='$user' and DATE(created_on)=CURRENT_DATE
                                                GROUP BY created_by

                                                UNION ALL

                                                -- IP Services
                                                SELECT created_by AS user_id,
                                                    0,
                                                    SUM(total_amount),
                                                    0
                                                    
                                                FROM jvm_ip_services  where created_by='$user' and DATE(created_on)=CURRENT_DATE
                                                GROUP BY created_by
                                            ) AS combined
                                            GROUP BY user_id;");
        if($select!=false && $select->num_rows>0){
           $row=$select->fetch_assoc();
           return $row["grand_total"];
                           
            
                
        }else{
               return false;
        }
        
    }

    function getTodayOPatients(){
        $select=$this->db_conn->query("SELECT count(*) FROM jvm_op_patient WHERE DATE(created_on)=CURRENT_DATE ");
        if($select!=false && $select->num_rows>0){
            $row=$select->fetch_assoc();
            return $row["count(*)"];
        }else{
            return false;
        }
    }
    function getTodayIPatients(){
        $select=$this->db_conn->query("SELECT count(*) FROM jvm_in_patient WHERE DATE(created_on)=CURRENT_DATE ");
        if($select!=false && $select->num_rows>0){
            $row=$select->fetch_assoc();
            return $row["count(*)"];
        }else{
            return false;
        }
    }

    function getItemLastID(){
        $select=$this->db_conn->query("SELECT count from jvm_pharmacy_items ORDER BY item_id DESC LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $count=$select->fetch_assoc();
            $count=$count["count"];
            
            return $count;
        }else{
           
            return false;
        }
    }
    function getLowStockCount(){
        $select=$this->db_conn->query("SELECT COUNT(*) FROM jvm_pharmacy_items_details WHERE stock_quantity < 50");
        if($select!=false && $select->num_rows>0){
            $unique_val=$select->fetch_assoc();
            return $unique_val["COUNT(*)"];
        }else{
            return 0;
        }
    }
     function getExpiryMedicinesCount($duration){
        
        $select=$this->db_conn->query("SELECT count(*) FROM jvm_pharmacy_items_details where  expiry_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL $duration MONTH)");
        if($select!=false && $select->num_rows>0){
            $row=$select->fetch_assoc(); 
            return $row["count(*)"];
        }else{
             return false;
        }
       
    }
    function getTopSaleItems(){
        $select=$this->db_conn->query("SELECT
                                            i.item_name
                                            
                                        FROM
                                            jvm_pharmacy_items i
                                        JOIN
                                            jvm_pharmacy_sales_items oi ON i.item_id = oi.item_id
                                        JOIN
                                            jvm_pharmacy_sales o ON oi.sale_id=o.sale_id
                                        WHERE
                                             o.sale_date >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH) 
                                        GROUP BY
                                            i.item_name
                                        ORDER BY
                                            SUM(oi.quantity) DESC
                                        LIMIT 1");
        if($select!=false && $select->num_rows>0){
            $top_rated_item=$select->fetch_assoc();
            return $top_rated_item["item_name"];
        }else{
            return false;
        }
    }
    function getTotalPurchases($duration){
        $select=$this->db_conn->query("SELECT COUNT(*) FROM jvm_pharmacy_purchases where  created_on >= DATE_SUB(CURDATE(), INTERVAL $duration MONTH)");
        if($select!=false && $select->num_rows>0){
            $unique_val=$select->fetch_assoc();
            return $unique_val["COUNT(*)"];
        }else{
            return 0;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function getPatientRelatedTables($umr_id){
        $tables = ['jvm_op_patient','jvm_op_services','jvm_op_tests','jvm_in_patient','jvm_ip_services','jvm_ip_tests'];
        
        

        $found = [];
        foreach ($tables as $table) {
            $sql = "SELECT 1 FROM $table WHERE  umr_id ='$umr_id' LIMIT 1";
            $result = $this->db_conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $found[] = $table;
            }
        }

         $sql = "SELECT 1 FROM jvm_pharmacy_sales WHERE  patient_id ='$umr_id' LIMIT 1";
            $result = $this->db_conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $found[] = 'jvm_pharmacy_sales';
            }

        
        echo implode('<br>', $found);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function updatePatient($umr_id,$edit_patient_name,$edit_dob,$age,$edit_gender,$edit_mobile,$edit_email,$edit_address){
        $update=$this->db_conn->query("UPDATE jvm_patient SET 
                                                            patient_name='$edit_patient_name',
                                                            email='$edit_email',
                                                            mobile='$edit_mobile',
                                                            gender='$edit_gender',
                                                            dob='$edit_dob',
                                                            age='$age',
                                                            address='$edit_address'

                                                            WHERE umr_id='$umr_id'
                                                            
                                                            ");
        if($update==true){

        }else{
            echo "Update failed".$this->db_conn->error;
        }
    }
    function updateDischargeIP($discharge_date,$dis_type,$status,$ip_id){
        $update=$this->db_conn->query("UPDATE jvm_in_patient SET date_of_discharge='$discharge_date',type_of_discharge='$dis_type',status='$status' WHERE ip_id='$ip_id' ");
        if($update==true){

        }else{
            echo "Update failed".$this->db_conn->error;
        }
    }
    function UpdateBedStatus($bed_no,$is_occupied){
        $update=$this->db_conn->query("UPDATE jvm_beds SET is_occupied=$is_occupied WHERE bed_number='$bed_no' ");
        if($update==true){

        }else{
            echo "Update failed".$this->db_conn->error;
        }
    }
    function updateItemStock($item_id,$adjusted_quantity){
        $update=$this->db_conn->query("UPDATE jvm_pharmacy_items_details SET stock_quantity=$adjusted_quantity WHERE item_id=$item_id ");
        if($update==true){

        }else{
            echo "Update failed".$this->db_conn->error;
        }
    }

    function updateOPInvestigationStatus($status,$inv_id){
         $update=$this->db_conn->query("UPDATE jvm_op_investigations SET status='$status' WHERE id=$inv_id ");
        if($update==true){

        }else{
            echo "Update failed".$this->db_conn->error;
        }
    }
    function updateIPInvestigationStatus($status,$inv_id){
         $update=$this->db_conn->query("UPDATE jvm_ip_investigations SET status='$status' WHERE id=$inv_id ");
        if($update==true){

        }else{
            echo "Update failed".$this->db_conn->error;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function removeUserPermissions($user_id){
        $delete=$this->db_conn->query("DELETE from jvm_user_permissions where user_id=$user_id");
        if($delete==true){

        }else{
            echo "Deletion errors".$this->db_conn->error;
        }
    }

    function deletePatient($umr_id){
        $msg="";
        $tables = ['jvm_patient','jvm_op_patient','jvm_op_services','jvm_op_tests','jvm_in_patient','jvm_ip_services','jvm_ip_tests'];
        
        

        $found = [];
        foreach ($tables as $table) {
            $sql = "SELECT 1 FROM $table WHERE  umr_id ='$umr_id' LIMIT 1";
            $result = $this->db_conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $found[] = $table;
            }
        }

         $sql = "DELETE from jvm_pharmacy_sales WHERE  patient_id ='$umr_id'";
            $result = $this->db_conn->query($sql);
            if($result==true){
                $msg.="Deleted Successfully jvm_pharmacy_sales \n";
            }else{
                $msg.="Deletion errors".$this->db_conn->error;
            }

        foreach($found as $del_table){
            /*if($del_table=="jvm_op_patient"){
                    $select=$this->db_conn->query("SELECT op_id from $del_table where umr_id='$umr_id'");
                    if($select!=false && $select->num_rows>0){
                        $op_id=$select->fetch_assoc();
                        $delete=$this->db_conn->query("")
                    }

                    
            }*/

             $delete=$this->db_conn->query("DELETE from $del_table WHERE umr_id='$umr_id'");
            if($delete==true){
                $msg.="Deleted Successfully $del_table \n";
            }else{
                $msg.="Deletion errors".$this->db_conn->error;
            }
           
        }

        
        return $msg;
    }
}

