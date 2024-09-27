<?php 
require('fpdf/fpdf.php');
$profile_picture = '';
$upload_dir = "uploads/";


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$summary = $_POST['summary'];
$education = $_POST['education'];
$experience = $_POST['experience'];
$skills = $_POST['skills'];




if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
	$file_name = basename($_FILES['profile_picture']['name']);
    $target_file = $upload_dir. $file_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
	$check = getimagesize($_FILES['profile_picture']['tmp_name']);

	if ($check !== false && ($file_type == "png" || $file_type == "jpg" || $file_type == "jpeg" )) {
		if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
             $profile_picture = $target_file;
		}
		
	}


}

class PDF extends FPDF{
	function Header(){
		global $profile_picture;
		if (!empty($profile_picture)) {
			$this->Image($profile_picture, 10, 10, 25);
			$this->SetXY(10, 40);
		}
	}
	function addTitle($title){
		$this->SetFont('Arial', 'B', 12);
		$this->Cell(0, 6, $title, 0,1, 'L');
		$this->Ln(2);
	}
	function addContent($content){
		$this->SetFont('Arial', '', 10);
		$this->MultiCell(0, 6, $content);
		$this->Ln(2);
	}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, $name, 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Email: $name", 0, 1);
$pdf->Cell(0, 10, "Phone: $phone", 0, 1);
$pdf->Cell(0, 10, "Address: $address", 0, 1);
$pdf->Ln(5);

$pdf->addTitle("Profile Summary");
$pdf->addContent($summary);

$pdf->addTitle("Education");
$pdf->addContent($education);

$pdf->addTitle("Work Experience");
$pdf->addContent($experience);

$pdf->addTitle("Skills");
$pdf->addContent($skills);

$pdf->Output();