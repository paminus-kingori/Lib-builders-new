<?php
session_start();


  $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
  
  //initilalize variables
  $count_id=0;
  $article_id="P0087";
  $description="";
  $image="";
  $title="";
  $category_id="";
  $status="";
  $image_tmp="";
  $date_published="";
  $source_name="";
 

  
  $update= false;
  if(isset($_POST['save'])){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $date_published=$_POST['date_published'];
    $source_name=$_POST['source_name'];
    
     $image = $_FILES['image']['name'];
     $status=$_POST['status'];
     $subject=$_POST['subject'];
    $image_tmp = $_FILES['image']['tmp_name'];
    
    /* $address_id_query=mysqli_query ($db,"SELECT * FROM address where adress='$adress'");
   
            while($row = mysqli_fetch_array($address_id_query)) { 
   
           $address_id=$row['address_id'];
           }*/
         
     move_uploaded_file($image_tmp,"C:\\wamp\\www\\dun3\\images\\$image");
    

    $user=mysqli_query($db,"INSERT INTO article(article_id,title,subject, date_published,status,profile_pic,description,source_name) VALUES ('$article_id','$title','$subject','$date_published','$status','$image','$description', '$source_name' )") or die(mysqli_error($db));
    

    $_session['message']="article created successfully.";
  
           
    //header('location:home.php');
   }
?>




<!DOCTYPE html>
<html>
<head>

  <!-- <link rel="stylesheet" href="../css/mountainn.css"> -->
   <link rel="stylesheet" href="../css/styles1.css">
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/min.css">
  <title></title>
</head>
<body style="background-color: white;">


 <?php if(isset($_session['message'])): ?>
 <div class ='msg' style="width: 70%; margin-left: 10%; text-align: center;">
  <?php
  echo $_session['message'];
  unset($_session['message']);
  ?>
  <img src="public/images/icon_success1.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;">
</div>

<?php endif ?>
<?php 
$count = 1;
$result=mysqli_query($db,"SELECT *FROM admin"); ?>
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

<div class="header" style="margin-left:15%;color: orange; width: 70%; text-align: center; background: grey;height: 5%;">ADMINS</div>
<div class="print_content" name="print_content" id="print_content" style="border:1px solid #6c757d;width: 75%;margin-left: 12%;margin-top: 3%;padding:5px;">
<span class="search-sect"style="position: right;margin-left: 55%;box-shadow: none;border:1px solid grey;margin-top: 5px;">
                <input type="text" name="searchbar" onkeyup="myFunction()" id="searchbar" class="searchbar " placeholder="Search By ID" >
                <a href="javascript:Clickheretoprint()" style="text-decoration: none;"> Print</a>
                
        </span><br>
<table id="myTable" style="margin-left:15%;font-size: 9px;font-family: sans-serif;color: black; width: 70%;margin-top: 2px;">
  <thead style="background-color: orange;">
    <tr>
    
       <th>Username</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th> Role</th>
     
          <th> Image </th>
       <th colspan="2"><input type="button" name="save" value="+ ADD"  class="btn btn-warning"data-toggle="modal" data-target="#exampleModal"></th>
          </tr>
        </thead>
        <?php while ($row=mysqli_fetch_array($result)){
          ?>
          <tr>
            
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
             <td><?php echo $row['first_name']; ?></td>
              <td><?php echo $row['role']; ?></td>
               
                
                     <td><div class="el-card-item"style="box-shadow: 0px 1px 5px #bbbbbb;">
                    <div class="el-card-avatar el-overlay-1"><a href="EditAdminProfile.php?service_Id=<?php echo $row['username'];?>" class= "edit-btn"> <img  style="width:30px; height: 20px; " src="http://localhost/dun3//images/<?php echo $row['profile_pic'];?>" /></a></div></div></td>
               <td><a href="EditAdmin.php?edit=<?php echo $row['username'];?>" class= "edit-btn"> <img src="icons/icon_content_small.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a></td>
               <td><a href="deleteAdmin.php?service_Id=<?php echo $row['username'];?>" class= "edit-btn"> <img src="icons/action_delete.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a></td>
             </tr>
           <?php }?>
      
</table>
</div>
<!--?php
    $category_query = "SELECT * FROM category";
    $categories = $crud->getData($category_query);                                      
?>--> 



    




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrolable" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5 style="color: green;" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     <form name="addadmin" class="form-horizontal" enctype="multipart/form-data" method="post" action="addAdminExec.php" style="width: 100%; display: block; text-align:left;margin-left: 11%;">
        <div class="form-group">
            <label class="control-label col-md-3"> Enter firstname</label><br>
             <div class="col-md-9">
             <input type="text" name="first_name" class="form-control" style="width: 100%;">
           
            </div>
          </div>

             
           <div class="form-group">
            <label class="control-label col-md-3">last name</label><br>
             <div class="col-md-9">
             <input type="text" name="last_name" class="form-control" tyle="width: 100%;">
           
               
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">username</label><br>
            <div class="col-md-9">
                <input type="text" name="username" class="form-control" s>
            </div>
          </div>
           
             
       
      
         <div class="form-group">
            <label class="control-label col-md-3">Role</label>
            <div class="col-md-9">
                <select name="role" class="form-control">
                      
                        
                       <option>SuperAdmin</option>
                       <option>Admin</option>
                       
                   
                       
                       
                   </select>
            
        </div>
         </div>
          <div class="form-group">
            <label class="control-label col-md-3">Password</label><br>
            <div class="col-md-9">
                <input type="password" name="password" class="form-control">
            </div>
          </div>
           <div class="form-group">
            <label class="control-label col-md-3">Confirm Password</label><br>
            <div class="col-md-9">
                <input type="password" name="password1" class="form-control" >
            </div>
          </div>
           <div class="form-group">
            
       <div class="form-group">
            <label class="control-label col-md-3">Good Profile</label>
            <div class="col-md-9">
                <input type="file" name="image" class="form-control" >
            </div>
        </div>
        <div class="form-group" style="margin-left: 10%;margin-top: 2%;">
            <label class="control-label col-md-3">&nbsp;</label><br>
            <div class="col-md-9">
                <input type="submit" name="save" value="ADD ADMIN"  class="btn btn-warning"style="margin-top: 2%; background: orange;"> 
            </div>
        </div>
    </form>

    <style type="text/css">
      
      input{

      }
    </style>
</div>
</div>
</div>
</div>
      
      
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

function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=1000, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Transaction Printed Report</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
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