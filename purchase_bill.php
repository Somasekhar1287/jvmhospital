<?php 


include $_SERVER['DOCUMENT_ROOT'] . '/JVM/config.php';

   
   


    if(isset($_GET["purchase_id"])){
        $purchases=json_decode($jvmClass->getPurchasesByID($_GET["purchase_id"]));

        foreach($purchases as $sl){
                    
                if($sl->result){

                    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>HMS Bill (OP / IP / Pharmacy Sales / Purchase)</title>
  <style>
    :root{
      --brand:#0ea5e9; /* cyan-500 */
      --ink:#0f172a;   /* slate-900 */
      --muted:#475569; /* slate-600 */
      --line:#e2e8f0;  /* slate-200 */
      --accent:#f1f5f9;/* slate-50 */
    }

    /* Page size for printing */
    @page { size: A4; margin: 18mm; }

    html, body { background: #f8fafc; color: var(--ink); font: 12px/1.4 "Inter", system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; }
    .sheet { max-width: 800px; margin: 24px auto; background: white; box-shadow: 0 6px 24px rgba(2,6,23,.08); border-radius: 14px; overflow: hidden; }
    .bill { padding: 24px 28px; }

    /* Header */
    .head { display: grid; grid-template-columns: 1fr auto; gap: 16px; align-items: center; border-bottom: 1px solid var(--line); padding-bottom: 16px; }
    .brand { display:flex; gap:24px; align-items:center; }
    .brand-logo { width: 60px; height: 56px; border-radius: 10px; background: var(--accent) url('logo-placeholder.png') center/cover no-repeat; border: 1px solid var(--line); }
    .brand-logo img{ width:100%; height:100%; object-fit:contain;}
    .brand-text h1 { margin:0; font-size: 20px; letter-spacing:.2px; }
    .brand-text h3 { margin:0; font-size: 20px; letter-spacing:.2px; }
    .brand-text p { margin:2px 0 0; color: var(--muted); font-size: 11px; }

    .bill-meta { text-align: right; }
    .badge { display:inline-block; border:1px solid var(--brand); color: var(--brand); padding: 4px 10px; border-radius: 999px; font-weight: 600; letter-spacing:.3px; }
    .doc-title { margin: 8px 0 0; font-size: 18px; font-weight: 800; }
    .doc-id { margin: 2px 0 0; color: var(--muted); }

    /* Info rows */
    .row { display:grid; grid-template-columns: repeat(2,1fr); gap: 16px; margin-top: 16px; }
    .card { border:1px solid var(--line); border-radius: 12px; padding: 12px 14px; background: white; }
    .card h3 { margin: 0 0 8px; font-size: 12px; text-transform: uppercase; letter-spacing:.4px; color: var(--muted); }
    .kv { display:grid; grid-template-columns: 140px 1fr; gap: 8px 10px; }
    .kv div { padding: 2px 0; }
    .kv .k { color: var(--muted); }

    /* Table */
    table { width: 100%; border-collapse: collapse; margin-top: 18px; }
    th, td { text-align: left; padding: 10px 8px; border-bottom: 1px solid var(--line); vertical-align: top; }
    thead th { font-size: 11px; text-transform: uppercase; letter-spacing:.5px; color: var(--muted); background: var(--accent); border-top-left-radius:8px; border-top-right-radius:8px; }
    tfoot td { border-top: 1px solid var(--line); }

    .text-right { text-align: right; }
    .text-center { text-align: center; }
    .muted { color: var(--muted); }

    .totals { margin-top: 10px; margin-left: auto; width: 340px; }
    .totals .rowline { display:grid; grid-template-columns: 1fr auto; gap: 8px; padding: 6px 0; }
    .totals .rowline.total { border-top: 1px dashed var(--line); margin-top: 6px; padding-top: 10px; font-weight: 800; font-size: 14px; }

    .notes { margin-top: 14px; font-size: 11px; color: var(--muted); background:#fafcff; border:1px dashed var(--line); padding:10px 12px; border-radius:10px; }

    .sign { display:grid; grid-template-columns: repeat(3,1fr); gap: 20px; margin-top: 26px; }
    .sigline { text-align:center; border-top:1px dashed var(--line); padding-top: 6px; color: var(--muted); }

    /* Toolbar (hidden in print) */
    .toolbar { position: sticky; top: 0; z-index: 50; background: #ffffffcc; backdrop-filter: blur(6px); border-bottom:1px solid var(--line); }
    .toolbar-inner { max-width: 800px; margin: 0 auto; padding: 10px 14px; display:flex; gap:10px; align-items:center; justify-content: space-between; }
    .toolbar .btn { appearance: none; border:1px solid var(--line); background:white; padding:8px 12px; border-radius:10px; cursor:pointer; font-weight:600; }
    .toolbar .btn.primary { border-color: var(--brand); color:white; background: var(--brand); }

    @media print {
      body { background: white; }
      
      .sheet { box-shadow: none; border-radius: 0; }
      .toolbar { display: none; }
    }
  </style>
</head>
<body>
  <!-- Toolbar (non-print) -->
  <div class="toolbar">
    <div class="toolbar-inner">
      <div style="display:flex; gap:8px; align-items:center;">
        <strong>HMS Printable Bill</strong>
        
      </div>
      <div>
        <button class="btn" onclick="window.print()">Print</button>
        
      </div>
    </div>
  </div>

  <div class="sheet">
    <div class="bill" id="bill">
      <header class="head">
        <div class="brand">
          <div class="brand-logo" id="logo">
            <img src="/JVM/assets/images/logo_56x56.png" >
          </div>
          <div class="brand-text">
            <h1 id="hospitalName">JVM Multi Speciality Hospital</h1>
            <p id="hospitalAddr">#12-11-650, Beside Manipuram bridge,<br> Near Bharat Petrol Bunk, Kothapeta, Guntur - 522001.<br>Landline : 0863 - 3511345.<br>Mobile : 8790400360</p>
          </div>
        </div>
        <div class="bill-meta">
          <span class="badge" id="doctype">Pharmacy Purchase</span>
          <div class="doc-title">Invoice #: <span id="invNo"><?php echo $sl->invoice_number; ?></span></div>
          <div class="doc-id">Date: <span id="invDate"><?php $month=date("m",strtotime($sl->purchase_date));
                            $day=date("d",strtotime($sl->purchase_date));
                            $year=date("Y",strtotime($sl->purchase_date));
                            echo $day."/".$month."/".$year; ?>.</span><br><br></div>
        </div>
      </header>

      <section class="row">
        <div class="card" id="patientCard">
          <h3>Vendor Details</h3>
          <div class="kv">
             <div class="k">Name</div><div id="billTo"><?php echo $sl->vendor_name; ?></div>
            <div class="k">Email</div><div id="billmail"><?php echo $sl->email; ?></div>
            <div class="k">Address</div><div id="billAddr">-</div>
            <div class="k">Phone</div><div id="billPhone"><?php echo $sl->mobile; ?></div>
            <div class="k">Payment Mode</div><div id="payMode">-</div>
            
            
          </div>
        </div>
        <div class="card">
          <h3>Bill Details </h3>
          <div class="kv">
            <div class="k">Contact Name</div><div id="payMode"><?php echo $sl->contact_person; ?></div>
            <div class="k">Drug License Number</div><div id="billTo"><?php echo $sl->dl_number; ?></div>
            <div class="k">Gst Number</div><div id="billmail"><?php echo $sl->gst_number; ?></div>
            <div class="k">Bank Name</div><div id="billAddr"><?php echo  $sl->bank_name; ?></div>
            <div class="k">Account Number</div><div id="billPhone"><?php echo $sl->bank_account_number; ?></div>
            
            
          </div>
        </div>
      </section>

      <table id="itemTable">
        <thead>
          <tr>
            <th style="width:42px;" class="text-center">#</th>
            <th>Description</th>
            
            <th class="text-right">Pack</th>
            <th class="text-right">Qty</th>
            <th class="text-right">Free Qty</th>
            <th class="text-right">Total Qty</th>
            
            <th class="text-right">Rate</th>
            <th class="text-right">Discount (%)</th>
            <!--<th class="text-right gstCol">GST %</th>
            <th class="text-right gstCol">GST Amt</th>-->
            <th class="text-right">Amount</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php 
                 $sno=1;
                 $total_amount=0;
                 $discount_amount=0;
                 $sub_total=0;
                ?>
                
                
                <?php 
                
                $Items=json_decode($jvmClass->getPurchaseItemsByPurchaseId($sl->purchase_id));
                
                    
                    foreach($Items as $Item){
                        if($Item->result){
                ?>
                <tr>
                    <td ><?php echo $sno++; ?></td>
                    
                    
                    <td><?php echo $Item->item_name; ?></td>
                    <td class="text-right"><?php echo $Item->pack; ?></td>
                    <td class="text-right"><?php echo $Item->quantity; ?></td>
                    <td class="text-right"><?php echo $Item->free_quantity; ?></td>
                    <td class="text-right"><?php echo $Item->total_quantity; ?></td>
                    
                    <td class="text-right"><?php echo $Item->unit_price; ?></td>
                    <td class="text-right"><?php echo $Item->discount."%"; ?></td>
                    <td class="text-right"><?php echo $Item->total_price; ?></td>
                </tr>
                <?php 
            
                               
                          $total_amount+=$Item->total_price;
            } ?>
                <?php } ?>
        </tbody>
      </table>

      <div class="totals">
        <div class="rowline"><div>Sub Total</div><div id="subTotal"><?php echo $total_amount; ?></div></div>
        <div class="rowline gstCol"><div>Total GST</div><div id="totalGST"><?php echo $sl->gst; ?></div></div>
        <div class="rowline total"><div>Grand Total</div><div id="grandTotal"><?php echo $sl->total_amount; ?></div></div>
        <div class="rowline"><div class="muted">Amount in Words</div><div id="amtWords" class="muted"></div></div>
      </div>

      <!--<div class="notes">
        <strong>Notes:</strong>
        <ul style="margin:6px 0 0 16px;">
          <li>Goods once sold are returnable only as per policy. Prescription drugs require valid prescription for sale & return.</li>
          <li>For IP bills, tariffs include room & nursing charges as applicable.</li>
          <li>This is a system generated document. No signature required.</li>
        </ul>
      </div>-->

      <div class="sign">
        <div class="sigline">Prepared By</div>
        <div class="sigline">Checked By</div>
        <div class="sigline">Authorized Signatory</div>
      </div>
    </div>
  </div>

  <script>
    /* Minimal helpers for demo/print. Replace with server-side values in PHP. */
    const tbody = document.getElementById('tbody');
    const fmt = n => Number(n).toLocaleString(undefined,{minimumFractionDigits:2, maximumFractionDigits:2});

   

    function amountInWords(num){
      // simple English words (short scale) for demo
      const a=["","One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten","Eleven","Twelve","Thirteen","Fourteen","Fifteen","Sixteen","Seventeen","Eighteen","Nineteen"];
      const b=["","","Twenty","Thirty","Forty","Fifty","Sixty","Seventy","Eighty","Ninety"];
      function inWords(n){
        if(n===0) return "Zero";
        if(n<20) return a[n];
        if(n<100) return b[Math.floor(n/10)] + (n%10?" "+a[n%10]:"");
        if(n<1000) return a[Math.floor(n/100)] + " Hundred" + (n%100?" "+inWords(n%100):"");
        if(n<100000) return inWords(Math.floor(n/1000)) + " Thousand" + (n%1000?" "+inWords(n%1000):"");
        if(n<10000000) return inWords(Math.floor(n/100000)) + " Lakh" + (n%100000?" "+inWords(n%100000):"");
        return inWords(Math.floor(n/10000000)) + " Crore" + (n%10000000?" "+inWords(n%10000000):"");
      }
      const rupees = Math.floor(num);
      const paise = Math.round((num - rupees) * 100);
      return inWords(rupees) + (paise?" and "+inWords(paise)+" Paise":"") + " Only";
    }

    
    document.getElementById('amtWords').textContent = amountInWords(document.getElementById('grandTotal').textContent);
    // Initialize with demo content
    //fillDemo();
  </script>
</body>
</html>
<?php

      }
    }
        
    }


?>