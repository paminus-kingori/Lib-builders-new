<?php
session_start();

//include 'static.php';
  $db = mysqli_connect('localhost', 'root', '', 'libbuider');
  
  //initilalize variables
  $count_id=0;
  $project_id="P0087";
  $description="";
  $image="";
  $category="";
  $category_id="";
  $status="";
  $image_tmp="";
  $start_date="";
  $end_date="";
 

  
  $update= false;
  if(isset($_POST['save'])){
    $project_name=$_POST['project_name'];
    $description=$_POST['description'];
    $end_date=$_POST['end_date'];
    $start_date=$_POST['start_date'];
    $category=$_POST['category'];
     $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $category_id_query=mysqli_query ($db,"SELECT * FROM project_type where category='$category'");
     while($row = mysqli_fetch_array($category_id_query)) { 
   
           $service_category_id=$row['category_id'];
           }
    /* $address_id_query=mysqli_query ($db,"SELECT * FROM address where adress='$adress'");
   
            while($row = mysqli_fetch_array($address_id_query)) { 
   
           $address_id=$row['address_id'];
           }*/
         
     move_uploaded_file($image_tmp,"C:\\wamp\\www\\libbuilder\\images\\$image");
    

    $user=mysqli_query($db,"INSERT INTO project(project_name,project_id description,category_id,start_date, end_date,status,profile_pic) VALUES ('$project_name','$project_id',$description','$category_id','$end_date','$start_date','$status'$image' )") or die(mysqli_error($db));
    

    $_session['message']="service created successfully.";
  
           
    //header('location:home.php');
   }
?>
<?php
    $category_query=mysqli_query ($db,"SELECT * FROM project_type");
    
    

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
 <div class ='msg'>
  <?php
  echo $_session['message'];
  unset($_session['message']);
  ?>
  <img src="../public/images/icon_success1.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;">
</div>

<?php endif ?>
<?php 
$count = 1;
$result=mysqli_query($db,"SELECT *FROM project"); ?>
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
<table style="margin-left: 25%;font-size: 9px;font-family: sans-serif;color: green;">
  <thead style="background-color: orange;">
    <tr>
      <th>Count</th>
       <th>project Id</th>
      <th>Project Name</th>
      <th>Description</th>
      <th> Date Started</th>
      <th> Date Ended </th>
        <th> Category_id </th>
          <th> Image </th>
       <th colspan="2">ACTION</th>
          </tr>
        </thead>
        <?php while ($row=mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $count++ ?></td>
             <td><?php echo $row['count_id']; ?></td>
            <td><?php echo $row['project_name']; ?></td>
             <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['start_date']; ?></td>
               <td><?php echo $row['end_date']; ?></td>
                 <td><?php echo $row['category_id']; ?></td>
                     <td><div class="el-card-item"style="box-shadow: 0px 1px 5px #bbbbbb;">
                    <div class="el-card-avatar el-overlay-1"><a href="../components/editProfile.php?service_Id=<?php echo $row['service_Id'];?>" class= "edit-btn"> <img  style="width:30px; height: 20px; " src="http://localhost/ProjectTour/public/images/<?php echo $row['image'];?>" /></a></div></div></td>
               <td><a href="EditServices.php?edit=<?php echo $row['service_Id'];?>" class= "edit-btn"> <img src="../public/images/icon_content_small.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a></td>
               <td><a href="deleteService.php?service_Id=<?php echo $row['service_Id'];?>" class= "edit-btn"> <img src="../public/images/action_delete.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a></td>
             </tr>
           <?php }?>
      
</table>
<!--?php
    $category_query = "SELECT * FROM category";
    $categories = $crud->getData($category_query);                                      
?>--> 



    

<input type="button" name="save" value="Add Service launch"  class="btn btn-primary"data-toggle="modal" data-target="#exampleModal"> 


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Project</h5 style="color: green;" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     <form name="addcomment" class="form-horizontal" enctype="multipart/form-data" method="post" action="addproject.php" style="width: 100%;display: flex;justify-content: space-between;">
        <div class="form-group">
            <label class="control-label col-md-5"> Service_tag</label><br>
            <div class="col-md-9">
                <input type="text" name="project_name" class="form-control" required>
            </div>
          </div>

             <div class="form-group">
            <label class="control-label col-md-3"></label><br>
            <div class="col-md-9">
        <textarea rows=5 cols=10 type="textarea" name="description" class="form-control" required >Describe your service</textarea> <br>    
            </div>
        </div>
           <div class="form-group">
            <label class="control-label col-md-3"> Date Started</label><br>
            <div class="col-md-9">
                <input type="date" name="start_date" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"> Date Ended</label><br>
            <div class="col-md-9">
                <input type="date" name="end_date" class="form-control" required>
            </div>
          </div>
             
       
       <div class="form-group">
            <label class="control-label col-md-3">Select Project Type</label>
            <div class="col-md-9">
                <select name="service_category" class="form-control"required >
                      
                        <?php while($row = mysqli_fetch_array($category_query))  {?>
                       <option><?php echo $row['category'] ?></option>
                       <!--?php endforeach; ?>-->
                       <?php }?>
                       <option>Others</option>
                   </select>
            
        </div>
         </div>
         <div class="form-group">
            <label class="control-label col-md-3">Select status</label>
            <div class="col-md-9">
                <select name="service_category" class="form-control"required >
                      
                        
                       <option>finished</option>
                       <option>ongoing</option>
                       <option>unfinished</option>
                   
                       
                       <option>ongoing</option>
                   </select>
            
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
                <input type="submit" name="save" value="Add Service"  class="btn btn-primary"style="margin-top: 2%;"> 
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
      
      

  <!-- scripts -->
   <script type="text/javascript" src="../add/js/jquery.min.js"></script>
   <script type="text/javascript" src="../add/js/popper.min.js"></script>
    <script type="text/javascript" src="../add/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../add/js/mdb.min.js"></script>
    <script type="text/javascript" src="../add/js/app.js"></script>




</body>
</html>
<?php

include 'footer.php';
?>