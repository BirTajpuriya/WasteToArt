<?php
include('./includes/header.php');


$sql = "select * from subscription order by id asc";
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
                              
                              <th class="avatar">ID</th>
                              <th>User</th>
                              <th>Duration</th>
                              <th>Action</th>
                              
                              
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           
                           while ($row = mysqli_fetch_assoc($res)) { ?>
                              <tr>
                                
                                 <td><?php echo $row['id'] ?></td>
                                 <td><?php echo $row['user'] ?></td>
                                 <td><?php echo $row['duration'] ?></td>

                                
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