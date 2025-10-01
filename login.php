<?php
session_start(); // شروع سشن
require_once "db.php"; // اتصال به دیتابیس

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = $_POST["password"];

  // جستجوی کاربر در دیتابیس
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    // بررسی رمز عبور
    if (password_verify($password, $user["password"])) {
      $_SESSION["user_id"] = $user["id"];
      $_SESSION["fullname"] = $user["fullname"];
      echo "<h2>✅ ورود موفقیت‌آمیز بود</h2>";
      echo "<p>خوش آمدی، " . $user["fullname"] . "!</p>";
      echo "<p><a href='../index.html'>رفتن به صفحه اصلی</a></p>";
    } else {
      echo "<h2>❌ رمز عبور اشتباه است</h2>";
    }
  } else {
    echo "<h2>❌ ایمیل یافت نشد</h2>";
  }

  mysqli_close($conn);
} else {
  echo "<h2>دسترسی غیرمجاز ❌</h2>";
}
?>
