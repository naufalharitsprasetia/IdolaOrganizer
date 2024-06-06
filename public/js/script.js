/** @format */
// Dropdown Navbar
const navbarResponsive = document.querySelector('[role="navbar"]');
const dropdownBurger = document.querySelector("#burger-menu");

dropdownBurger.addEventListener("click", function () {
  navbarResponsive.classList.toggle("hidden"); // nav responsive
});
// DROPDOWN PROFILE DI MD screen
const dropdownProfile = document.querySelector('[role="menu"]');
const menuButton = document.querySelector("#menu-button");

// Klik di Luar Hamburger
window.addEventListener("click", function (e) {
  console.log(e.target);
  if (e.target != dropdownBurger && e.target != navbarResponsive) {
    navbarResponsive.classList.add("hidden"); // nav responsive
  }
  if (e.target != menuButton && e.target != dropdownProfile) {
    dropdownProfile.classList.add("hidden");
  }
});

menuButton.addEventListener("click", function () {
  dropdownProfile.classList.toggle("hidden");
});

function confirmLogout() {
  Swal.fire({
    title: "Apakah kamu ingin Logout?",
    text: "pastikan semua progress tersimpan !",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Logout!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Logout Succes !",
        text: "Anda telah berhasil logout !",
        icon: "success",
      });
      document.getElementById("logout-form").submit();
    }
  });
}
new TypeIt("#welcome-back", {
  strings: "Welcome Back, ",
  speed: 200,
  loop: true,
}).go();
new TypeIt("#welcome-back-responsive", {
  strings: "Welcome Back, ",
  speed: 200,
  loop: true,
}).go();
