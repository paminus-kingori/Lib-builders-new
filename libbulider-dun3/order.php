<?php
session_start();
// connect to database
  $db = mysqli_connect('localhost', 'root', '', 'libbuilder');

$query= mysqli_query($db, "select count(*) as total from myorder");
$result1 = mysqli_fetch_array($query);



$count = ($result1['total']+1 );
$today=date("j, Y /",time());
  //initilalize variables
 

  $first_name="";
  $last_namename="";
  $email_address="";
  $physical_address="";
  $phone_number="";
  $physical_address="";
  $Latitude="";
  $Longitude="";
  $order_date="";
  $status='incomplete';
  $code = rand(1000, 9999);
  $order_id= $today."_".$code.$count;
  $order_number= 'N'.'_'.$today.$count;
  
  $update= false;
  if(isset($_POST['save'])){

  
    $email_address=$_POST['email_address'];
    $physical_address=$_POST['physical_address'];
    $Longitude=$_POST['Longitude'];
    $Latitude=$_POST['Latitude'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $phone_number=$_POST['phone_number'];
    $order_id=$_POST['order_id'];
    $order_date=$_POST['order_date'];
    $id=$_GET['material_id'];
  echo $id;
  $material_id=$id;
    $result = mysqli_query($db, "SELECT * FROM material where rawmat_id='$id' and quantity>0");
    echo $id;
    while($row = mysqli_fetch_array($result))
      {
        $unit_price=$row['unit_price'];

           
      }
      $total_price=$quantity* $unit_price;
    

    $order1=mysqli_query($db,"INSERT INTO myoder(email_address, rawmat_id,order_number,order_date,total_price, status) VALUES ('$email_address','$id','$order_number' ,'$order_number','$total_price', '$status')");
     $order2=mysqli_query($db,"INSERT INTO customer(email_address, phone_number,first_name,last_name,physical_address,latitude,longitude) VALUES ('$email_address','$phone_number','$first_name' ,'$last_name','$physical_address', '$Latitude','$Longitude')");
    $order3=mysqli_query( $db,"UPDATE material SET quantity=quantity-1 WHERE material_id = '$id'")or die(mysqli_error($db));
    if($order1=true and $order2=true and $order3=true){
    $_session['message']="You ordered successfully.";
  }
    //header('location:home.php');
  }
  $id=$_GET['material_id'];
  echo $id;
  $material_id=$id;
  $result = mysqli_query($db, "SELECT * FROM material where rawmat_id='$material_id' and quantity>0");
    while($row = mysqli_fetch_array($result))
      {
        $image=$row['profile_pic'];

           $material_name= $row['material_name']; 
           $material_id= $row['material_id']; 
           $description=$row['description']; 
              $unit_price=$row['unit_price']; 
               
          
      }
    

?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/adminn.css">
<!--img src="../public/images/<?php echo $image ?>" style="height: 100%; width: 75%; margin-left: %;margin-top: 5%;">-->
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href=".../css/mountainn.css">
   <link rel="stylesheet" href="../css/styles1.css">
 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <title></title>
</head>

 <?php $material_id=$_GET['material_id'];

 ?>
 <a href='orderexecute.php?material_id=<?php echo $material_id ?>' class="btn btn-success" style="height: 50px; width: 100px; border-radius: 100px; margin-left: 2%;" >  BOOK</a>

<!--div class ="details"style="margin-left: 15%; margin-top: 5%; width: 75%; height: 60%; border-top: 2px solid green; background: inherit; border-radius: 5px; color:orange ;padding-left: 10px; font-family: verdana; font-size: 15px; position: center;text-align: center; ox-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;">-->
  <H6 style="font-weight:bold; color:black;text-decoration-color: black;font-size: ; ">NAME</H6 >:<?php echo $material_name; ?>
<!--H6 style="font-weight:bold; color:black;text-decoration-color: black;font-size: ; ">DESCRIPTION</H6 >:<?php echo $service_description ?>
<H6 style="font-weight:bold; color:black;text-decoration-color: black;font-size: ; ">RATING</H6 >:(<?php echo $material_name?>/10)
  <H6 style="font-weight:bold; color:black;text-decoration-color: black;font-size: ; ">Price</H6 >:Ksh<?php echo $unit_price ?>/=
<H6 style="font-weight:bold; color:black;text-decoration-color: black;font-size: ; ">RATING</H6 >:(<?php echo $service_rating ?>/10)
  <H6 style="font-weight:bold; color:black;text-decoration-color: black;font-size: ; ">ADDRESS</H6 >:<?php echo $address_id ?><br>
 <a href='bookexecute.php?service_Id=<?php echo $material_id ?>' class="btn btn-success" style="height: 50px; width: 100px; border-radius: 100px; margin-left: 2%;" >  BOOK</a>
</div>
 
<h2 style="color: orange; font-family: sans-serif; font-weight: bold; width: 75%;margin-left: 15%;margin-top: 5%; font"> What are you waiting for. Book today and enjoy your lifetime tour together with us</h2>-->
<?php $id=$_GET['material_id'];?>

<form name="comment" class="form-horizontal" enctype="multipart/form-data" method="post" action="order.php" >
            <input type="text" name="email_address" placeholder="Enter your email.." required>
            <input type="text" name="first_name" placeholder="Enter your first name.." required>
            <input type="text" name="last_name" placeholder="Enter your last name..">
            <input type="number" name="phone_number" placeholder="Enter your phone number..">
             <input type="date" name="order_date" placeholder="Enter today's day">
             <input type="text" name="physical_address" placeholder="Enter your physical_address." required>
              <input type="text" name="Latitude" value="" >
               <input type="text" name="Longitude" value="">
            

            <button type="submit" name="save" class="send" data-target="#exampleModal" style="margin-left: 30%;">Send</button>
            <input type="button" name="save" value="+ ADD"  class="btn btn-primary"data-toggle="modal" data-target="#exampleModal">
        </form>

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
            <label class="control-label col-md-5"> Project Name</label><br>
            <div class="col-md-9">
                <input type="text" name="project_name" class="form-control" required>
            </div>
          </div>

             <div class="form-group">
            <label class="control-label col-md-3"></label><br>
            <div class="col-md-9">
        <textarea rows=5 cols=10 type="textarea" name="description" class="form-control" required >Describe your project</textarea> <br>    
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
                <select name="category" class="form-control"required >
                      
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
                <select name="status" class="form-control"required >
                      
                        
                       <option>finished</option>
                       <option>ongoing</option>
                       <option>Active</option>
                   
                       
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
      
</body>
<script type="text/javascript" src="add/js/jquery.min.js"></script>
   <script type="text/javascript" src="add/js/popper.min.js"></script>
    <script type="text/javascript" src="add/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="add/js/mdb.min.js"></script>
    <script type="text/javascript" src="add/js/app.js"></script>

</html>
