<?php
require 'Dbconnection.php';
$query= mysqli_query($con, "select count(*) as total from comment");
$result1 = mysqli_fetch_array($query);
$count = ($result1['total']+1 );

 $first_name="";
  $last_name="";
  $phone_number="";
  $email_address="";
  $comment="";
  $subject="";
  $comment_id= 'NC'.$count.'C';

  $update= false;
  if(isset($_POST['save'])){
    $email_address=$_POST['email_address'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
     $phone_number=$_POST['phone_number'];
    $subject=$_POST['subject'];
    $comment=$_POST['comment'];
    
    
          
    
     
    

    $user=mysqli_query($con,"INSERT INTO comment(comment_id,subject,description,  email_address,phone_number,first_name,last_name) VALUES ('$comment_id','$subject','$comment','$email_address','$phone_number','$first_name','$last_name' )") or die(mysqli_error($db));
    

    if($user=true){
       echo "<div class='alert alert-success tex-center' style='width: 30%; margin-left: 34%;margin-top: 5%;text-align:center;'>Your message was received<img src='icons/action_check.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br> <a href='gallery.php'>Close</a></div>
               ";
    }
}
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lib Home Builders | Equipment</title>
    <link rel="stylesheet" href="swiper.min.css">
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/common.css">


</head>
<body>
    <nav style="background: #FF7435;">
        <div class="over"></div>
        <span class="logo">
            <img src="images/LIb.jpg" alt="logo image" class="logo-image">
            <article>
            <p>Lib Home</p>
            <p>Builders</p>
            </article>
        </span>

        <img src="icons/menu-svgrepo-com.svg" alt="menu" class="menu-icon mobile">

        <span class="links">
            <a href="homepage.php#top">
                <img src="icons/homepage.svg" alt="home" class="icon">
                Home
            </a>
            <div class="pro-link">
            <a href="project.php">
                <img src="icons/project-task.svg" alt="project" class="icon">
                Projects
                <img src="icons/triangle black and white.svg" alt="triangle" class="icon twist">
            </a>
                <!-- dropdown functionality  -->
                <div class="more-projects">
                    <a href="project.php#upcoming"> Upcoming Projects</a>
                    <a href="project.php#active">Active Projects</a>
                    <a href="project.php#complete">Complete Projects</a>
                </div>
            </div>
            
            <div class="pro-link">
                <a href="equipment.php">
                    <img src="icons/wheelbarrow.svg" alt="project" class="icon">
                    Equipments
                    <img src="icons/triangle black and white.svg" alt="triangle" class="icon twist">
                </a>
                <div class="more-projects">
                    <a href="equipment.php#excavator">Excavator</a>
                    <a href="equipment.php#mixer">Cement mixer</a>
                    <a href="equipment.php#tractor">Wheel Tractor</a>
                    <a href="equipment.php#grader">Grader</a>
                </div>
            </div>

            <div class="pro-link">
                <a href="material.php">
                    Material
                    <img src="icons/triangle black and white.svg" alt="triangle" class="icon twist">
                </a>
                <div class="more-projects">
                    <a href="material.php#brick">Bricks</a>
                    <a href="material.php#sand">Sand</a>
                    <a href="material.php#cement">Cement</a>
                </div>
            </div>

            <a href="gallery.html">
                Gallery
            </a>
            <a href="blog.php">
                <img src="icons/comment-blog.svg" alt="blog" class="icon">
                Blog
            </a>
            <a href="about.php">
                About Us
            </a>
            <a href="#contact">
              Contact Us
            </a>
        </span>

      
    </nav>


        <section class="gal">
      <!-- Swiper -->
  <div class="swiper-container gallery-top">
    <div class="swiper-wrapper">
      <?php
     $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
$rer3 = mysqli_query($db, "SELECT * FROM project");



while($rr=mysqli_fetch_array($rer3)){
    ?>
      <div class="swiper-slide" style="background-image:url(../dun3/images/<?php echo $rr['profile_pic'] ?>)"><h3 class="text"><?php  echo $rr['description']?></h3></div>

       <?php } ?>
     

     
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>
  <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
      <?php
     $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
$rer5 = mysqli_query($db, "SELECT * FROM project");



while($rr1=mysqli_fetch_array($rer5)){
    ?>
      <div class="swiper-slide" style="background-image:url(../dun3/images/<?php echo $rr1['profile_pic']; ?>"></div>
       <?php } ?>
    </div>
  </div>

             
        </section>
   
    <footer>
        <article class="vision">
            <h3>Vision</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci nihil explicabo pariatur placeat, 
                sit debitis dignissimos tempora culpa nam beatae quisquam, quos repellat harum.</p>
            <h3>Mission</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem expedita unde dicta saepe? 
                Quia culpa labore architecto, molestiae, sint odio.</p>
        </article>
        <article class="message" id="contact">
            <p>Send us a message</p>
            <form name="comment" class="form-horizontal" enctype="multipart/form-data" method="post" action="gallery.php" >
            <input type="text" name="email_address" placeholder="Enter your email.." required>
            <input type="text" name="first_name" placeholder="Enter your first name.." required>
            <input type="text" name="last_name" placeholder="Enter your last name..">
            <input type="number" name="phone_number" placeholder="Enter your phone number..">
             <input type="text" name="subject" placeholder="Enter your subject.." required>
            <textarea name="comment" id="message-content" cols="30" rows="5" placeholder="Type message.."></textarea>

            <button type="submit" name="save" class="send" style="margin-left: 30%;">Send</button>
        </form>
        </article>
     
            <article class="contact">
            <p>Contact us via:</p>
           <a href="https://wa.me/254714757251"><span>  <img src="icons/whatsapp-svgrepo-com.svg" alt="whatsapp" class="social-icon"> +254 758 005223  </span></a>
            <a href="https://julianlibratomulesi@gmail.com "><span>  <img src="icons/gmail-svgrepo-com.svg" alt="gmail" class="social-icon">Julian Libratoz  </span></a>
            <a href="https://0758005223"><span>  <img src="icons/phone-svgrepo-com.svg" alt="phone" class="social-icon">0758 005223  </span></a>
        </article>
    </footer>
    <script src="swiper.min.js"></script>

    <script>
 //    Initialize Swiper 
  
      var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
      //   loop: true,
        freeMode: true,
        loopedSlides: 5, //looped slides should be the same
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
      });
      var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
      //   loop:true,
        loopedSlides: 5, //looped slides should be the same
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        thumbs: {
          swiper: galleryThumbs,
        },
      });
    </script>

<script src="nav.js"></script>

</body>
</html>