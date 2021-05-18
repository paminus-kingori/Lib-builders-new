<?php
session_start();


  $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
  $query5 = mysqli_query($db, "select count(status) as total from comment where status='UNREAD'");
$result5 = mysqli_fetch_array($query5);
   //header('location:home.php');
   
?>



<!DOCTYPE html>
<html>
<head>

  <!-- <link rel="stylesheet" href="../css/mountainn.css"> -->
   <link rel="stylesheet" href="../css/styles1.css">
 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/home.css">
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
$result=mysqli_query($db,"SELECT *FROM comment where status='UNREAD'"); ?>
<style type="text/css">
  tr:nth-child(even){
  background-color: #f2f2f2;
  border-bottom: 1px solid  #f2f2f2;
 }
 tr:nth-child(even):hover{
  background-color: orange;
 }
 tr:nth-child(odd):hover{
  background-color: orange;
 }

</style>
<div class="header" style="margin-left:10%;color: orange; width: 70%; text-align: center; background:  #f2f2f2;height: 10%;">NEW MESSAGES</div>
<div class="container" style="border:1px solid grey; width: 75%;margin-left:10%;padding:5px;border-radius: 5px;margin-top: 5%;">
<table id="myTable"style="margin-left:10%;font-size: 9px;font-family: sans-serif;color: black; width: 70%;margin-top: 5%;text-align: center;border: 1px solid  #f2f2f2;">
  <small style="margin-left: 20%; font-size: 12px;color: green;"> <?php echo $result5['total'];?> Unread messages</small>
        <?php while ($row=mysqli_fetch_array($result)){
          ?>
         
            <p style="margin-left:10%;color: orange; width: 70%; text-align: center; background:  ;height: 10%;dispaly:block;justify-content: space-between; border-bottom: 1px solid black;"><a href="DeleteAll.php"> <img src="icons/trash.svg" alt="project" class="icon" style="align-self: left;"></a><small  style=";font-size: 9px;color: red;">Delete All</small><small style="margin-left: 10%;font-size: 9px;color: red;"><a href="markAll.php"><img src="icons/envelope-open.svg" alt="project" class="icon" style="color: red;margin-left: ; "></a>Mark all as Read</small> </p>
             <span class="search-sect"style="position: right;margin-left: 57%;box-shadow: none;border:1px solid grey;">
                <input type="text" name="searchbar" onkeyup="myFunction()" id="searchbar" class="searchbar " placeholder="search by email" >
                </span>
             
            <td> <b><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></b>: wrote a below<br><b>SUBJECT: </b><?php echo $row['subject']; ?><br><b>Description: </b> <?php echo $row['description']; ?></td>
              <td style="text-align: left;">  <a href="../<?php  $row['email_address']; ?>" style='text-decoration: none; color: blue;'><?php echo $row['email_address']; ?></a>  /<?php echo $row['phone_number']; ?> </td>
             <td><?php echo $row['commented_at']; ?></td>
              
               
                     
               
               <td><a href="deletecomment.php?service_Id=<?php echo $row['count_id'];?>" class= "edit-btn" style="text-decoration: none;"> <b style="color: red;">DELETE</b></a></td>
               <td><a href="markasread.php?service_Id=<?php echo $row['count_id'];?>" class= "edit-btn" style="text-decoration: none;"><b style="color: black;">mark as Read</b></a></td>
             </tr>
           <?php }?>
      
</table>
</div>
<!--?php
    $category_query = "SELECT * FROM category";
    $categories = $crud->getData($category_query);                                      
?>--> 



    





      
    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchbar");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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