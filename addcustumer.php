
<?php include_once('config.php');

//index.php

$connect = new PDO("mysql:host=localhost;dbname=newspaper", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM paperinfo ORDER BY papername ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["papername"].'">'.$row["papername"].'</option>';
 }
 return $output;
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	
	if(isset($_POST["item_unit"]))  
       { $i=0;
            foreach ($_POST['item_unit'] as $subject)  {
              
                $papername[$i]=$subject;
          $i++;
          foreach ($_POST['quantity'] as $qty)  {
             // $i++;
                $pq[$subject]=$qty;
          }}
         // print_r($pq);
         $names_str = serialize($papername);
         // echo $paperid;
          $pqty = serialize($pq);
         echo $pqty;
          }
	extract($_REQUEST);
	if($name==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($emailid==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($ph_number==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
		}elseif($address==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=adr');
		exit;
	}elseif($lane==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=la');
		exit;
	}elseif($deposit==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=dep');
		exit;

	}else{
		//cust_id`, `name`, `ph_number`, `emailid`, `address`, `lane`, `entry_date`, `deposit
		$userCount	=	$db->getQueryCount('newspaper','cust_id');
		if($userCount[0]['total']<20){
			$data	=	array(
				            'paperid'=>$names_str,
							'name'=>$name,
							'ph_number'=>$ph_number,
							'emailid'=>$emailid,
							'address'=>$address,
							'lane'=>$lane,
							'deposit'=>$deposit,
							'noofpaper'=>$pqty
//`paperid`, `name`, `ph_number`, `emailid`, `address`, `lane`, `entry_date`, `deposit
						);
			$insert	=	$db->insert('newspaper',$data);
			if($insert){
				header('location:brows_cust.php?msg=ras');
				exit;
			}else{
				header('location:brows_cust.php?msg=rna');
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

	<title>Add Paper</title>

	

	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->

	
<script src="jquery-3.5.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131906273-1"></script>

<!-- 	<script>

	  window.dataLayer = window.dataLayer || [];

	  function gtag(){dataLayer.push(arguments);}

	  gtag('js', new Date());

	  gtag('config', 'UA-131906273-1');

	</script> -->
	<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html +='<td><input type="number" name="quantity[]" class="form-control item_quantity" /></td>';
  html +='<td><select name="item_unit[]" class="form-control item_unit"><option value="">Select Unit</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 //subject[]
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
  });
</script>

</head>



<body>
<!-- 
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="newnews/home.html">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav>
 -->

	<div class="bg-light border-bottom shadow-sm sticky-top">

		<div class="container">

			<header class="blog-header py-1">

					</div>

				</nav>

			</header>

		</div> <!--/.container-->

	</div>

	<!-- <div class="container my-4">

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		

		<ins class="adsbygoogle"

			 style="display:block"

			 data-ad-client="ca-pub-6724419004010752"

			 data-ad-slot="6737619771"

			 data-ad-format="auto"

			 data-full-width-responsive="true"></ins>

		<script>

		(adsbygoogle = window.adsbygoogle || []).push({});

		</script>

	</div> -->

	

   	<div class="container">

	<center>	<h1><a href="home.html">Dheuroad news paper agency</a></h1></center>

		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="adr"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User address is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="la"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User lane is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dep"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> deposit is mandatory field!</div>';

		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again <strong>We set limit for security reasons!</strong></div>';

		}

		?>

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add Custumer</strong> <a href="brows_cust.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse custumer</a></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

					<form method="post" id="insert_form">
						<div class="form-group">
							<label> Name <span class="text-danger">*</span></label>

							<input type="text" name="name" id="name" class="form-control" placeholder="Enter customer name" required>

						</div>

						<div class="form-group">

							<label> Email <span class="text-danger">*</span></label>

							<input type="email" name="emailid" id="emailid" class="form-control" placeholder="Enter customer email" required>

						</div>

						<div class="form-group">

							<label> Phone NO<span class="text-danger">*</span></label>

							<!-- <input type="tel" pattern=".{14,14}" title="Accept INDIA Number format (888) 888-8888" class="tel form-control" name="ph_number" id="ph_number" x-autocompletetype="tel" placeholder="Enter customer phone" required>
 -->
 <input type="text"  class="form-control" name="ph_number" id="ph_number"  placeholder="Enter customer phone" required>

						</div>
						<div class="form-group">

							<label> Address<span class="text-danger">*</span></label>

							<input type="text" name="address" id="address" class="form-control" placeholder="Enter address" required>

						</div>
						<div class="form-group">

							<label>add lane <span class="text-danger">*</span></label>

							<input type="text" name="lane" id="lane" class="form-control" placeholder="Enter adress lane" required>

						</div>
						<div class="form-group">

							<label>Deposit<span class="text-danger">*</span></label>

							<input type="text" name="deposit" id="deposit" class="form-control" placeholder="Enter deposit" required>

						</div>
                      <div class="form-group">
                      	 <div class="table-repsonsive">
       <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Enter Qty</th>
       <th>Enter paperrnamne</th>
       <th>Select Unit</th>
       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     
    </div>

                        </div>
						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add User</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>


	</div>

	
</body>

</html>