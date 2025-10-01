<?php
// اطلاعات اتصال به دیتابیس
$host = "localhost";        // آدرس سرور دیتابیس (برای لوکال هاست همینه)
$user = "root";             // نام کاربری دیتابیس
$pass = "";                 // رمز عبور (در لوکال معمولاً خالیه)
$dbname = "boutique_ali";  // نام دیتابیس شما

// اتصال به دیتابیس
$conn = mysqli_connect($host, $user, $pass, $dbname);

// بررسی اتصال
if (!$conn) {
  die("❌ اتصال به دیتابیس ناموفق بود: " . mysqli_connect_error());
}

// تنظیم charset برای پشتیبانی از فارسی
mysqli_set_charset($conn, "utf8");
?>
