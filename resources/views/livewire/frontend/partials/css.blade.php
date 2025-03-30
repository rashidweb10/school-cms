<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

<!-- Bootstrap first to avoid conflicts -->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">

<!-- External libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/aos.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/hover.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/fancybox.css') }}">

<!-- Custom styles - Load last to override Bootstrap & other libraries -->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">


<style>
.discloser_link {
  color: #fff;
  font-size: 14px;
  font-weight: 600;
  margin-bottom: 7px;
  padding-top: 20px;
  text-decoration: none;
  font-family: "Roboto Slab", serif !important;
}

.discloser_link:hover {
  color: #f9bc09;
  cursor: pointer;
}

.menu a {
  text-decoration: none;
  display: block;
  position: relative;
  color: #fff !important;
  font-weight: 500;
}

.menu > li {
  position: relative;
}

.submenu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #fccf00;
  border-top: 5px solid transparent;
  width: 220px;
  z-index: 1000;
  border-radius: 0 10px 10px 0;
}

.menu > li:hover > .submenu {
  display: block;
}

.submenu li {
  position: relative;
  margin-left: 0px !important;
  border-bottom: 1px dashed #888;
}

.submenu li:last-child {
  border-bottom: none !important;
}

.submenu li:hover {
  background-color: #f49a12;
}

.submenu li a {
  padding: 10px 15px;
  color: #000 !important;
}

.submenu li:hover a {
  color: #fff !important;
}

.submenu img {
  width: 17px;
  position: relative;
  top: -2px;
  left: -4px;
  filter: grayscale(0%) contrast(0%) brightness(0) !important;
  margin-right: 4px;
}

.submenu img:hover {
  filter: grayscale(0%) !important;
}

.submenu a:hover img {
  filter: grayscale(100%) !important;
}

.submenu .submenu {
  left: 100%;
  top: 0;
  display: none;
  overflow: hidden;
}

.submenu li:hover > .submenu {
  display: block;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
</style>