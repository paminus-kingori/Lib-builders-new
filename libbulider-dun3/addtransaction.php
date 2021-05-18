 <?php
session_start();

//include 'static.php';
  $con = mysqli_connect('localhost', 'root', '', 'libbuilder');
  $query= mysqli_query($con, "select count(*) as total from transaction");
$result1 = mysqli_fetch_array($query);



$count = ($result1['total']+1 );
$today=date("jY",time());
  //initilalize variables
  
  //initilalize variables
  $first_name="";
  $last_name="";
  $email_address="";
  $physical_address="";
  $phone_number="";
  $physical_address="";
  $quantity="";
  $Latitude="";
  $Longitude="";
  $order_date="";
  $status='complete';
  $code = rand(1000, 9999);
  $transaction_id= $today.$code.$count;
  $transaction_number= 'N'.$today.$count;
 

  
  $update= false;
  if(isset($_POST['save'])){
    $first_name=$_POST['first_name'];
     $last_name=$_POST['last_name'];
      $email_address=$_POST['email_address'];
    $physical_address=$_POST['physical_address'];
   
     $material_name=$_POST['material_name'];
     $quantity=$_POST['quantity'];
     $transaction_date=$_POST['transaction_date'];
     $latitude=$_POST['address1'];
      $longitude=$_POST['address2'];
      $phone_number=$_POST['phone_number'];
 $category_id_query=mysqli_query ($con,"SELECT * FROM material where material_name='$material_name'")or die(mysqli_error($con));
     while($row = mysqli_fetch_array($category_id_query)) { 
   
           $material_id=$row['rawmat_id'];
           $material_name=$row['rawmat_id'];
           $price=$row['unit_price'];
           }
       
    $total_price= $price*$_POST['quantity'];
 $order1=mysqli_query($con,"INSERT INTO transaction(transaction_id,rawcust_id, rawmat_id,transaction_number,transaction_date,quantity,total_price, status) VALUES ('$transaction_id','$email_address','$material_id' ,'$transaction_number','$transaction_date','$quantity','$total_price', '$status')");
     $order2=mysqli_query($con,"INSERT INTO customer(email_address, phone_number,first_name,last_name,physical_address,latitude,longitude) VALUES ('$email_address','$phone_number','$first_name' ,'$last_name','$physical_address', '$Latitude','$Longitude')");
      $order3=mysqli_query( $con,"UPDATE myorder SET status='complete' WHERE email_address = '$email_address'");
    $order4=mysqli_query( $con,"UPDATE material SET quantity=quantity-1 WHERE rawmat_id = '$material_id'")or die(mysqli_error($con));
    if($order1=true and $order2=true and $order3=true and $order4=true){
   
    echo "<div class='alert alert-success tex-center' style='width: 30%; margin-left: 34%;margin-top: 5%;text-align:center; background-color:#dff0d8;color:#3c763d;'>The Transaction completed successfully<br> A receipt has been send to the Email address provided.<img src='icons/action_check.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br> <a href='addtransaction.php'>Home</a></div>
                ";
  }

 
  
           
    //header('location:home.php');
   }
?>
<?php
    $category_query=mysqli_query ($con,"SELECT * FROM material");
    
    

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
   <style>
      .error{
        color: #ff726f;
      }
      .success{
        color: #90ee90;
      }
    </style>
</head>
<body style="background-color: white;">


 <?php if(isset($_session['message'])): ?>
 <div class ='msg' style="width: 70%; margin-left: 10%; text-align: center;">
  <?php
  echo $_session['message'];
  unset($_session['message']);
  ?>
  <img src="icons/icon_success1.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;">
</div>

<?php endif ?>
<?php 
$count = 1;
$result=mysqli_query($con,"SELECT *FROM transaction"); ?>
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
<div class="header" style="margin-left:15%;color: orange; width: 70%; text-align: center; background: grey;height: 5%;">YOUR TRANSACTIONS</div>
<div class="print_content" name="print_content" id="print_content" style="border:1px solid ;width: 90%;margin-left: 9%;margin-top: 3%;padding:5px;">
<span class="search-sect"style="position: right;margin-left: 55%;box-shadow: none;border:1px solid grey;margin-top: 5px;">
                <input type="text" name="searchbar" onkeyup="myFunction()" id="searchbar" class="searchbar " placeholder="Search By ID" >
                <a href="javascript:Clickheretoprint()" style="text-decoration: none;"> Print</a>
                
        </span><br>
