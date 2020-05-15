<?php include_once('config.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('paperinfo','*',' AND p_id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($papername==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=pn&editId='.$_REQUEST['editId']);
		exit;
	}elseif($sun==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=sun&editId='.$_REQUEST['editId']);
		exit;
	}elseif($mon==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=mon&editId='.$_REQUEST['editId']);
		exit;
	}elseif($teu==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=teu&editId='.$_REQUEST['editId']);
		exit;
	}elseif($wed==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=wed&editId='.$_REQUEST['editId']);
		exit;
	}elseif($thur==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=thur&editId='.$_REQUEST['editId']);
		exit;
	}elseif($fri==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=fri&editId='.$_REQUEST['editId']);
		exit;
	}elseif($sat==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=sat&editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
					'papername'=>$papername,
					'sun'=>$sun,
					'mon'=>$mon,
					'teu'=>$teu,
					'thur'=>$thur,
					'wed'=>$wed,
					'fri'=>$fri,
					'sat'=>$sat

					);
	$update	=	$db->update('paperinfo',$data,array('p_id'=>$editId));
	if($update){
		header('location: brows_userspaper.php?msg=rus');
		exit;
	}else{
		header('location: brows_userspaper.php?msg=rnu');
		exit;
	}
}
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
		<h1><a href="home.html">dehuroad news agency</a></h1>
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="pn"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Paper name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="sun"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill or enter 0 mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="mon"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill or enter 0 mon mandatory field!</div>';
			}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="teu"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill or enter 0 teu mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="wed"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill or enter 0 wed mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="thur"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill or enter 0 thur mandatory field!</div>';
		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="fri"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill or enter 0 fri mandatory field!</div>';
		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="sat"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill or enter 0 sat mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add paper</strong> <a href="brows_userspaper.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse papers</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					<form method="post">
						<div class="form-group">
							<label>paper Name <span class="text-danger">*</span></label>
							<input type="text" name="papername" id="papername" class="form-control" value="<?php echo $row[0]['papername']; ?>" placeholder="paper  name" required>
						</div>
						<div class="form-group">
							<label>SUN<span class="text-danger">*</span></label>
							<input type="text" name="sun" id="sun" class="form-control" value="<?php echo $row[0]['sun']; ?>" placeholder="Enter sun rs" required>
						</div>
						<div class="form-group">
							<label>MON<span class="text-danger">*</span></label>
							<input type="text" name="mon" id="mon" class="form-control" value="<?php echo $row[0]['mon']; ?>" placeholder="Enter mon rs" required>
						</div>
						<div class="form-group">
							<label>TEU<span class="text-danger">*</span></label>
							<input type="text" name="teu" id="teu" class="form-control" value="<?php echo $row[0]['teu']; ?>" placeholder="Enter teu rs" required>
						</div>
						<div class="form-group">
							<label>WED<span class="text-danger">*</span></label>
							<input type="text" name="wed" id="wed" class="form-control" value="<?php echo $row[0]['wed']; ?>" placeholder="Enter sun rs" required>
						</div>
						<div class="form-group">
							<label>THUR<span class="text-danger">*</span></label>
							<input type="text" name="thur" id="thur" class="form-control" value="<?php echo $row[0]['thur']; ?>" placeholder="Enter thur rs" required>
						</div>
						<div class="form-group">
							<label>FRI<span class="text-danger">*</span></label>
							<input type="text" name="fri" id="fri" class="form-control" value="<?php echo $row[0]['fri']; ?>" placeholder="Enter fri rs" required>
						</div>
						<div class="form-group">
							<label>SAT<span class="text-danger">*</span></label>
							<input type="text" name="sat" id="sat" class="form-control" value="<?php echo $row[0]['sat']; ?>" placeholder="Enter sat rs" required>
						</div>
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update Paper</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>