<?php
 if(!isset($_SESSION['user'])) { 
session_start();
 $sfirstname=$_SESSION['user']['first_name'];
          $username=$_SESSION['user']['last_name']; 
          
  $slastname=$_SESSION['user']['last_name']; 

}



        
//require 'oder.php';
require_once('Dbconnection.php');
require_once('tcpdf/include/tcpdf_colors.php');
require_once('tcpdf/tcpdf.php');


    include_once("classes/Constant.php");
    

    
    $id=$_GET['service_Id'];
      $price_paid=$_GET['price']+1;
    $update=true;
   $result=mysqli_query($con,"SELECT c.first_name, c.last_name,c.email_address, c.phone_number ,c.rawcust_id,o.order_number,o.ordered_at,o.total_price FROM customer AS c
 INNER JOIN myorder AS o
 ON c.email_address = o.email_address
 WHERE o.raword_id='$id'
 ORDER BY c.email_address, o.order_number; ");
    $code = rand(1000, 9999);
        while($row = mysqli_fetch_array($result))
            {
                $first_name=$row['first_name'];
                $last_name=$row['last_name'];
                $phone=$row['phone_number'];
                 $username=$row['email_address'];
                 $rawcust_id=$row['rawcust_id'];
                  $DOR=$row['ordered_at'];
                   $Ref=$row['order_number'];

            }
           $result2=mysqli_query($con,"SELECT c.material_name, o.rawmat_id,o.email_address, o.raword_id , o.order_number, o.ordered_at, o.total_price,o.order_id FROM material AS c
 INNER JOIN myorder AS o
 ON c.rawmat_id = o.rawmat_id
 WHERE o.raword_id='$id'
 ORDER BY c.material_name, o.order_number; ");
        while($row = mysqli_fetch_array($result2))
            {
                $order_id=$row['order_id'];
                $order_number=$row['order_number'];
                $order_date=$row['ordered_at'];
                 $total_price=$row['total_price'];
                 $material_name=$row['material_name'];
                  $rawmat_id=$row['rawmat_id'];
                  $email_address=$row['email_address'];
                   $raword_id=$row['raword_id'];

                  
            }
            
 
       

 function numberTowords($num)
{

$ones = array(
0 =>"Zero",
1 => "One",
2 => "Two",
3 => "Three",
4 => "Four",
5 => "Five",
6 => "Six",
7 => "Seven",
8 => "Eight",
9 => "Nine",
10 => "Ten",
11 => "Eleven",
12 => "Twelve",
13 => "Thirteen",
14 => "Fourteen",
15 => "Fifteen",
16 => "Sixteen",
17 => "Seventeen",
18 => "Eifghteen",
19 => "Nineteen",
"014" => "Fourteen"
);
$tens = array( 
0 => "Zero",
1 => "Ten",
2 => "Twenty",
3 => "Thirty", 
4 => "Forty", 
5 => "Fifty", 
6 => "Sixty", 
7 => "Seventy", 
8 => "Eighty", 
9 => "Ninety" 
); 
$hundreds = array( 
"Hundred", 
"Thousand", 
"Million", 
"Billion", 
"Trillion", 
"Quadrillion" 
); /*limit t quadrillion */

$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr,1); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){
  
while(substr($i,0,1)=="0")
    $i=substr($i,1,5);
if($i < 20){ 
/* echo "getting:".$i; */
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
}
} 
if($decnum > 0){
$rettxt .= " and ";
if($decnum < 20){
$rettxt .= $ones[$decnum];
}elseif($decnum < 100){
$rettxt .= $tens[substr($decnum,0,1)];
$rettxt .= " ".$ones[substr($decnum,1,1)];
}
}
return $rettxt;
}      
$num=$price_paid;


// Extend the TCPDF class to create custom Header and Footer
class PDF extends TCPDF {

