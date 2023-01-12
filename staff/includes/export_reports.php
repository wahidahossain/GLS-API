<section class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">JRP Reports</h3>
        </div>
      <div class="col-md-12 head">
   <div class="float-right">
        <a href="export_sub.php?user_id=<?php echo $user_id;?>" class="btn btn-success"><i class="dwn"></i>Export Report</a>
   </div>
  </div>
<div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>BRAND</th>
                    <th>JRPSKU</th>
                    <th>OEMSKU</th>
                    <th>DESCRIPTION</th>
                    <th>QTY</th>
                    <th>COST</th>
                    <th>MAP</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                   include_once '../model/connect.php';    
                    $result_assign_brand = mysqli_query($con, "SELECT * FROM `assign_brands` WHERE `user_id`='$user_id'");
                    while ($row_assign_brand = mysqli_fetch_array($result_assign_brand))
                    {
                      //===========================BRAND TABLE===========================	
                      $jrp_account_no = $row_assign_brand['jrp_account_no'];
                      $brandname = $row_assign_brand['brandname'];
                      //==============================END==========================
                      $query = "SELECT * FROM `stock` WHERE `brand`='$brandname';";                      
                      $result_stock = mysqli_query($con, $query);
                      while ($row_stock = mysqli_fetch_array($result_stock))
                        {   
                                  $brand = $row_stock['brand'];
                                  $jrpsku = $row_stock['jrpsku'];
                                  $oemsku = $row_stock['oemsku'];
                                  $description = $row_stock['description'];
                                  $onhand = $row_stock['onhand'];
                                  $commited = $row_stock['commited'];
                                  $cost = $row_stock['cost'];
                                  $map = $row_stock['map'];
                                  $qty = $onhand - $commited;                                
                            ?>
                            <tr>
                            <td><?php echo $brand;?></td>
                            <td><?php echo $jrpsku;?></td>
                            <td><?php echo $oemsku;?></td>
                            <td><?php echo $description;?></td>
                            <td><?php echo $qty;?></td>
                            <td><?php echo $cost;?></td>
                            <td><?php echo $map;?>    
                            </td>
                            </tr>
                            <?php
                        }
                    }
                  ?>                                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>BRAND</th>
                    <th>JRPSKU</th>
                    <th>OEMSKU</th>
                    <th>DESCRIPTION</th>
                    <th>QTY</th>
                    <th>COST</th>
                    <th>MAP</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
        </div>
      </div>
    </section>
   