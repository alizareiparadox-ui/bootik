// وقتی صفحه لود شد
document.addEventListener("DOMContentLoaded", function () {
  // تعامل با دسته‌بندی‌ها در صفحه اصلی
  const categories = document.querySelectorAll(".category");
  categories.forEach(cat => {
    cat.addEventListener("click", () => {
      alert("نمایش محصولات دسته: " + cat.textContent);
    });
  });

  // محاسبه جمع کل در سبد خرید (نسخه ساده)
  const cartRows = document.querySelectorAll("tbody tr");
  let total = 0;
  cartRows.forEach(row => {
    const priceText = row.querySelector("td:nth-child(3)").textContent;
    const price = parseInt(priceText.replace(/[^\d]/g, ""));
    const qty = parseInt(row.querySelector("input").value);
    total += price * qty;
  });
  const totalElement = document.querySelector(".cart p strong");
  if (totalElement) {
    totalElement.nextSibling.textContent = " " + total.toLocaleString() + " تومان";
  }

  // حذف محصول از سبد خرید (نسخه نمایشی)
  const deleteButtons = document.querySelectorAll("td button");
  deleteButtons.forEach(btn => {
    btn.addEventListener("click", () => {
      btn.closest("tr").remove();
      alert("محصول حذف شد (فعلاً فقط نمایشی)");
    });
  });
});
