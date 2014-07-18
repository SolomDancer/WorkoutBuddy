<?php
require_once('tcpdf_include.php');
include("sqlconnect.php"); 

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = 'logo.jpg';
        $this->Image($image_file, 10, 10, 30, 15, 'JPG', '', 'M', false, 300, 'L', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('angsanaupc','B',20);
        // Title
        $this->Cell(0, 5, 'Workout Record of '.$_SESSION['fname']." ".$_SESSION['lname'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('J-Bics Trading Co.,Ltd.');
$pdf->SetTitle('แบบสำรวจข้อมูลด้านการจัดการขยะ');
$pdf->SetSubject('แบบสำรวจข้อมูลด้านการจัดการขยะ');
$pdf->SetKeywords('PCD, J-bics, กรมตวบคุมมลพิษ, test, แบบสำรวจข้อมูลด้านการจัดการขยะ');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(20.0, 30, 20.0);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(1.5);
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

// set font
$pdf->SetFont('angsanaupc','',16);
// add a page
$pdf->AddPage();

if( $con && isset($_SESSION['UserID']) ){
    $strSQL = "SELECT * FROM workout_record WHERE UserID = '".$_SESSION["UserID"]." ' ";
    $objQuery = mysql_query($strSQL);
    $count_rows = mysql_num_rows($objQuery);
    $i=1;    
    if(!$objQuery ){ echo 'Error '.$strSQL;}
    
    while($objResult = mysql_fetch_array($objQuery)) {
        
        if($i %5 == 0){
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->lastPage();
            $pdf->AddPage();
            $html = "";
        }
    $error = '';    
    $html = ''.$error;    
    //$html.= '<b>'.$i.')Record'.$objResult['RecordID']." </b><br>";
    $html.= '<table class="sec">
            <tr>
                <td>Time In</td>
                <td>Time Out</td>
            </tr>';
    while($objResult = mysql_fetch_array($objQuery)) {        
                $html.= '<tr>
                            <td>'.$objResult['TimeIn'].'</td>
                            <td>'.$objResult['TimeOut'].'</td>
                        </tr>';
    }               
    $html.='</table><br> <br>';
    $i++;
    }
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->lastPage();// reset pointer to the last page
/////////////////////////////////////////////////////////////////////////

    //Close and output PDF document
    ob_end_clean();
    $pdf->Output('WorkOutBuddy_Report.pdf', 'I');
}
    else{
        echo "Please Login";
    }
?>