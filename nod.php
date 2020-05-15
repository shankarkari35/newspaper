 <?php 
//////////////////////////number of days and there////////////////////////////////////
$arraynumberofdays=numofdays('01-03-2020','31-03-2020');
	// input start and end date 
function numofdays($startd,$endd){
	$startDate =$startd ; 
	$endDate = $endd; 
//$startDate = "01-03-2020"; 
	//$endDate = "31-03-2020"; 	
	$resultDays = array('Monday' => 0, 
	'Tuesday' => 0, 
	'Wednesday' => 0, 
	'Thursday' => 0, 
	'Friday' => 0, 
	'Saturday' => 0, 
	'Sunday' => 0); 
	// change string to date time object 
	$startDate = new DateTime($startDate); 
	$endDate = new DateTime($endDate); 
$i=1;
	// iterate over start to end date 
	while($startDate <= $endDate ){ 
		// find the timestamp value of start date 
		$timestamp = strtotime($startDate->format('d-m-Y')); 

		// find out the day for timestamp and increase particular day 
		$weekDay = date('l', $timestamp); 
		$resultDays[$weekDay] = $resultDays[$weekDay] + 1; 
//echo $i++;
		// increase startDate by 1 
		$startDate->modify('+1 day'); 
	} 
	return $resultDays; 
}
//////////////////////////paper and there rates ////////////////////////////////////

function feachallpapersandrates()
{ 
	$pArray=array();
	$response= array();
	$papernamearray=array();
	$con=mysqli_connect('localhost','root','','newspaper');
	
	$query = "select * from paperinfo ";
	if($stmt = $con->prepare($query))
	{ 
		$stmt->execute();

		$stmt->bind_result($pname,$sun,$mon,$tue, $wed,$thur,$fri,$sat,$p_id);
			while ($stmt->fetch()) {
				$pArray['sun']=$sun;
				$pArray['mon']=$mon;
				$pArray['tue']=$tue;
				$pArray['wed']=$wed;
				$pArray['thur']=$thur;
				$pArray['fri']=$fri;
				$pArray['sat']=$sat;
				$pArray['p_id']=$p_id;
				$papernamearray[$pname]=$pArray;

		}
	$response['prices']=$papernamearray;
		$stmt->close();
return json_encode($response);

}

}
function getpapernamefromnewspaper($cust_id){
$cust=$cust_id;
	$arrayName = array();
	$con=new mysqli('localhost','root','','newspaper');
                $q="select paperid from newspaper where cust_id=?";
                $stmt=$con->prepare($q);
                $stmt->bind_param("s",$cust);
                $stmt->execute();
                $stmt->bind_result($pname);
                while($stmt->fetch()){ 
                	$arrayName=unserialize($pname);
      }         
                 $stmt->close();
                return $arrayName;
}
//////////////GET NOMBER OF PAPER  OF EACH PAPER ///////////////
function getnopper($cust_id){
$cust=$cust_id;
	$arrayName = array();
	$con=new mysqli('localhost','root','','newspaper');
                $q="select noofpaper from newspaper where cust_id=?";
                $stmt=$con->prepare($q);
                $stmt->bind_param("s",$cust);
                $stmt->execute();
                $stmt->bind_result($pno);
                while($stmt->fetch()){ 
                	$arrayName=unserialize($pno);
      }         
                 $stmt->close();
                return  $arrayName;
}
//////////////////////FEACH ENTIRE DETA FROME CUSTOMER (newspaper) TO INSERT IT INTO BILL TABLE
function feachcustomerdeta($cust_id)
{ $c_id=$cust_id;
	$pArray=array();
	$response= array( );
	$papernamearray=array();
	$con=mysqli_connect('localhost','root','','newspaper');
	
	$query = " SELECT paperid,name,ph_number,address,deposit,noofpaper FROM newspaper WHERE cust_id=?";
	if($stmt = $con->prepare($query))
	{ 
		$stmt->bind_param("i" ,$c_id);
		$stmt->execute();
		
		$stmt->bind_result($paperid,$name,$ph_number,$address, $deposit,$noofpaper);
			while ($stmt->fetch()) {
				$pArray['paperid']=$paperid;
				$pArray['name']=$name;
				$pArray['ph_number']=$ph_number;
				$pArray['address']=$address;
				$pArray['deposit']=$deposit;
				$pArray['noofpaper']=$noofpaper;
				$papernamearray['customer']=$pArray;
		}
	$response=$papernamearray;
		$stmt->close();
return json_encode($response);

}

}
///////////////////INSERT DETA INTIO BILL DETA TABLE //////////////////////////
//insertcustomerdetainbill(1110,22,1,'ramesh','bapdev',12342222,'lokmat','feb',2345);
function insertcustomerdetainbill($total,$balance,$cust_id,$custname,$address,$p_no,$papername,$billmonth,$billyear)
{
	$pArray=array();                        
	$response= array();
	$papernamearray=array();
	$con=mysqli_connect('localhost','root','','newspaper');
	
$sql ="INSERT INTO `billdeta` (`total`, `balance`, `cust_id`, `custname`, `address`, `p_no`, `papername`, `billmonth`, `billyear`) VALUES (?,?,?,?,?,?,?,?,?)";

	if($stmt = $con->prepare($sql))
	{
		$stmt->bind_param("isississs" ,$total,$balance,$cust_id,$custname,$address,$p_no,$papername,$billmonth,$billyear);
		$stmt->execute();$response['status']='0';
			/*while ($stmt->fetch()) {
				$pArray['paperid']=$paperid;
				$pArray['name']=$name;
				$pArray['ph_number']=$ph_number;
				$pArray['address']=$address;
				$pArray['deposit']=$deposit;
				$pArray['noofpaper']=$noofpaper;
				$papernamearray['customer']=$pArray;
		}
	$response=$papernamearray;*/
		$stmt->close();
echo json_encode($response);

}

}
 /*$sql = "INSERT INTO `newspaper` (`cust_id`, `paperid`, `name`, `ph_number`, `emailid`, `address`, `lane`, `entry_date`, `deposit`, `noofpaper`) VALUES (NULL, \'\', \'\', \'\', \'\', \'\', NULL, CURRENT_TIMESTAMP, \'\', \'\')";
*/
/*$sql = "INSERT INTO `billdeta` (`billno`, `total`, `balance`, `cust_id`, `custname`, `address`, `p_no`, `papername`, `billmonth`, `billyear`) VALUES (NULL, NULL, \'\', NULL, NULL, \'\', \'\', \'\', \'\', \'\')";*/
?> 