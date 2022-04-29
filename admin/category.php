<?php
include('./includes/header.php');
if (isset($_GET['type']) && $_GET['type'] != '') {
   $type =  mysqli_real_escape_string($conn, $_GET['type']);
   if ($type = 'status') {
      $operation = $_GET['operation'];
      $id =  mysqli_real_escape_string($conn, $_GET['id']);
      if ($operation == 'active') {
         $status = '1';
      } else {
         $status = '0';
      }
      $update_status = "update category set status='$status' where id='$id'";
      mysqli_query($conn, $update_status);
   }
  

}


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
                  <h4 class="box-link"><a href="add_category.php">Add Category</a></h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">#</th>
                              <th class="avatar">ID</th>
                              <th>Categories</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th>Section</th>
                              <th>Action</th>
                              
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $i = 1;
                           while ($row = mysqli_fetch_assoc($res)) { ?>
                              <tr>
                                 <td class="serial"><?php echo $i ?></td>
                                 <td><?php echo $row['id'] ?></td>
                                 <td><?php echo $row['category'] ?></td>
                                 <td><img src="./images/<?php echo $row['image'] ?>"></td>

                                 <td><?php
                                       if ($row['status'] == 1) {
                                          echo "<a href='?type=status&operation=deactive&id=".$row['id'] . "'>Active</a>";
                                       } else {
                                          echo "<a href='?type=status&operation=active&id=".$row['id'] . "'>Deactive</a>";
                                       }


                                       ?></td>
                                       
                                       <td>
                                          <?php
                                         if ($row['section'] == 0) {
                                          echo "<a href='?type=status&operation=deactive&id=".$row['id'] . "'>Art</a>";
                                       } else {
                                          echo "<a href='?type=status&operation=active&id=".$row['id'] . "'>Waste</a>";
                                       }


                                          
                                          ?>

                                       </td>

                                    <td><a href="delete_category.php?id=<?php echo $row['id'];?>">Delete</a>&nbsp;

                                    <a href='add_category.php?id=<?php echo $row['id'];?>'>Edit</a></td>
                                  
                           
                                       
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