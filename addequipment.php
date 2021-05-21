 <?php
session_start();


  $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
  $query= mysqli_query($db, "select count(*) as total from equipment");
$result1 = mysqli_fetch_array($query);



$count = ($result1['total']+1 );
  //initilalize variables
  $rawequ_id=0;
  $equipment_id="P0087".$count;
  $quantity="";
  $unit_price="";
  $description="";
  $image="";
  $category="";
  $category_id="";
  $status="";
  $image_tmp="";
  
 

  
  $update= false;
  if(isset($_POST['save'])){
    $equipment_name=$_POST['equipment_name'];
     $quantity=$_POST['quantity'];
      $unit_price=$_POST['unit_price'];
    $description=$_POST['description'];
    $category=$_POST['category'];
     $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $category_id_query=mysqli_query ($db,"SELECT * FROM equipment_type where category='$category'");
     while($row = mysqli_fetch_array($category_id_query)) { 
   
           $category_id=$row['category_id'];
           }
    /* $address_id_query=mysqli_query ($db,"SELECT * FROM address where adress='$adress'");
   
            while($row = mysqli_fetch_array($address_id_query)) { 
   
           $address_id=$row['address_id'];
           }*/
         
     move_uploaded_file($image_tmp,"C:\\wamp\\www\\dun3\\images\\$image");
    

    $user=mysqli_query($db,"INSERT INTO equipment(equipment_id,equipment_name, quantity,unit_price,category_id,profile_pic,description) VALUES ('$equipment_id','$equipment_name','$quantity','$unit_price', '$category_id','$image','$description' )") or die(mysqli_error($db));
    

    $_session['message']="service created successfully.";
  
           
    //header('location:home.php');
   }
?>
<?php
    $category_query=mysqli_query ($db,"SELECT * FROM equipment_type");
    
    

?> 



<!DOCTYPE html>
<html>
<head>

  <!-- <link rel="stylesheet" href="../css/mountainn.css"> -->
   <link rel="stylesheet" href="../css/styles1.css">
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/add.css">

  <title></title>
</head>
<body style="background-color: white;">


 <?php if(isset($_session['message'])): ?>
 <div class ='msg' style="">
  <?php
  echo $_session['message'];
  unset($_session['message']);
  ?>
  <img src="icons/check_action.gif" alt="image" class="photo" style="">
</div>

<?php endif ?>
<?php 
$count = 1;
$result=mysqli_query($db,"SELECT *FROM equipment"); ?>
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
<div class="print_content" name="print_content" id="print_content">
<div class="header" style="">YOUR Equipments</div>
<span class="search-sect"style="">
                <input type="text" name="searchbar" onkeyup="myFunction()" id="searchbar" class="searchbar " placeholder="Search By ID" >
                <a href="javascript:Clickheretoprint()" style="text-decoration: none;"> Print</a>
                
        </span><br>
<table style="" name="myTable" id="myTable">
  <thead style="">
    <tr>
     
       <th>Equpment Id</th>
         <th>Count</th>
      <th>Equipment Name</th>
      <th>Quanrity</th>
      <th> Unit Price</th>
      <th> Description </th>
        <th> Category_id </th>
          <th> Image </th>
       <th colspan="2"><input type="button" name="save" value="+ ADD"  class="btn btn-primary"data-toggle="modal" data-target="#exampleModal" style="background: orange;color: black; border: 1px solid grey;"></th>
          </tr>
        </thead>
        <?php while ($row=mysqli_fetch_array($result)){
          ?>
          <tr>
           
             <td><?php echo $row['rawequ_id']; ?></td>
              <td><?php echo $count++ ?></td>
            <td><?php echo $row['equipment_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['unit_price']; ?></td>
             <td><?php echo $row['description']; ?></td>
              
                 <td><?php echo $row['category_id']; ?></td>
                     <td><div class="el-card-item"style="box-shadow: 0px 1px 5px #bbbbbb;">
                    <div class="el-card-avatar el-overlay-1"><a href="editEprofile.php?service_Id=<?php echo $row['rawequ_id'];?>" class= "edit-btn"> <img  style="width:50px; height: 40px; " src="http://localhost/dun3//images/<?php echo $row['profile_pic'];?>" /></a></div></div></td>
               <td><a href="EditEquipment.php?edit=<?php echo $row['rawequ_id'];?>" class= "edit-btn"> <img src="icons/icon_content_small.gif" alt="image" class="photo" style="width: 30px; height: 30px;border-radius: 300px; margin-top: 1px;"></a></td>
               <td><a href="deleteEquipment.php?service_Id=<?php echo $row['rawequ_id'];?>" class= "edit-btn"> <img src="icons/action_delete.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a></td>
             </tr>
           <?php }?>
      
</table>
<!--?php
    $category_query = "SELECT * FROM category";
    $categories = $crud->getData($category_query);                                      
?>--> 



    
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrolable" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Equipment</h5 style="color: green;" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     <form name="addequipment" class="form-horizontal" enctype="multipart/form-data" method="post" action="addequipment.php" style="width: 100%;display: flex;justify-content: space-between;">
        <div class="form-group">
            <label class="control-label col-md-5">Equipment Name</label><br>
            <div class="col-md-9">
                <input type="text" name="equipment_name" class="form-control" required>
            </div>
          </div>

             <div class="form-group">
            <label class="control-label col-md-3"></label><br>
            <div class="col-md-9">
        <textarea rows=5 cols=10 type="textarea" name="description" class="form-control" required >Describe your Equipment</textarea> <br>    
            </div>
        </div>
           <div class="form-group">
            <label class="control-label col-md-3">How many</label><br>
            <div class="col-md-9">
                <input type="number" name="quantity" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Unit Price</label><br>
            <div class="col-md-9">
                <input type="number" name="unit_price" class="form-control" required>
            </div>
          </div>
             
       
       <div class="form-group">
            <label class="control-label col-md-3">Select Equipment Type</label>
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
         <!--div class="form-group">
            <label class="control-label col-md-3">Select status</label>
            <div class="col-md-9">
                <select name="category" class="form-control"required >
                      
                        
                       <option>finished</option>
                       <option>ongoing</option>
                       <option>unfinished</option>
                   
                       
                       <option>ongoing</option>
                   </select>
            
        </div>
         </div>-->
           <div class="form-group">
            
       <div class="form-group">
            <label class="control-label col-md-3">Equipment Profile</label>
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