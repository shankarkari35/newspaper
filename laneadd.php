<?php include_once('config.php');
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($lno==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=lno');
		exit;
	/*}elseif($pdate==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=d');
		exit;*/
	}elseif($lname==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=lname');
		exit;
	}else{
		
		$pCoueparnt	=	$db->getQueryCount('lane','lno');
		if($peparCount[0]['total']<20){
			$data	=	array(
							'lno'=>$lno,
							'lname'=>$lname
						);
			$insert	=	$db->insert('lane',$data);
			if($insert){
				header('location:brows_lane.php?msg=ras');
				exit;
			}else{
				header('location:brows_lane.php?msg=rna');
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

<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Dehuroad News Paper Agency</title>

	

	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

	<script>

	  (adsbygoogle = window.adsbygoogle || []).push({

		google_ad_client: "ca-pub-6724419004010752",

		enable_page_level_ads: true

	  });

	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131906273-1"></script>

	<!-- <script>

	  window.dataLayer = window.dataLayer || [];

	  function gtag(){dataLayer.push(arguments);}

	  gtag('js', new Date());

	  gtag('config', 'UA-131906273-1');

	</script> -->

</head>



<body>

	

	<div class="bg-light border-bottom shadow-sm sticky-top">

		<div class="container">

			<header class="blog-header py-1">

				<!nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand text-muted p-0 m-0" href="https://learncodeweb.com">
			</header>

		</div> <!--/.container-->

	</div>

	<div class="container my-4">

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		<!-- demo top banner -->

		<ins class="adsbygoogle"

			 style="display:block"

			 data-ad-client="ca-pub-6724419004010752"

			 data-ad-slot="6737619771"

			 data-ad-format="auto"

			 data-full-width-responsive="true"></ins>

		<script>

		(adsbygoogle = window.adsbygoogle || []).push({});

		</script>

	</div>

	

   	<div class="container">

		<h1><a href="https://learncodeweb.com/php/php-crud-in-bootstrap-4-with-search-functionality/">Lane</a></h1>

		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="lname"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> lane number  is mandatory field!</div>';
/*
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="d"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> date  is mandatory field!</div>';
*/
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="lno"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Rate is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again <strong>We set limit for security reasons!</strong></div>';

		}

		?>
  
		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="brows_lane.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse lane</a></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Fields with <span class="text-danger"></span> are mandatory!</h5>

					<form method="post">

						<div class="form-group">

							<label>name Nno <span class="text-danger">*</span></label>

							<input type="text" name="lno" id="lno" class="form-control" placeholder="Enter lane number" required>

						</div>

						<div class="form-group">

							<label> lane name<span class="text-danger">*</span></label>

							<input type="text" name="lname" id="lname" class="form-control" placeholder="Enter lane name" required>

						</div>

						<!-- <div class="form-group">

							<label>Rate <span class="text-danger">*</span></label>
							<input type=" text" class="form-control" name="rate" id=" rate" placeholder="Enter paper rate" required>

							
 
						</div>
 -->
						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add Lane</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

    

	<div class="container my-4">

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		<!-- demo left sidebar -->

		<ins class="adsbygoogle"

			 style="display:block"

			 data-ad-client="ca-pub-6724419004010752"

			 data-ad-slot="7706376079"

			 data-ad-format="auto"

			 data-full-width-responsive="true"></ins>

		<script>

		(adsbygoogle = window.adsbygoogle || []).push({});

		</script>

	</div>

</body>

</html>