<table  id="myTable" style="margin-left:5%;font-size: 9px;font-family: sans-serif;color: black; width: 90%;margin-top: 5%;">
  <thead style="background-color: orange;">
    <tr style="font-weight: bold;">
     
      
      <th>Transaction_id</th>
      <th>Customer Id</th>
      <th> Transaction_number</th>
      <th> Date Of Transaction </th>
     
        <th> Total PAID</th>
         <th> Balance </th>
          <th> Status </th>
          <th> Transactied at</th>
       <th colspan="1"><input type="button" name="save" value="+ ADD"  class="btn btn-primary"data-toggle="modal" data-target="#exampleModal"></th>
          </tr>
        </thead>
        <?php while ($row=mysqli_fetch_array($result)){
          ?>
          <tr>
            
            
            <td><?php echo $row['transaction_id']; ?></td>
            <td><?php echo $row['rawcust_id']; ?></td>
            <td><?php echo $row['transaction_number']; ?></td>
            <td><?php echo $row['transaction_date']; ?></td>
             <td><?php echo $row['total_price']; ?></td>
               <td><?php echo $row['balance']; ?></td>
                 <td><?php echo $row['status']; ?></td>
                  <td><?php echo $row['transacted_at']; ?></td>
              
               <td><a href="deletetransaction.php?service_Id=<?php echo $row['rawtra_id'];?>" class= "edit-btn"> <img src="icons/action_delete.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a></td>
             </tr>
           <?php }?>
      
</table>


</div>

    




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrolable" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Transaction</h5 style="color: green;" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     <form name="addequipment" class="form-horizontal" enctype="multipart/form-data" method="post" action="addtransaction.php" style="width: 100%;display: block;justify-content: none;">

        


             
           <div class="form-group">
            <label class="control-label col-md-3">quantity</label><br>
            <div class="col-md-9">
                <input type="number" name="quantity" class="form-control" required>
            </div>
          </div>
          
             
       
       <div class="form-group">
            <label class="control-label col-md-3">material</label>
            <div class="col-md-9">
                <select name="material_name" class="form-control"required >
                      
                        <?php while($row = mysqli_fetch_array($category_query))  {?>
                       <option><?php echo $row['material_name'] ?></option>
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
            <label class="control-label col-md-5"> Your Email Address</label><br>
            <div class="col-md-9">
               <input type='text' id='email_address' name='email_address' placeholder='Enter your email..' required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-5"> First Name</label><br>
            <div class="col-md-9">
                <input type='text' id='first_name' name='first_name' placeholder='Enter your first name..'required style='background:; border-radius:5px;margin_left:10%;'>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-5">Last Name</label><br>
            <div class="col-md-9">
                 <input type='text' name='last_name' placeholder='Enter your last name.'>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-5"> Phone Number</label><br>
            <div class="col-md-9">
                 <input type='number'  name='phone_number' placeholder='Enter your phone number..'>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-5"> Today</label><br>
            <div class="col-md-9">
                 <input type='date' name='transaction_date' placeholder='Enter todays day'>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-5"> Physical Address</label><br>
            <div class="col-md-9">
                <input type='text' name='physical_address' placeholder='Enter your physical_address.' required>
            </div>
          </div>
           <div class="form-group">
           <label class="control-label col-md-5"> Latitude</label><br>
            <div class="col-md-9">
                <input type='text' id='address1' name='address1'  >
            </div>
          </div>
           
           <div class="form-group">
           <label class="control-label col-md-5"> Longitude</label><br>
            <div class="col-md-9">
                 <input type='text' id='address2' name='address2' >
            </div>
          </div>
       
<div class="form-group" style="margin-left: 10%;margin-top: 2%;">
            <label class="control-label col-md-3">&nbsp;</label><br>
            <div class="col-md-9">
                <input type="submit" name="save" value="Add Transaction"  class="btn btn-primary"style="margin-top: 2%;"> 
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