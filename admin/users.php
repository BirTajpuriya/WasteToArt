<?php
include('../db.php');
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
      $update_status = "update registration set status='$status' where id='$id'";
      mysqli_query($conn, $update_status);
   }
}



$sql = "select * from registration order by id asc";
$res = mysqli_query($conn, $sql);
?>

<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Users</h4>
                  <h4 class="box-link"><a href="add_category.php">Add Users</a></h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">#</th>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile</th>
                              <th>Date</th>
                              <th>Status</th>
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
                                 <td><?php echo $row['name'] ?></td>
                                 <td><?php echo $row['email'] ?></td>
                                 <td><?php echo $row['phone'] ?></td>
                                 <td><?php echo $row['added_on'] ?></td>
                                <td> <?php
                                       if ($row['status'] == 1) {
                                          echo "<a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a>";
                                       } else {
                                          echo "<a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a>";
                                       }


                                       ?>
                                </td>
                                 <td><a href="delete_users.php?id=<?php echo $row['id']; ?>">Delete</a>&nbsp;

                                    
                                 </td>



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