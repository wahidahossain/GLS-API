<!-- Main content -->
<?php
error_reporting(0);
$OrderNumber = $_REQUEST['OrderNumber'];
$jrp_account_no = $_REQUEST['jrp_account_no'];
?>
<section class="content">
    <div class="container-fluid">        
        <div class="row">
        
            <div class="col-md-4">
            <!-- <a href="add_new_parcel.php" name="Add New" class="btn btn-primary">Parcel</a> <a href="add_new_freight.php" name="Add New" class="btn btn-primary">Freight</a><br />
                            <a href="shipping_list.php">>> Go to Shipping Records</a> -->
                          <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Add New Shipment : Freight</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->               
                            <form method=post action="../model/add_new_shipment.php" id="myForm1" class="needs-validation">
                            <div class="card card-body"> 
                            <div class="form-group" style='display:none;'>
                                    <label for="exampleInputEmail1">Division</label>             
                                    <select class="custom-select" name="division" id='division' onchange='cDivision()' required>                                                                                    
                                            <option value="Freight">Freight</option>
                                    </select>                   
                            </div>

                            <div class="form-group" style='display:none;'>
                                <label for="exampleInputEmail1">Category</label>             
                                <!-- <select class="custom-select" name="category" id='s_category' onchange='scategory()' required> -->
                                <select class="custom-select" name="category" id='s_category' onchange='scategory()' required>                                               
                                <option value="Freight">Freight</option>
                                </select>                   
                            </div>                                                                     

                                <div class="form-group">
                                        <label>Billing Account</label>
                                        <select class="custom-select" name="billing_account_id" required>
                                         <!-- <option value="" selected>Select Option</option> -->
                                         <?php                                            
                                         include("../model/connect.php");                                                                    
                                            $results_customer = mysqli_query($con, "SELECT * FROM `billing_account` where `flag` = '1' and `category`='Freight'");                                                
                                            while ($row_customer = mysqli_fetch_array($results_customer))                       
                                            {         
                                            $billing_account_id = $row_customer['billing_account_id'];
                                            $billing_account = $row_customer['billing_account'];
                                            $note = $row_customer['note'];                                      
                                            ?>                         
                                            <option value="<?php echo $billing_account_id;?>"><?php echo $billing_account;?> : <?php echo $note;?></option>
                                            <?php  
                                            }                                                   
                                            ?> 
                                        </select>
                                    </div>

                                <div class="form-group" style='display:none;'>
                                    <label for="exampleInputEmail1">Payment Type</label>             
                                    <select class="custom-select" name="paymentType" required>
                                            <option value="">Select Option</option>
                                            <option value="Prepaid" selected>Prepaid</option>
                                            <option value="ThirdParty">ThirdParty</option>
                                            <option value="Collect">Collect</option>
                                    </select>                                   
                                      

                                    <!-- =========================== Tooltip -->
                                    <link rel="stylesheet" href="dist/tooltip/tooltip.css">
                                        <span data-toggletip>Prepaid: the user will select one of his/her billing account.<br />
                                        Collect: the receiver of the shipment will pay for the shipment.
                                        Third Party: a third party entity will pay for the shipment.
                                        </span>
                                    <script src="dist/tooltip/tooltip.js"></script>
                                </div>                               
                              
                                
                               
                                <div class="form-group">
                                    <label>Sender</label>
                                    <select class="custom-select" name="sender_id" required>
                                        <!-- <option value="" selected>Select Option</option> -->
                                        <?php                                            
                                            include("../model/connect.php");
                                            $results_customer = mysqli_query($con, "SELECT * FROM `sender`");                                                
                                            while ($row_customer = mysqli_fetch_array($results_customer))                       
                                            {         
                                                $sender_id = $row_customer['sender_id'];
                                                $fullName = $row_customer['fullName'];
                                                $province = $row_customer['province'];
                                                $postalCode = $row_customer['postalCode'];                                      
                                        ?>                         
                                        <option value="<?php echo $sender_id;?>"><?php echo $fullName;?>, <?php echo $province;?>, <?php echo $postalCode;?></option>
                                        <?php  
                                            }                                                   
                                        ?> 
                                    </select>
                                </div> 
                                
                                <label>Return Address</label>
                                    <select class="custom-select" name="return_id">
                                        <!-- <option value="" selected>Select Option</option> -->
                                        <?php                                            
                                            include("../model/connect.php");                                                            
                                            $results_customer = mysqli_query($con, "SELECT * FROM `return`");                                                
                                            while ($row_customer = mysqli_fetch_array($results_customer))                       
                                                {         
                                                    $return_id = $row_customer['return_id'];
                                                    $fullName = $row_customer['fullName'];
                                                    $province = $row_customer['province'];
                                                    $postalCode = $row_customer['postalCode'];                                      
                                                        ?>                         
                                        <option value="<?php echo $return_id;?>"><?php echo $fullName;?>, <?php echo $province;?>, <?php echo $postalCode;?></option>
                                        <?php  
                                            }                                                   
                                        ?> 
                                        </select>                                
                               

                                <div class="form-group">
                                    <label>Unit Of Measurement</label>
                                    <select class="custom-select" name="unitOfMeasurement" required>
                                        <option value="K" >K</option>
                                        <option value="L">L</option>
                                        <option value="KC" selected>KC</option>
                                        <option value="KM">KM</option>
                                        <option value="LI">LI</option>
                                        <option value="LF">LF</option>
                                    </select>
                                </div>                                                  
                                <!-- Ref: K:kg (implies cm), L:lb (implies inch), KC:kg-cm, KM:kg-meter, LI: lb-inch, LF: lb-feet. -->
                                <a href="../model/unitOfMeasurement.php" target="_blank">* Ref. Link</a>
                                <!-- <div class="card-header">
                                    <h3 class="card-title text-primary">Parcels Details:</h3>
                                </div> -->
                                <div class="form-group" style='display:none;'>
                                    <label>Parcel Category</label>
                                    <select class="custom-select" name="parcel_category" id='select_category' onchange='populateField()' required>                                        
                                        <option value="Freight" >Freight</option>
                                                                         
                                    </select>
                                </div>
                                <div id='freight'>
                                    <!-- Freight================CLICK EVENT============= -->
                                    <label>Parcel Type: </label>
                                    <select class="custom-select" name="parcelTypeFreight" required>
                                        <option value="">Select Option</option>
                                        <option value="Barrel" >Barrel</option>
                                        <option value="Bundle">Bundle</option>
                                        <option value="Box" selected>Box</option>
                                        <option value="Crate">Crate</option>
                                        <option value="FullLoad">FullLoad</option>
                                        <option value="Piece">Piece</option>
                                        <option value="Skid">Skid</option>
                                        <option value="Tube">Tube</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>                                      
                                <div class="form-group">
                                    <label style="padding:5px;">Quantity</label>
                                    <input name="quantity" id="quantity" type="number" class="" size="8" oninput="this.value = Math.round(this.value);" required>
                                    <label>Weight</label>
                                    <input name="weight" type=number step=0.01 id="weight" class="" size="8" required> <br />
                                    <label style="padding:3px 16px 4px 5px;">Length</label>
                                    <input name="length" id="length" type=number step=0.01 class="" size="8" required>
                                    <label style="padding:3px 1px 4px 5px;">Depth</label>
                                    <input name="depth" id="depth" type=number step=0.01 class="" size="8"  required><br />
                                    <label style="padding: 4px 22px 2px 6px;">Width</label>
                                    <input name="width" id="width" type=number step=0.01 class="" size="8"  required>
                                </div>                                                                                       
                                <div class="form-group" style='display:none;'>
                                    <label>Group Id</label>
                                    <input name="groupId" id="lastNameId" type="text" class="form-control"  value="0" readonly>
                                </div>                                           
                                <div class="form-group" style='display:none;'>
                                    <label>Delivery Type</label>                                    
                                    <select class="custom-select" name="deliveryType" id='deliveryType' onchange='deliverytype()'>                                       
                                        <option value="GRD" selected>Ground delivery</option>
                                                                             
                                    </select>
                                </div>                             
                                    
                                    <!-- Surcharges ========================== -->                                                     
                                    <div id='surcharges_type_freight'><label>Surcharges</label>  
                                        <select class="custom-select" name="surcharges_type_freight" id='select_surcharges1' onchange='selectSurcharges1()' required>
                                            <option value="">Select Option</option>
                                            <option value="DCV">DCV</option>
                                            <option value="DGG">DGG</option>
                                            <option value="PHD">PHD</option>
                                            <option value="COD">COD</option>
                                            <option value="TGT">TGT</option>
                                            <!-- <option value="TRD">TRD</option>                                        
                                            <option value="CNSTD">CNSTD</option> 
                                            <option value="HEAT">HEAT</option>
                                            <option value="IDEL">IDEL</option>
                                            <option value="PHPU">PHPU</option>                                            
                                            <option value="TGTPU">TGTPU</option> -->
                                        </select>
                                    </div>
                                    
                                    <a href="../model/surcharges_ref_list.php" target="_blank">* Ref. Link</a>

                                    <div style='display:none;' id='surchargesId'>
                                        <!-- Required if field is DCV or COD ======================= -->
                                        <label>Value</label>
                                        <div class="form-group">
                                            <input name="surcharges_value" id="surcharges_value" type="text" class="form-control">
                                        </div>  
                                        <!-- Required if field is DCV or COD END =================== --> 
                                    </div>

                                    <script>
                                        function selectSurcharges1() 
                                        {
                                        selectedVal = document.getElementById('select_surcharges1').value;
                                        if((selectedVal == 'DCV') || (selectedVal == 'COD'))
                                        {   
                                        $("#surchargesId").show();
                                        document.getElementById("surcharges_value").required;
                                        }
                                        else
                                        {
                                        $("#surchargesId").hide();
                                        }

                                        const select_hazmat = document.getElementById('select_hazmat'); // For DGG 
                                        const surcharges_value = document.getElementById('surcharges_value'); // For DCV or COD
                                        const value = document.getElementById('select_surcharges1').value;
                                        surcharges_value.required = (value == "DCV");
                                        surcharges_value.required = (value == "COD");
                                        select_hazmat.required = (value == "DGG");

                                        }
                                    </script>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <div class="card-header">
                                                <h3 class="card-title text-primary">Consignee Information</h3>
                                            </div>                    
                                            <label for="exampleInputEmail1">JRP Account No.</label>                    
                                            <div>
                                            <input name="jrp_acc_no" value="<?php echo $jrp_account_no;?>" id="jrp_account_no" type="text" class="form-control" required>
                                            <input name="OrderNumber" value="<?php echo $OrderNumber;?>"  type="hidden" class="form-control" required>
                                                    <!-- <select name="jrp_acc_no" style="width: 100%;"  tabindex="-1" aria-hidden="true" onchange="getval(this);">-->
                                                            <?php                                            
                                                           
                                                                        include_once '../model/config.php';            
                                                                        $order = "SALES_ORDER_HEADER";
                                                                        $address = "ORDER_ADDRESS";
                                                                        $result = odbc_exec($connection, "SELECT $order.BVADDR_CEV_NO_2 AS OrderNumber,
                                                                        $order .CUST_NO AS jrp_account_no,
                                                                        $address.NAME AS CustomerName,
                                                                        $address.BVADDR1 AS Address1,
                                                                        $address.BVADDR2 AS Address2,
                                                                        $address.BVCITY AS City,
                                                                        $address.BVPROVSTATE AS Province,
                                                                        $address.BVPOSTALCODE AS PostalCode,
                                                                        $address.BVCOCONTACT1NAME AS Contact, 
                                                                        $address.BVADDRTELNO1 AS Phone, 
                                                                        $address.BVADDREMAIL AS Email,
                                                                        replace($address .BVPOSTALCODE , ' ','') AS PostalCode
                                                                        FROM $order $order LEFT OUTER JOIN                                                                         
                                                                        $address $address ON $order .BVADDR_CEV_NO = $address .CEV_NO
                                                                        WHERE $order.BVADDR_CEV_NO_2='$OrderNumber' AND $order .SHIP_VIA_CODE = '16' AND ORDER_ADDRESS .ADDR_TYPE = 'S'");
                                                                        $counter=0;
                                                                        $row = @odbc_fetch_array($result);  
                                                                        $OrderNumber = trim($row['OrderNumber']);
                                                                            //$CustomerName = mb_convert_encoding($CustomerName1, "UTF-8", "iso-8859-1");
                                                                            $CustomerName1 = trim($row['CustomerName']);
                                                                            $CustomerName2 = trim(mb_convert_encoding($CustomerName1, "UTF-8", "iso-8859-1"));
                                                                            //removing special characters
                                                                            $CustomerName22 = preg_replace('/[^a-zA-Z0-9\']/', ' ', $CustomerName2);
                                                                            $CustomerName = str_replace("'", '', $CustomerName22);

                                                                            $address11 = trim(mb_convert_encoding($row['Address1'], "UTF-8", "iso-8859-1"));
                                                                            //removing special characters
                                                                            $address12 = preg_replace('/[^a-zA-Z0-9\']/', ' ', $address11);
                                                                            $address1 = str_replace("'", '', $address12);

                                                                            $address22 = trim(mb_convert_encoding($row['Address2'], "UTF-8", "iso-8859-1"));
                                                                            //removing special characters
                                                                            $address222 = preg_replace('/[^a-zA-Z0-9\']/', ' ', $address22);
                                                                            $address2 = str_replace("'", '', $address222);

                                                                            $city = trim(mb_convert_encoding($row['City'], "UTF-8", "iso-8859-1"));
                                                                            $contact1 = trim(mb_convert_encoding($row['Contact'], "UTF-8", "iso-8859-1"));
                                                                            //removing special characters
                                                                            $contact2 = preg_replace('/[^a-zA-Z0-9\']/', ' ', $contact1);
                                                                            $contact = str_replace("'", '', $contact2);

                                                                            $email1 = trim(mb_convert_encoding($row['Email'], "UTF-8", "iso-8859-1"));
                                                                            //removing special characters
                                                                            $email = str_replace("'", '', $email1);

                                                                            //eliminate extra e-mails, keeps only first one------------------                                                                            
                                                                            $keywords = preg_split('/[;]/', $email,-1, PREG_SPLIT_NO_EMPTY);
                                                                            $final = $keywords[0];
                                                                            //end of eliminate extra e-mails, keeps only first one-----------

                                                                            $state = trim($row['Province']);
                                                                            $postal_code = trim($row['PostalCode']);
                                                                            $Phone = trim($row['Phone']);         
                                                                    ?>                    
                                                            
                                                </div>
                                            </div>
                                <div class="form-group">
                                    <label>AddressLine1*</label>
                                    <input name="addressline1" value="<?php echo $address1;?>" id="addressline1" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>AddressLine2</label>
                                    <input name="addressline2" value="<?php echo $address2;?>" id="addressline2" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                        <label>Province Code*</label>
                                        <input name="province" value="<?php echo $state;?>" id="province" type="text" class="form-control" required>                                        
                                    <div class="form-group">
                                        <label>City*</label>
                                        <input name="city" value="<?php echo $city;?>" id="city" type="text" class="form-control" required>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label>Postal Code*</label>
                                        <input name="postalCode" value="<?php echo $postal_code;?>" id="postalCode" type="text" class="form-control" required> * eg. H9P2T7.
                                    </div>
                                    <div class="form-group">
                                        <label>Country Code*</label>
                                        <input name="countryCode" value="CA"  id="countryCode" type="text" class="form-control"  required>* eg. CA.
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Name*</label>
                                        <input name="customerName" value="<?php echo $CustomerName;?>" id="customerName" type="text" class="form-control" required>
                                    </div>
                                    
                                    <div class="card-header">
                                        <h3 class="card-title text-primary">Consignee Contact</h3>
                                    </div>
                                            <div class="form-group">
                                                <label>Full Name*</label>
                                                <input name="fullName" value="<?php echo $contact;?>" id="fullName" type="text" class="form-control" maxlength="30" required>
                                            </div>
                                            <div class="form-group">
                                                <label>e-mail*</label>
                                                <input name="email" value="<?php echo $final;?>" id="email" type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <input name="department" value="none" id="department" type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone*</label>
                                                <input name="telephone" value="<?php echo $Phone;?>" id="telephone" type="text" class="form-control" required>
                                            </div>
                                    <!-- sender end =========================================== -->                                                 
                                   
                                    </div>
                                </div>




                                <div class="col-md-4">
                                                    <div class="card card-body">
                                                        <div class="form-group">
                                                            <label>Promocodes</label>
                                                            <select class="custom-select" name="promoCodes_status" id='select_promoCodes' onchange='promoCodesField()'>
                                                                <option value="">Select Option</option>
                                                                <option value="yes">Yes</option>
                                                                <option value="no" selected>No</option>
                                                                </select>
                                                                </div>

                                                                <script>
                                                                        function promoCodesField() {
                                                                            selectedVal = document.getElementById('select_promoCodes').value;
                                                                            if((selectedVal == 'yes'))
                                                                            {   
                                                                                $("#promoCodes").show();
                                                                            
                                                                            }
                                                                            else
                                                                            {
                                                                                $("#promoCodes").hide();
                                                                            }
                                                                        }
                                                                        </script>
                                                                    <div style='display:none;' id='promoCodes'>
                                                                        <!-- Promocodes Onclick start ======================= -->
                                                                        <label>Promo Code</label>
                                                                        <div class="form-group">
                                                                            <input name="promoCodes" id="code" type="text" class="form-control">
                                                                        </div><br />
                                                                        <!-- Promocodes Onclick End ======================= -->
                                                         </div> 
                            

                                                <!-- Hazmat ============== starts ======== -->
                                                <div class="form-group card card-body">
                                                          <label>Hazmat</label>
                                                          <select class="custom-select" name="hazmat" id='select_hazmat' onchange='hazmatField()' required>
                                                          <option value="" selected>Select Option</option>
                                                          <option value="yes">Yes</option>
                                                          <option value="no">No</option>                                        
                                                          </select>
                                                      </div>
                                                        <!-- Hazmat ==============CLICK EVENT (if yes)======== --> 
                                                
                                                          <script>
                                                              function hazmatField() {
                                                                selectedVal1 = document.getElementById('select_hazmat').value;
                                                                    if((selectedVal1 == 'yes'))
                                                                    {   
                                                                        $("#yes").show();
                                                                        $("#no").hide();
                                                                    }
                                                                    else
                                                                    {
                                                                        $("#yes").hide();
                                                                        $("#no").show();
                                                                    }

                                                    //making fields required ==========================
                                                    const select_hazmat_regulation = document.getElementById('select_hazmat_regulation');
                                                    const value = document.getElementById('select_hazmat').value;
                                                    select_hazmat_regulation.required = (value == "yes");
                                                    //phone.required = (value == "Regulated");

                                                              }
                                                            </script>




                                            <div class="card card-body" style='display:none;' id='yes'>                                            
                                                <div class="card-header">
                                                <h3 class="card-title text-primary">Hazmat Details</h3>
                                              </div>                                              
                                              
                                              <div class="form-group">
                                                        <label>Hazmat Type</label>
                                                        <select class="custom-select" name="h_hazmatType" id='select_hazmat_regulation' onchange='hazmatRegulation()'>
                                                                <option value="" selected>Select Option</option>
                                                                <option value="Regulated" >Regulated</option>
                                                                <option value="NonRegulated">NonRegulated</option>                                        
                                                                </select>
                                                    </div>

                                                    <script>
                                                            function hazmatRegulation() {
                                                                selectedVal = document.getElementById('select_hazmat_regulation').value;
                                                                if((selectedVal == 'Regulated'))
                                                                {   
                                                                    $("#regulated").show();
                                                                    $("#nonregulated").hide();
                                                                }
                                                                else
                                                                {
                                                                    $("#regulated").hide();
                                                                    $("#nonregulated").show();
                                                                }
                                                            }
                                                            </script>

                                    <div class="card card-body" style='display:none;' id='regulated'>
                                              <!-- Hazmat : Regulated ==============CLICK EVENT (if yes)======== -->
                                                      <div class="form-group">
                                                        <label>Phone</label>
                                                        <input name="h_phone" id="phone" type="text" class="form-control"  >
                                                        <!-- (Required: If hazmatType = Regulated) -->

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Number</label>
                                                        <input name="h_number" id="number" type="text" class="form-control"  > eg. UN1993
                                                        <!-- (Required: If hazmatType = Regulated) -->
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Shipping Name</label>
                                                        <input name="h_shippingName" id="shippingName" type="text" class="form-control"  > eg. Flammable Liquids
                                                        <!-- (Required: If hazmatType = Regulated) -->
                                                    </div>

                                                    
                                                    <div class="form-group">
                                                        <label>Primary class of DG</label>
                                                        <input name="h_primaryClass" id="primaryClass" type="text" class="form-control"  > eg. 3
                                                        <!-- (Required: If hazmatType = Regulated) -->
                                                    </div>
                                                    

                                                    <div class="form-group">
                                                        <label>Toxic By Inhalation</label>                                    
                                                                <select class="custom-select" name="h_toxicByInhalation" id="h_toxicByInhalation">
                                                                <option value="" selected>Select Option</option>
                                                                  <option value="true" >Yes</option>
                                                                  <option value="false">No</option>                                        
                                                                </select>
                                                                </div>
                                            <!-- (Required: If hazmatType = Regulated) -->
                                            
                                            <!-- Hazmat : Regulated ==============CLICK EVENT End======== -->

                                            <div class="form-group">
                                                <label>Packing Group (Degree of danger the DG represents)</label>
                                                <input name="h_packingGroup" id="packingGroup" type="text" class="form-control"> Values: i, ii, iii.
                                                <!-- (Required: If hazmatType = Regulated) -->
                                            </div>

                                            <div class="form-group">
                                                <label>ErapReference</label>
                                                <input name="h_erapReference" id="erapReference" type="text" class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Subsidiary Class</label>
                                                <input name="h_subsidiaryClass" id="subsidiaryClass" type="text" class="form-control"> 
                                            </div>
                                        </div>
                                        <div class="card card-body" style='display:none;' id='nonregulated'>
                                            <!-- (Required: If hazmatType = NonRegulated) -->
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input name="h_description" id="description" type="text" class="form-control">                                                
                                            </div>
                                       </div>
                                       
                                  
                                    </div>
                                    <div class="form-group">
                                  <label>Note</label>
                                  <input name="note" id="note" type="text" class="form-control" value="<?php if(isset($_POST['note'])) echo $_POST['note'];?>">
                                </div>
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary submit-button">Submit</button>
                                    </div>
                                    </div>
                                    

                            </div>
                        </div>                                             
                        </form>
                            <!-- /.card -->
            </div>
    </div>
                    <!-- right hand container ends -->
</section>

<script>
    function hazmatRegulation() {
    selectedVal = document.getElementById('select_hazmat_regulation').value;
    if((selectedVal == 'Regulated'))
    {   
        $("#regulated").show();
        $("#nonregulated").hide();
    }
    else
    {
        $("#regulated").hide();
        $("#nonregulated").show();
    } 
    //////////////////////////////////////////////////////////////////////////////

    //const select_hazmat_regulation = document.getElementById('select_hazmat_regulation');
    const phone = document.getElementById('phone');
    const h_toxicByInhalation = document.getElementById('h_toxicByInhalation');
    const description = document.getElementById('description');

    //function changePurpose(){
        const value = document.getElementById('select_hazmat_regulation').value;
        //select_hazmat_regulation.required = (value == "yes");
        phone.required = (value == "Regulated");
        h_toxicByInhalation.required = (value == "Regulated");
        description.required = (value == "NonRegulated"); //
    }
</script>

    
   