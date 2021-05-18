<?php
session_start();

//include 'static.php';
  $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
  $query= mysqli_query($db, "select count(*) as total from project");
$result1 = mysqli_fetch_array($query);



$count = ($result1['total']+1 );
  //initilalize variables
  $count_id=0;
  $project_id="P0087".$count;
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
     $status=$_POST['status'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $category_id_query=mysqli_query ($db,"SELECT * FROM project_type where category='$category'");
     while($row = mysqli_fetch_array($category_id_query)) { 
   
           $category_id=$row['category_id'];
           }
    /* $address_id_query=mysqli_query ($db,"SELECT * FROM address where adress='$adress'");
   
            while($row = mysqli_fetch_array($address_id_query)) { 
   
           $address_id=$row['address_id'];
           }*/
         
     move_uploaded_file($image_tmp,"C:\\wamp\\www\\dun3\\images\\$image");
    

    $user=mysqli_query($db,"INSERT INTO project(project_id,category_id,project_name,  start_date,end_date,status,profile_pic,description) VALUES ('$project_id','$category_id','$project_name','$end_date','$start_date','$status','$image','$description' )") or die(mysqli_error($db));
    

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
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/min.css">
    <link rel="stylesheet" href="css/add.css">

  <title></title>
</head>
<body>


 <?php if(isset($_session['message'])): ?>
 <div class ='msg'>
  <?php
  echo $_session['message'];
  unset($_session['message']);
  ?>
  <img src="../public/images/icon_success1.gif" alt="image" class="photo">
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
  background-color: #FF7435;
 }
 tr:nth-child(odd):hover{
  background-color: #FF7435;
 }

</style>
<div class="header" >YOUR PROJECTS</div>
<div class="print_content" name="print_content" id="print_content" style="">
<span class="search-sect"style="">
                <input type="text" name="searchbar" onkeyup="myFunction()" id="searchbar" class="searchbar " placeholder="Search By ID" >
                <a href="javascript:Clickheretoprint()" style="text-decoration: none;"> Print</a>
                
        </span><br>
        <!-- style="margin-left:15%;font-size: 9px;font-family: sans-serif;color: black; width: 70%;margin-top: 5%;" -->
<table id="myTable" class="myTable">
  <thead style="background-color: #FF7435;">
    <tr>
     
       <th>project Id</th>
      <th>Project Name</th>
      <th>Description</th>
      <th> Date Started</th>
      <th> Date Ended </th>
        <th> Category_id </th>
          <th> Image </th>
       <th colspan="2"><input type="button" name="save" value="+ ADD"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background: orange; color: black; border: 1px solid grey;"></th>
          </tr>
        </thead>
        <?php while ($row=mysqli_fetch_array($result)){
          ?>
          <tr>
            
             <td><?php echo $row['count_id']; ?></td>
            <td><?php echo $row['project_name']; ?></td>
             <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['start_date']; ?></td>
               <td><?php echo $row['end_date']; ?></td>
                 <td><?php echo $row['category_id']; ?></td>
                     <td><div class="el-card-item"style="box-shadow: 0px 1px 5px #bbbbbb;">
                    <div class="el-card-avatar el-overlay-1"><a href="editProfile.php?service_Id=<?php echo $row['count_id'];?>" class= "edit-btn"> <img  style="width: 100px; height: 80px; " src="http://localhost/dun3//images/<?php echo $row['profile_pic'];?>" /></a></div></div></td>
               <td><a href="EditProject.php?edit=<?php echo $row['count_id'];?>" class= "edit-btn"> <img src="icons/icon_content_small.gif" alt="image" class="photo" style="width: 30px; height: 30px; border-radius: 300px; margin-top: 1px;"></a></td>
               <td><a href="deleteProject.php?count_id=<?php echo $row['count_id'];?>" class= "edit-btn"> <img src="icons/action_delete.gif" alt="image" class="photo" style="width: 30px; height: 30px; margin-top: 1px;"></a></td>
             </tr>
           <?php }?>
      
</table>
</div> 



    




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrolable" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Project</h5 style="color: green;" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     <form name="addcomment" class="form-horizontal" enctype="multipart/form-data" method="post" action="addproject.php" style="width: 100%;display: block;text-align: ;">
        <div class="form-group" style="margin-left: 25%;">
            <label class="control-label col-md-5"> Project Name</label><br>
            <div class="col-md-9">
                <input type="text" name="project_name" class="form-control" required>
            </div>
          </div>

             <div class="form-group"style="margin-left: 25%;">
            <label class="control-label col-md-3"></label><br>
            <div class="col-md-9">
        <textarea rows=5 cols=10 type="textarea" name="description" class="form-control" required >Describe your project</textarea> <br>    
            </div>
        </div>
           <div class="form-group" style="margin-left: 25%;">
            <label class="control-label col-md-3"> Date Started</label><br>
            <div class="col-md-9">
                <input type="date" name="start_date" class="form-control" required>
            </div>
          </div>
          <div class="form-group" style="margin-left: 25%;">
            <label class="control-label col-md-3"> Date Ended</label><br>
            <div class="col-md-9">
                <input type="date" name="end_date" class="form-control" required>
            </div>
          </div>
             
       
       <div class="form-group" style="margin-left: 25%;">
            <label class="control-label col-md-3">Select Project Type</label>
            <div class="col-md-9">
                <select name="category" class="form-control"required >
                      
                        <?php while($row = mysqli_fetch_array($category_query))  {?>
                       <option><?php echo $row['category'] ?></option>
                       <!--?php endforeach; ?>-->
                       <?php }?>
                       <option>Others</option>
                   </select>
            
        </div>
         </div>
         <div class="form-group" style="margin-left: 25%;">
            <label class="control-label col-md-3">Select status</label>
            <div class="col-md-9">
                <select name="status" class="form-control"required >
                      
                        
                       <option>finished</option>
                       <option>ongoing</option>
                       <option>Active</option>
                   
                       
                       <option>ongoing</option>
                   </select>
            
        </div>
         </div>
           
            
       <div class="form-group"style="margin-left: 25%;">
            <label class="control-label col-md-3">Good Profile</label>
            <div class="col-md-9">
                <input type="file" name="image" class="form-control" >
            </div>
        </div>
        <div class="form-group" style="margin-left: 10%;margin-top: 2%;">
            <label class="control-label col-md-3">&nbsp;</label><br>
            <div class="col-md-9">
                <input type="submit" name="save" value="Add Project"  class="btn btn-primary"style="margin-top: 2%;margin-left: 30%;"> 
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
      
      
<script type="text/javascript">
    const email_address = document.querySelector('#email_address');
   email_address.addEventListener('focus', () => {
      navigator.geolocation.getCurrentPosition(function(position) {
      let lat = position.coords.latitude;
      let long = position.coords.longitude;
      address1.value = ` ${lat}`;
       address2.value = `${long}`;
    });
    })
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