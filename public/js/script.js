/** @format */
// Dropdown Navbar
const navbarResponsive = document.querySelector('[role="navbar"]');
const mainblade = document.querySelector("#mainblade");
const dropdownBurger = document.querySelector("#burger-menu");

dropdownBurger.addEventListener("click", function () {
  navbarResponsive.classList.toggle("hidden"); // nav responsive
  mainblade.classList.toggle("ml-[30vw]"); // nav responsive
});
// DROPDOWN PROFILE DI MD screen
const dropdownProfile = document.querySelector('[role="menu"]');
const menuButton = document.querySelector("#menu-button");

// Klik di Luar Hamburger
window.addEventListener("click", function (e) {
  console.log(e.target);
  if (e.target != dropdownBurger && e.target != navbarResponsive) {
    navbarResponsive.classList.add("hidden"); // nav responsive
    mainblade.classList.remove("ml-[30vw]"); // nav responsive
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
  strings: "Selamat Datang, ",
  speed: 200,
  loop: true,
}).go();
new TypeIt("#welcome-back-responsive", {
  strings: "Selamat Datang, ",
  speed: 200,
  loop: true,
}).go();

// Get the button
let mybutton = document.getElementById("myBtnTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// DeleteConfirm
function deleteConfirm(organizationId) {
  Swal.fire({
    title: "Apakah kamu yakin ingin menghapus ini?",
    text: "semua data/progress di dalamnya dan data yang bersangkutan dengan data ini akan terhapus, data yang anda hapus tidak dapat kembali !",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, Hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Penghapusan Berhasil!",
        text: "Anda telah berhasil menghapus data ini !",
        icon: "success",
      }).then(() => {
        document.getElementById(`formDelete-${organizationId}`).submit();
      });
    }
  });
}
