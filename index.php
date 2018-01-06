<?php 
include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$id = $n['id'];
			$evename = $n['evename'];
			$evedate = $n['evedate'];
			$evedtime = $n['evetime'];
			$location = $n['location'];
			$remarks = $n['remarks'];
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>KimSamShin Scheduler</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<script type="text/javascript">
		
		function msgSave() {
			alert('Save Successfully');
		}
		function msgUpdate() {
			alert('Update Successfully');
		}
		function msgDelete(){
			alert ('Delete Successfully');
		}

	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<h2>Event Scheduler</h2>
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<form method="post" action="server.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label>Event Name</label>
		<input type="text" name="evename" value="<?php echo $evename; ?>">
	</div>
	<div class="input-group">
		<label>Date</label>
		<input type="Date" name="evedate" value="<?php echo $evedate; ?>">
	</div>
	<div class="input-group">
		<label>Time</label>
		<input  type="Time" name="evetime" value="<?php echo $evetime; ?>">
	</div>
	<div class="input-group">
		<label>Location</label>
		<input type="text" name="location" value="<?php echo $location; ?>">
	</div>
	<div class="input-group">
		<label>Remarks</label>
		<input type="text" name="remarks" value="<?php echo $remarks; ?>">
	</div>
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" onclick="msgUpdate()" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" onclick="msgSave()"name="save" >Save</button>

		<?php endif ?>
	</div>

	
</form>


<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<table>
	<thead>
		<tr>
			<th>Event Name</th>
			<th>Date</th>
			<th>Time</th>
			<th>Location</th>
			<th>Remarks</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['evename']; ?></td>
			<td><?php echo $row['evedate']; ?></td>
			<td><?php echo $row['evetime']; ?></td>
			<td><?php echo $row['location']; ?></td>
			<td><?php echo $row['remarks']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn" onclick="msgDelete()" >Delete</a>
				
			</td>
		</tr>
	<?php } ?>
</table>
	



</body>
</html>