<?php
include('../db.php');
include('./includes/header.php');




$sql = "select * from category order by category asc";
$res = mysqli_query($conn, $sql);
?>

<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Categories</h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <!-- <th class="serial">#</th> -->
                              <th class="avatar">ID</th>
                              <th>Categories</th>
                              <th>Image</th>
                              
                              
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $i = 1;
                           while ($row = mysqli_fetch_assoc($res)) { ?>
                              <tr>
                                
                                 <td><?php echo $row['id'] ?></td>
                                 <td><?php echo $row['category'] ?></td>
                                 <td><img src="../admin/images/<?php echo $row['image'] ?>" width="200" height="60" alt=""></td>

                           
                                       
                              </tr>
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