
<?php
//session_start();
// connect to database

require 'Dbconnection.php';
//$query= mysqli_query($con, "select count(*) as total from comment");
//$result1 = mysqli_fetch_array($query);

//$count = ($result1['total']+1 );

 $first_name="";
  $last_name="";
  $phone_number="";
  $email_address="";
  $comment="";
  $subject="";

  $comment_id= 999;

  //$update= false;
  if(isset($_POST['save'])){
    $email_address=$_POST['email_address'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
     $phone_number=$_POST['phone_number'];
    $subject=$_POST['subject'];
    $comment=$_POST['comment'];
    
    
          
    
     
    

    $user=mysqli_query($con,"INSERT INTO comment(comment_id,subject,description,  email_address,phone_number,first_name,last_name,status) VALUES ('$comment_id','$subject','$comment','$email_address','$phone_number','$first_name','$last_name','UNREAD' )") or die(mysqli_error($con));
    

    $_session['message']="Your message was received.";
  
           echo' $_session["message"]';
    header('location:homepage.php');
}
   
  ?>

      x    

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lib home builders">
    <title>Lib Home Builders | Homepage</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <nav style="background: #ff7435;">
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
            <a href="homepage.php">
                <img src="icons/homepage.svg" alt="home" class="icon">
                Home
            </a>
            <a href="project.php">
                <img src="icons/project-task.svg" alt="project" class="icon">
                Projects
                <img src="icons/triangle black and white.svg" alt="triangle" class="icon twist">
            </a>
            <a href="equipment.php">
                <img src="icons/wheelbarrow.svg" alt="project" class="icon">
                Equipments
                <img src="icons/triangle black and white.svg" alt="triangle" class="icon twist">
            </a>
            <a href="material.php">
                Material
                <img src="icons/triangle black and white.svg" alt="triangle" class="icon twist">
            </a>
            <a href="blog.php">
                <img src="icons/comment-blog.svg" alt="blog" class="icon">
                Blog
            </a>
            <a href="about.php">
                About Us
            </a>
             <a href="gallery.php">
               Gallery
            </a>
            <a href="">
              Contact Us
            </a>
        </span>

      
    </nav>
    <main>
        <section class="landing">
      

            <article class="landing-text">
            <h1>
                Need to build <br>
                a home?
            </h1>
            <button class="build-btn">Build with Us</button>
            </article>

            <article class="scroll">
                <img src="icons/arrow-down.svg" alt="arrow down" class="arrow">
                <p>Scroll Down</p>
            </article>
        </section>
       <?php 
$count = 1;
$result=mysqli_query($con,"SELECT *FROM libbuilder"); 
     
    
?>
 
        <section class="projects-sect">
            <h2>Our Projects</h2>
            <article class="projects">
                <!-- upcoming projects  -->
                <!--div class="project-card">
                    <img src="images/living-room.jpg" alt="project" class="project-image">
                    <p class="project-text">
                        We have several projects which we intend to work on in the near future.
                    </p>
                    <button class="projects-btn">
                        Upcoming Projects
                    </button>
                </div>-->

                <!-- ongoing projects -->
                <!--div class="project-card">
                    <img src="images/woo up.jpg" alt="project" class="project-image">
                    <p class="project-text">
                        Here are some of our projects which are currently ongoing.
                    </p>
                    <button class="projects-btn">
                        Active Projects
                    </button>
                </div>-->

                <!-- complete projects  -->
                 <?php
    $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
$rer = mysqli_query($db, "SELECT * FROM project  LIMIT 6 ");


while($rr=mysqli_fetch_array($rer)){
    ?>
                <div class="project-card">
                    <img src="images/<?php echo $rr['profile_pic'];?>" alt="project" class="project-image">
                    <p class="project-text">
                        <?php echo $rr['description'];?>
                    </p>
                    
                     <a href="project.php?count_id=<?php echo $rr['count_id'] ; ?>" > <button class="projects-btn" type="submit">
                       <?php echo $rr['status'];   ?>
                    </button></a>
                </div>

                 <?php }?>

            </article>
            

          
                <a href=" project.php" > <button class="more-btn" type="submit">
                    View more Projects
                       
                    </button></a>
            </a>
        </section>

        <!-- equipment section  -->
        <section class="equipment-sect">
            <h2>
                <img src="icons/wheelbarrow.svg" alt="wheelbarrow" class="wheelbarrow">
                Equipment
            </h2>
          <article class="art-text">Here are some of our equipment. You can hire any of them.</article>
          <div class="equipments">
               <?php
    $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
$rer = mysqli_query($db, "SELECT * FROM equipment  LIMIT 6 ");


while($rr=mysqli_fetch_array($rer)){
    ?>
          <div class="equip-card">

                <img src="images/<?php echo $rr['profile_pic']; ?>" alt="excavator" class="equip-image">
                <div class="equip-details">
                    <h4><?php echo $rr['equipment_name']; ?></h4>
                    <p><?php echo $rr['description']; ?></p>
                <a href="hire.php?equipment_id=<?php echo $rr['rawequ_id'] ; ?>" > <button class="projects-btn" type="submit">
                       hire
                    </button></a>
               
            </div>
 
            </div>
             <?php }?>
            

           
            <a href="equipment.php">
                <button class="more-btn">View more Equipment</button>
            </a>
        </div>            
        </section>

        <section class="material-sect">
            <h2>Material</h2>
          <article class="art-text">Here are some of our construction materials. You can buy any of them.</article>
            <div class="materials">
                 <?php
    $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
$rer = mysqli_query($db, "SELECT * FROM material where quantity>0 LIMIT 6 ");


while($rr=mysqli_fetch_array($rer)){
    ?>
               

                <div class="material-card">
                    <img src="images/<?php echo $rr['profile_pic'];?>" alt="material" class="material-image">
                    <p class="material-text">
                       <?php echo $rr['material_name'];?>
                    </p>
                    
                    
            <a href="order2.php?material_id=<?php echo $rr['rawmat_id'] ; ?>" > <button class="projects-btn" type="submit">
                       Buy
                    </button></a>
                    
                </div>
 <?php }?>
                
            </div>

            <a href="material.php">
                <button class="more-btn">View more Material</button>
            </a>
        </section>
    </main>
    <footer>
        <article class="vision">
            <h3>Vision</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci nihil explicabo pariatur placeat, 
                sit debitis dignissimos tempora culpa nam beatae quisquam, quos repellat harum.</p>
            <h3>Mission</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem expedita unde dicta saepe? 
                Quia culpa labore architecto, molestiae, sint odio.</p>
        </article>
        <article class="message">
            <p>Send us a message</p>

     <form name="comment" class="form-horizontal" enctype="multipart/form-data" method="post" action="homepage.php" >
            <input type="text" name="email_address" placeholder="Enter your email.." required>
            <input type="text" name="first_name" placeholder="Enter your first name.." required>
            <input type="text" name="last_name" placeholder="Enter your last name.." required>
            <input type="number" name="phone_number" placeholder="Enter your phone number.." required>
             <input type="text" name="subject" placeholder="Enter your subject.." required>
            <textarea name="comment" id="message-content" cols="30" rows="5" placeholder="Type message.." required></textarea>

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
</body>
<script src="nav.js"></script>


</html>