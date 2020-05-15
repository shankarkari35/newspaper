<?php include_once('config.php');?>

</head>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Select bill</title>
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
</head>
<body>
	
	<?php
	$condition	=	'';
	if(isset($_REQUEST['name']) and $_REQUEST['name']!=""){
		$condition	.=	' AND name LIKE "%'.$_REQUEST['name'].'%" ';
	}
	if(isset($_REQUEST['lane']) and $_REQUEST['lane']!=""){
		$condition	.=	' AND lane LIKE "%'.$_REQUEST['lane'].'%" ';
	}
   
	if(isset($_REQUEST['cust_id']) and $_REQUEST['cust_id']!=""){
		$condition	.=	' AND cust_id LIKE "%'.$_REQUEST['cust_id'].'%" ';
	}

	if(isset($_REQUEST['status']) and $_REQUEST['status']!=""){
		$condition	.=	' AND cust_ LIKE "%'.$_REQUEST['cust_id'].'%" ';
	}
	
	$userData	=	$db->getAllRecords('newspaper','*',$condition,'ORDER BY cust_id DESC');
	?>
   	<div class="container">
		<center><h1><a href="home.html">Dehuroad News paper agency</a></h1></center>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong></strong> <a href="home.html" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i>DASHBOARD</a></div>
			<div class="card-body">
				<?php
				
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label> Name</label>
									<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($_REQUEST['name'])?$_REQUEST['name']:''?>" placeholder="Enter name">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label> lane</label>
									<input type="lane" name="lane" id="lane" class="form-control" value="<?php echo isset($_REQUEST['lane'])?$_REQUEST['lane']:''?>" placeholder="Enter lane ">
								</div>
							</div>
							
							<div class="col-sm-4">

							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
									</div>
								</div>
							</div>
						</div><div><fr>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>Customer Id</th>
						<th>Customer Name</th>
						<th>lane</th>
						<th class="text-center">BILL</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
					?>
					<tr>
						<td><?php echo $val['cust_id'];?></td>
						<td><?php echo $val['name'];?></td>
						<td><?php echo $val['lane'];?></td>
						
						<td align="center">
							<a href="editpaper.php?editId=<?php echo $val['cust_id'];?>"class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="jh.php?cust_id=<?php echo $val['cust_id'];?>" class="text-danger"><i class="fa fa-fw fa-bill"></i>bill</a>
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
		</div> 
					</form>
				</div>
			</div>
		</div>
		<hr>
		
		
		
	</div>
</body>
</html>
