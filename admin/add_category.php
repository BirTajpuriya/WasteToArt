<?php
include('./includes/header.php');
$category = '';
$msg = '';
$image='';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from category where id='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $category = $row['category'];
    $image=$row['image'];
}

if (isset($_POST['submit'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $section_id= mysqli_real_escape_string($conn, $_POST['section_id']);
    $image=mysqli_real_escape_string($conn,$_POST['image']);
   
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'./images/'.$image);
            $sql = "update category set category ='$category', section='$section_id', image='$image' where id='$id'";
            mysqli_query($conn, $sql);
        } else {
            $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'./images/'.$image);
            $sql = "insert into category(category,status,image,section) values('$category',0,'$image','$section_id')";
            mysqli_query($conn, $sql);
        }

        header('location:category.php');
        die();
    
}


?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group"><label for="company" class=" form-control-label">Categories</label><input type="text" value="<?php echo $category ?>" name="category" id="company" placeholder="Enter categories name" class="form-control" required></div>
                            <div class="form-group"><label for="company" class=" form-control-label">Image</label><input type="file"  name="image" id="company" class="form-control"></div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Section</label>

                                <select class="form-control" name="section_id" id="">
                                <option value="*">Select Section</option>
                                    <option value="0">Art</option>
                                    <option value="1">Scrap</option>

                                </select>
                            </div>
                            <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div><?php echo $msg ?></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('./includes/footer.php');

?>