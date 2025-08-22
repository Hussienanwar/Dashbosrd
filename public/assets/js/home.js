document.addEventListener("DOMContentLoaded", function () {
  const wishlistBtns = document.querySelectorAll(".wishlist-btn");

  wishlistBtns.forEach(btn => {
    btn.addEventListener("click", function () {
      this.classList.toggle("active"); // يضيف/يشيل الكلاس active
      const icon = this.querySelector("i");
      icon.classList.toggle("bi-heart");       // يرجع الشكل الفاضي
      icon.classList.toggle("bi-heart-fill");  // يخليه مليان ❤️
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".star-rating .star");
    const ratingValue = document.getElementById("rating-value");

    stars.forEach((star, index) => {
        star.addEventListener("click", function () {
            let value = this.getAttribute("data-value");
            ratingValue.value = value;

            // Reset all stars
            stars.forEach(s => s.classList.remove("selected"));

            // Add selected class up to clicked star
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add("selected");
            }
        });

        // Hover effect (اختياري عشان التجربة تكون أوضح)
        star.addEventListener("mouseover", function () {
            stars.forEach(s => s.classList.remove("hover"));
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add("hover");
            }
        });

        star.addEventListener("mouseout", function () {
            stars.forEach(s => s.classList.remove("hover"));
        });
    });
});




