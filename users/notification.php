<?php
include('../db.php');
include('./includes/header.php');


// $sql1 = "select product.*,category.category from product, category where product.category_id=category.id order by product.id asc";
// $sql1 = "select notification.*,registration.id from notification, registration where notification.receiver=registration.id ";

// $sql = "select * from notification";
// $res = mysqli_query($conn, $sql);
$id=$_SESSION['id'];
$sql = "select * from notification where receiver='$id'";
$res = mysqli_query($conn, $sql);

?>

<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Notification</h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <!-- <th class="avatar">ID</th> -->
                              <th>sender</th>
                              <th>message</th>
                              <th>number</th>
                              <th>email</th>
                              <th>Action</th>
                              
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           
                           while ($row = mysqli_fetch_assoc($res)) { ?>
                              <tr>
                                 
                                 <td><?php echo $row['sender'] ?></td>
                                 <td><?php echo $row['message'] ?></td>
                                 <td><?php echo $row['number'] ?></td>
                                 <td><?php echo $row['email'] ?></td>
                                    <td><a href="delete_category.php?id=<?php echo $row['id'];?>">Delete</a>&nbsp;
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
