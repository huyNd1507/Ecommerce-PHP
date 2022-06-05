const imgs = document.querySelectorAll(".img-select a");
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
  imgItem.addEventListener("click", (event) => {
    event.preventDefault();
    imgId = imgItem.dataset.id;
    slideImage();
  });
});

function slideImage() {
  const displayWidth = document.querySelector(
    ".img-showcase img:first-child"
  ).clientWidth;

  document.querySelector(".img-showcase").style.transform = `translateX(${
    -(imgId - 1) * displayWidth
  }px)`;
}

window.addEventListener("resize", slideImage);

// ---------------------
$(document).ready(function () {
  $(".carousel").slick({
    prevArrow:
      '<button class="slick-prev" aria-label="Previous" type="button">&lt</button>',
    nextArrow:
      '<button class="slick-next" aria-label="Next" type="button">&gt</button>',
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 5,
  });
});