	//Page header
	public function Header() {

		// Logo
		$image_file = K_PATH_IMAGES.'LIB.jpg';
		$this->Image($image_file ,50, 10, 30, '', 'JPG', '', 'T', false, 400, '', false, false, 0, false, false, false);
		
		$this->Ln(3);

		// Set font
		$this->SetFont('helvetica', 'B', 12);
		// Title


		$this->Cell(250, 12, ' LIB HOME BUILDERS ',0,1,'C');
		
	

		$this->SetFont('helvetica', '', 8);
        $this->SetTextColor(0,0,0,200);
		// Title
		$this->Cell(250,4,'Mawingu Road',0,1,'C');
		$this->Cell(250,4,'P.O BOX 42525 Bungoma-Kenya',0,1,'C');
		$this->Cell(250,4,'Gmail Address: Libhomebuilders@gmail.com',0,1,'C');
		$this->Cell(250,4,'Phone:+254 0714757251. Fax:.63727227. ',0,1,'C');

        $this->SetFont('helvetica', 'B', 12);
        $this->SetTextColor(0, 100, 100,0);
        
        $this->Cell(80,5,'OFFICIAL RECEIPT',0,1,'C');
		$this->SetFont('helvetica', 'B', 11);
		$this->SetTextColor(127, 127, 255);
		//$this->Ln(2);
		$this->SetTextColor(0,0,0,200);
		
	}


