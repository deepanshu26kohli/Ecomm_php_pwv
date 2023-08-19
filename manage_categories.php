<?php
 require './inc.files/top.inc.php';
 $categories = "";
 $msg = "";
 if(isset($_GET['id'] )&& $_GET['id'] != ""){
    $id = get_safe_val($con,$_GET['id']);
    $sql = sprintf("SELECT * FROM `category` WHERE `id` = %d",$id);
    $res = mysqli_query($con,$sql);
    $check = mysqli_num_rows($res);
    if ($check>0){
    $row = mysqli_fetch_assoc($res);
    $categories = $row['categories'];
    }
    else{
        header('location: categories.php');
        die();
    }
}
 if(isset($_POST['submit'])){
    $categories = get_safe_val($con,$_POST['categories']);
    $sql = sprintf("SELECT * FROM `category` WHERE `categories` = '%s'",$categories);
    $res = mysqli_query($con,$sql);
    $check = mysqli_num_rows($res);
    if ($check>0){
        $msg = "Category already exists";
    }
    else{
        if(isset($_GET['id'] )&& $_GET['id'] != ""){
            $sql = sprintf("UPDATE `category` set `categories` = '%s' where id = %d",$categories,$id);
            mysqli_query($con,$sql);
        }
        else{
            $sql = sprintf("INSERT into `category`(`categories`,`status`) values('%s' , '1' )",$categories);
            mysqli_query($con,$sql);
        }
        header('location: categories.php');
        die();
    }
    
 }
 
?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card w-25">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <form method='post'>
                        <div class="card-body card-block">
                           <div class="form-group">
                            <label for="company" class=" form-control-label">Company</label>
                           <input type="text" name="categories" placeholder="Enter Category Name" class="form-control" value="<?php echo $categories; ?>"></div>
                           <button id="payment-button" name='submit' type="submit" class="btn btn-sm btn-info btn-block w-25">
                           <span id="payment-button-amount" >Submit</span>
                           </button>
                           <p style="color:red;"><?php echo $msg; ?></p>
                        </div>
                        
                        </form>
                      
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php
 require './inc.files/footer.inc.php';
?>