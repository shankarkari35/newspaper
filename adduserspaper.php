<?php include_once('config.php');
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($papername==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=pn');
		exit;
	}elseif($sun==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=sun');
		exit;
	}elseif($mon==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=mon');
		exit;
	}elseif($teu==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=teu');
		exit;
	}elseif($wed==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=wed');
		exit;
	}elseif($thur==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=thur');
		exit;
	}elseif($fri==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=fri');
		exit;
	}elseif($sat==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=sat');
		exit;
	}
	else{
		

		$peparCount	=	$db->getQueryCount('paperinfo','p_id');
		if($peparCount[0]['total']<20){
			$data	=	array(
							'papername'=>$papername,
							'sun'=>$sun,
							'mon'=>$mon,
							'teu'=>$teu,
							'wed'=>$wed,
							'thur'=>$thur,
							'fri'=>$fri,
							'sat'=>$sat
						);
			$insert	=	$db->insert('paperinfo',$data);
			if($insert){
				header('location:brows_userspaper.php?msg=ras');
				exit;
			}else{
				header('location:brows_userspaper.php?msg=rna');
				exit;
			}
		}else{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');
			exit;
		}
	}
}
?>

<!doctype html>

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Add Paper </title>

	


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


</head>



<body>

	

	<div class="bg-light border-bottom shadow-sm sticky-top">

		<div class="container">

			<header class="blog-header py-1">

				
						</form>

					</div>

				</nav>

			</header>

		</div> <!--/.container-->

	</div>

   	<div class="container">

		<center><h1><a href="home.html">Dehuroad News Paper</a></h1></center>

		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="pn"){

			echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> paper name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="sun"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill this !</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="mon"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill this!</div>';

		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="teu"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill this!</div>';

		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="wed"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill this!</div>';

		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="thur"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill this!</div>';

		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="fri"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill this!</div>';

		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="sat"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> fill this!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete and then try again <strong>We set limit for security reasons!</strong></div>';

		}

		?>
  
		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add New Paper</strong> <a href="brows_userspaper.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

					<form method="post">

						<div class="form-group">

							<label>Paper Name <span class="text-danger">*</span></label>

							<input type="text" name="papername" id="papername" class="form-control" placeholder="Enter paper name" required>

						</div>

						<div class="form-group">

							<label>sun <span class="text-danger">*</span></label>

							<input type="text" name="sun" id="sun" class="form-control" placeholder="Rate sun" required>

						</div>

						<div class="form-group">

							<label>mon <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="mon" id="mon" placeholder="Rate" required>

						</div>
						<div class="form-group">

							<label>teu <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="teu" id="teu" placeholder="Rate" required>

						</div>
						<div class="form-group">

							<label>wed<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="wed" id="wed" placeholder="Rate" required>

						</div>
						<div class="form-group">

							<label>thur<span class="text-danger">*</span></label>
							<input type=" text" class="form-control" name="thur" id="thur " placeholder="Rate" required>

						</div>
						<div class="form-group">

							<label>fri<span class="text-danger">*</span></label>
							<input type=" text" class="form-control" name="fri" id="fri" placeholder="Rate" required>

						</div>
						<div class="form-group">

							<label>sat<span class="text-danger">*</span></label>
							<input type=" text" class="form-control" name="sat" id="sat" placeholder="Rate" required>

						</div>
						

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add </button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

    
	</div>

</body>

</html>