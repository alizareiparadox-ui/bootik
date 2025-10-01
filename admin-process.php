<?php
require_once "db.php"; // اتصال به دیتابیس

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // دریافت اطلاعات فرم
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $price = intval($_POST["price"]);
  $category = mysqli_real_escape_string($conn, $_POST["category"]);
  $image_url = mysqli_real_escape_string($conn, $_POST["image"]);

  // ساخت کوئری SQL برای افزودن محصول
  $sql = "INSERT INTO products (name, price, category, image_url)
          VALUES ('$name', $price, '$category', '$image_url')";

  // اجرای کوئری
  if (mysqli_query($conn, $sql)) {
    echo "<h2>✅ محصول با موفقیت ثبت شد</h2>";
    echo "<p><a href='../admin.html'>بازگشت به پنل مدیریت</a></p>";
  } else {
    echo "<h2>❌ خطا در ثبت محصول</h2>";
    echo "<p>" . mysqli_error($conn) . "</p>";
  }

  mysqli_close($conn);
} else {
  echo "<h2>دسترسی غیرمجاز ❌</h2>";
}
?>
