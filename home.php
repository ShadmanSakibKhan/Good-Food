<?php
  
  include('partial-front/menu.php');

?>
  <section id="banner_part">

<div class="banner_item">
    <iframe width="100%" height="700px" src="https://momento360.com/e/u/380033b1ec364ad28f8cc8bcf242120a?utm_campaign=embed&utm_source=other&heading=-8.27&pitch=25.92&field-of-view=75&size=medium" frameborder="0">
        </iframe>
    <div class="container">

        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <div class="banner_text">

                    <h2>Order Your Food </h2>
                    <h1>GOOD FOOD</h1>
                    <p>Getting food delivered right at your doorstep anytime anywhere is easier than ever.Place your order here. </p>
                    <a href="<?php echo SITEURL;?>foods.php" style="margin-right: 30px;">FOOD MENU</a>
                    <a href="<?php echo SITEURL;?>restaurant.php">Recipes</a>

                </div>
            </div>
        </div>
    </div>
</div>


</section>
        
    <!-- fOOD sEARCH Section Starts Here -->
    
    <section class="food-search text-center " >  
        <div class="container">          
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input class="search_option" type="search" name="search" placeholder="Search for Food.." required>
                
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php
     if(isset($_SESSION['order'])){
         echo $_SESSION['order'];
         unset($_SESSION['order']);
     }
    ?>

      <!-- about part start -->
    <section id="about_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_video">
                        <img src="image/food banner.jpg" style="width: 100%;" alt="">
                        <div class="overlay"><video width="400px" height="400px" controls autoplay>
                         <source src="video/Promo 25sec.mp4" type="video/mp4">
                            </video></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_text">
                        <h2>ABOUT US</h2>
                        <img src="images/spoon.png" alt="">
                        <p>We deliver your needs

                            <span>“BUY HERE NOW” is an e-commerce outlet with 24/7 delivery service, conveniently delivered to your doorstep within 40 minutes of placing the order. Both 'cash on delivery' and ‘online payment’ are available for your convenience.</span>
                            <span>
                            Buy Here Now’s services can be availed at various locations within the Dhaka Metropolitan area, Mohakhali, Mohakhali DOHS, Banani DOHS, Baridhara DOHS, Banani, Gulshan 1 & 2, Baridhara, Bashundhara, Uttara & Dhanmondi.
                           </span>
                            <span>
                            We will deliver it to your door step whenever you require our service. Buy Here Now will ensure quality, convenience and affordability like no other.</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>




<!-- about part end -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <img class="spoon" src="images/spoon(2).png" alt="">

            <?php

            //create sql quary to display category from database
            $sql="SELECT * FROM tbl_category WHERE active='yes' AND featured='yes' LIMIT 3";
            $res = mysqli_query($conn,$sql);

            $count = mysqli_num_rows($res);
            if($count>0){
                 while($row=mysqli_fetch_assoc($res)){
                     $id = $row['id'];
                     $title = $row['title'];
                     $image_name = $row['image_name'];
                     ?>

            <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
                <div class="box-3 float-container">
                    <?php
                        if($image_name==""){
                            echo "<div class='error'>image not available</div>";
                        }else{
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name ;?>" alt="Pizza" class="img-responsive img-curve">
                            <?php
                        }
                    ?>
                   
                    <h3 class="float-text text-white"><?php echo $title;?></h3>
                </div>
            </a>


            <?php
                 }
            }
            else{
                echo"<div class='error'> Category not added.</div>";
            }

            ?>

           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu" >
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
           
            

            <?php
            //Getting foods from database
            $sql2 = "SELECT *FROM  tbl_food WHERE active='yes' AND featured='yes' LIMIT 6";

            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0)
            {
                while($row=mysqli_fetch_assoc($res2))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $discription = $row['discription'];
                    $image_name = $row['image_name'];

                    ?>
                 <div class="food-menu-box" >
                    <div class="food-menu-img">
                    <?php
                        if($image_name==""){
                            echo "<div class='error'>image not available</div>";

                        }else{
                            ?>
                            <img src="<?php echo SITEURL?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php

                        }
                    ?>
                        
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title;?></h4>
                        <p class="food-price"><?php echo 'TK '.$price;?></p>
                        <p class="food-detail">
                        <?php echo $discription;?>
                        </p>
                        <br>

                        <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                    
                </div>

                 <?php
                }

            }else{
                echo "<div class='error'>food not available.</div>";
            }


