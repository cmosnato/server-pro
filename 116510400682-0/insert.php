<?php
// เชื่อมต่อกับฐานข้อมูล
$mysqli = new mysqli('localhost', 'root', '', 'hw81');

// ตรวจสอบการเชื่อมต่อ
if ($mysqli->connect_errno) {
    echo "Failed to connect to Database: " . $mysqli->connect_error;
    exit();
}

// รับค่าจากฟอร์ม HTML
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$Nameeng = $_POST['Nameeng'];
$gender = $_POST['gender'];
$job = $_POST['job'];
$salary = $_POST['salary'];
$salary_period = $_POST['salary_period'];
$address_no = $_POST['no'];
$address_group = $_POST['group'];
$address_road = $_POST['road'];
$address_district = $_POST['district'];
$address_county = $_POST['county'];
$address_province = $_POST['province'];
$address_postalcode = $_POST['Postalcode'];
$email = $_POST['email'];
$current_address_no = $_POST['nonow'];
$current_address_group = $_POST['groupnow'];
$current_address_road = $_POST['roadnow'];
$current_address_district = $_POST['districtnow'];
$current_address_county = $_POST['countynow'];
$current_address_province = $_POST['provincenow'];
$current_address_postalcode = $_POST['Postalcodenow'];
$phone_home = $_POST['phonehomenow'];
$phone_mobile = $_POST['phonenow'];
$who_at_home = $_POST['whoathome'];
$who_at_home_others = isset($_POST['whoathome']) && $_POST['whoathome'] === 'others' ? $_POST['whoathome'] : NULL;
$birthday = $_POST['birthday'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$nationality = $_POST['nationality'];
$ethnicity = $_POST['ethnicity'];
$religion = $_POST['religion'];
$id_card_no = $_POST['noid'];
$id_card_place = $_POST['whereid'];
$id_card_expiry = $_POST['idexpire'];
$taxpayer_id = $_POST['taxpayerid'];
$social_security_id = $_POST['socialsecurityid'];
$military_condition = $_POST['militarycondition'];
$qualified_military_year = isset($_POST['qualifiedmilitary_year']) ? $_POST['qualifiedmilitary_year'] : NULL;
$marital_status = $_POST['status'];
$marital_registration = $_POST['statusmarry'];
$spouse_name = $_POST['spouse'];
$spouse_job = $_POST['wherespousejob'];
$spouse_position = $_POST['positionspouse'];
$children_count = $_POST['havebaby'];
$studying_children_count = $_POST['badystuding'];
$not_studying_children_count = $_POST['badynotstuding'];

// สร้าง SQL Query สำหรับการแทรกข้อมูล
$sql = "INSERT INTO Form (
    `fname`, `lname`, `Nameeng`, `gender`, `job`, `salary`, `salary_period`, 
    `address_no`, `address_group`, `address_road`, `address_district`, 
    `address_county`, `address_province`, `address_postalcode`, `email`, 
    `current_address_no`, `current_address_group`, `current_address_road`, 
    `current_address_district`, `current_address_county`, `current_address_province`, 
    `current_address_postalcode`, `phone_home`, `phone_mobile`, 
    `who_at_home`, `who_at_home_others`, `birthday`, `age`, `height`, 
    `weight`, `nationality`, `ethnicity`, `religion`, `id_card_no`, 
    `id_card_place`, `id_card_expiry`, `taxpayer_id`, `social_security_id`, 
    `military_condition`, `qualified_military_year`, `marital_status`, 
    `marital_registration`, `spouse_name`, `spouse_job`, `spouse_position`, 
    `children_count`, `studying_children_count`, `not_studying_children_count`
) VALUES (
    '$fname', '$lname', '$Nameeng', '$gender', '$job', $salary, '$salary_period', 
    $address_no, $address_group, '$address_road', '$address_district', 
    '$address_county', '$address_province', $address_postalcode, '$email', 
    $current_address_no, $current_address_group, '$current_address_road', 
    '$current_address_district', '$current_address_county', '$current_address_province', 
    $current_address_postalcode, '$phone_home', '$phone_mobile', 
    '$who_at_home', '$who_at_home_others', '$birthday', $age, $height, 
    $weight, '$nationality', '$ethnicity', '$religion', '$id_card_no', 
    '$id_card_place', '$id_card_expiry', '$taxpayer_id', '$social_security_id', 
    '$military_condition', $qualified_military_year, '$marital_status', 
    '$marital_registration', '$spouse_name', '$spouse_job', '$spouse_position', 
    $children_count, $studying_children_count, $not_studying_children_count
)";


// ตรวจสอบการทำงานของ SQL Query
if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// ปิดการเชื่อมต่อ
$mysqli->close();
?>