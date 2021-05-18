
<?php 

 $con = mysqli_connect('localhost', 'root', '', 'libbuilder');



?>
<!DOCTYPE html>
<html>
<head>

  <!-- <link rel="stylesheet" href="../css/mountainn.css"> -->
   <link rel="stylesheet" href="../css/styles1.css">
 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

$result=mysqli_query($con,"SELECT * FROM myorder "); ?>
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
<div class="header" style="margin-left:10%;color: orange; width: 70%; text-align: center; background: grey;height: 5%;">YOUR ACTIVE ORDERS</div>
<div class="print_content" name="print_content" id="print_content" style="border:1px solid ;width: 90%;margin-left: 3%;margin-top: 3%;padding:5px;">
<span class="search-sect"style="position: right;margin-left: 55%;box-shadow: none;border:1px solid grey;margin-top: 5px;">
                <input type="text" name="searchbar" onkeyup="myFunction()" id="searchbar" class="searchbar " placeholder="Search By ID" >
                <a href="javascript:Clickheretoprint()" style="text-decoration: none;"> Print</a>
                
        </span><br>
<table id="myTable" style="margin-left:10%;font-size: 9px;font-family: sans-serif;color: black; width: 70%;margin-top: 5%;">
  <thead style="background-color: orange;">
    <tr>
      
      <th>ORDER_id</th>
      <th>Customer Id</th>
      <th> Transaction_number</th>
      <th> Date Of ORDER </th>
        <th> Amount to pay</th>
         <th> Balance</th>
          <th> Status </th>
         
       <th colspan="2">Action</th>
          </tr>
        </thead>
        <?php while ($row=mysqli_fetch_array($result)){
          ?>
          <?php 
          $price=$row['total_price'];
          $paid=$row['paid'];
          $balance=$price-$paid;
          $id=$row['raword_id'];
           if(isset($_POST[ 'complete'])){
          $price=$_POST['price'];
          if(empty($_POST['price'])){
            $price=$row['paid'];
          }
    
   }

   if(!isset($_POST['complete'])){
    $price=$price;
   } ?>
          <tr>
            <!--td><?php echo $count++?></td>
             <td><?php echo $row['raword_id']; ?></td>-->
            <td><?php echo $row['order_id']; ?></td>
            <td><?php echo $row['email_address']; ?></td>
            <td><?php echo $row['order_number']; ?></td>
            <td><?php echo $row['order_date']; ?></td>
             <td ><form action="completeorder.php" method="POST"><input type="text" name="price" value="<?php  echo $price; ?>" style="color:black; text-align: center;font-size: 9px;font-family: sans-serif;border:none;background: inherit;cursor:pointer"></input>
<button class="more-btn" type="submit" name="complete" style="border: none;font-size: 9px;background: inherit;color: black;cursor:pointer">
                    Update
                       
                    </button>

             </form></td>
              <td><?php echo $balance; ?></td>
                 <td><?php echo $row['status']; ?></td>
            

               <td span='2'><a href="deleteOrder.php?raword_id=<?php echo $row['raword_id'];?>" class= "edit-btn"> <img src="icons/action_delete.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;"></a>
               <a href="completeorderExec.php?service_Id=<?php echo $row['raword_id'];?>&price=<?php echo $price;?>&email=<?php echo $row['email_address'];?>" class= "edit-btn" name='complete'> <img src="icons/action_check.gif" alt="image" class="photo" style="width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;cursor:pointer; "></a></td>
               
             </tr>

           <?php }?>
      
</table>
</div>
<!--?php
    $category_query = "SELECT * FROM category";
    $categories = $crud->getData($category_query);                                      
?>--> 



    





      
      
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