 
<?php
include ('Dbconnection.php');

       
               
	$count_id = $_POST['count_id'];
  $title = $_POST['title'];
	$description=$_POST['description'];
	$status=$_POST['status'];
	$subject=$_POST['subject'];
  $source_name=$_POST['source_name'];

  
        $error = 0;
        $errdescription = "";
        $errstatus ="";
         $errtitle="";
        $errsubject= "";
        $errsource_name="";

        
         $Err="";
        //if(empty($firstname) or (empty($lastname)) or (empty($PhoneNumber)) or (empty($password))){
         // $Err= " Failed Update. Please Go back and correct as indicated below ";
          //$error = 1;

        //}
        if(empty($title)){  
          $errptitle = "*Unfilled project_name.";
          $error = 1;
        }
         if(empty($status)){  
          $errstatus= "*enter status";
          $error = 1;
        }
        
        if(empty($source_name)){
          $errsource_name = "*source_name";
          $error = 1;
        }
         if(empty($description)){
          $errdescription= "*type description";
          $error = 1;
        }

        

echo $count_id;
     
        
        if($error == 0){

	$user=mysqli_query( $con,"UPDATE article SET title='$title', description='$description', status='$status' , source_name='$source_name' WHERE count_id='$count_id'");

   if ($user){
    header("Location:addarticle.php");
   }
   else{
   	echo"failed to execute";
   }
 }

?>
<head>
     <link rel="stylesheet" href="./css/mountains.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Update Product</title>
    <style>
      .error{
        color: #ff726f;
        margin-left: 40%;
        padding: none;
        border-bottom: none;
        border-top: none;
        border-left: 1px solid red;
        border-right: 1px solid red;
        font-size: 10px;
        text-align: center;


      }
      .success{
        color: #90ee90;
      }
      .Error{
        color: #ff726f;
        background: white;
        border-radius: ;
        width: 30%;
       padding: 5px;
       align-items: center;
        border-bottom: none;
        border-top: none;
        border-left: 1px solid red;
        border-right: 1px solid red;
      
      }
      
    </style>
  </head>

<?php
        if(isset($Err)){
          echo "<div class='Error'> <a href='../admin/home.php'><img src='icons/icon_error1.gif' alt='image' class='photo' style='width: 15px; height: 15px;border-radius: 300px; margin-top: 3%; '></a><br><h style='font-size: 10px;color:red; '><br>
          <img src='icons/icon_error1.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;margin-left:2%;'><br>
         $Err
          
          Failed Update.Please Go back and correct:
          </div>";

         
        
        }


      ?>
<?php
 if(isset($errtitle)){
          echo "<div class='error'>$errtitle</div>";
        }
        ?>
        <?php
     if(isset($errdescription)){
          echo "<div class='error'>$errdescription</div>";
        }
        ?>
        <?php
        if(isset($errsource_name)){
          echo "<div class='error'>$errsource_name</div>";
        }
        ?>
        
        <?php
         if(isset($errstatus)){
          echo "<div class='error'>$errstatus</div>";
        }
        ?>
        
    
    