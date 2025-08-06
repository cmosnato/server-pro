-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 04:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhw10`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '1234', 'admin1@example.com'),
(2, 'admin1', 'cm1234', 'cmosnato@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`, `email`) VALUES
(1, 'manager', '1234', 'manager1@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `detail` text NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `remain` smallint(5) UNSIGNED NOT NULL,
  `img_file` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `detail`, `price`, `remain`, `img_file`) VALUES
(1, 'KODAK EKTAR H35 Half Frame Film Camera:สีเขียว', '- ประหยัดฟิล์ม: สามารถมีภาพได้มากเป็นสองเท่าต่อม้วน ตัวอย่างเช่น ม้วนฟิล์มที่มีภาพ 36 ภาพสามารถให้ภาพครึ่งเฟรม 72 ภาพ ซึ่งเพิ่มเป็นสองเท่า!\r\n- น้ำหนักเบาและใช้งานง่าย: กล้องมีขนาดกะทัดรัด น้ำหนักเบาและเล็ก สะดวกที่จะพกพาติดตัวไปถ่ายภาพในทุกๆวัน\r\n- แฟลชในตัว: เปิดแฟลชโดยปรับวงแหวนสีเงินรอบเลนส์เพื่อให้สามารถใช้ KODAK EKTAR H35 ได้ทั้งกลางวันและกลางคืนหรือทั้งกลางแจ้งและในร่ม\r\n', 15000, 2, 'KODAK-EKTAR-H35-Half-Frame-Film-Camera-Sage.jpg'),
(2, 'AGFAPHOTO LEBOX SINGLE USE CAMERA:Flash', 'AGFAPHOTO LEBOX SINGLE USE CAMERA กล้องฟิล์มใช้แล้วทิ้ง\r\nAGFAPHOTO LEBOX กล้องฟิล์มใช้แล้วทิ้ง มีให้เลือกหลายรุ่น ฟิล์มสี ฟิล์มขาวดำ หรือพร้อมเคสกันน้ำ\r\nสามารถใช้งานได้ ถ่ายได้ทั้ง อินดอร์ และ เอาท์ดอร์ หรือใต้น้ำ\r\n\r\nAGFAPHOTO LEBOX FLASH\r\nกล้องฟิล์มสีใช้แล้วทิ้งถ่ายได้ 27 รูป ISO 400 พร้อมแฟลชในตัว สามารถ ถ่ายได้ทั้ง อินดอร์ และ เอาท์ดอร์\r\nฟิล์มหมดอายุเดือน 1 ปี 25', 559, 10, '025d315b99f9dba0d07ecf93e77d8fb3.jpg'),
(3, 'AGFAPHOTO LEBOX SINGLE USE CAMERA:Ocean', 'AGFAPHOTO LEBOX SINGLE USE CAMERA กล้องฟิล์มใช้แล้วทิ้ง\r\nAGFAPHOTO LEBOX กล้องฟิล์มใช้แล้วทิ้ง มีให้เลือกหลายรุ่น ฟิล์มสี ฟิล์มขาวดำ หรือพร้อมเคสกันน้ำ\r\nสามารถใช้งานได้ ถ่ายได้ทั้ง อินดอร์ และ เอาท์ดอร์ หรือใต้น้ำ\r\n\r\nAGFAPHOTO LEBOX OCEAN\r\nกล้องฟิล์มสีใช้แล้วทิ้งถ่าย 27 รูป ISO 400 มาพร้อมเฮาซิ่งกันน้ำ สามารถกันได้ 3 เมตร \r\nฟิล์มหมดอายุเดือน 1 ปี 25', 553, 7, '7de07636a7d8b46971af9bdf7db90a3c.jpg'),
(4, 'AGFAPHOTO LEBOX SINGLE USE CAMERA :Black/White', 'AGFAPHOTO LEBOX SINGLE USE CAMERA กล้องฟิล์มใช้แล้วทิ้ง\r\nAGFAPHOTO LEBOX กล้องฟิล์มใช้แล้วทิ้ง มีให้เลือกหลายรุ่น ฟิล์มสี ฟิล์มขาวดำ หรือพร้อมเคสกันน้ำ\r\nสามารถใช้งานได้ ถ่ายได้ทั้ง อินดอร์ และ เอาท์ดอร์ หรือใต้น้ำ\r\n\r\nAGFAPHOTO LEBOX BLACK/WHITE\r\nกล้องฟิล์มขาวดำใช้แล้วทิ้งถ่ายได้ 35 รูป ISO 400 พร้อมแฟลชในตัว สามารถ ถ่ายได้ทั้ง อินดอร์ และ เอาท์ดอร์\r\nฟิล์มหมดอายุเดือน 1 ปี 26', 599, 2, '90e3fc94437cf1c53a49c15375b95727.jpg'),
(5, 'KODAK EKTAR H35 Half Frame Film Camera:สีดำ', '- ประหยัดฟิล์ม: สามารถมีภาพได้มากเป็นสองเท่าต่อม้วน ตัวอย่างเช่น ม้วนฟิล์มที่มีภาพ 36 ภาพสามารถให้ภาพครึ่งเฟรม 72 ภาพ ซึ่งเพิ่มเป็นสองเท่า! - น้ำหนักเบาและใช้งานง่าย: กล้องมีขนาดกะทัดรัด น้ำหนักเบาและเล็ก สะดวกที่จะพกพาติดตัวไปถ่ายภาพในทุกๆวัน - แฟลชในตัว: เปิดแฟลชโดยปรับวงแหวนสีเงินรอบเลนส์เพื่อให้สามารถใช้ KODAK EKTAR H35 ได้ทั้งกลางวันและกลางคืนหรือทั้งกลางแจ้งและในร่ม', 1500, 3, 'kodak-ektar-h35-half-frame-film-camera-1.jpg'),
(6, 'KODAK EKTAR H35 Half Frame Film Camera:สีครีม', '- ประหยัดฟิล์ม: สามารถมีภาพได้มากเป็นสองเท่าต่อม้วน ตัวอย่างเช่น ม้วนฟิล์มที่มีภาพ 36 ภาพสามารถให้ภาพครึ่งเฟรม 72 ภาพ ซึ่งเพิ่มเป็นสองเท่า! - น้ำหนักเบาและใช้งานง่าย: กล้องมีขนาดกะทัดรัด น้ำหนักเบาและเล็ก สะดวกที่จะพกพาติดตัวไปถ่ายภาพในทุกๆวัน - แฟลชในตัว: เปิดแฟลชโดยปรับวงแหวนสีเงินรอบเลนส์เพื่อให้สามารถใช้ KODAK EKTAR H35 ได้ทั้งกลางวันและกลางคืนหรือทั้งกลางแจ้งและในร่ม', 1500, 2, 'images.jpg'),
(7, 'KODAK EKTAR H35 Half Frame Film Camera:สีน้ำตาล', '- ประหยัดฟิล์ม: สามารถมีภาพได้มากเป็นสองเท่าต่อม้วน ตัวอย่างเช่น ม้วนฟิล์มที่มีภาพ 36 ภาพสามารถให้ภาพครึ่งเฟรม 72 ภาพ ซึ่งเพิ่มเป็นสองเท่า! - น้ำหนักเบาและใช้งานง่าย: กล้องมีขนาดกะทัดรัด น้ำหนักเบาและเล็ก สะดวกที่จะพกพาติดตัวไปถ่ายภาพในทุกๆวัน - แฟลชในตัว: เปิดแฟลชโดยปรับวงแหวนสีเงินรอบเลนส์เพื่อให้สามารถใช้ KODAK EKTAR H35 ได้ทั้งกลางวันและกลางคืนหรือทั้งกลางแจ้งและในร่ม', 1499, 12, 'f6e5772a9fec7faffe69c249cc52beb8.jpg'),
(8, 'Canon EOS R50 Mirrorless Camera : Black', '-เซนเซอร์ APS-C CMOS ความละเอียด 24.2 ล้านพิกเซล\r\n\r\n-ชิปประมวลผล DIGIC X Processor\r\n\r\n-ถ่ายภาพต่อเนื่องทำได้สูงสุด 15 ภาพต่อวินาที [Electronic shutter]\r\n\r\n-โหมด Close-Up ช่วยในการรีวิวสินค้า\r\n\r\n-โหมด Hybird Auto ช่วยถ่ายวิดีโอก่อนถ่ายรูป\r\n\r\n-ระบบโฟกัสดวงตามนุษย์ สัตว์\r\n\r\n-ฟังก์ชั่นแก้ Focus Breathing\r\n\r\n-ถ่ายวีดีโอความละเอียดสูงสุด 4K 30p\r\n\r\n-ถ่ายวีดีโอ Slow Motion ความละเอียด Full HD 120fps\r\n\r\n-มีแฟลชหัวกล้องในตัว\r\n\r\n-น้ำหนักตัวกล้องโดยประมาณ 375 กรัม (ไม่รวมเลนส์)', 24999, 2, 'Canon-EOS-R50-Mirrorless-Camera-with-18-45mm-Lens-Black-001.jpg'),
(9, 'Canon EOS R50 Mirrorless Camera : White', '-เซนเซอร์ APS-C CMOS ความละเอียด 24.2 ล้านพิกเซล -ชิปประมวลผล DIGIC X Processor -ถ่ายภาพต่อเนื่องทำได้สูงสุด 15 ภาพต่อวินาที [Electronic shutter] -โหมด Close-Up ช่วยในการรีวิวสินค้า -โหมด Hybird Auto ช่วยถ่ายวิดีโอก่อนถ่ายรูป -ระบบโฟกัสดวงตามนุษย์ สัตว์ -ฟังก์ชั่นแก้ Focus Breathing -ถ่ายวีดีโอความละเอียดสูงสุด 4K 30p -ถ่ายวีดีโอ Slow Motion ความละเอียด Full HD 120fps -มีแฟลชหัวกล้องในตัว -น้ำหนักตัวกล้องโดยประมาณ 375 กรัม (ไม่รวมเลนส์)', 24999, 5, 'canon-eos-r50-white.jpg'),
(10, 'Benro Tripod T560 ขาตั้งกล้องน้ำหนักเบา เหมากับกล้อง DSLR , มิลเรอร์เลส, คอมแพ็ค , กล้องวิดีโอ', '- ขาตั้งกล้องน้ำหนักเบา เหมากับ กล้องDSLR , กล้องมิลเรอร์เลส, กล้องคอมแพ็ค\r\n- หัวแพนได้ 360องศา พร้อมปรับก้ม-เงยได้\r\n- มีระดับน้ำบอกความระนาบ\r\n- วัสดุอลูมิเนียมอัลลอยด์ เกรด A  \r\n- ยืดสูงสุด 145ซม.\r\n- ตั้งต่ำสุด 42.5ซม.\r\n- พับเก็บเหลือ 46ซม.\r\n- รับน้ำหนักได้ 2.5กก.\r\n- น้ำหนักเบา เพียง 910ก.\r\n- อุปกรณ์ในกล่อง : ขาตั้งกล้อง , กระเป๋าผ้าใบ', 490, 25, '3570437897.jpg'),
(11, 'Umbrella Light Translucent - ร่มทะลุ 80 cm. สําหรับถ่ายภาพและสตูดิโอ', 'Umbrella Light Translucent\r\n- ขนาดเส้นผ่านศูนย์กลาง 80 cm.\r\n-เนื้อร่มโปร่งแสง \r\n-ช่วยให้แสงกระจายออกทุกทิศ \r\n-ได้แสงที่นุ่มเป็นพิเศษ', 79, 12, '4062736951.jpg'),
(12, 'Umbrella Light Translucent - ร่มทะลุ 105 cm. สําหรับถ่ายภาพและสตูดิโอ', 'Umbrella Light Translucent - ขนาดเส้นผ่านศูนย์กลาง 105 cm. -เนื้อร่มโปร่งแสง -ช่วยให้แสงกระจายออกทุกทิศ -ได้แสงที่นุ่มเป็นพิเศษ', 99, 17, '4062736951.jpg'),
(13, 'Nikon Camera D7500 Kit 18-140 mm. F3.5-5.6 G ED VR', 'ความละเอียดภาพสูงสุด (Max Resolution)	5568 x 3712\r\nสัดส่วนภาพ (Image Ratio)	3:2, 16:9\r\nพิกเซล (Effective Pixels)	20.9 Megapixel\r\nเซลล์รับภาพ (Image Sensor)	DX / (1.5x Crop Factor)/CMOS, 23.5 x 15.6 mm\r\nความไวแสง (ISO Rating)	Auto, 100-51200 (Extended Mode: 50-1640000)\r\nระบบโฟกัส (Auto Focus Type)	Auto Manual Continuous Auto\r\nWhite Balance	Auto, Cloudy, Color Temperature, Direct Sunlight, Fine, Flash, Fluorescent, Incandescent, Preset Manual, Shade\r\nค่าความเร็วชัตเตอร์ (Shutter Speed)	30 - 1/8000 Second\r\nแฟลชภายใน (Built-In Flash)	Yes\r\nช่องต่อแฟลชภายนอก (External Flash)	Hot Shoe\r\nระบบแฟลช (Flash Modes)	Auto Auto/Red-Eye Reduction Fill-In Off Rear Curtain/Slow Sync Rear Sync Red-Eye Reduction Slow Sync Slow Sync/Red-Eye Reduction\r\nการชดเชยแสง (Exposure Compensation)	±5 EV (in 1/3 or 1/2 EV steps)\r\nระบบวัดแสง (Metering)	Center-Weighted Average Metering, Matrix, Spot Metering, Highlight Weighted\r\nโหมดแมนนวล (Manual Mode)	Yes\r\nถ่ายภาพต่อเนื่อง (Continuous Drive)	Up to 8 fps at 20.9 MP for up to 50 frames in raw format Up to 8 fps at 20.9 MP for up to 100 frames in JPEG format\r\nถ่ายภาพเคลือนไหว (Movie Clips)	H.264, MOV, MP4\r\nตั้งเวลาถ่ายภาพ (Self-Timer)	20 Seconds, 10 Seconds, 5 Seconds, 2 Seconds Custom: 1 - 9 Seconds at 0.5-, 1.0-, 2.0-, 3.0Second Intervals\r\nประเภทหน่วยความจำ (Memory Type)	SD, SDHC, SDXC\r\nไฟล์ภาพ (File Types)	JPEG, RAW\r\nช่องมองภาพ (View Finder)	Pentaprism\r\nขนาดLCD	3.2″\r\nVideo Out	1/8\r\nประเภทแบตเตอรี่ (Battery)	1 x EN-EL15a Rechargeable Lithium-Ion Battery Pack\r\nน้ำหนัก (Weight)	640 g body only\r\nขนาด (Dimensions)	(WxHxD)135.5 x 104.0 x 72.5 mm', 43000, 12, '3548451298.jpg'),
(14, 'Light Stand 250 cm. - สีดำ - ขาตั้งไฟ & แฟลช / icamera gadgets', '-Light Stand 250 cm. \r\n-ยืดสูงสุด 250 ซม.\r\n-ขาตั้งไฟ & แฟลช\r\n-วัสดุอลูมิเนียมอัลลอยด์ \r\n-พัพเก็บเหลือ 95 ซม.\r\n-น้ำหนัก 1.4 กก.', 249, 12, 'k67vhl.jpg'),
(15, 'Light Stand 250 cm. - สีดำ - ขาตั้งไฟ & แฟลช / icamera gadgets + Shoe-B', '-Light Stand 250 cm. -ยืดสูงสุด 250 ซม. -ขาตั้งไฟ & แฟลช -วัสดุอลูมิเนียมอัลลอยด์ -พัพเก็บเหลือ 95 ซม. -น้ำหนัก 1.4 กก. #Flash Shoe-B', 395, 22, 'k67vhl.jpg'),
(16, 'Light Stand 250 cm. - สีดำ - ขาตั้งไฟ & แฟลช / icamera gadgets + Shoe-D', '-Light Stand 250 cm. -ยืดสูงสุด 250 ซม. -ขาตั้งไฟ & แฟลช -วัสดุอลูมิเนียมอัลลอยด์ -พัพเก็บเหลือ 95 ซม. -น้ำหนัก 1.4 กก. #Flash Shoe-D', 539, 3, 'k67vhl.jpg'),
(17, 'Olympus Camera OM-D E-M10 Mark 4 Double Kit (14-42 & 40-150mm.)', 'OM-D E-M10 Mark IV เป็นกล้องมิลเรอร์เลสแบบเปลี่ยนเลนส์ได้ ที่มีคุณภาพสูง ไม่จำเป็นต้องตั้งค่าต่างๆที่ยุ่งยาก หรือสลับซับซ้อน ก็ช่วยให้คุณได้ภาพถ่ายที่มีคุณภาพสูงได้อย่างง่ายดาย\r\n      ระบบกันสั่น 5 แกนในตัวกล้อง ที่มีประสิทธิภาพที่ดีที่สุดในคลาส  ช่วยลดการสันของกล้องที่มักเกิดขึ้นเมื่อถ่ายภาพในที่แสงน้อยได้อย่างดี่เยี่ยม และเมื่อใช้งานร่วมกับเลนส์เทเลโฟโต้ ทำให้การถ่ายภาพที่ไม่สั่นเบลอเป็นเรื่องง่าย ที่ใครๆก็สามารถเพลิดเพลินไปกับการถ่ายภาพ ทุกที่ ทุกเวลา\r\n     ด้วยฟีเจอร์ถ่ายภาพที่ครบครันหลากหลายครอบคลุมการใช้งานอย่างครบครันของ OM-D E-M10 Mark IV คุณจึงสามารถถ่ายภาพคุณภาพสูงได้อย่างง่ายดาย นอกจากนี้คุณยังได้ภาพถ่ายสุดประทับใจบนกล้องชนิดเปลี่ยนเลนส์ได้ พร้อมรองรับการบันทึกถ่ายวิดีโอ 4K\r\n ** Specification\r\n-พิกเซล (Effective Pixels)	20.3 Megapixel\r\n-ความละเอียดภาพสูงสุด (Max Resolution)	5184 x 3888\r\n-อัตราส่วนภาพ   4:3\r\n-เซลล์รับภาพ (Image Sensor)	Micro Four Thirds (17.4 x 13 mm) / Live CMOS  \r\n-ความไวแสง (ISO Rating)	Auto, 200-25600 (expands to 100-25600)\r\n-ระบบป้องกันภาพสั่น (Image Stabilization)	Sensor-Shift, 5-Way\r\n-ระบบโฟกัส (Auto Focus Type)	Auto & Manual\r\n-จุดโฟกัสอัตโนมัติ การตรวจจับคอนทราสต์  : 121 จุด\r\n-White Balance	Auto, Custom\r\n-ค่าความเร็วชัตเตอร์ (Shutter Speed)	 1/16000 ถึง 60 วินาที\r\n-แฟลชภายใน (Built-In Flash)	Yes\r\n-ช่องต่อแฟลชภายนอก (External Flash)	Yes (via hot shoe)\r\n-ระบบแฟลช (Flash Modes)	Auto, redeye, slow sync, 2nd-curtain slow sync, redeye slow sync, fill-in, manual, off\r\n-การชดเชยแสง (Exposure Compensation)	±5 (at 1/3 EV steps)\r\n-ระบบวัดแสง (Metering)	Multi Center-weighted Spot\r\n-โหมดแมนนวล (Manual Mode)	Yes\r\n-ถ่ายภาพต่อเนื่อง (Continuous Drive)	  สูงสุด 8.7 fps ที่ 20.3 MP สำหรับเฟรมไม่จำกัด (Raw) / เฟรมไม่จำกัด (JPEG)\r\nชัตเตอร์เครื่องกล   /    สูงสุด 5 fps ที่ 20.3 MP สำหรับเฟรมไม่จำกัด (Raw) / เฟรมไม่จำกัด (JPEG)   /   ชัตเตอร์อิเล็กทรอนิกส์\r\nสูงสุด 15 fps ที่ 20.3 MP สูงสุด 42 เฟรม (ดิบ) / 49 เฟรม (JPEG)   / ชัตเตอร์อิเล็กทรอนิกส์ สูงสุด 6.3 fps ที่ 20.3 MP สูงสุด 945 เฟรม (Raw) / ไม่จำกัดเฟรม (JPEG)\r\n-ถ่ายภาพเคลือนไหว (Movie Clips)  4K  MOV, MPEG-4 AVC/H.264\r\n-ตั้งเวลาถ่ายภาพ (Self-Timer)	Yes (2 or 12 secs, custom)\r\n-ประเภทหน่วยความจำ (Memory Type)	SD,SDHC,SDXC\r\n-ไฟล์ภาพ (File Types)	JPEG, RAW\r\n-ช่องมองภาพ (View Finder)	Electronic\r\n-ขนาด LCD	ทัชสกรีน 3 นิ้ว\r\n-Video Out	HDMI D (Micro), Micro-USB\r\n-ประเภทแบตเตอรี่ (Battery)	BLS-50 Rechargeable Lithium-Ion, 7.2 VDC, 1175 mAh (Approx. 360 Shots)\r\n-น้ำหนักตัวกล้อง (Weight)	  335 กรัม\r\n-น้ำหนักรวมเลนส์ 14-42mm.(Weight)  475 กรัม\r\n-ขนาด (Dimensions)   121.7 x 84.4 x 49 mm', 32590, 2, '81S150S5yaL.jpg'),
(18, 'Canon Camera EOS 2000D Kit 18-55 mm. III', 'EOS 2000D มีเซ็นเซอร์ CMOS APS-C ขนาด 24.1mp ทำงานร่วมกับหน่วยประมวลผล DIGIC 4+  เป็นกล้องที่เหมาะเเก่ผู้ที่เริ่มถ่ายภาพ แต่ด้วยคุณภาพในแบบฉบับ DSLR ของ Canon จึงได้ไฟล์ภาพในสไตล์ Canon ที่ไม่แพ้รุ่นพี่ อย่าง 850D หรือ 90D เพียงแต่ลูกเล่นหรือฟังชั่นหลายๆอย่างอาจจำถูกตัดออกไปบ้าง ออกแบบมาในขนาดที่เล็กกระทัดรัดแทบจะเท่ากล้องมิลเรอร์เลสก็ว่าได้ พกพาสะดวก น้ำหนักเบา              \r\n              โหมด Scene Intelligent Auto จะเลือกการตั้งค่ากล้องที่เหมาะสมอย่างชาญฉลาดตามประเภทฉากที่รู้จักเพื่อการเปิดรับแสงที่แม่นยำ\r\n              โหมด Basic+ และ Creative Auto ช่วยลดความซับซ้อนของกระบวนการเพื่อให้ได้รูปลักษณ์ที่สร้างสรรค์\r\n              Creative Filters ช่วยให้คุณปรับแต่งรูปลักษณ์ของภาพในกล้องได้ รวมถึง Toy Camera, Fisheye และ Miniature Effect เป็นต้น\r\n              สมดุลแสงขาวอัตโนมัติมีการตั้งค่า \'ลำดับความสำคัญสีขาว\' เพื่อรักษาการแสดงสีที่แม่นยำและปรับโทนสีที่อุ่นขึ้นเมื่อถ่ายภาพในสภาพแสงทังสเตน\r\n              การตั้งค่าการควบคุมการรับแสงของโซนพื้นฐาน: Scene Intelligent Auto, ปิดแฟลช, Creative Auto, ภาพบุคคล, ทิวทัศน์, ระยะใกล้, กีฬา, อาหาร และบุคคลกลางคืน          \r\n**Specification\r\nเซนเซอร์       APS-C CMOS\r\nความละเอียด   24.1 ล้านพิกเซล 6000 x 4000\r\nหน่วยประมวลผล	Digic 4+\r\nISO	  อัตโนมัติ, ISO 100-6400, ขยายได้ถึง 12800\r\nไวท์บาลานซ์	6 แบบ\r\nความเร็วชัตเตอร์ 30 วินาที -  1/4000 วินาที\r\nไดรฟ์ต่อเนื่อง	3.0 เฟรมต่อวินาที jpeg , 11 เฟรมต่อวินาที RAW\r\nจุดโฟกัสอัตโนมัติ    Cross Type 9 จุด\r\nแฟลชในตัว	 Pop-up \r\nการติดตั้งแฟลชภายนอก : Hot Shoe  ระบบออโต้ TTL , Manual\r\nสามารถ creative filter หลากหลายรูปแบบให้แต่งภาพได้ตามชอบ\r\nถ่ายวิดีโอ          Full HD 1080p  30 fps \r\nBuilt-In Wi-Fi  มี NFC เพิ่ม สามารถใช้เพื่อเชื่อมต่อกับแอพ Canon Camera Connect ได้\r\nขนาดหน้าจอ      3นิ้ว  920,000 pixel\r\nประเภทการจัดเก็บ	การ์ด SD / SDHC / SDXC\r\nการเชื่อมต่อ  ยูเอสบี	USB 2.0 (480 Mbit / วินาที)\r\nHDMI	 Mini-HDMI \r\nแบตเตอรี่และเครื่องชาร์จลิเธียมไอออน LP-E10\r\nน้ำหนักบอดี้ (รวมแบตเตอรี่)	475 ก.\r\nขนาด	129 x 101 x 78 มม.', 17990, 5, '3393651905.jpg'),
(19, 'Canon Camera EOS 90D Body', 'EOS 90D ได้รับการพัฒนาอย่างต่อเนื่องมาจาก Canon EOS 80D ด้วยการออกแบบอย่างอัจฉริยะ ตอบสนองการใช้งานของช่างภาพมืออาชีพ ด้วยเทคโนโลยีโฟกัสอัตโนมัติแบบ Dual Pixel CMOS อันเป็นเอกลักษณ์ของแคนนอน เซ็นเซอร์ APS-C ขนาด 32.5 ล้านพิกเซล ช่องมองภาพออปติคอล \r\n                  มาพร้อมความโดดเด่นเรื่องความเร็วและความแม่นยำในการถ่ายภาพ ให้ผู้ใช้จับภาพเคลื่อนไหวได้ทุกช็อตสำคัญ อีกทั้งประสิทธิภาพด้านงานวีดีโอสร้างสรรค์แบบจัดเต็ม ในรูปแบบ 4K ที่ 30p/25p (สามารถเลือก cropped หรือ uncropped ได้) ช่วยให้คุณทอดไอเดียสร้างสรรค์ระดับมืออาชีพออกมาได้อย่างง่ายดาย\r\nSpecification\r\n-ความละเอียด 32.5 ล้านพิกเซล\r\n-เซนเซอร์ CMOS APS-C 22.3mm x 14.8mm \r\n-ระบบประมาณผล DIGIC 8\r\n-จุดโฟกัส Cross-type 45 จุด\r\n-ออโต้โฟกัส Dual Pixel AF\r\n-โฟกัสได้ในที่แสงน้อย EV-3\r\n-โหมด Focus Bracketing (ขยับจุดโฟกัสเพื่อให้ชัดทั้งภาพ)\r\n-ความเร็วถ่ายภาพต่อเนื่อง 10 ภาพ/วินาที\r\n-ความเร็วชัตเตอร์ 30-1/8000 sec\r\n-ความเร็วชัตเตอร์ Electronic สูงสุด 1/16000\r\n-ISO100-25600(ขยายได้ถึง 51200)\r\n-ช่องมองภาพ OVF แสดงผล 100%\r\n-จอ TFT LCD สัมผัส ขนาด 3 นิ้ว ความละเอียด 1.04 ล้านจุด\r\n-วิดีโอ  =   4K 30p,25p /  Full HD 120p  /  HD 60p  / HDR 30P  /  4K Timelapse 30p,25p\r\n-Wifi , Bluetooth\r\n-แบตเตอรี LP-E6N\r\n-แบตเตอรี กริป BG-E14 ( ไม่รวมในชุด )\r\n-น้ำหนักบอดี้ 701 กรัม (รวมแบตเตอรีและการ์ด)\r\n- ตัวกล้องเมนู ภาษาอังกฤษ', 32990, 4, 'images (1).jpg'),
(20, 'Canon EOS 1500D Body / kit 18-135 /', 'Specifications รายละเอียดสเปค คุณสมบัติ ข้อมูลทั่วไป\r\nความละเอียดภาพสูงสุด (Max Resolution) 6000 x 4000\r\nสัดส่วนภาพ (Image Ratio) 3:2\r\nพิกเซล (Effective Pixels) 24.1 Megapixel\r\nเซลล์รับภาพ (Image Sensor) CMOS, APS-C (22.3 x 14.9mm)\r\nความไวแสง (ISO Rating) ISO 100 - 3200 set automatically\r\nOptical Zoom n/a\r\nDigital Zoom n/a\r\nระบบป้องกันภาพสั่น (Image Stabilization) None\r\nระบบโฟกัส (Auto Focus Type) TTL secondary image-registration, phase-difference detection with the dedicated AF sensor\r\nระยะโฟกัสปกติ (Normal Focus Range) n/a\r\nระยะมาโคร (Macro Focus Range) n/a\r\nWhite Balance Auto (Ambience priority), Auto (White priority), Preset (Daylight, Shade, Cloudy, Tungsten light, White fluorescent light, Flash), Custom White balance correction, and White balance bracketing provided * Flash color temperature information transmission e\r\nค่ารูรับแสง (Aperture) n/a\r\nค่าความเร็วชัตเตอร์ (Shutter Speed) 1/4000sec. to 30sec. (Total shutter speed range. Available range varies by shooting mode.), Bulb, X-sync at 1/200sec.\r\nแฟลชภายใน (Built-In Flash) Yes (Pop-up)\r\nช่องต่อแฟลชภายนอก (External Flash) Hot Shoe\r\nระบบแฟลช (Flash Modes) E-TTL II autoflash\r\nการชดเชยแสง (Exposure Compensation) 5 (at 1/3 EV, 1/2 EV, 1 EV steps)\r\nระบบวัดแสง (Metering) 63-zone TTL open-aperture metering/Evaluative metering (linked to all AF points) / Partial metering (approx. 10% of viewfinder at center) / Center-weighted average metering\r\nโหมดแมนนวล (Manual Mode) Yes\r\nถ่ายภาพต่อเนื่อง (Continuous Drive) approx. 3.0 shots/sec\r\nถ่ายภาพเคลือนไหว (Movie Clips) MOV (MPEG-4 AVC/H.264)\r\nตั้งเวลาถ่ายภาพ (Self-Timer) 10-sec. or 2-sec. delay and 10-sec. delay with continuous shooting\r\nประเภทหน่วยความจำ (Memory Type) SD/SDHC/SDXC\r\nไฟล์ภาพ (File Types) JPEG, RAW\r\nช่องมองภาพ (View Finder) Pentamirror\r\nขนาดLCD 3\r\nVideo Out HDMI D (Micro), Micro-USB, USB 2.0\r\nประเภทแบตเตอรี่ (Battery) Battery Pack LP-E10 (Quantity 1)\r\nน้ำหนัก (Weight) Approx. 427g / 15.06oz. (Body only)\r\nขนาด (Dimensions) (W x H x D)Approx. 129.0 x 101.3 x 77.6mm (5.08 x 3.99 x 3.06)', 17490, 9, '6ddae83f82d7604f5d8754152bd872ee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `surname`, `email`) VALUES
(1, 'cmosnatox', '$2y$10$EBdA084CtC.Iy4/Ih1PZRubi5disyvzOtFEGJZBF6l2//oAcOekL6', 'Ruangpanit', 'cmoscmark@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
