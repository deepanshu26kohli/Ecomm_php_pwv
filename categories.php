<?php
 require './inc.files/top.inc.php';
 if(isset($_GET['type']) && $_GET['type'] != ""){
   $type = get_safe_val($con,$_GET['type']);
   if ($type == 'status'){
      $operation = get_safe_val($con,$_GET['operation']);
      $id = get_safe_val($con,$_GET['id']);
      if($operation == 'active'){
           $status = '1';
      }
      else{
           $status = '0';
      }
      $update_status = sprintf("UPDATE `category` set status='%s' where id=%d",$status,$id);
      mysqli_query($con,$update_status);
   }
   if ($type == 'delete'){
      $id = get_safe_val($con,$_GET['id']);
      $delete_sql = sprintf("DELETE from `category` where id=%d",$id);
      mysqli_query($con,$delete_sql);
   } 
 }
 $sql = sprintf("SELECT * FROM `category` order by `categories` desc");
 $res = mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Categories </h4>
                           <span><a href='manage_categories.php'> Add Categories</a> </span>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Categories</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($res)){ ?>
                                    <tr>
                                       <td class="serial"><?php echo $i; ?></td>
                                       <td> <?php echo $row['id']; ?></td>
                                       <td> <?php echo $row['categories']; ?></td>
                                       <td> <?php 
                                       if ($row['status'] == 1){
                                          echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."' >Active </a></span>";
                                       } 
                                       else{
                                          echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."' >Deactive </a></span>";
                                       }
                                       echo "<span class='badge badge-edit'><a href='manage_categories.php?type=edit&id=".$row['id']."' >Edit</a></span>";
                                       echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."' >Delete</a></span>";
                                       ?> </td>
                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                    }     
                                    ?>
                                    
                                    
                                  
                                    
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
 require './inc.files/footer.inc.php';
?>