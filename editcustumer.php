<?php include_once('config.php');

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
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('newspaper','*',' AND cust_id="'.$_REQUEST['editId'].'"');
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

	if(isset($_POST["subject"]))  
        { $i=0;
        	 $papername[]= array();
        		foreach ($_POST['subject'] as $subject)  {
        			
                $papername[$i]=$subject;
                $i++;
        	}
        	
           $names_str = serialize($papername);
        }
	if($name==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}elseif($emailid==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
		exit;
	}elseif($ph_number==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}elseif($address==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=adr&editId='.$_REQUEST['editId']);
		exit;
	}elseif($lane==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=la&editId='.$_REQUEST['editId']);
		exit;
	}elseif($deposit==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=dep&editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
					'name'=>$name,
					'emailid'=>$emailid,
					'paperid'=>$names_str,
					'ph_number'=>$ph_number,
					'address'=>$address,
					'lane'=>$lane,
					'deposit'=>$deposit,
					'noofpaper'=>$pqty
				);

	$update	=	$db->update('newspaper',$data,array('cust_id'=>$editId));
	if($update){
		header('location: brows_cust.php?msg=rus');
		exit;
	}else{
		header('location: brows_cust.php?msg=rnu');
		exit;
	}
}
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Add New Custumer</title>
	
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

     <title>Add News Paper</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	
	</div>

	
   	<div class="container">

		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
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
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="brows_cust.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					<form method="post">
						<div class="form-group">
							<label> Name <span class="text-danger">*</span></label>
							<input type="text" name="name" id="name" class="form-control" value="<?php echo $row[0]['name']; ?>" placeholder="Enter custumer name" required>
						</div>
						<div class="form-group">
							<label> Email <span class="text-danger">*</span></label>
							<input type="email" name="emailid" id="emailid" class="form-control" value="<?php echo $row[0]['emailid']; ?>" placeholder="Enter Custumer email" required>
						</div>
						<div class="form-group">
							<label> Phone <span class="text-danger">*</span></label>
							<input type="tel" name="ph_number" id="ph_number" maxlength="12" class="form-control" value="<?php echo $row[0]['ph_number']; ?>" placeholder="Enter user phone" required>
						</div>
						<div class="form-group">
							<label> Address<span class="text-danger">*</span></label>
							<input type="text" name="address" id="address" maxlength="12" class="form-control" value="<?php echo $row[0]['address']; ?>" placeholder="Enter address" required>
						</div>
						<div class="form-group">
							<label>lane <span class="text-danger">*</span></label>
							<input type="text" name="lane" id="lane" maxlength="12" class="form-control" value="<?php echo $row[0]['lane']; ?>" placeholder="Enter lane" required>
						</div>
						<div class="form-group">
							<label>Dposit <span class="text-danger">*</span></label>
							<input type="tel" name="deposit" id="deposit" maxlength="12" class="form-control" value="<?php echo $row[0]['deposit']; ?>" placeholder="Enter deposit" required>
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
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update User</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    
    <script src="jquery-3.5.0.min.js"></script>
    <script src="jquery-3.5.0.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="jquery-3.5.0.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->
</body>
</html>