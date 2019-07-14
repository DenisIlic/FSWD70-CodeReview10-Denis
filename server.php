<?php 
error_reporting(0);
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'cr10_denis_ilic_biglibrary');

	// initialize variables
	$BookID = 0;
	$Book_title = "";
	$Book_desc = "";
	$Book_type = "";
	$Book_author = "";
	$Book_published = "";
	$Book_publisher = "";
	$update = false;

	if (isset($_POST['save'])) {
		$Book_type = $_POST['Book_title'];
		$Book_desc = $_POST['Book_desc'];
		$Book_type = $_POST['Book_type'];
		$Book_author = $_POST['Book_author'];
		$Book_published = $_POST['Book_published'];
		$Book_publisher = $_POST['Book_publisher'];
		mysqli_query($db, "INSERT INTO book (Book_title, Book_desc, Book_type, Book_author, Book_published, Book_publisher)VALUES ('$Book_title', '$Book_desc', '$Book_type', '$Book_author', '$Book_published', '$Book_publisher')"); 
		$_SESSION['msg'] = "Address saved"; 
		header('location: index.php');
	}
// Update records 

	if (isset($_POST['update'])) {
	$BookID = $_POST['BookID'];
	$Book_title = $_POST['Book_title'];
	$Book_desc = $_POST['Book_desc'];
	$Book_type = $_POST['Book_type'];
	$Book_author = $_POST['Book_author'];
	$Book_published = $_POST['Book_published'];
	$Book_publisher = $_POST['Book_publisher'];

	mysqli_query($db, "UPDATE book SET Book_title='$Book_title', Book_desc='$Book_desc', Book_type='$Book_type', Book_author='$Book_author', Book_published='$Book_published', Book_publisher='$Book_publisher' WHERE BookID=$BookID");
	$_SESSION['msg'] = "Address updated!"; 
	header('location: index.php');
}
// Delete record 

if (isset($_GET['del'])) {
	$BookID = $_GET['del'];
	mysqli_query($db, "DELETE FROM book WHERE BookID=$BookID");
	$_SESSION['msg'] = "Address deleted!"; 
	header('location: index.php');
}

// Retrieve recods
	$results = mysqli_query($db, "SELECT * FROM book"); ?>