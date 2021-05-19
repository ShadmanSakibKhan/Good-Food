<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <style>
        *{margin:0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif;}

        a{text-decoration: none;}

        a:hover{text-decoration: none;}

        li{list-style: none;}

        p{
            font-size: 0.9rem;
            line-height: 1.6;
            font-weight: 400;
            color: black;
        }

        .extra-div h2{
            font-size: 0.9rem;
            margin: 20px 0 15px 0;
            font-weight: bold;
            line-height: 1.1;
            word-spacing: 4px;
        }

        .header{
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(rgba(193,138,138,0.3),rgba(193,138,138,0.3)),url('images/pexels-negative-space-34627\ \(1\).jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        }
        .navbar:before{
            content: "";
            position: absolute;
            top: 0%;
            bottom: 0%;
            left: 0;
            right: 0;
            opacity: .3;
            z-index: -1;
            background: linear-gradient(to right, #cd9295 0%, #a34e52 0%, #b3262e 100%);
        }
        .nav-item a{
            color: #fff!important;
            font-weight: bold;
        }

        .header-section{
            width: 100%;
            height: inherit;
            color: white;
            text-align: center;
            position: relative;
        }

        .center-div{
            width: 100%;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .header-buttons a{
            border: 1px solid #fff;
            border-radius: 100px;
            margin: 0 5px;
            padding: 12px 35px;
            outline: #fff;
            font-size: 1.5rem;
            font-weight: 400;
            line-height: 1.4;
            text-align: center;
        }

        .header-buttons a:hover{
            color: #50d1c0;
            background-color: #fff;
            text-decoration: none;
            box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);
        }

        .center-div p{
            font-size: 1.3rem;
            padding: 10px 0 020px 0;
            color: white;
        }

        /* cards */

        .header-extradiv{
            width: 100%;
            height: auto;
            margin: 100px 0;
            text-align: center;
        }

        .extra-div{
            background: #fff;
            border: medium none;
            padding: 50px!important;
            border-radius: 3px;
            transition: 0.3s;
        }

        .extra-div:hover{
            box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);
            transform: translateY(-20px);
        }

        i{
            color: #8e2025;
        }

        /* -------------- */


        /* -------------- */
        .project-work{
            margin: 100px 0;
        }

        .project-work:before{
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: #f05146;
            z-index: -1;
        }

        .project-work h1{
            font-size: 2rem;
            text-align: center;
        }
        /* -------------- */
        .contactus{
            width: 100%;
            height: 100vh;
            padding: 80px 0;
            position: relative
        }

        .contactus:before{
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: #e8645a;
            z-index: -1;
        }


    </style>
</head>
<body>
    <div class="header" id="topheader">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container  text-uppercase p-2">
  <a class="navbar-brand font-weight-bold text-white" href="#">Audible</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto text-uppercase">
      
      <li class="nav-item">
        <a class="nav-link" href="user/signup.php">SignUp</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user/login.php">Login</a>
      </li>
      
    </ul>
  </div>
  </div>
</nav>

<section class="header-section">
    <div class="center-div">
        <h1 class="font-weight-bold">Welcome to AUDIBLE</h1>
        <p>An amazon product.</p>
        <div class="header-buttons">
            <a href="#AboutUs">AboutUs</a>
            <a href="#ContactUs">Contact</a>

        </div>
    </div>

</section>
    </div>
<!-- ********End of Header part ********-->

<!-- ********CARDS******** -->

<section class="header-extradiv">
        <div class="container">
            <div class="row">
            <div class="container headings text-center">
        <p class="text-center font-weight-bold">WHAT'S SPECIAL ABOUT US?
        </p>
        <a name="AboutUs"></a>
        </div>
                <div class=" extra-div col-lg-4 col-md-4 col-12">
                    <a href="#"><i class="fa-3x fa fa-assistive-listening-systems" aria-hidden="true"></i></a>
                    <h2>Ease on the ear</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus, dolore sequi? Dolore ab est, magnam rerum dolorem sed distinctio! Quis!</p>
                </div>

                <div class="extra-div col-lg-4 col-md-4 col-12">
                    <a href="#"><i class="fa-3x fa fa-money" aria-hidden="true"></i></a>
                    <h2>Affordable</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus, dolore sequi? Dolore ab est, magnam rerum dolorem sed distinctio! Quis!</p>
                </div>

                <div class="extra-div col-lg-4 col-md-4 col-12">
                    <a href="#"><i class="fa-3x fa fa-gift" aria-hidden="true"></i></a>
                    <h2>Recieve monthly gifts</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus, dolore sequi? Dolore ab est, magnam rerum dolorem sed distinctio! Quis!</p>
                </div>

            </div>
        </div>
</section>

<!-- **********Customer view*********** -->
<hr>
<section class="project-work" >
        <div class="container headings text-center">
        <p class="text-center font-weight-bold">MORE THAN 2,000 CUSTOMERS REVIWED
        </p>
        </div>

        <div class="container d-flex justify-content-around align-items-center text-center">
            <div>
                <h1 class="count">1500</h1>
                <p>Contributors</p>
            </div>

            <div>
                <h1 class="count">2500</h1>
                <p>Book Reviews</p>
            </div>

            <div>
                <h1 class="count">700</h1>
                <p>Working On</p>
            </div>

            <div>
                <h1 class="count">50</h1>
                <p>Awards Won</p>
            </div>
        </div>
</section>

<br><br>

<section class="contactus" id="contactid">
<a name="ContactUs"></a>
        <div class="container headings text-center">
        <h3 class="text-center">CONTACT US</h3>
        <p class="text-capitalize pt-1">We are Looking Forword to here from You</p>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-10 offset-lg-2 offset-md-2 col-1">
                <form action="/action_page.php">
  




  

  <div class="form-group">
    
    <input type="email" class="form-control" id="email" required autocomplete="off" placeholder="Enter Your Name">
  </div>

  <div class="form-group">  
    <input type="number" class="form-control" id="mobile" required autocomplete="off" placeholder="Enter Your Mobile Number">
  </div>

  <div class="form-group">
        <textarea class="form-control" rows="4" id="comment" placeholder="Enter Your Message"></textarea>
  </div>
  
  <button type="submit" class="btn btn-secondary">Submit</button>
</form>
                </div>
            </div>
        <div>
        </div>


</section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
  <script src="https://cdn.jsdelivr.net/npm/jquery.counterup@2.1.0/jquery.counterup.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

  <script>
    $('.count').counterUp({
        delay:10,
        time:3000
    })
  </script>
</body>
</html>