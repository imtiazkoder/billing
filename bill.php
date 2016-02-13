
<?php



if(isset($_POST['add'])){
$servername = "localhost";
$username = "root";
$password = "";
$db = "test";


$conn = mysqli_connect($servername, $username, $password);
$link = mysql_select_db($db);

//if (!$conn) {
  //  die("Connection failed: " . mysqli_connect_error());}
//echo "Connected successfully";

//if (!$link) {
  //  die("db Connection failed: " . mysqli_connect_error());}
//echo "db Connected successfully";






						
//variabling 						
$member_no = $_POST['no'];
$member_rank =$_POST['rank'];
$member_name = $_POST['name'];
$member_unit = $_POST['unit'];
$member_appt = $_POST['appt'];
$member_adds = $_POST['adds'];
$member_con = $_POST['connection'];
$member_dev = $_POST['device'];
$member_ip = $_POST['ipadds'];
$member_mac = $_POST['madds'];
$member_confrom = $_POST['condate'];
$member_disin = $_POST['disdate'];
$member_mob = $_POST['mob'];
$member_spd = $_POST['spd'];
$member_rate = $_POST['rate'];
$member_email = $_POST['email'];





$date1 = $member_confrom;
$date2 = $member_disin;
$date3 = date('Y-m-d');
$ts1 = strtotime($date1);
$ts2 = strtotime($date2);
$ts3 = strtotime($date3);


$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);
$year3 = date('Y', $ts3);

$month1 = date('m', $ts1);
$month2 = date('m', $ts2);
$month3 = date('m', $ts3);

$diff = (($year3 - $year1) * 12) + ($month3 - $month1);
$diff1 = (($year2 - $year1) * 12) + ($month2 - $month1);


if($member_disin == ""){
			echo $diff;
			echo "</br>";
			echo "Bill:";
			echo $bill = $diff * $member_rate ; 
			$member_bill = $bill;

//echo "$diff";
					}else
						{
							echo $diff1;
							echo "</br>";
							echo "Bill:";
							echo $bill = $diff1 * $member_rate ; 
$member_bill = $bill;
							
						}
						
						
$sql = "INSERT INTO `customer`.`member`( no, rk, name, unit, appt, cadds, tycon, tydev, ip, mac, con, dis, mob, spd, email, rate, arrear) VALUES('$member_no','$member_rank','$member_name', '$member_unit', '$member_appt', '$member_adds', '$member_con', '$member_dev', '$member_ip', '$member_mac', '$member_confrom', '$member_disin', '$member_mob', '$member_spd', '$member_email', '$member_rate', $member_bill )";


if (mysqli_query($conn, $sql)) {
	echo "success";
	//header('Location: fetch.php');
    
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


}
?>
