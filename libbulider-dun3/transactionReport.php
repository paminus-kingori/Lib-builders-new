<?php
//require 'oder.php';
require_once('Dbconnection.php');
require_once('tcpdf/include/tcpdf_colors.php');
require_once('tcpdf/tcpdf.php');


    include_once("classes/Constant.php");
    

           
            $result2 = mysqli_query($con, "SELECT * FROM transaction LIMIT 12 ");
        while($row = mysqli_fetch_array($result2))
            {
                $transaction_id=$row['transaction_id'];
                $transaction_number=$row['transaction_number'];
                $transaction_date=$row['transaction_date'];
                 $item_ordered=$row['rawmat_id'];
                 $amount=$row['total_price'];
               
                  $email_address=$row['rawcust_id'];

                  
            }
            
 
       




// Extend the TCPDF class to create custom Header and Footer
class PDF extends TCPDF {

	//Page header
	public function Header() {

		// Logo
		$image_file = K_PATH_IMAGES.'lib.jpg';
		$this->Image($image_file, 40, 10, 30, '', 'JPG', '', 'T', false, 400, '', false, false, 0, false, false, false);
		
		$this->Ln(5);

		// Set font
		$this->SetFont('helvetica', 'B', 12);
		// Title
			$this->SetTextColor(127, 127, 255);

		$this->Cell(189, 5, ' LIB HOME BUILDERS ',0,1,'C');
		
	
		$this->SetFont('helvetica', '', 8);
		// Title
		$this->Cell(189,3,'Mawingu Road',0,1,'C');
		$this->Cell(189,3,'P.O BOX 42525 Bungoma-Kenya',0,1,'C');
		$this->Cell(189,3,'Gmail Address: Libhomebuilders@gmail.com',0,1,'C');
		$this->Cell(189,3,'Phone:+254 0714757251. Fax:.63727227. ',0,1,'C');
		$this->SetFont('helvetica', 'B', 11);
		$this->SetTextColor(127, 127, 255);
		$this->Cell(189,4,'___________________________________________________________________________________',0,1,'C');
		$this->Ln(2);
		$this->SetTextColor(0,0,0,200);
		$this->Cell(189,3,'ORDER REPORT TODAY',0,1,'C');


	}


	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-50);
		$this->Ln(5);
		// Set font
		$this->SetFont('times', 'B', 10);
		/*$this->MultiCell(189,15,'The Market order is valid for__________Days from the date I/We I submitted the above____________Receives the above items in advance in trust for execution of the order', 0,'L',0,1,'','',true);
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
		$html='<p style="text-align:justify;font-weight:bold;"> The rules & regulations of the Ordering partaining to the acquistion of items above which is in force as from now have been read by me/us and I/We also have understood the same and I/We agree to abide by and to be bound by the rules as are in force from time to time for such an Order. I/We also declared that the information given by me/us are true to the best of my/our knowledge as on the date of this transaction. We further agree to any false misleading information given by me/us or suppression of any material fact will render my/our acquistion of the above item as theft and will lead to legal action being taken at the court of law.</p>';
		$this->writeHTML($html, true, false,true,false,'');
		
            $select= ' Duncan Nyongesa';
$Date='03-02-2018';
$ID='34426795';
$ORDER='N01022021';
$order_number='N01022021';
		$this->setFont('times','B',10);
		$this->Ln(8);
		$this->Cell(20,1,'________________________',0,0);
		$this->Cell(118,1,'',0,0);
		$this->Cell(51,1,'_________________________',0,1);
		
		$this->Cell(20,5,'Authorized Signature(s)',0,0);
		$this->Cell(118,5,'',0,0);
		$this->Cell(51,5,'Customer/POA Signature(s)',0,1);
		$this->Cell(7,1,'', 0,0);
		$this->Cell(181,5,'(Office Use Only)',0,1);
		$this->Ln(7);
		$this->Cell(51,5,'This report was generated by-'.$select ,0,1);*/
		$this->SetFont('helvetica', 'I',8);
		date_default_timezone_set("Africa/Nairobi");
		$today=date("F j, Y/ g:i A",time());
		$this->Cell(25,5,'Generation Date/Time: '.$today,0,0,'L');
		$this->Cell(164,5,'page'.$this->getAliasNumPage().'of' .$this->getAliasNbPages(),0,false,'R',0,'',0,false,'T','M');



		// Page number
		
	}
}

// create new PDF document
$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TRANSACTION REPORT TODAY');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

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
}

