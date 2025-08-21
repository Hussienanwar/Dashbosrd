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



    const quantityInput = document.getElementById('quantity');
    const increaseBtn = document.getElementById('increase');
    const decreaseBtn = document.getElementById('decrease');

    increaseBtn.addEventListener('click', () => {
        quantityInput.value = parseInt(quantityInput.value) + 1;
    });

    decreaseBtn.addEventListener('click', () => {
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    });


document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star-rating .star');
    const ratingInput = document.getElementById('rating-value');
    let selectedRating = 0;

    stars.forEach((star, index) => {
        star.addEventListener('mouseover', () => {
            highlightStars(index + 1);
        });

        star.addEventListener('mouseout', () => {
            highlightStars(selectedRating);
        });

        star.addEventListener('click', () => {
            selectedRating = index + 1;
            ratingInput.value = selectedRating;
        });
    });

    function highlightStars(rating) {
        stars.forEach((star, index) => {
            if(index < rating) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }
});
