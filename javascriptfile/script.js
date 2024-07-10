// Get the dropdown button and dropdown content
var dropdownBtn = document.querySelector(".dropbtn");
var dropdownContent = document.querySelector(".dropdown-content");

// Close the dropdown when the user clicks outside of it
window.addEventListener("click", function(event) {
  if (!event.target.matches('.dropbtn')) {
    if (dropdownContent.classList.contains('show')) {
      dropdownContent.classList.remove('show');
    }
  }
});

// Toggle the dropdown menu when the user clicks on the dropdown button
dropdownBtn.addEventListener("click", function() {
  dropdownContent.classList.toggle("show");
});