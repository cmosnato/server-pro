<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW 6</title>
</head>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="selectfile">เลือกไฟล์ที่ต้องการค้นหาประเทศ</label>
    <select id="selectnamefile" name='filename'>
        <option value="" disabled selected>เลือกไฟล์ที่ต้องการ</option>
        <option value="hw-doc01.txt">hw-doc01.txt</option>
        <option value="hw-doc02.txt">hw-doc02.txt</option>
        <option value="hw-doc03.txt">hw-doc03.txt</option>
    </select><br>
    <label for="search">ค้นหารายชื่อประเทศ:</label>
    <button type="submit">ค้นหา</button>
</form>

<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $globe = array(
            "Afghanistan",
            "Albania",
            "Algeria",
            "Andorra",
            "Angola",
            "Antigua and Barbuda",
            "Argentina",
            "Armenia",
            "Australia",
            "Austria",
            "Azerbaijan",
            "Bahamas",
            "Bahrain",
            "Bangladesh",
            "Barbados",
            "Belarus",
            "Belgium",
            "Belize",
            "Benin",
            "Bhutan",
            "Bolivia",
            "Bosnia and Herzegovina",
            "Botswana",
            "Brazil",
            "Brunei",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Cabo Verde",
            "Cambodia",
            "Cameroon",
            "Canada",
            "Central African Republic",
            "Chad",
            "Chile",
            "China",
            "Colombia",
            "Comoros",
            "Congo",
            "Costa Rica",
            "Cote d'Ivoire",
            "Croatia",
            "Cuba",
            "Cyprus",
            "Czechia",
            "Denmark",
            "Djibouti",
            "Dominica",
            "Dominican Republic",
            "Ecuador",
            "Egypt",
            "El Salvador",
            "Equatorial Guinea",
            "Eritrea",
            "Estonia",
            "Eswatini",
            "Ethiopia",
            "Fiji",
            "Finland",
            "France",
            "Gabon",
            "Gambia",
            "Georgia",
            "Germany",
            "Ghana",
            "Greece",
            "Grenada",
            "Guatemala",
            "Guinea",
            "Guinea-Bissau",
            "Guyana",
            "Haiti",
            "Honduras",
            "Hungary",
            "Iceland",
            "India",
            "Indonesia",
            "Iran",
            "Iraq",
            "Ireland",
            "Israel",
            "Italy",
            "Jamaica",
            "Japan",
            "Jordan",
            "Kazakhstan",
            "Kenya",
            "Kiribati",
            "Kosovo",
            "Kuwait",
            "Kyrgyzstan",
            "Laos",
            "Latvia",
            "Lebanon",
            "Lesotho",
            "Liberia",
            "Libya",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Madagascar",
            "Malawi",
            "Malaysia",
            "Maldives",
            "Mali",
            "Malta",
            "Marshall Islands",
            "Mauritania",
            "Mauritius",
            "Mexico",
            "Micronesia",
            "Moldova",
            "Monaco",
            "Mongolia",
            "Montenegro",
            "Morocco",
            "Mozambique",
            "Myanmar",
            "Namibia",
            "Nauru",
            "Nepal",
            "Netherlands",
            "New Zealand",
            "Nicaragua",
            "Niger",
            "Nigeria",
            "North Korea",
            "North Macedonia",
            "Norway",
            "Oman",
            "Pakistan",
            "Palau",
            "Palestine",
            "Panama",
            "Papua New Guinea",
            "Paraguay",
            "Peru",
            "Philippines",
            "Poland",
            "Portugal",
            "Qatar",
            "Romania",
            "Russia",
            "Rwanda",
            "Saint Kitts and Nevis",
            "Saint Lucia",
            "Saint Vincent and the Grenadines",
            "Samoa",
            "San Marino",
            "Sao Tome and Principe",
            "Saudi Arabia",
            "Senegal",
            "Serbia",
            "Seychelles",
            "Sierra Leone",
            "Singapore",
            "Slovakia",
            "Slovenia",
            "Solomon Islands",
            "Somalia",
            "South Africa",
            "South Korea",
            "South Sudan",
            "Spain",
            "Sri Lanka",
            "Sudan",
            "Suriname",
            "Sweden",
            "Switzerland",
            "Syria",
            "Taiwan",
            "Tajikistan",
            "Tanzania",
            "Thailand",
            "Timor-Leste",
            "Togo",
            "Tonga",
            "Trinidad and Tobago",
            "Tunisia",
            "Turkey",
            "Turkmenistan",
            "Tuvalu",
            "Uganda",
            "Ukraine",
            "United Arab Emirates",
            "United Kingdom",
            "United States of America",
            "Uruguay",
            "Uzbekistan",
            "Vanuatu",
            "Vatican City",
            "Venezuela",
            "Vietnam",
            "Yemen",
            "Zambia",
            "Zimbabwe"
        );
        $asianCountries = array(
            "Afghanistan",
            "Armenia",
            "Azerbaijan",
            "Bahrain",
            "Bangladesh",
            "Bhutan",
            "Brunei",
            "Cambodia",
            "China",
            "Cyprus",
            "Georgia",
            "India",
            "Indonesia",
            "Iran",
            "Iraq",
            "Israel",
            "Japan",
            "Jordan",
            "Kazakhstan",
            "Kuwait",
            "Kyrgyzstan",
            "Laos",
            "Lebanon",
            "Malaysia",
            "Maldives",
            "Mongolia",
            "Myanmar",
            "Nepal",
            "North Korea",
            "Oman",
            "Pakistan",
            "Palestine",
            "Philippines",
            "Qatar",
            "Saudi Arabia",
            "Singapore",
            "South Korea",
            "Sri Lanka",
            "Syria",
            "Tajikistan",
            "Thailand",
            "Timor-Leste",
            "Turkey",
            "Turkmenistan",
            "United Arab Emirates",
            "Uzbekistan",
            "Vietnam",
            "Yemen"
        );

        if (!empty($_POST['filename'])) { //$_POST['ชื่อ์Nameที่ต้องการดึงค่า'],empty เช็คว่าว่างไหม
            $selected_file = $_POST['filename'];

            // สร้าง path ไฟล์ที่ถูกเลือก
            $file_path = 'C:/xampp/htdocs/HW6/Doc/' . $selected_file;//ใช้.ต่อString

            // ตรวจสอบว่าไฟล์มีอยู่จริง
            if (file_exists($file_path)) {//เช็คว่าfileที่เลือกมีอยู่จริงไหม
                $found_countries = array();

                // อ่านเนื้อหาในไฟล์ที่เลือก
                $file_content = file_get_contents($file_path);//file_get_contents(ไฟล์ที่ดึงมาอ่าน)อ่านDataในไฟล์ละเก็บเป็นString
                foreach ($globe as $country) {//foreach (arrayที่ต้องการใช้หาประเทศ as arrayที่ต้องการเก็บเพื่อค้นประเทศ)แต่ละรอบจะนำชื่อแต่ละประเทศของ(arrayที่ต้องการใช้หาประเทศ)ไว้(arrayที่ต้องการเก็บเพื่อค้นประเทศ)
                    // ค้นหาชื่อประเทศในไฟล์
                    if (stripos($file_content, $country) !== false) {
                        $found_countries[] = $country;
                    }
                }

                // กำจัดข้อมูลซ้ำใน array
                $found_countries = array_unique($found_countries);
                sort($found_countries);

                // Display Asia country
                $aisa_country = array();
                foreach ($found_countries as $country_found) {
                    if (in_array($country_found, $asianCountries)) { //(in_array(คำที่ต้องการตรวจสอบ,อาเรย์ที่ต้องการค้นหา)
                        $aisa_country[] = $country_found;
                    }
                }
                if (empty($aisa_country)){
                    echo "<br>ASIA COUNTRY :<br>Don't Have ";
                } else {
                echo "<br>ASIA COUNTRY :<br>" . implode("<br> ", $aisa_country) . "";
                }
                // Display Other country
                $notaisa_country = array_diff($found_countries, $asianCountries);
                if (empty($notaisa_country)) {
                    echo "<br><br>OTHER COUNTRY :<br>Don't Have ";
                } else {
                    echo "<br><br>OTHER COUNTRY :<br>" . implode("<br>", $notaisa_country) . "";
                }
            }
        } else {
            echo "<br>กรุณาเลือกไฟล์";
        }
    } ?>
</body>

</html>