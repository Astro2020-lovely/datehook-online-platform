<?php
header ("Content-Type:text/css");
$color = "#746EF1"; // Change your Color Here


function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#746EF1";
}

?>

.subscribe-area {
  background-color: <?php echo $color; ?>;
}

.footer-area:after {
  background-color: <?php echo $color; ?>;
}
.counter-area:after {
  background-color: <?php echo $color; ?>;
}
.navbar-area ul li a:before {
  border-bottom: 7px solid <?php echo $color; ?>;
}
.navbar-area ul li a:after {
    background: <?php echo $color; ?>;
}
.navbar-area ul li a:hover {
    color: <?php echo $color; ?>;
}
.dropdown-menu li a {
    color: <?php echo $color; ?> !important;
}
.wizard-card[data-color="red"] .moving-tab {
      background-color: <?php echo $color; ?> !important;
}
.btn.btn-danger, .btn.btn-danger:hover, .btn.btn-danger:focus, .btn.btn-danger:active, .btn.btn-danger.active, .btn.btn-danger:active:focus, .btn.btn-danger:active:hover, .btn.btn-danger.active:focus, .btn.btn-danger.active:hover, .open > .btn.btn-danger.dropdown-toggle, .open > .btn.btn-danger.dropdown-toggle:focus, .open > .btn.btn-danger.dropdown-toggle:hover {
    background-color: <?php echo $color; ?> !important;
    color: #FFFFFF !important;
}
.base-bg {
  background-color: <?php echo $color; ?> !important;
}
.base-txt {
  color: <?php echo $color; ?> !important;
}
.portfolio-area .portfolio-masonary-wrapper .single-portfolio-item .thumb .hover {
  background-color: <?php echo $color; ?>;
}
