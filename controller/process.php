<?php
include_once 'connect.php';
$con = new DB();
$result = array('error' => false);
$action = '';

if (isset($_GET['action'])) {
	$action = $_GET['action'];
}

if ($action == 'read') {
	$read = array();

	if ($sql = $con->viewData('tbook')) {

		while ($data = $sql->fetch_assoc()) {
			array_push($read, $data);
		}

		$result['data'] = $read;
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}
}

if ($action == 'create') {
	$term = $_POST['term'];
	$termyear = $_POST['termyear'];
	$subjectcode = $_POST['subjectcode'];
	$subjectname = $_POST['subjectname'];
	$class = $_POST['class'];
	$teacher = $_POST['teacher'];
	$id = $_POST['id1'];
	$id2 = $_POST['id2'];
	$bookyear = $_POST['bookyear'];
	$bookname = $_POST['bookname'];
	$publisher = $_POST['publisher'];
	$paper = $_POST['paper'];
	$format = $_POST['format'];
	$size = $_POST['size'];
	$price = $_POST['price'];
	$reason = $_POST['reason'];

	$sql = "INSERT INTO tbook (book_term,book_termyear,book_subcode,book_subname,
            book_class,book_teacher,book_id,book_id2,book_year,book_name,book_publisher,
            book_paper,book_format,book_size,book_price,book_reason) VALUES ('$term','$termyear','$subjectcode','$subjectname',
            '$class','$teacher','$id','$id2','$bookyear','$bookname','$publisher','$paper','$format'
            ,'$size','$price','$reason')";

	if (empty($termyear) || empty($subjectcode) || empty($subjectname) || empty($class) || empty($teacher)
		|| empty($id) || empty($id2) || empty($bookyear) || empty($bookname) ||
		empty($publisher) || empty($price) || empty($reason)) {
		echo 'Error';
	} else {
		$con->insert($sql);
		echo 'Success';
		$result['message'] = 'Success';
	}
	;
}
;
//sub_code LIKE '%" . $_POST['codesubject'] . "%'"
if ($action == 'fetchsubname') {
	$search = $_POST['codesubject'];
	if ($sql = $con->fetchcode($search)) {
		while ($data = $sql->fetch_assoc()) {

			echo $data['sub_name'];
		}
	}

}

if ($action == 'fetchteach') {
	$search = $_POST['teacher'];
	if ($sql = $con->fetchteacher($search)) {
		while ($data = $sql->fetch_assoc()) {

			echo "<option value='" . $data['tea_name'] . "'></option>";
			//echo $data['sub_name'];
		}
	}

}
;

//echo json_encode($result, JSON_UNESCAPED_UNICODE);

?>