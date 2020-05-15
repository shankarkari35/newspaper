
<?php include_once('config.php');?>
<!doctype html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Brows Customer</title>
	
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
</head>

<body>
	
	
						</form>
					</div>
				</nav>
			</header>
		</div> 
	</div>
	
	<?php
	$condition	=	'';
	if(isset($_REQUEST['name']) and $_REQUEST['name']!=""){
		$condition	.=	' AND name LIKE "%'.$_REQUEST['name'].'%" ';
	}
	if(isset($_REQUEST['emailid']) and $_REQUEST['emailid']!=""){
		$condition	.=	' AND emaiidl LIKE "%'.$_REQUEST['emailid'].'%" ';
	}
	if(isset($_REQUEST['ph_number']) and $_REQUEST['ph_number']!=""){
		$condition	.=	' AND ph_number LIKE "%'.$_REQUEST['ph_number'].'%" ';
	}
	if(isset($_REQUEST['lane']) and $_REQUEST['lane']!=""){
		$condition	.=	' AND lane LIKE "%'.$_REQUEST['lane'].'%" ';
	}
	if(isset($_REQUEST['deposit']) and $_REQUEST['deposit']!=""){
		$condition	.=	' AND deposit LIKE "%'.$_REQUEST['deposit'].'%" ';
	}
	if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){

		$condition	.=	' AND DATE(entry_date)>="'.$_REQUEST['df'].'" ';

	}
	if(isset($_REQUEST['entry_date']) and $_REQUEST['entry_date']!=""){

		$condition	.=	' AND DATE(entry_date)<="'.$_REQUEST['entry_date'].'" ';

	}
	
	$userData	=	$db->getAllRecords('newspaper','*',$condition,'ORDER BY cust_id DESC');
	?>
   	<div class="container">
		<center><h1><a href="home.html">Dehuroad News Paper Agency</a></h1>
</center>		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse custumer</strong> <a href="addcustumer.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add custmur</a></div>
			<div class="card-body"> 
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find custumer</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
								
									<label>Custumer Name</label>
									<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($_REQUEST['name'])?$_REQUEST['name']:''?>" placeholder="Enter customer name">
								</div>
							</div>
						
							<div class="col-sm-3">
								<div class="form-group">
									<label>lane</label>
									<input type="tel" name="lane" id="lane" class="form-control" value="<?php echo isset($_REQUEST['lane'])?$_REQUEST['lane']:''?>" placeholder="Enter custumer lane">
								</div>
							</div>
							<div class="col-sm-3">

								<div class="form-group">

									<label>Date</label>
									<div class="input-group">
										<input type="text" class="fromDate form-control hasDatepicker" name="df" id="df" value="" placeholder=" from date">
										<div class="input-group-prepend"><span class="input-group-text">-</span></div>
										<input type="text" class="toDate form-control hasDatepicker" name="entry_date" id="entry_date" value="" placeholder=" to date">
										<div class="input-group-append"><span class="input-group-text"><a href="javascript:;" onclick="$('#df,#entry_date').val('');"><i class="fa fa-fw fa-sync"></i></a></span></div>
									</div>

								</div>

							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>Sr no</th>
						<th>Papers</th>
						<th>Custumer Name</th>
						<th>Custumer Email</th>
						<th>Custumer Phone</th>
						<th>Custumer Address</th>
						<th>Custumer Lane</th>
						<th>Custumer Deposit</th>
						<th class="text-center">Record Date</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
					?>
					<tr><!-- //$sql = "INSERT INTO `newspaper` (`cust_id`, `name`, `ph_number`, `emailid`, `address`, `lane`, `entry_date`, `deposit`) VALUES (NULL, \'\', \'\', \'\', \'\', NULL, \'\', \'\')";
		 -->
						<td><?php echo $s;?></td>
						<td><?php 
                        $i=0;
		                 $arrayName=unserialize($val['paperid']);
                         foreach ($arrayName as $key ) {
                         print_r($arrayName[$i]);echo "<br>";
    	                 $i++;
                          }
						?></td>
						<td><?php echo $val['name'];?></td>
						<td><?php echo $val['emailid'];?></td>
						<td><?php echo $val['ph_number'];?></td>
						<td><?php echo $val['address'];?></td>
						<td><?php echo $val['lane'];?></td>
						<td><?php echo $val['deposit'];?></td> 
						<td><?php echo date('Y-m-d',strtotime($val['entry_date']));?></td>
						<td align="center">
							<a href="editcustumer.php?editId=<?php echo $val['cust_id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="custdelete.php?delId=<?php echo $val['cust_id'];?>" clas_s="text-danger" onClick="return confirm('Are you sure to delete this cstumer?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
						</td>
					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		
	</div>
	
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
    <script>
		$(document).ready(function() {
			jQuery(function($){
				  var input = $('[type=tel]')
				  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
				  input.bind('country.mobilePhoneNumber', function(e, country) {
					$('.country').text(country || '')
				  })
			 });
			 
			 //From, To date range start
			var dateFormat	=	"yy-mm-dd";
			fromDate	=	$(".fromDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function(){
				toDate.datepicker("option", "minDate", getDate(this));
			}),
			toDate	=	$(".toDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function() {
				fromDate.datepicker("option", "maxDate", getDate(this));
			});
			
			
			function getDate(element){
				var date;
				try{
					date = $.datepicker.parseDate(dateFormat,element.value);
				}catch(error){
					date = null;
				}
				return date;
			}
			//From, To date range End here	
			
		});
	</script>
</body>
</html>