// ---------------------------------------------------------
 
 
$select='Duncan Nyongesa';
$Date='03-02-2018';
$ID='34426795';
$ORDER='N01022021';
$order_number='N01022021';
// set font
$pdf->SetFont('times', 'B', 12);
$pdf->Ln(2);
// add a page
$pdf->AddPage();
/*$pdf->Ln(18);
$pdf->SetFont('times','B',10);
$pdf->Cell(189,3,'Report as on : '.$DOR,0,1,'C');
$pdf->Ln(5);
$pdf->SetFont('times','B',10);
$pdf->Cell(130,5,'From: Mr./Mr: '. $first_name.'  '. $last_name.'',0,0);
$pdf->Cell(59,5,'REF NO: '.$Ref.'',0,1);
$pdf->Ln(5);
$pdf->Cell(130,5,'ORDER ID:'.$ORDER.'',0,0);
$pdf->Cell(59,5,'ORDER NUMBER:'.$order_number.'',0,1);
$pdf->Ln(5);


$pdf->Cell(189,5,'Mobile No: '.$phone.'', 0,1);
$pdf->SetFont('times','B',10);
$pdf->Cell(189,5,'Please  avail the following items to the customer named above.',0,1 ,'C');
*/

$i=1;
$pdf->Ln(30);
$pdf->SetFont('times', 'B', 9);
$pdf->SetFillColor(224,235,255);
$pdf->Cell(31,5,'SL NO',1,0,'C',1);
$pdf->Cell(31,5,'ORDER ID',1,0,'C',1);
$pdf->Cell(31,5,'ITEM',1,0,'C',1);
$pdf->Cell(31,5,'UNIT PRICE',1,0,'C',1);
$pdf->Cell(31,5,' PRICE',1,0,'C',1);
$pdf->Cell(31,5,'SUB TOTAL', 1,1 ,'C',1);


$i++;
$max=6;

$html = '<table data-page-length="5" width="659px" border="" border-color="white" style="text-align:justify;text-align:center; font-size: 11px;font-family:Times; border:1px dotted blue;margin-top:5%;">';


//data iteration
   $today=date('Y-m-d');
$result2=mysqli_query($con,"SELECT c.material_name,c.unit_price, o.rawmat_id,o.rawcust_id, o.transaction_number,o.transaction_id, o.transacted_at,o.transaction_date,o.balance, o.total_price FROM material AS c
 INNER JOIN transaction AS o
 ON c.rawmat_id=o.rawmat_id
WHERE o.transaction_date='$today'
 ORDER BY c.material_name, o.transaction_number; ");
        
            
$total_price = 0;
$price = 0;
$transport_cost=0;
$rate=2/100;
  $i=1;

while($row = mysqli_fetch_array($result2))
            {
                $transaction_id=$row['transaction_id'];
                $transaction_number=$row['transaction_number'];
                $transaction_date=$row['transacted_at'];
                $balance=$row['balance'];
                $total_price1=($row['total_price']);
                 $price+=($row['total_price']-$balance);
                  $unit_price=$row['unit_price'];
                   $total_price=($row['total_price']-$balance);
                 $quantity=$total_price/$unit_price;
                 $material_name=$row['material_name'];
                  $rawmat_id=$row['rawmat_id'];
                  $email_address=$row['rawcust_id'];
                  $quantity=$total_price/$unit_price;

     
       
    // concatenate a string, instead of calling $pdf->writeHTML()
    $html .= '<tr style="width: 20px;nth-child(even){
  background-color: white; color:black;margin-top:5%;border:1px dotted black;"
 }><td style="border:1px dotted black;">'.$transaction_number.'</td> <td style="border:1px dotted black;">'.$transaction_id.'</td><td style="border:1px dotted black;">'.$material_name.'</td><td style="border:1px dotted black;">'.$unit_price.'.00</td>
  <td style="border:1px dotted black;">'.$total_price1.'</td><td style="border:1px dotted black;"> '.$price.'.00</td>
        </tr> ';

 
}
$i++;
$max=1;
$pdf->SetFillColor(224,235,255);
$html .= '</table>';

$pdf->writeHTML($html);
$pdf->SetFillColor(224,235,255);
$pdf->Ln(3);
$grant_total= $total_price + $transport_cost;
$html = '<table data-page-length="5" width="655px" height="1px" border="1px" style="text-align:justify;text-align:center;color:black; font-size: 11px;font-family:Times;border:1px blue dotted;">';
 $html .= '<tr style="width:2px;height:2px;border:1px blue dotted;">
        <td style="background-color:#b3d9ff;height:2px;">RAW TOTAL<br /></td>
        <td style="background-color:#b3d9ff;">TRANSPORT COST</td>
        <td style="background-color:#b3d9ff;">GRANT TOTAL</td>
    </tr>
    
    <tr style="background-color:white;">
       <td >Ksh '.$total_price.'.00</td>
       <td>Ksh '.$transport_cost.'</td>
        <td>Ksh'.$grant_total.'</td>
    </tr> ';
    $html .= '</table>';
    $pdf->writeHTML($html);
$pdf->SetFont('times','',10);



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
$style = array(
	
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(0,0,255),
	
	'module_width' => 1, // width of a single module in points
	'module_height' => 1// height of a single module in points
);

// QRCODE,L : QR-CODE Low error correction
$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 170, 10, 10, 30, $style, 'N');


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
$pdf->Text(120, 115, 'RED');

// -------------------------------

*/

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
