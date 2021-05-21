<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/User.css">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/add.css">

    <title>View User</title>
</head>
<body>
<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
form{
  margin-left: 30%;
}

</style>
<?php
    include('Dbconnection.php');
    include_once("classes/Constant.php");
  
    $id=$_GET['edit'];
    $update=true;
    $result = mysqli_query($con, "SELECT * FROM equipment where rawequ_id='$id'");
        while($row = mysqli_fetch_array($result))
            {
              $rawequ_id=$row['rawequ_id'];
                $equipment_name=$row['equipment_name'];
                $description=$row['description'];
                $unit_price=$row['unit_price'];
                $quantity=$row['quantity'];
               
                
            }
      

?>

<form action="EditEqupmentExec.php" method="post" >

    <h4> Equipment Information</h4><hr>
    <input type="hidden" name="rawequ_id" value="<?php echo $rawequ_id ?>">
       <a href="#"> <img src="../public/images/icon_edit.png" alt="image" class="photo" style="width: 50px; height: 50px;border-radius: 300px; margin-top: 3px;"></a><br>
       
       <!-- <h style="font-size: 10px;color:#003366; font-family:  'calibri', Gadget, myriad;font-weight: small;"> -->
    
    </a><br>
        Equipment Name:<br><input type="text" name="equipment_name" value="<?php echo $equipment_name ?>" class="ed"><br>
    Description:<br><input type="text" name="description" value="<?php echo $description ?>" class="ed"><br>
    Unit Price:<br><input type="text" name="unit_price" value="<?php echo  $unit_price?>" class="ed"><br>
   Quantity:<br><input type="number" name="quantity" value="<?php echo $quantity?>" class="ed"><br>
    
   
    <input type="submit" value="Edit" id="button1">
    <div class="key" style="align-items: center; display: inline flex; background-color: ;">
   
    <?php 
$count = 1;
$result=mysqli_query($con,"SELECT *FROM category"); ?>

        
       </div>
   
</form>
</body>
</html>

