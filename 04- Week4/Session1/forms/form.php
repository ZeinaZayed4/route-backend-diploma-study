<?php include_once 'header.php'; ?>

<form action="handle.php" method="post" enctype="multipart/form-data">
	<label>Name:
		<input type="text" name="name">
	</label>
	<br /> <br />
	<label>Image:
		<input type="file" name="image">
	</label>
	<br /> <br />
	<button type="submit" name="submit">Submit</button>
</form>

<?php include_once 'footer.php'; ?>
