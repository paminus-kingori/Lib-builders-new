<?php
session_start();


  $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
  
    

?> 



<!--?php
    $category_query = "SELECT * FROM category";
    $categories = $crud->getData($category_query);                                      
?>--> 



    




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Project</h5 style="color: green;" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     
<!DOCTYPE html>
<html>
<head>

  <!-- <link rel="stylesheet" href="../css/mountainn.css"> -->
   <link rel="stylesheet" href="../css/styles1.css">
 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <title></title>
</head>
<body style="background-color: white;">


 <?php if(isset($_session['message'])): ?>
 <div class ='msg' style="width: 70%; margin-left: 10%; text-align: center;">
  <?php
  echo $_session['message'];
  unset($_session['message']);
  ?>
  <img src="../public/images/icon_success1.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;">
</div>
<table>
<?php endif ?>
<?php 
$count = 1;
$result=mysqli_query($db,"SELECT *FROM customer where "); ?>

        <?php while ($row=mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $count++ ?></td>
             <td><?php echo $row['rawmat_id']; ?></td>
            <td><?php echo $row['material_name']; ?></td>
             <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['quantity']; ?></td>
               <td><?php echo $row['unit_price']; ?></td>
                 <td><?php echo $row['category_id']; ?></td>
                    

               <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/adminn.css">
<img src="images/<?php echo $image ?>" style="height: 50%; width: 50%; margin-left: 25%;margin-top: 5%;">
<form action="editAdminprofileExec.php" method="post" enctype="multipart/form-data" style="margin-left: 25%; color: green;background: orange; align-items: center;width: 50%;padding-left: 15%;font-size: 20px; font-family: verdana;">
  <br>
  <input type="hidden" name="service_Id" value="<?php  ?>">
  Select Image
  <br>
  <input type="file" name="image"><br>
  <input type="submit" value="Upload" style="width:50%; height: 5%; background: none; border: 1px solid green; border-radius: 5px;">
  <tr>
            <td><?php echo $count++ ?></td>
             <td><?php echo $row['rawmat_id']; ?></td>
            <td><?php echo $row['material_name']; ?></td>
             <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['quantity']; ?></td>
               <td><?php echo $row['unit_price']; ?></td>
                 <td><?php echo $row['category_id']; ?></td>
                     <td><div class="el-card-item"style="box-shadow: 0px 1px 5px #bbbbbb;">
                    <div class="el-card-avatar el-overlay-1"><a href="editMprofile.php?service_Id=<?php echo $row['email_address'];?>" class= "edit-btn"> <img  style="width:30px; height: 20px; " src="http://localhost/dun3//images/<?php echo $row['profile_pic'];?>" /></a></div></div></td>
               <td><a href="Editmaterial.php?edit=<?php echo $row['email_address'];?>" class= "edit-btn"> <img src="icons/icon_content_small.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a></td>
               <td><a href="deletematerial.php?service_Id=<?php echo $row['email_address'];?>" class= "edit-btn"> <img src="icons/action_delete.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a></td>
</form>
             </tr>
           <?php }?>
      
</table>
    </form>
</div>
</div>
</div>
</div>
      
      

  <!-- scripts -->
   <script type="text/javascript" src="add/js/jquery.min.js"></script>
   <script type="text/javascript" src="add/js/popper.min.js"></script>
    <script type="text/javascript" src="add/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="add/js/mdb.min.js"></script>
    <script type="text/javascript" src="add/js/app.js"></script>




</body>
</html>
<?php

//include 'footer.php';
?>