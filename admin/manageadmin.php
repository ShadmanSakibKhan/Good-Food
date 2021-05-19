<?php
include('partial/menu.php')
?>
        <!-- content start -->
        <div class="menu_content">
        <div class="wrapper">
               <h1>Manageadmin</h1>
               <br>
               <br>
               <?php
                 if(isset($_SESSION['add'])){
                     echo $_SESSION['add'];
                     unset($_SESSION['add']);
                 }
                 if(isset($_SESSION['delete'])){
                     echo $_SESSION['delete'];
                     unset($_SESSION['delete']);
                 }
                 if(isset($_SESSION['update'])){
                     echo $_SESSION['update'];
                     unset($_SESSION['update']);
                 }
                 if(isset($_SESSION['user-not-found'])){
                     echo $_SESSION['user-not-found'];
                     unset($_SESSION['user-not-found']);
                 }
                 if(isset($_SESSION['psw-not-match'])){
                     echo $_SESSION['psw-not-match'];
                     unset($_SESSION['psw-not-match']);
                 }
                 if(isset($_SESSION['change-psw'])){
                     echo $_SESSION['change-psw'];
                     unset($_SESSION['change-psw']);
                 }
               ?>
               <br>
               <br>
               <!-- button to add admin -->
               <a href="add-admin.php" class="btn-primary">Add Admin</a>
              

               <br>
               <br>


                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>UserName</th>
                        <th>Action</th>
                    </tr>
                    <?php
                     $sql="SELECT* FROM tbl_admin";
                     $res=mysqli_query($conn,$sql);
                     if($res==True){
                         $count = mysqli_num_rows($res);
                         $sn=1;
                         //cheak the number of roes
                         if($count>0){
                             while($rows=mysqli_fetch_assoc($res)){
                                 //using while loop to get all the data from database
                                 $id = $rows['id'];
                                 $full_name=$rows['full_name'];
                                 $username=$rows['username'];
                                 ?>
                                     <tr>
                        
                                      <td><?php echo $sn++; ?> </td>
                                      <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                          <a href="<?php echo SITEURL; ?>admin/updated-password.php?id=<?php echo $id;?>" class="btn-primary">update password </a> 
                                          <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-2nd">update Admin </a> 
                                          <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-3rd">delete Admin </a> 
                                
                                         </td>
                    
                                      </tr>

                                 <?php
                             }
                         }else{

                         }
                     }
                    ?>


                </table>
            </div>
            </div>
        <!-- content end -->
      <?php include('partial/footer.php')
      ?>
        
       
    </body>
</html>
