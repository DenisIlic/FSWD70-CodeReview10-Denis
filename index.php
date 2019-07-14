<?php  require_once 'server.php'; 
//fetch the record to update 

if (isset($_GET['edit'])) {
		$BookID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM book WHERE id=$BookID");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$Book_title = $n['Book_title'];
			$Book_desc = $n['Book_desc'];
			$Book_type = $n['Book_type'];
			$Book_author = $n['Book_author'];
			$Book_published = $n['Book_published'];
			$Book_publisher = $n['Book_publisher'];
		}
	}


?>


<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>

	<table>
	<thead>
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th>Type</th>
			<th>Author</th>
			<th>Published IN</th>
			<th>Publisher</th>
			<th>Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['Book_title']; ?></td>
			<td><?php echo $row['Book_desc']; ?></td>
			<td><?php echo $row['Book_type']; ?></td>
			<td><?php echo $row['Book_author']; ?></td>
			<td><?php echo $row['Book_published']; ?></td>
			<td><?php echo $row['Book_publisher']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['BookID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['BookID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

	<form method="post" action="server.php" >
		<input type="hidden" name="BookID" value="<?php echo $BookID; ?>">
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="Book_title" value="<?php echo $Book_title; ?>">
		</div>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="Book_desc" value="<?php echo $Book_desc; ?>">
		</div>
		<div class="input-group">
			<label>Type</label>
			<input type="text" name="Book_type" value="<?php echo $Book_type; ?>">
		</div>
		<div class="input-group">
			<label>Author</label>
			<input type="text" name="Book_author" value="<?php echo $Book_author; ?>">
		</div>
		<div class="input-group">
			<label>Published</label>
			<input type="date" name="Book_published" value="<?php echo $Book_published; ?>">
		</div>
		<div class="input-group">
			<label>Publisher</label>
			<input type="text" name="Book_publisher" value="<?php echo $Book_publisher; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
		</div>
	</form>
</body>
</html>