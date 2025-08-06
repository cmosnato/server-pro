<?php
session_start();

// ลบข้อมูลในเซสชัน
$_SESSION = array();

// หากต้องการลบเซสชันจริงๆ ก็สามารถใช้ session_destroy()
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// ทำลายเซสชัน
session_destroy();

// เปลี่ยนเส้นทางไปยังหน้าล็อกอิน
header("Location: index.html");
exit();
?>