	// Page footer
	public function Footer() {

		// Position at 15 mm from bottom
		/*$this->SetY(-148);
		$this->Ln(5);
		// Set font
		$this->SetFont('times', 'B', 10);
		$this->MultiCell(189,15,'The Market order is valid for__________Days from the date I/We I submitted the above____________Receives the above items in advance in trust for execution of the order', 0,'L',0,1,'','',true);
		$this->Ln(2);
		$this->Cell(20,1,'________________________',0,0);
		$this->Cell(118,1,'',0,0);
		$this->Cell(51,1,'_________________________',0,1);
		$this->Cell(20,5,'Authorized Signature(s)',0,0);
		$this->Cell(118,5,'',0,0);
		$this->Cell(51,5,'Customer/POA Signature(s)',0,1);
		$this->Cell(8,1,'', 0,0);
		$this->Cell(181,5,'(Office Use Only)',0,1);
		$this->Cell(100,5,'Transaction Instruction Form(PAY IN)',0,1,'R');
		$this->Cell(110,5,'DSE Clearing A/C-------------------------', 0,0);
		$this->Cell(79,5,'Exchange ID-----------------------',0,1,'C');
		$this->Cell(110,5,'CSE Clearing A/C-------------------------', 0,0);
		$this->Cell(79,5,'Exchange ID-----------------------',0,1,'C');
		$this->Ln(4);
		$this->SetFont('times','B',10);
		$this->Cell(189,5,'DECLARATION',0,1,'L');
		$this->SetFont('times','',10);
		*/
		 
        $this->Cell(118,1,'',0,0);
        // Position at 15 mm from bottom

        $this->SetY(-148);
        $this->Cell(20,1,'-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,0);
        $this->Cell(118,1,'',0,0);
        $this->Ln(5);
        // Set font
        $this->SetFont('times', 'B', 10);
        
        $this->Cell(20,1,'________________________',0,0);
        $this->Cell(118,1,'',0,0);
        $this->Cell(51,1,'_________________________',0,1);
        $this->Cell(20,5,'Authorized Signature(s)',0,0);
        $this->Cell(118,5,'',0,0);
        $this->Cell(51,5,'Customer/POA Signature(s)',0,1);
        $this->Cell(8,1,'', 0,0);
        $this->Cell(181,5,'(Office Use Only)',0,1);
        $this->Cell(100,5,'Transaction Instruction Form(PAY IN)',0,1,'R');
        $this->Cell(110,5,'DSE Clearing A/C-------------------------', 0,0);
        $this->Cell(79,5,'Exchange ID-----------------------',0,1,'C');
        $this->Cell(110,5,'CSE Clearing A/C-------------------------', 0,0);
        $this->Cell(79,5,'Exchange ID-----------------------',0,1,'C');
        $this->Ln(4);
        
       

    $id=$_GET['service_Id'];
    $update=true;
   $con = mysqli_connect('localhost', 'root', '', 'libbuilder');
  //initilalize variables
           $result2=mysqli_query($con,"SELECT c.material_name, o.rawmat_id,o.email_address, o.raword_id , o.order_number, o.ordered_at, o.total_price,o.order_id FROM material AS c
 INNER JOIN myorder AS o
 ON c.rawmat_id = o.rawmat_id
 WHERE o.raword_id=$id
 ORDER BY c.material_name, o.order_number; ");
        while($row = mysqli_fetch_array($result2))
            {
                $order_id=$row['order_id'];
                $order_number=$row['order_number'];
                $order_date=$row['ordered_at'];
                 $total_price=$row['total_price'];
                 $material_name=$row['material_name'];
                  $rawmat_id=$row['rawmat_id'];
                  $email_address=$row['email_address'];
                   $raword_id=$row['raword_id'];

                  
            }
            
 $select= 'HiQ inc';

        $this->setFont('times','B',10);
        $this->Ln(5);
        $this->Cell(20,1,'________________________',0,0);
        $this->Cell(118,1,'',0,0);
        $this->Cell(51,1,'_________________________',0,1);
        
        $this->Cell(20,5,'Authorized Signature(s)',0,0);
        $this->Cell(118,5,'',0,0);
        $this->Cell(51,5,'Customer/POA Signature(s)',0,1);
        $this->Cell(7,1,'', 0,0);
        $this->Cell(181,5,'(Office Use Only)',0,1);
        $this->Ln(7);
        
        $this->Cell(51,5,'This receipt was generated by-'.$select ,0,1);
        $this->SetFont('helvetica', 'I',8);
        date_default_timezone_set("Africa/Nairobi");
        $today=date("F j, Y/ g:i A",time());
        $this->Cell(25,5,'Generation Date/Time: '.$today,0,0,'L');
        $this->Cell(164,5,'page'.$this->getAliasNumPage().'of' .$this->getAliasNbPages(),0,false,'R',0,'',0,false,'T','M');


$this->SetTextColor(127, 127, 255);
            $style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);

// PRINT VARIOUS 1D BARCODES

// CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.

$this->Ln();

// CODE 93 - USS-93
//$this->Cell(0, 0, 'CODE 93 - USS-93', 0, 1);
$this->write1DBarcode($order_number, 'C93', '', '', '', 18, 0.4, $style, 'N');


$this->Cell(20,1,'----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,0);

$this->Ln(5);

        // Page number
        
    }
}
// create new PDF document
$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('RECEIPT');
$pdf->SetSubject('libbuilder');
$pdf->SetKeywords('TCPDF, PDF, RECEIPT, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
	$html = '<table data-page-length="5" width="655px" border="1px" border-color="yellow" style="text-align:justify;text-align:center; font-size: 11px;font-family:Times; border-color:yellow;">';


//data iteration
    $db = mysqli_connect('localhost', 'root', '', 'student');
$rer = mysqli_query($db, "SELECT * FROM myorder where username='$id'LIMIT 13 ");
$total_price = 0;
$transport_cost=0;
$quantity=0;
$rate=2/100;
  $i=1;
  $result2=mysqli_query($con,"SELECT c.material_name,c.unit_price, o.rawmat_id,o.email_address, o.raword_id , o.order_number, o.ordered_at, o.total_price,o.order_id FROM material AS c
 INNER JOIN myorder AS o
 ON c.rawmat_id = o.rawmat_id
 WHERE o.raword_id='$id'
 ORDER BY c.material_name, o.order_number; ");
        while($row = mysqli_fetch_array($result2))
            {
                $order_id=$row['order_id'];
                $order_number=$row['order_number'];
                $order_date=$row['ordered_at'];
                 $total_price=$row['total_price'];
                 $material_name=$row['material_name'];
                  $rawmat_id=$row['rawmat_id'];
                  $email_address=$row['email_address'];
                   $raword_id=$row['raword_id'];
                   $material_name=$row['material_name'];
                   $unit_price=$row['unit_price'];
                    $transport_cost+= $total_price * $rate;
                    $quantity=$total_price/$unit_price;
                  
           
       
    // concatenate a string, instead of calling $pdf->writeHTML()
    $html .= '<tr style="width: 20px;nth-child(even){
  background-color: #f2f2f2; color:black;"
 }><td>'.$order_number.'</td> <td>'.$order_id.'</td><td>'.$material_name.'</td> <td>'.$quantity.'</td><td>'.$unit_price.'.00</td><td> '.$total_price.'.00</td>
        </tr> ';

 
}
$i++;
$max=2;
$pdf->SetFillColor(224,235,255);
$html .= '</table>';

$pdf->writeHTML($html);
}

// ---------------------------------------------------------
 
 
$select='Duncan Nyongesa';
$Date='03-02-2018';
$ID='34426795';
$ORDER='323232';

// set font
$pdf->SetFont('times', 'B', 12);

// add a page
$pdf->AddPage();
$pdf->Ln(18);
$pdf->SetFont('times','B',10);
/*$pdf->Cell(300,3,'Date Transacted : '.$DOR,0,1,'C');
$pdf->Ln(5);
$pdf->SetFont('times','B',10);
$pdf->Cell(130,5,'ORDER NUMBER:'.$order_number.'0','1','C');
$pdf->Ln(5);
$pdf->Cell(130,5,'Ref NO: '.$Ref.'',0,1);*/


$pdf->SetFont('helvetica', '', 10);

// define barcode style



$pdf->SetFont('times','B',10);
//$pdf->Cell(189,5,'Please  avail the following items to the customer named above.',0,1 ,'C');
/*$pdf->SetFillColor(224,235,255);
$pdf->Cell(31,5,'SL NO',1,0,'C',1);
$pdf->Cell(31,5,'ORDER ID',1,0,'C',1);
$pdf->Cell(31,5,'ITEM',1,0,'C',1);
$pdf->Cell(31,5,'Quantity',1,0,'C',1);
$pdf->Cell(31,5,'UNIT PRICE',1,0,'C',1);
$pdf->Cell(31,5,'SUB TOTAL', 1,1 ,'C',1);*/

$pdf->Ln(3);




$max=6;

/*$html = '<table data-page-length="5" width="655px" height="655px" border="1px" border-color="yellow" style="text-align:justify;text-align:center; font-size: 11px;font-family:Times; border-color:yellow;">';


//data iteration
    $db = mysqli_connect('localhost', 'root', '', 'student');
$rer = mysqli_query($db, "SELECT * FROM myorder where username='$id'LIMIT 13 ");
$total_price = 0;
$transport_cost=0;
$rate=2/100;
  $i=1;

while($rr=mysqli_fetch_array($rer))
{
    $order_id=$rr['order_id'];
                $order_number=$rr['order_number'];
                 $order_id=$rr['order_id'];
                $order_date=$rr['order_date'];
                 $item_ordered=$rr['item_ordered'];
                 $quantity=$rr['quantity'];
                 $unit_price=$rr['unit_price'];
                 $subtotal=$quantity*$unit_price;
                 $total_price += $rr['quantity'] * $rr['unit_price'];
                 $transport_cost+= $subtotal * $rate;

     
       
    // concatenate a string, instead of calling $pdf->writeHTML()
    $html .= '<tr style="width: 20px;nth-child(even){
  background-color: #f2f2f2; color:black;"
 }><td>'.$order_number.'</td> <td>'.$order_id.'</td><td>'.$item_ordered.'</td> <td>'.$total_price.'</td><td>'.$unit_price.'.00</td><td> '.$subtotal.'.00</td>
        </tr> ';

 
}
$i++;
$max=2;
$pdf->SetFillColor(224,235,255);
$html .= '</table>';

$pdf->writeHTML($html);*/

$pdf->SetFillColor(224,235,255);

$pdf->Cell(184,3.5,'CASH TRANSACTION PAYMENT',0,0,'C',1);
$pdf->Ln(7);
//$grant_total= $total_price + $transport_cost;

$html = '<table data-page-length="5" width="655px" height="30px" height="655px"  border="none" style="text-align:justify;text-align:left;color:black; font-size: 10px;font-family:calibri;margin-top: 5%; ">';
 $html .= '
    <tr style="background-color:white;border-bottom:2px solid black;color:grey;">
       <td style="color white;">RECEIPT NO: '.$order_id.'  </td>
       <td style="color:;"> REf No: '.$Ref.' </td>
       <td style="color:grey;"> Date Transacted: '.$DOR.' </td>
      
    </tr><hr>';
    $html .= '</table>';
    $pdf->writeHTML($html);

$pdf->SetFont('times','',10);


$html = '<table data-page-length="5" width="655px" height="30px" height="655px"  border="none" style="text-align:justify;text-align:left;color:black; font-size: 10px;font-family:simplex;margin-top: 5%; ">';
 $html .= '
    

    <tr style="background-color:#ffe6b3;border:2px solid black;">
       <td > PAID IN BY: </td>
       <td> '.$first_name.' '.$last_name.'</td>
       
    </tr> 

    <tr style="background-color:white;">
       <td > EMAIL ADDRESS : </td>
       <td> '.$email_address.'</td>
     
    </tr> 
    <tr style="background-color:#ffe6b3;">
       <td > CUSTOMER CODE:  </td>
       <td>'. $code.'-'.$rawcust_id.'</td>
       
    </tr> 
    <tr style="background-color:white;">
       <td style="border-left:none;"> AMOUNT PAID: </td>
       <td> '.$price_paid.'.00</td>
       
    </tr> 

    <tr style="background-color:#ffe6b3;">
       <td > AMOUNT IN WORDS:  </td>
       <td> '.numberTowords("$num").' only</td>
       
    </tr> 
    <tr style="background-color:;">
       <td style="border-left:none;">  </td><hr>
       
    </tr> 
 ';
    $html .= '</table>';
    $pdf->writeHTML($html);

$pdf->SetFont('times','',10);

$html = '<table data-page-length="5" width="655px" height="655px" border="none" border-color="yellow" style="text-align:justify;text-align:center; font-size: 11px;font-family:Times; border-bottom:1px solid black;">';

$html .= '<tr style="width: 20px;nth-child(even){
  background-color: white; color:black; border-bottom: 2px solid orange;"
 }><td>SL NO</td> <td>ORDER ID</td><td> PRODUCT</td> <td>QTY</td><td>UNIT PRICE</td><td> SUB TOTAL</td>
        </tr>';
        $html .= '</table>';

$pdf->writeHTML($html);
$html = '<table data-page-length="5" width="655px" height="655px" border="none"  style="text-align:justify;text-align:center; font-size: 11px;font-family:Times; border-bottom:1px solid black;background-image:url("gold.jpg");">';





$total_price = 0;
$transport_cost=0;
$rate=2/100;
$grant_total=0;
$balance=0;
$quantity=0;
$result2=mysqli_query($con,"SELECT c.material_name,c.unit_price, o.rawmat_id,o.email_address, o.raword_id , o.order_number, o.ordered_at, o.total_price,o.order_id FROM material AS c
 INNER JOIN myorder AS o
 ON c.rawmat_id = o.rawmat_id
 WHERE o.raword_id='$id'
 ORDER BY c.material_name, o.order_number; ");
        while($row = mysqli_fetch_array($result2))
            {
                $order_id=$row['order_id'];
                $order_number=$row['order_number'];
                $order_date=$row['ordered_at'];
                 $total_price=$row['total_price'];
                 $material_name=$row['material_name'];
                  $rawmat_id=$row['rawmat_id'];
                  $email_address=$row['email_address'];
                   $raword_id=$row['raword_id'];
                   $material_name=$row['material_name'];
                   $unit_price=$row['unit_price'];
                 $total_price += $row['total_price'];
                 $transport_cost+= $total_price * $rate;

      $quantity=$total_price/$unit_price;
       
    // concatenate a string, instead of calling $pdf->writeHTML()


            $grant_total=$transport_cost+$total_price;
            $balance= $num-$grant_total;

                
    $html .= '<tr style="width: 30px;nth-child(even){
  background-color: white; color:black;"
 }><td>'.$order_number.'</td> <td>'.$order_id.'</td><td>'.$material_name.'</td> <td>'.$quantity.'</td><td>'.$unit_price.'.00</td><td> '.$total_price.'.00</td>
        </tr>
         ';

 
}




$html .= '</table><hr>';

$pdf->writeHTML($html);

$html = '<table data-page-length="5" width="655px" height="30px" height="655px"  border="none" style="text-align:justify;text-align:left;color:black; font-size: 9px;font-family:simplex;margin-top: 5%;padding-bottom: 3px;font-weight:bold;text-align:center; ">';
 $html .= '<tr style="background-color:black;border:1px solid black;">
       <td style="background-color:white;border-right: 1px solid black;font-size:10px;text-align:center;"> </td>
       <td style="background-color:#f0ffff;border:1px solid black;"> SHIPPING COST</td>
       <td style="background-color:#f0ffff;border:1px solid black;"> TOTAL COST</td>
       <td style="background-color:#f0ffff;border:1px solid black;"> GRANT TOTAL</td>
       <td style="background-color:#f0ffff;border:1px solid black;margin-top:20px;margin-right:5px;"> BALANCE</td>
        

