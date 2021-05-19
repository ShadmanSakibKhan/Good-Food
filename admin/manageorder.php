<?php
include('partial/menu.php')
?>
        <!-- content start -->
        <div class="menu_content">
        <div class="wrapper">
               <h1>manageorder</h1>
               <br>
               <br>
               <!-- button to add admin -->
              <?php
                if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                }

?>


                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        $sql = "SELECT *FROM tbl_order ORDER BY id DESC";//display the latast order at first
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);
                        $sn=1;
                        if($count>0){
                        while($row=mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['local'];
                                $order = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];


                                ?>

                                 <tr>
                        
                                        <td><?php echo $sn++ ; ?> </td>
                                        <td><?php echo $food ; ?></td>
                                        <td><?php echo $price ; ?></td>
                                        <td><?php echo $qty ; ?></td>
                                        <td><?php echo $total ; ?></td>
                                        <td><?php echo $order ; ?></td>

                                        <td>
                                        <?php 
                                        echo $status;
                                        // if($status=="ordered"){
                                        //         echo "<label style='color: black;>$status</label>";
                                        // } 
                                        // elseif($status=="On Delivery"){
                                        //         echo "<label style='color: orange;'>$status</label>";
                                        // }
                                        // elseif($status=="Delivered"){
                                        //         echo "<label style='color: green;'>$status</label>";
                                        // }
                                        // elseif($status=="Cancelled"){
                                        //         echo "<label style='color: red;'>$status</label>";
                                        // }
                                        ?>
                                        </td>

                                        <td><?php echo $customer_name ; ?></td>
                                        <td><?php echo $customer_contact ; ?></td>
                                        <td><?php echo $customer_email ; ?></td>
                                        <td><?php echo $customer_address ; ?></td>
                                       <td>
                                        <a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-2nd">update Order </a> 
                                        
                                        </td>
                    
                                </tr>
                                <?php
                        }
                        }else{
                                echo"<tr><td colspan='12'> Order Not available</td></tr>";
                        }

?>
                   
                   
                </table>
            </div>
            </div>
        <!-- content end -->
      <?php include('partial/footer.php')
      ?>
        
       
    </body>