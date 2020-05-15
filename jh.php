<?php
?><div><br>   <center><h1><a href="home.html">Dehuroad News paper agency</a></h1></center><br></div>
<html>

<head>
  <style>
select { 
    background-color:red;padding: 10px;
}

h1{
    color: red;
    padding: 60px;

} 
</style>
  <title>Bill</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
  
<div class="w3-container w3-blue">
<form method="post">
 <center><b> <label for="month">Month</label></b>
<select color-red id="month"name="month">
  <option value="01">JAN</option>
  <option value="02">FEB</option>
  <option value="03">MAR</option>
  <option value="04">APR</option>
  <option value="05">MAY</option>
  <option value="06">JUN</option>
  <option value="07">JUL</option>
  <option value="08">AUG</option>
  <option value="09">SUP</option>
  <option value="10">OCT</option>
  <option value="11">NOV</option>
  <option value="12">DEC</option>
</select>

 <b>Enter Year</b><input type="text" name="year"placeholder=" YYYY" value="">
  <b><button name="date" class="btn btn-primary">proceed</button><b></center>
</form></div>
<title>Untitled Document</title>
<script type="text/javascript" src="jquery-3.5.0.min.js"></script>
<script type="text/javascript" src="jquery-3.5.0.min.js"></script>
<SCRIPT language="javascript">
    $(function () {
        // add multiple select / deselect functionality
$(document).ready(function() {
 $("#selectall").click(function () {
            $('.name').attr('checked', this.checked); });
        // if all checkbox are selected, then check the select all checkbox
        // and viceversa
        $(".name").click(function () {
            if ($(".name").length == $(".name:checked").length) {
                $("#selectall").attr("checked", "checked");
    
            } else {
                $("#selectall").removeAttr("checked");
            } updateSum();
        });
    });
    function updateSum() {
      var total = 0;
      $(".name:checked").each(function(i, n) {total += parseInt($(n).val());})
      $("#total").val(total);
    }
    // run the update on every checkbox change and on startup
})
</SCRIPT>
<?php if(isset($_POST['date'])){
  /* $startDate =$_POST['call'] ; 
  $endDate = $_POST['cal2'];*/ ?>
<body><div class="container"><table class="table table-dark">
<form method="POST" action="insertbilldata.php">
<tr><th><b>Select All</b><input type="checkbox" id="selectall" checked/> </th></tr>
<?php

?><tr>



 <?php
 function practiceofcheakbox($sun,$mon,$tue,$wed,$thur,$fri,$sat,$pname1,$no){
 
  $resultDays = array('Monday' => 0, 
  'Tuesday' => 0, 
  'Wednesday' => 0, 
  'Thursday' => 0, 
  'Friday' => 0, 
  'Saturday' => 0, 
  'Sunday' => 0); 
  if(isset($_POST['year'])&&isset($_POST['month'])){
    $y=$_POST['year'];$m=$_POST['month'];
  }
 
$d=cal_days_in_month(CAL_GREGORIAN,$m,$y); 

            for ($i=1; $i <=$d ; $i++) { 
             echo "   "; 
             $date = $y.'-'.$m.'-'.$i;
            $unixTimestamp = strtotime($date);
            $dayOfWeek = date("l", $unixTimestamp); 
            //echo $i." ".$dayOfWeek; 
  $temp=$dayOfWeek;
  switch ($temp) {
    case 'Sunday': echo"<br>";
    ?>
    <th><b><input type="checkbox" class="name" id="aclean" name="name"  value=<?php echo $sun;?> data-toggle=checked> <!-- ,$mon,$tue,$wed,$thur,$fri,$sat -->
      <?php $temp="SUN"; echo " ".$i." ". $temp." Rs ".$sun; break;
    case 'Monday':
       ?></b></th><th><b>
    <input type="checkbox" class="name" id="aclean" name="name"  value=<?php echo $mon;  ?> data-toggle=checked>
      <?php $temp="MON"; echo " ".$i." ".$temp."  Rs ".$mon; break;
        break;
        case 'Tuesday':
?></b></th><th><b>
    <input type="checkbox" class="name" id="aclean" name="name"  value=<?php echo $tue;  ?> data-toggle=checked>
     <?php $temp="TUE"; echo" ".$i." ". $temp." Rs ".$tue; break;
        break;
        case 'Wednesday':
        ?></b></th><th><b>
    <input type="checkbox" class="name" id="aclean" name="name"  value=<?php echo $wed;  ?> data-toggle=checked>
<?php $temp="WED"; echo " ".$i." ". $temp."  Rs ".$wed; break;
        break;
        case 'Thursday':
       ?></b></th><th><b>
    <input type="checkbox" class="name" id="aclean" name="name"  value=<?php echo $thur;  ?> data-toggle=checked>
     <?php $temp="THU"; echo" ".$i." ". $temp."  Rs ".$thur; break;
        break;
        case 'Friday':
       ?></b></th><th><b>
    <input type="checkbox" class="name" id="aclean" name="name"  value=<?php echo $fri;  ?> data-toggle=checked>
      <?php $temp="FRI";
        echo" ".$i." ". $temp."  Rs ".$fri; break;
        break;
        case 'Saturday':
       ?></b></th><th><b>
    <input type="checkbox" class="name" id="aclean" name="name"  value=<?php echo $sat;  ?> data-toggle=checked>
      <?php $temp="SAT";
        echo" ".$i." ". $temp."  Rs ".$sat; break;
        break;
    default:
        
        break;
   }
  } 
 } 




   ?></b></th></tr>
          
        <tr> <th> <b>customer Code</b><input type="text" id="cust_id" name="cust_id" value='<?php echo $_GET['cust_id'];?>'></th><th>
            <b>year</b><input type="text" id="year" name="year" value="<?php if (isset($_POST['year'])) echo $_POST['year']; ?>"></th><th>
            <b>month</b><input type="text" id="month" name="month" value="<?php if (isset($_POST['month'])) echo $_POST['month']; ?>"></th><th>
         <b>TOTAL</b><input type="text" id="total" name="total" value="0"></th>
          
          <th><input type=submit value="submit" name=submit></th></tr></form></table>

</body>

</html>

 <?php 
 include'nod.php';
 $cust_id=$_GET['cust_id'];
$noofpaper=array();
$noofpaper=getnopper($cust_id);
$arraynumberofdays = array();
 $arraynumberofdays=numofdays('01-03-2020','31-04-2020');
//feachallpapersandrates();
//echo feachallpapersandrates();


$arr = json_decode(feachallpapersandrates(), true);
$arrayNam = array();
$arrayNam= getpapernamefromnewspaper($cust_id);
//feach paper name of customer
//print_r($arrayNam);
$i=0;
foreach ($arrayNam as $k) {
echo "<b>".$arrayNam[$i]."</b>";
//print_r($arrayNam[$i]);
$sun=intval($arr['prices'][$arrayNam[$i]]['sun'])*intval($noofpaper[$arrayNam[$i]]);
$mon=intval($arr['prices'][$arrayNam[$i]]['mon'])*intval($noofpaper[$arrayNam[$i]]);
$tue=intval($arr['prices'][$arrayNam[$i]]['tue'])*intval($noofpaper[$arrayNam[$i]]);
$wed=intval($arr['prices'][$arrayNam[$i]]['wed'])*intval($noofpaper[$arrayNam[$i]]);
$thur=intval($arr['prices'][$arrayNam[$i]]['thur'])*intval($noofpaper[$arrayNam[$i]]);
$fri=intval($arr['prices'][$arrayNam[$i]]['fri'])*intval($noofpaper[$arrayNam[$i]]);
$sat=intval($arr['prices'][$arrayNam[$i]]['mon'])*intval($noofpaper[$arrayNam[$i]]);
//$p_id=$arr['prices'][$arrayNam[$i]]['p_id'];
echo "<br>";
practiceofcheakbox($sun,$mon,$tue,$wed,$thur,$fri,$sat,$arrayNam[$i],intval($noofpaper[$arrayNam[$i]]));
 $i++;
 echo "<br>";
 }if(isset($_POST['submit'])){
  $tot=$_POST['total'];
echo $tot;
 }

 /*$sql = "INSERT INTO `billdeta` (`billno`, `total`, `balance`, `cust_id`, `custname`, `address`, `p_no`, `papername`, `billmonth`, `billyear`) VALUES (NULL, NULL, \'\', NULL, NULL, \'\', \'\', \'\', \'\', \'\')";*/
//practiceofcheakbox($sun,$mon,$tue,$wed,$thur,$fri,$sat); 
 /*$y='2002';
 $m='12';
$d=cal_days_in_month(CAL_GREGORIAN,12,1965); 

            for ($i=1; $i <=$d ; $i++) { 
             echo "   "; 
             $date = $y.'-'.$m.'-'.$i;
            $unixTimestamp = strtotime($date);
            $dayOfWeek = date("l", $unixTimestamp); */
            //echo $i." ".$dayOfWeek; 
 }?>