    </tr> 

    <tr style="background-color:white;border:none;">
       <td style="background-color:white;border-right:none;text-align:center;margin-top:20px;margin-right:5px;"></td>
       <td style="background-color:white;border:none;text-align:center;"> Ksh '.$transport_cost.'</td>
       <td style="background-color:white;border:none;text-align:center;">Ksh '.$total_price.'</td>
        <td style="background-color:white;border:none;text-align:center;"> Ksh '.$grant_total.'</td>
       <td style="background-color:white;border:none;text-align:center;">Ksh '.$balance.'</td>
     
    </tr>

    ';
    $html .= '</table>';
    $pdf->writeHTML($html);

   
  
$pdf->Cell(71,5,'Your were served by: '. $sfirstname.'  '. $slastname.'',0,0,'L',0);


 
/*$selectBuySellRep= "SELECT 'instrument_name','isno','buy_sale', 'share_quantity','rate','submit_date', FROM 'buy_sale_report' WHERE investor_code='Client_code'AND 'submit_date'='$frmDate'";
$i=1;
$max=6;
while($BuysellData=mysqli_fetch_array($queryBuySellRep)){

}
$instrument_name=$BuysellData['instrument_name'];
$instrument_name=$BuysellData['instrument_name'];
$instrument_name=$BuysellData['instrument_name'];
if(!empty($buy_sale)){
	if($buy_sale=='S'){
		$buy_sale="Sale";
	}
	else{
		$buy_sale="Buy";
	}
}
$quantity=$BuySellData['share_qty'];
$rate=$BuySellData['rate'];
if(!empty($rate)){
	$rate=number_format($rate,2);

}
$submit_date=$BuySellData['submit_date'];
if(($i%$max)==0){

}
}*/
/*$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'LIB8.png';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();*/

// set some text to print
$txt = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
    	<td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
    	<td>COL 3 - ROW 2</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

// print a block of text using Write()



// ---------------------------------------------------------



/*$pdf->AddPage();

$pdf->Write(0, 'Example of PieSector() method.');

$xc = 105;
$yc = 100;
$r = 50;

$pdf->SetFillColor(0, 0, 255);
$pdf->PieSector($xc, $yc, $r, 20, 120, 'FD', false, 0, 2);

$pdf->SetFillColor(0, 255, 0);
$pdf->PieSector($xc, $yc, $r, 120, 250, 'FD', false, 0, 2);

$pdf->SetFillColor(255, 0, 0);
$pdf->PieSector($xc, $yc, $r, 250, 20, 'FD', false, 0, 2);

// write labels
$pdf->SetTextColor(255,255,255);
$pdf->Text(105, 65, 'BLUE');
$pdf->Text(60, 95, 'GREEN');
$pdf->Text(120, 115, 'RED');*/

// -------------------------------



//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
