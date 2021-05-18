<?php
session_start();


  $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
  
 
   
    

?> 



<!DOCTYPE html>
<html>
<head>

  <!-- <link rel="stylesheet" href="../css/mountainn.css"> -->
   <link rel="stylesheet" href="../css/styles1.css">
 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="min.css">
  <title>Full REPORT</title>
</head>
<body style="background-color: white;background-image: url('LIB.png');">


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
$from="";
$to="";
//$from=intval($_GET['from']);
//$to=intval($_GET['to']);
//$result=mysqli_query($db,"SELECT *FROM transaction where transaction_date between '".$from."' and '".$to."'");
if(isset($_POST['date'])){

    $from=date("Y-m-d",strtotime($_POST['from']));
    
     $to=date("Y-m-d",strtotime($_POST['to']));
      // $newto=date("Y-m-d",strtotime($to));
     if(empty($_POST['from'])){
  $from=date("Y-m-d");
}
if(empty($_POST['to'])){
  $to=date("Y-m-d");
}

}
if(!isset($_POST['date'])){

   
    $from=date("Y-m-d");
    $to=date("Y-m-d");
     
}

$from=$_GET['from'];
$to=$_GET['to'];

$result=mysqli_query($db,"SELECT c.material_name,c.unit_price, o.rawmat_id,o.rawcust_id, o.transaction_number,o.transaction_id, o.transacted_at,o.transaction_date,o.balance, o.total_price,p.quantity FROM material AS c
 INNER JOIN transaction AS o
  INNER JOIN myorder AS p
 ON c.rawmat_id=o.rawmat_id
where transaction_date between '$from' and '$to'
 ORDER BY c.material_name, o.transaction_number; ");
//$result=mysqli_query($db,"SELECT *FROM transaction where transaction_date between '$from' and '$to' ORDER BY rawcust_id"); ?>

<style type="text/css">
  tr{
    background: white;

  }
 table{
  border: 1px dotted black;
 }

</style>
<div class="header" style="margin-left:10%;color:black;font-weight: bold; width: 70%; text-align: center; background: white;height: 5%;">TRANSACTION REPORTS</div>
<div class="print_content" name="print_content" id="print_content">
<div class="detail" style="margin-left: 10%;border:1px dotted black;border-bottom:none;width: 70%;padding-left: 3%;color:blue;font-family:sans-serif; ">
  <img src="images/LIB.jpg" alt="logo image" class="logo-image" style="border-radius:40px; width:105px ; height: 90px;align-self:right; margin-left:none; margin-top:;" ><span class="search-sect"style="position: right;margin-left: 55%;box-shadow: none;border:1px solid grey;">
                <input type="text" name="searchbar" onkeyup="myFunction()" id="searchbar" class="searchbar " placeholder="Search Transaction" >
                <a href="javascript:Clickheretoprint()" style="text-decoration: none;"> Print</a>
                
        </span><br>
Start date: <?php  echo $from?><br>
End Date:  <?php  echo $to ?><br>
<form style="margin-left: 30%;">
  <label style="font-weight: small; font-size: 11px;">FROM</label>
  <input type="date" name="from" style="border:1px solid grey; border-radius: 5px;">
   <label style="font-weight: small; font-size: 11px;">TO</label>
  <input type="date" name="to" style="border:1px solid grey;border-radius: 5px;">
  <button id="date"name="date" style="height: 20px;width: 100px;">GENERATE</button>
</form>
<br></div>
<table id="myTable" style="margin-left:10%;font-size: 9px;font-family: sans-serif;color: black; width: 70%;margin-top: none; background: none;">
  <thead style="background-color: orange; ">

    <tr style="border-bottom: 1px solid black;color: red;border:none;">

      <th>REf N0<hr></th>
       <th>Item<hr></th>
      <th>Price<hr></th>
      <th>Total Tax<hr></th>
      <th> Total Price<hr></th>
      <th> Client Id <hr> </th>
        <th> Date  <hr></th>
          <th> Transaction Number <hr></th>
          <th> Type <hr></th>
     

          </tr>
        </thead>
        <?php $expenditure=0;
              $total_price=0; ?>
        <?php while ($row=mysqli_fetch_array($result)){
          ?>
          <tr style="text-align: center;">

           
             <td><?php echo $row['transaction_id']; ?></td>
             <td><?php echo $row['material_name']; ?></td>
            <td><?php echo $row['unit_price']; ?>.00</td>
             <td><?php echo '500.00' ?></td>
              <td><?php echo ($row['total_price']) +$row['balance']; ?>.00</td>
              <td><?php echo $row['rawcust_id']; ?></td>
               <td><?php echo $row['transaction_date']; ?></td>
                 <td><?php echo $row['transaction_number']; ?></td>
                    <td><?php echo 'Cash Transaction'; ?></td>

             </tr>
                    <?php $expenditure+=($row['quantity'] * $row['unit_price']);
                          $total_price+=($row['total_price'] +$row['balance']);

                     ?>
           <?php }?>

      
</table>

<table style="background: white;margin-left: 10%;width: 70%;display: inline-flex;justify-content: space-between;padding-left: 10%; font-family: sans-serif; font-size: 10px;border-top: none;"> <tr><td style="padding-left: none;">No of transactions:<hr><br>09;</td><td>Total Tax:<hr><br>Ksh 233444/=</td><td>Total Price:<hr><br> <?php echo $total_price ?>/=</td><td>Profit:<hr><br><?php echo ($total_price-$expenditure) ?>/=</td></tr></table>
 
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


<script type="text/javascript">
    function showDate(str,r){
      if((str && r)==""){
        document.getElementById("txtHint").innerHTML="";
        return;
      }else{
        var xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
          if (this.readyState==4 && this.status=200){
            document.getElementById("textHint").innerHTML=this.responseText;

          }
          
        };
        xmlhttp.open("GET", "fullReport.php?to="+str+"&from="+r,true);
        xmlhttp.send();
      }
    }

<?php

//include 'footer.php';
?>