<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/User.css">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
    $result = mysqli_query($con, "SELECT * FROM article where count_id='$id'");
        while($row = mysqli_fetch_array($result))
            {
              $count_id=$row['count_id'];
                $title=$row['title'];
                $description=$row['description'];
                $subject=$row['subject'];
                $source_name=$row['source_name'];
                $status=$row['status'];
               
                
            }
      

?>

<form action="EditarticleExec.php" method="post" >

    <h4> Category Information</h4><hr>
    <input type="hidden" name="count_id" value="<?php echo $count_id ?>">
       <a href="#"> <img src="icons/icon_edit.png" alt="image" class="photo" style="width: 50px; height: 50px;border-radius: 300px; margin-top: 3px;"></a><br><h style="font-size: 10px;color:#003366; font-family:  'calibri', Gadget, myriad;font-weight: small;"></a><br>
       
    Description:<br><input type="text" name="description" value="<?php echo $description ?>" class="ed"><br>
     
     status:<br><input type="text" name="status" value="<?php echo $status ?>" class="ed"><br>
      status:<br><input type="text" name="source_name" value="<?php echo $source_name ?>" class="ed"><br>
       title:<br><input type="text" name="title" value="<?php echo $title ?>" class="ed"><br>
    subject:<br><input type="text" name="subject" value="<?php echo $subject?>" class="ed"><br>
   
    <input type="submit" value="Edit" id="button1">
    <div class="key" style="align-items: center; display: inline flex; background-color: ;">
   
    <?php 
$count = 1;
$result=mysqli_query($con,"SELECT *FROM category"); ?>

        
       </div>
   
</form>
</body>
</html>

