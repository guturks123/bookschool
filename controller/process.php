<?php
include_once 'connect.php';
$con = new DB();
$result = array('error' => false);
$action = '';

if (isset($_GET['action'])) {
	$action = $_GET['action'];
}

if ($action == 'edit') {
	$uid = $_POST['uid'];
	$term = $_POST['term'];
	$termyear = $_POST['termyear'];
	$subjectcode = $_POST['subjectcode'];
	$subjectname = $_POST['subjectname'];
	$class = $_POST['class'];
	$teacher = $_POST['teacher'];
	$id2 = $_POST['id2'];
	$bookyear = $_POST['bookyear'];
	$bookname = $_POST['bookname'];
	$publisher = $_POST['publisher'];
	$paper = $_POST['paper'];
	$format = $_POST['format'];
	$size = $_POST['size'];
	$price = $_POST['price'];
	$reason = $_POST['reason'];

	$sql = "UPDATE tbook SET book_term = '$term',book_termyear = '$termyear', book_subcode = '$subjectcode',
	 book_subname = '$subjectname',book_class = '$class', book_teacher = '$teacher',
	 book_id2 = '$id2', book_year = '$bookyear', book_name = '$bookname',book_publisher =  '$publisher',
	 book_paper = '$paper', book_format = '$format' ,book_size = '$size',book_price = '$price',
	 book_reason = '$reason' WHERE id = $uid ";
	

	if($con->update($sql)){
		echo 'Success';
		print_r($sql);
	}else{
		echo 'Error';
		print_r($sql);
		}

}
;

if ($action == 'create') {
	@$term = $_POST['term'];
	@$termyear = $_POST['termyear'];
	@$subjectcode = $_POST['subjectcode'];
	@$subjectname = $_POST['subjectname'];
	@$class = $_POST['class'];
	@$teacher = $_POST['teacher'];
	@$id2 = $_POST['id2'];
	@$bookyear = $_POST['bookyear'];
	@$bookname = $_POST['bookname'];
	@$publisher = $_POST['publisher'];
	@$paper = $_POST['paper'];
	@$format = $_POST['format'];
	@$size = $_POST['size'];
	@$price = $_POST['price'];
	@$reason = $_POST['reason'];

	$sql = "INSERT INTO tbook (book_term,book_termyear,book_subcode,book_subname,
            book_class,book_teacher,book_id2,book_year,book_name,book_publisher,
            book_paper,book_format,book_size,book_price,book_reason) VALUES ('$term','$termyear','$subjectcode','$subjectname',
            '$class','$teacher','$id2','$bookyear','$bookname','$publisher','$paper','$format'
            ,'$size','$price','$reason')";

	if (empty($termyear) || empty($subjectcode) || empty($subjectname) || empty($class) || empty($teacher)
		  || empty($bookyear) || empty($bookname) ||
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

if ($action == 'delete') {
	$id = $_POST['id'];
	$sql = "DELETE FROM tbook WHERE id = $id";
	$con->delete($sql);
}


//echo json_encode($result, JSON_UNESCAPED_UNICODE);

?>