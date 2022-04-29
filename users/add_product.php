<?php
include('../db.php');
$uploadby=$_SESSION['id'];
$sellername=$_SESSION['name'];
include('./includes/header.php');
$category_id = '';
$msg = '';
$name = '';
$price = '';
$qty = '';
$desc = '';
$image = '';




if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from product where id='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $category_id = $row['category_id'];
    $name = $row['name'];
    $desc = $row['description'];
    $price = $row['price'];
    $qty = $row['qty'];
    $image = $row['image'];
}

if (isset($_POST['submit'])) {

    
    $category_id= mysqli_real_escape_string($conn, $_POST['category_id']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $desc = mysqli_real_escape_string($conn,$_POST['desc']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $qty = mysqli_real_escape_string($conn,$_POST['qty']);
    $image=mysqli_real_escape_string($conn,$_POST['image']);
    $sql = "select * from product where name ='$name' ";
    $res = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($res);

    if ($check > 0) {
        $msg = "product already exists !";
    } else {

        if (isset($_GET['id']) && $_GET['id'] != '') {
            $sql = "update product set category_id ='$category_id',name='$name',price='$price',qty='$qty',description='$desc' where id='$id'";
            mysqli_query($conn, $sql);
        } else {
            $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'./images/'.$image);
                $sql="insert into product(name,image,price,description,qty,category_id,status,section,seller_name,user_id) values('$name','$image','$price','$desc','$qty','$category_id',0,1,'$sellername','$uploadby')";
            mysqli_query($conn, $sql);
        }

        header('location:product.php');
        die();
    }
}






?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Products</strong><small> Form</small></div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Choose Category</label>

                                <select class="form-control" name="category_id" id="">
                                    <option value="">Select Category</option>
                                    <?php
                                    $res = mysqli_query($conn, "select id,category from category order by category asc");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        if($row['id']==$category_id){
                                            echo "<option selected value=".$row['id'].">".$row['category']."</option>";

                                        }else{
                                        echo "<option value=".$row['id'].">".$row['category']."</option>";

                                    }
                                }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Product Name</label>
                                <input type="text" name="name" id="company" placeholder="Enter product name" class="form-control" value="<?php echo $name ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Price</label>
                                <input type="number" name="price" id="company" placeholder="Enter price" value="<?php echo $price ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Description</label>
                                <textarea type="text" name="desc" id="company" placeholder="Enter short descripttion" class="form-control" required><?php echo $desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Quantity</label>
                                <input type="text" name="qty" id="company" placeholder="Enter quantity" value="<?php echo $qty ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Picture</label>
                                <input type="file" name="image" id="company" class="form-control" required>
                            </div>


                            <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


