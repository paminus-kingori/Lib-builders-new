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
    
    
          
    }
     
    

    $user=mysqli_query($con,"INSERT INTO comment(comment_id,subject,description,  email_address,phone_number,first_name,last_name) VALUES ('$comment_id','$subject','$comment','$email_address','$phone_number','$first_name','$last_name' )") or die(mysqli_error($db));
    

    $_session['message']="Your message was received.";
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lib home builders">
    <title>Lib Home Builders | Blog</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/blog.css">
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
                    <a href="equipment.html#excavator">Excavator</a>
                    <a href="equipment.html#mixer">Cement mixer</a>
                    <a href="equipment.html#tractor">Wheel Tractor</a>
                    <a href="equipment.html#grader">Grader</a>
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

            <a href="gallery.php">
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
        <main>
            <div class="top">
                <span class="search-sect">
                    <input type="text" name="searchbar" id="searchbar" class="searchbar" placeholder="Search news article">
                    <img src="icons/search-svgrepo-com.svg" alt="search" class="search-icon">
                </span>
    
                <h2 class="news" style="position: center;">
                    News
                </h2>

               
            </div>

            <section class="blog-sect">
               
<?php
    $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
$rer3 = mysqli_query($db, "SELECT * FROM article ");



while($rr=mysqli_fetch_array($rer3)){
    ?>
       
    <aside class="blog-card" id="blog" name="blog">
                   
        <img src="images/<?php echo $rr['profile_pic']; ?>" alt="project" class="blog-image">
        <p d="blog" name="blog"  class="blog-text" style="color: black;font-weight: bold; font-family: helvetica; font-size: 15px;text-align: none;" >
           
           <p id='p'style="color: black; font-family: helvetica; font-size: 15px;text-align: center;"> <?php echo $rr['title']; ?><br> <?php echo $rr['subject']; ?><br></p>
            
             <?php $file=$rr['source_name']; ?>
             
              <span id="<?php 'dots_'. $rr['count_id']; ?>"><?php echo $rr['description']; ?></span>
<small id="<?php 'dots_'. $rr['count_id']; ?>" style="color: grey; text-align:left; font-size: 10px; border-left:1px solid orange;padding-left: 5px; font-family: helvetica; font-weight: none;"  >

            <?php  $myfile = fopen("c:\\wamp\\www\\dun3\\$file", "r+")or die("Unable to open file!");
while(!feof($myfile)){
  echo fgets($myfile);
 
}


fclose($myfile);?><br>
<?php echo $rr['likes']; ?><a href="like.php?service_Id=<?php echo $rr['count_id'];?>" class= "edit-btn"> <img src="icons/hand-thumbs-up.svg" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a></td>
</small>
        </p>
        <article class="card-bottom">
            <small style="color: #3FAAF5;">
                <?php echo $rr['date_published']; ?>
 <form name="comment" class="form-horizontal" enctype="multipart/form-data" method="post" action="blog.php" >
           
                      
        </form>
               
                
            </small>
       <button class="blog-btn" onclick="myFunction()" id=' <?php echo $rr['count_id']; ?>'>
                Read more
            </button>
        </article>
        <style type="text/css">
            #more{display: block;}
        </style>
</aside>

<script>
function myFunction() {
  var input, filter, aside, tr, td, i, txtValue;
  input = document.getElementById("searchbar");
  filter = input.value.toUpperCase();
  aside = document.getElementById("p");
  tr = aside.getElementsByTagName("p");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("P")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}



</script>
<script type="text/javascript">
    function myFunction(){
        var dots= document.getElementById("dots");
            var moreText= document.getElementById("<?php echo $rr['count_id']; ?>");
        var btnText=document.getElementById("more");
        if(dots.style.display==="none"){
            dots.style.display="inline";
            btnText.innerHTML="Read More";
            moreText.style.display="none";

        } else{
            dots.style.display="none";
            btnText.innerHTML="Read less";
            moreText.style.display="inline";
        }
    }
</script>
<?php } ?>

               
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
        <article class="message" id="contact">
            <p>Send us a message</p>
            <form name="comment" class="form-horizontal" enctype="multipart/form-data" method="post" action="equipment.php" >
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
</body>

<script src="nav.js"></script>


</html>