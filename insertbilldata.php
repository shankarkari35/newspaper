<?php include('nod.php');
if(isset($_REQUEST['cust_id'])){
$cust_id=$_REQUEST['cust_id'];
$month=$_REQUEST['month'];$year=$_REQUEST['year'];
$getalldetaarr = array();
$getpaper=array();
$getalldetaarr=json_decode(feachcustomerdeta($cust_id),true);
$getpaper=unserialize($getalldetaarr['customer']['paperid']);

?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Dehu Road News Agency</title>
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
	
	
	 </div>
	
	
   	<div class="container">
		<h1><a href="https://learncodeweb.com/php/php-crud-in-bootstrap-4-with-search-functionality/">dehuroad news agency</a></h1>
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="pn"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="brows_userspaper.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
			<div class="card-body">

				<div class="col-sm-6">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					<form method="post">
						<div class="form-group">
							<label>Customer Name <span class="text-danger">*</span></label>
							<input type="text" name="custname" id="custname" class="form-control" value="<?php echo $getalldetaarr['customer']['name']; ?>" required>
						</div>
						<div class="form-group">
							<label> Customer id <span class="text-danger">*</span></label>
							<input type="text" name="id" id="id" class="form-control" value="<?php echo $cust_id; ?>">
						</div>
						<div class="form-group"> 
							<label>Phone number <span class="text-danger">*</span></label>
							<input type="text" name="ph_number" id="ph_number" maxlength="12" class="form-control" value="<?php echo $getalldetaarr['customer']['ph_number']; ?>" required>
						</div>
						<div class="form-group">
							<label>Address <span class="text-danger">*</span></label>
							<input type="text" name="address" id="address" maxlength="12" class="form-control" value="<?php echo $getalldetaarr['customer']['address']; ?>" required>
						</div>
						<div class="form-group">
							<label>Paper Name <span class="text-danger">*</span></label>
							<input type="text" name="papername" id="papername" class="form-control" value="<?php $i=0; foreach ($getpaper as $key) {
								echo "   ".$getpaper[$i];$i++; 
							} ?>"required>
						</div>
						<div class="form-group">
							<label>Bill Month <span class="text-danger">*</span></label>
							<input type="text" name="Month" id="Month" maxlength="12" class="form-control" value="<?php echo  $month; ?>" required>
						</div>
						<div class="form-group">
							<label>Bill Year <span class="text-danger">*</span></label>
							<input type="text" name="Year" id="Year" maxlength="12" class="form-control" value="<?php echo $year; ?>" required>
						</div>
						<div class="form-group">
							<label>total <span class="text-danger">*</span></label>
							<input type="text" name="total" id="total" maxlength="12" class="form-control" value="<?php echo $_REQUEST['total'] ?>" required>
						</div>
						<div class="form-group">
							<label>Delhivery Charges<span class="text-danger">*</span></label>
							<input type="text" name="dcharges" id="dcharges" maxlength="12" class="form-control" value=30 required>
						</div>
						<div class="form-group">
							<label>Balance<span class="text-danger">*</span></label>
							<input type="text" name="balance" id="balance" maxlength="12" class="form-control" value='0' required>
						</div>
						<div class="form-group">

							<button type="submit" name="save" value="save" id="save" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> SAVE</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    
   <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> 
     -->
</body>
</html>
<?php 
	
}{
	$replay=array();
if (isset($_REQUEST['save'])) {
	$total=$_REQUEST['total'];
	$balance=$_REQUEST['balance'];
	$cust_id=$_REQUEST['id'];
	//echo $cust_id;
	$custname=$_REQUEST['custname'];
	$address=$_REQUEST['address'];
	$p_no=$_REQUEST['ph_number'];
	$papername=$_REQUEST['papername'];
	$billmonth=$_REQUEST['Month'];
	$billyear=$_REQUEST['Year'];
 $replay =json_decode(insertcustomerdetainbill($total,$balance,$cust_id,$custname,$address,$p_no,$papername,$billmonth,$billyear));
 if ($replay['status']==0) {
 	header('location: seleccustforbill.php');
 }else
	{
header('location: seleccustforbill.php');
	}
	//header('location: brows_userspaper.php?msg=rus');
}

}
?>