 
<?php
include ('Dbconnection.php');

       
               
	$rawmat_id= $_POST['rawmat_id'];
  $material_name = $_POST['material_name'];
	$description=$_POST['description'];
	$quantity=$_POST['quantity'];
	$unit_price=$_POST['unit_price'];
  $status=$_POST['status'];

  
        $error = 0;
        $errdescription = "";
        $errquantity ="";
         $errmaterial_name="";
        $errunit_price= "";
        $errstatus="";
         $Err="";
        //if(empty($firstname) or (empty($lastname)) or (empty($PhoneNumber)) or (empty($password))){
         // $Err= " Failed Update. Please Go back and correct as indicated below ";
          //$error = 1;

        //}
        if(empty($material_name)){  
          $errmaterial_name = "*Unfilled materia_name.";
          $error = 1;
        }
         if(empty($quantity)){  
          $errquantity= "*enter quantity";
          $error = 1;
        }
        
        if(empty($unit_price)){
          $errunit_price = "*unit_price";
          $error = 1;
        }

        
 if(empty($status)){
          $errstatus = "* Enter status";
          $error = 1;
        }


     
        
        if($error == 0){

	$user=mysqli_query( $con,"UPDATE material SET material_name='$material_name', description='$description', quantity='$quantity' , unit_price='$unit_price' , status='$status'  WHERE rawmat_id='$rawmat_id'");

   if ($user){
    header("Location:addmaterial.php");
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
 if(isset($errmaterial_name)){
          echo "<div class='error'>$errmaterial_name</div>";
        }
        ?>
        <?php
     if(isset($errdescription)){
          echo "<div class='error'>$errdescription</div>";
        }
        ?>
        <?php
        if(isset($errquantity)){
          echo "<div class='error'>$errquantity</div>";
        }
        ?>
        <?php
         if(isset($errunit_price)){
          echo "<div class='error'>$errunit_price</div>";
        }
        ?>
         <?php
         if(isset($errstatus)){
          echo "<div class='error'>$errstatus </div>";
        }
        ?>
        
    
    