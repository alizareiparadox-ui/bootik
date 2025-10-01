<?php
require_once "db.php"; // اتصال به دیتابیس

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // دریافت اطلاعات فرم
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
  $address = mysqli_real_escape_string($conn, $_POST["address"]);
  $payment = mysqli_real_escape_string($conn, $_POST["payment"]);

  // فرض می‌کنیم کاربر هنوز وارد نشده، پس user_id رو NULL می‌ذاریم
  $user_id = "NULL";

  // فرض می‌کنیم فقط یک محصول انتخاب شده (برای نسخه ساده)
  $product_id = 1; // بعداً می‌تونی اینو از فرم بگیری
  $quantity = 1;

  // ساخت کوئری SQL
  $sql = "INSERT INTO orders (user_id, product_id, quantity, address, payment_method)
          VALUES ($user_id, $product_id, $quantity, '$address', '$payment')";

  // اجرای کوئری
  if (mysqli_query($conn, $sql)) {
    echo "<h2>✅ سفارش شما با موفقیت ثبت شد</h2>";
    echo "<p>با شما تماس خواهیم گرفت برای هماهنگی ارسال.</p>";
  } else {
    echo "<h2>❌ خطا در ثبت سفارش</h2>";
    echo "<p>" . mysqli_error($conn) . "</p>";
  }

  mysqli_close($conn);
} else {
  echo "<h2>دسترسی غیرمجاز ❌</h2>";
}
?>
