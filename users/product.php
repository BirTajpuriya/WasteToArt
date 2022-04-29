<?php 
include('../db.php');
include('./includes/header.php');
if (isset($_GET['type']) && $_GET['type'] != '') {
   $type =  mysqli_real_escape_string($conn, $_GET['type']);
   // if ($type = 'status') {
   //    $operation =  mysqli_real_escape_string($conn, $_GET['operation']);
   //    $id =  mysqli_real_escape_string($conn, $_GET['id']);
   //    if ($operation == 'active') {
   //       $status = '1';
   //    } else {
   //       $status = '0';
   //    }
   //    $update_status = "update product set status='$status' where id='$id'";
   //    mysqli_query($conn, $update_status);
   // }
   if ($type = 'section') {
      $operation =  mysqli_real_escape_string($conn, $_GET['operation']);
      $id =  mysqli_real_escape_string($conn, $_GET['id']);
      if ($operation == 'artist') {
         $section = '1';
      } else {
         $section = '0';
      }
      $update_status = "update product set section='$section' where id='$id'";
      mysqli_query($conn, $update_status);
   }
  
}

$findUser = $_SESSION['id'];
// $sql = "select product.*,category.category from category where product.category_id=category.id order by product.id asc";
// $sql="   select * from product join category where product.category_id=category.id and join registration where product.user_id=registration.id ";
// $sql = "select * from product where user_id='$findUser' order by 1 DESC";
// $sql = "select * from product";
$sql= "SELECT product.*, category.category FROM category, product WHERE product.category_id = category.id and product.section=0 and user_id='$findUser'";
$res = mysqli_query($conn, $sql);
?>

<!-- subscription from here -->
<?php
$user = $_SESSION['name'];
if ($user) {
   $check = "select * from subscription where user='$user'";
   $query = mysqli_query($conn, $check);
   $count = mysqli_num_rows($query);
   if ($count =='') {
      
      // echo "<script>alert('First Of All Take Subscription !')</script>";
      header('location:../subscription/index.php');
      
   }
}

?>

<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Products</h4>
                  <h4 class="box-link"><a href="add_product.php">Add product</a></h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <!-- <th class="serial">#</th> -->
                              <th>ID</th>
                              <th>Categories</th>
                              <th>Name</th>
                              <th>image</th>
                              <th>Price</th>
                              <th>Qty</th>

                              <th>Section</th>
                              <th>Status</th>
                              <th>Action
                              <th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                        
                           while ($row = mysqli_fetch_assoc($res)) { ?>
                              <tr>
                                 <td><?php echo $row['id'] ?></td>
                                 <td><?php echo $row['category'] ?></td>
                                 <td><?php echo $row['name'] ?></td>
                                 <td><img src="./images/<?php echo $row['image'] ?>"></td>
                                 <td><?php echo $row['price'] ?></td>
                                 <td><?php echo $row['qty'] ?></td>
                                 <td><?php
                                       if ($row['section'] == 1) {
                                          echo "<a href='?type=section&operation=scrap&id=" . $row['id'] . "'>Creative</a>";
                                       } else {
                                          echo "<a href='?type=section&operation=artist&id=" . $row['id'] . "'>Waste</a>";
                                       }


                                       ?></td>
                                 <td><?php
                                       if ($row['status'] == 1) {
                                          echo "<a >Active</a>";
                                          // href='?type=status&operation=deactive&id=" . $row['id'] . "'
                                       } else {
                                          echo "<a>Deactive</a>";
                                          // href='?type=status&operation=active&id=" . $row['id'] . "'
                                       }


                                       ?></td>

                                 
                                 </td>
                                 <td><a href="delete_product.php?id=<?php echo $row['id']; ?>">Delete</a>&nbsp;

                                    <a href='add_product.php?id=<?php echo $row['id']; ?>'>Edit</a>
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