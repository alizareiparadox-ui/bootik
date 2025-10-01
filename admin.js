// وقتی فرم افزودن محصول ارسال شد، اطلاعات رو در کنسول نمایش بده
document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");

  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault(); // جلوگیری از ارسال واقعی فرم

      const name = form.querySelector('input[type="text"]').value;
      const price = form.querySelector('input[type="number"]').value;
      const category = form.querySelector('select').value;
      const image = form.querySelector('input[type="url"]').value;

      console.log("محصول جدید:");
      console.log("نام:", name);
      console.log("قیمت:", price);
      console.log("دسته‌بندی:", category);
      console.log("تصویر:", image);

      alert("محصول با موفقیت ثبت شد (فعلاً فقط در کنسول)");
      form.reset();
    });
  }
});
