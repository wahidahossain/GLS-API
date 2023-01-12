<section class="content">
      <div class="container-fluid">
        <div class="col-md-6">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">GLS Shipping Records</h3>
              </div>
              <div class="card-body">
              <?php

//=============================== IMPORT from file ========================================================
//$step = '0';
$step = $_REQUEST['step3'];
include_once '../model/connect.php'; 

if($step=='0'){
 //print_r(glob("import/*.*"));
 //print_r(glob("import/*.csv"));
 $dir = "import/*";
 //$currentFile = glob($dir."*.csv");
 $currentFile1 = glob($dir."*.*");   
 $counter = count($currentFile);
 if($counter>0){
        foreach ( $currentFile as $filename) {     
            $handle = fopen($filename,"r");            
            $count = 0;            
            $file = basename($filename);

            //=======================loop through the csv file and insert into database===================================
            while(($line = fgetcsv($handle)) !== FALSE){                 
                 $count++;
                 //print it from 2nd line ====================
                    if ($count == 2) {
                 //print it from 2nd line ====================

                        $invoice   = $line[0];
                        $tracking  = $line[1];
                        $sub_total = $line[2];                    
                        
                        $db->query("INSERT INTO `gls_tracking`(
                            `invoice`,
                            `tracking`,
                            `sub_total`
                        )
                        VALUES(       
                                '".mysqli_real_escape_string($con, $invoice)."',
                                '".mysqli_real_escape_string($con, $tracking)."',
                                '".mysqli_real_escape_string($con, $sub_total)."'
                            )");  
                            
                            echo "                            
                            <div class='col-md-6'>
                            <div class='card card-default'>
                            <div class='card-header'>
                                <h3 class='card-title'>
                                <i class='fas fa-check-circle'></i>
                                Shipping Records 
                                </h3>
                            </div>                                            
                            <div class='card-body'>
                                <div class='callout callout-info'>
                                <h5>Invoice No.: ".$invoice."</h5>                        
                                <p>Shipping Cost: ".$sub_total."</p>
                                </div>                
                            </div>
                            </div>                
                            </div>";

                }


            }

         fclose($handle);
    //===============================move the file to completed folder after processing=============================
        $source_file = $filename;
        $destination_path = 'import/completed/';
        rename($source_file, $destination_path . pathinfo($source_file, PATHINFO_BASENAME));
    //==============================================================================================================            
        }
       // print("<script>window.alert('Test');</script>");


} 
else{
    
print("<script>window.alert('Sorry no files found in the folder to import!!!');</script>");
print("<script>window.location='../staff/gls_import_tracking.php'</script>");
}

}

?>
<a href="gls_tracking_import_step3.php?step3=1"><button type="button" class="btn btn-block btn-info btn-lg"><i class="fas fa-plus"></i> Process The Record </button></a></th>
<?php
if($step=='1'){
include_once '../model/bv_connect.php'; 
//UPDATE "SALES_ORDER_HEADER" SET PO_NO='654321', BVSHIPPING='200' WHERE NUMBER='0001185292'
//print("<script>window.alert('Test');</script>");
}
?>
  </div>
  </div>
  </div>     
  </div>
  </section>

  
   