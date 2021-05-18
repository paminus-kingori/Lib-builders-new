<?php
session_start();


  $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
   //header('location:home.php');
   
?>



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

<?php endif ?>
<?php 
$count = 1;
$result=mysqli_query($db,"SELECT *FROM customer GROUP BY email_address DESC"); ?>
<style type="text/css">
  tr:nth-child(even){
  background-color: #f2f2f2;
 }
 tr:nth-child(even):hover{
  background-color: orange;
 }
 tr:nth-child(odd):hover{
  background-color: orange;
 }

</style>
<div class="header" style="margin-left:10%;color: orange; width: 70%; text-align: center; background:  #f2f2f2;height: 10%;">YOUR CLIENTS</div>
<table style="margin-left:10%;font-size: 9px;font-family: sans-serif;color: green; width: 70%;margin-top: 5%;">
  <thead style="background-color: orange;">
    <tr>
      <th>Count</th>
       <th>Email Address</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th> Phone Number</th>
      <th> Physical Address </th>
       
       <th colspan="2"><input type="button" name="save" value="+ ADD"  class="btn btn-primary"data-toggle="modal" data-target="#exampleModal"></th>
          </tr>
        </thead>
        <?php while ($row=mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $count++ ?></td>
             <td><?php echo $row['email_address']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
             <td><?php echo $row['last_name']; ?></td>
              <td><?php echo $row['phone_number']; ?></td>
               <td><?php echo $row['physical_address']; ?></td>
               
                     
               <td><a href="location1.php?service_Id=<?php echo $row['email_address'];?>" class= "edit-btn"> <img src="icons/icon_content_small.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a></td>
               <td><a href="deletecustomer.php?service_Id=<?php echo $row['email_address'];?>" class= "edit-btn"> <img src="icons/action_delete.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a></td>
             </tr>
           <?php }?>
      
</table>
<!--?php
    $category_query = "SELECT * FROM category";
    $categories = $crud->getData($category_query);                                      
?>--> 



    





      
      

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