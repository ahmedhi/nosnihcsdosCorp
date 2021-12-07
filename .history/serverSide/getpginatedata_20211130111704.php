<?php

if (isset($_GET['pageno']) && isset($_GET['entries'])) {
    $pageno = $_GET['pageno'];
    $no_of_records_per_page = $_GET['entries'];
} else {
    $pageno = 1;
    $no_of_records_per_page =10;
}

$servername = "135.148.9.103";
$username = "admin";
$password = "rod@2021";
$db = "rod_all";


$offset = ($pageno - 1) * $no_of_records_per_page;

$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

$total_pages_sql = "SELECT COUNT(*) FROM data_rod_all Limit 1000";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM data_rod_all LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($conn, $sql);

$paginate_data = array('page_no'=>(int)$pageno,'total_pages'=>$total_pages);

$rows = array();
while ($row = mysqli_fetch_array($res_data)) {
    //here goes the data
    $rows[] = $row;
}
$res =array('paginate_data'=>$paginate_data,'table_data'=>$rows);
echo json_encode($res);
mysqli_close($conn);
?>