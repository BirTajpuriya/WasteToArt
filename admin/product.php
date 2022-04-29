<?php
include('./includes/header.php');
if (isset($_GET['type']) && $_GET['type'] != '') {
   $type =  mysqli_real_escape_string($conn, $_GET['type']);
   if ($type = 'status') {
      $operation =  mysqli_real_escape_string($conn, $_GET['operation']);
      $id =  mysqli_real_escape_string($conn, $_GET['id']);
      if ($operation == 'active') {
         $status = '1';
      } else {
         $status = '0';
      }
      $update_status = "update product set status='$status' where id='$id'";
      mysqli_query($conn, $update_status);
   }
   if ($type = 'section') {
      $operation =  mysqli_real_escape_string($conn, $_GET['operation']);
      $id =  mysqli_real_escape_string($conn, $_GET['id']);
      if ($operation == 'art') {
         $section = '1';
      } else {
         $section = '0';
      }
      $update_status = "update product set section='$section' where id='$id'";
      mysqli_query($conn, $update_status);
   }

   if ($type = 'featured_art') {
      $operation =  mysqli_real_escape_string($conn, $_GET['operation']);
      $id =  mysqli_real_escape_string($conn, $_GET['id']);
      if ($operation == 'show') {
         $featured_art = '1';
      } else {
         $featured_art = '0';
      }
      $update_status = "update product set featured_art='$featured_art' where id='$id'";
      mysqli_query($conn, $update_status);
   }
  

}

$sql = "select product.*,category.category from product, category where product.category_id=category.id order by product.id asc";
$res = mysqli_query($conn, $sql);
?>

<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Products</h4>
                  <!-- <h4 class="box-link"><a href="add_product.php">Add product</a></h4> -->
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">#</th>
                              <th>ID</th>
                              <th>Seller</th>
                              <th>Categories</th>
                              <th>Name</th>
                              <!-- <th>image</th> -->
                              <th>Price</th>
                              <th>Qty</th>
                              <th>featured art</th>
                              <th>Status</th>
                              <th>Section</th>
                              <th>Action<th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $i = 1;
                           while ($row = mysqli_fetch_assoc($res)) { ?>
                              <tr>
                                 <td class="serial"><?php echo $i ?></td>
                                 <td><?php echo $row['id'] ?></td>
                                 <td><?php echo $row['seller_name'] ?></td>
                                 <td><?php echo $row['category'] ?></td>
                                 <td><?php echo $row['name'] ?></td>
                                 <td><?php echo $row['price'] ?></td>
                                 <td><?php echo $row['qty'] ?></td>
                                 <td><?php
                                  
                                       if ($row['featured_art'] == 0) {
                                          echo "<a href='?type=featured_art&operation=show&id=" . $row['id'] . "'>Active</a>&nbsp";
                                       } else {
                                          echo "<a href='?type=featured_art&operation=unshow&id=" . $row['id'] . "'>Deactive</a>&nbsp";
                                       }


                                       ?></td>
                                 <td><?php
                                       if ($row['status'] == 1) {
                                          echo "<a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a>&nbsp";
                                       } else {
                                          echo "<a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a>&nbsp";
                                       }


                                       ?></td>
                                       <td><?php
                                       if ($row['section'] == 1) {
                                          echo "<a href='?type=section&operation=waste&id=" . $row['id'] . "'>waste</a>&nbsp";
                                       } else {
                                          echo "<a href='?type=section&operation=art&id=" . $row['id'] . "'>art</a>&nbsp";
                                       }


                                       ?></td>
                                       </td>
                                    <td><a href="delete_product.php?id=<?php echo $row['id'];?>">Delete</a>&nbsp;

                                    <a href='add_product.php?id=<?php echo $row['id'];?>'>Edit</a></td>
                                  
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
<?php
include('./includes/footer.php')
?>