?>

         

           

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
     <!-- Team part start -->

    <section id="team_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center ">
                    <div class="team_head">
                        <h2>Our Team</h2>
                        <img src="images/spoon(2).png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="team_inner">
                        <div class="team_img">
                            <img src="images/team-4.jpg" alt="">
                            <div class="overly">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team_text">
                            <h4>Delivery Team</h4>
                            <h5>delivery man, GOOD FOOD</h5>
                            <p>Food Delivery Drivers transport food items from production areas to customers. A typical resume sample for this position mentions duties such as loading food, transporting it to the destination. </p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team_inner">
                        <div class="team_img">
                            <img src="images/team-2.jpg" alt="">
                            <div class="overly">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team_text">
                            <h4>Md Naser Bin Hossain</h4>
                            <h5>Executive team member, GOOD FOOD</h5>
                            <p>Student of North South University
                                Department CSE, WOrking in marking department, Managing orders. </p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team_inner">
                        <div class="team_img">
                            <img src="images/team-3.jpg" alt="">
                            <div class="overly">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team_text">
                            <h4>Good Food</h4>
                            <h5>Admin, GOOD FOOD</h5>
                            <p>Resturent's Owner
                               Managing Admin Portal </p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team_inner">
                        <div class="team_img">
                            <img src="images/team-1.jpg" alt="">
                            <div class="overly">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team_text">
                            <h4>Shadman Sakib Khan</h4>
                            <h5>CEO, GOOD FOOD</h5>
                            <p>Student of North South University
                                Department CSE, Graphices Designer,Web Designer,Basic programmer of c,Java.Currently Working on UI/UX </p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!--  Team part end -->
<!--  Review part start -->
    <section id="Review">
        <div class="gallry_head">
            <h2>Review</h2>
            <img src="images/spoon(2).png" alt="">
        </div>
        <div class="text_banner" style="background: url(image/tesimonial-background.jpg);">
            <div class="container">
                <div class="row  slider">

                    <div class="col-lg-6">
                        <div class="text_inner">
                            <img src="images/client-1.jpg" alt="">
                            <h4>Shahed</h4>
                            <h5>Good to try, won't be disappointed at all</h5>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>

                        </div>
                        <div class="text_text">
                            <p>I had to try something new and we went in Kamboj's. I must say that the sitting arrangements have been a bit kept closer, which I felt was uncomfortable. But the services and taste of food, veg and non veg both, was amazing.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text_inner">
                            <img src="images/client-2.jpg" alt="">
                            <h4>Nadia</h4>
                            <h5>Tasty Malai Kofta</h5>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>

                        </div>
                        <div class="text_text">
                            <p>Malai Kofta is very tasty. You should try this one. Apart from this veg Biryani is also good .</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text_inner">
                            <img src="images/client-3.jpg" alt="">
                            <h4>Nabila</h4>
                            <h5>A good fine-dining option in Kalpetts</h5>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>

                        </div>
                        <div class="text_text">
                            <p>I and my friend had dinner here one of the nights we were in Kalpetta. The ambiance was good and the food recommendations were great. We had a traditional Arabian rice and chicken preparation, Kuzhi Manthi. It was our first experience having this dish, and although a bit dry, it tasted great. Would recommend this place that's easily noticed from a vehicle and has ample parking.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text_inner">
                            <img src="images/client-2.jpg" alt="">
                            <h4>Mehedi Hassan</h4>
                            <h5>The Best at Taste and Quality</h5>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                        </div>
                        <div class="text_text">
                            <p>The Food we had enjoyed at the time of dinner. It was really delicious taste with great quality, everything had unique taste which we had ordered, nice arrangement and services from the staff while eating, we found nothing bad about this hotel.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
<!-- Review part end -->

<!--  Counter part start -->
    <section id="counter" style="background: url(image/counter-background.jpg);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="countter_text">
                        <h3 class="counter_part">19999</h3>
                        <p>Total Orders</p>
                    </div>
                </div>
                <div class="col">
                    <div class="countter_text">
                        <h3 class="counter_part">569</h3>
                        <p>Reviews</p>
                    </div>
                </div>
                <div class="col">
                    <div class="countter_text">
                        <h3 class="counter_part">261</h3>
                        <p>Food Category</p>
                    </div>
                </div>
                <div class="col">
                    <div class="countter_text">
                        <h3 class="counter_part">1500</h3>
                        <p>Foods</p>
                    </div>
                </div>
                <div class="col">
                    <div class="countter_text">
                        <h3 class="counter_part">146</h3>
                        <p>Sponsers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--  Counter part end -->
<!--  Sponser part start -->
    <section id="sponser_part">
        <div class="container">
            <div class="row sponser_slider">
                <div class="col">
                    <div class="sponser_img">
                        <img src="images/t1.png" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="sponser_img">
                        <img src="images/t4.png" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="sponser_img">
                        <img src="images/t2.jpg" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="sponser_img">
                        <img src="images/t3.jpg" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="sponser_img">
                        <img src="images/t4.png" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="sponser_img">
                        <img src="images/t5.jpg" class="img-fluid w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--  Sponser part end -->


  <?php
      include('partial-front/footer.php');
  ?>