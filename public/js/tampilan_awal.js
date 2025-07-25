const navbarNav = document.querySelector('.navbar-nav');
const hamburger = document.querySelector('.navbar-extra');


// ketika menu di klik
document.querySelector('#hamburger').onclick = () => {
  navbarNav.classList.toggle('active');
};

// klik di luar saidbar untuk menghilangkan nav
document.addEventListener('click', function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
   navbarNav.classList.remove('active');
  }
});