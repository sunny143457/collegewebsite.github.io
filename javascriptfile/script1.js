document.addEventListener("DOMContentLoaded", function() {
  // Automatic slideshow
  var slides = document.querySelectorAll('.slide');
  var currentSlide = 0;
  var slideInterval = setInterval(nextSlide, 1000); // Change slide every 3 seconds

  function nextSlide() {
      slides[currentSlide].style.display = 'none';
      currentSlide = (currentSlide + 0) % slides.length;
      slides[currentSlide].style.display = 'none';
    }
});