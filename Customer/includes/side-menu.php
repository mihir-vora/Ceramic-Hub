<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        .sidebar .side-menu .head {
          -webkit-border-radius: 0px;
          -moz-border-radius: 0px;
          border-radius: 0px;
          color: #FFFFFF;
          font-size: 18px;
          font-family: 'FjallaOneRegular';
          padding: 15px 17px;
          text-transform: uppercase;
          background: black;
        }
        .sidebar .side-menu .head .icon {
  margin-right: 20px;
}
.sidebar .side-menu nav .nav > li {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  border-color: -moz-use-text-color #FF8C00;
  border-image: none;
  border-left: 1px solid black;
  border-right: 1px solid black;
  border-style: none solid;
  border-width: 0 1px;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
  position: relative;
  width: 100%;
  border-bottom: 1px solid black;
  background: white;
}
.sidebar .side-menu nav .nav > li > a {
  padding: 13px 15px;
  color: #FF8C00;
  font-size: 15px;
  text-transform: uppercase;
}
.sidebar .side-menu nav .nav > li > a:after {
  color: #FF8C00;
  /*content: "\f0a9";*/
  float: right;
  font-size: 12px;
  height: 20px;
  line-height: 18px;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
  width: 20px;
  font-family: FontAwesome;
}
.sidebar .side-menu nav .nav > li > a .icon {
  font-size: 20px;
  margin-right: 25px;
}
.sidebar .side-menu nav .nav > li > a:hover,
.sidebar .side-menu nav .nav > li > a:focus {
  background: #fff;
  border-left: 5px solid #FF8C00;
}
.sidebar .side-menu nav .nav > li > a:hover .icon,
.sidebar .side-menu nav .nav > li > a:focus .icon {
  color: #666666;
}
.sidebar .side-menu nav .nav > li > .mega-menu {
  padding: 3px 0;
  top: 0 !important;
  left: 100%;
  margin: 0;
  min-width: 330%;
  /*338%;*/
  position: absolute;
  top: 0px;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
}
.sidebar .side-menu nav .nav > li > .mega-menu .yamm-content {
  padding: 10px 20px;
}
.sidebar .side-menu nav .nav > li > .mega-menu .yamm-content ul > li {
  border-bottom: 1px solid #E0E0E0;
  padding: 5px 0;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
.sidebar .side-menu nav .nav > li > .mega-menu .yamm-content ul > li:last-child {
  border-bottom: none;
}
.sidebar .side-menu nav .nav > li > .mega-menu .yamm-content ul > li > a {
  line-height: 26px;
  padding: 0px;
}
.sidebar .side-menu nav .nav > li > .mega-menu .yamm-content .dropdown-banner-holder {
  position: absolute;
  right: -36px;
  top: -8px;
}
.sidebar .side-menu2 nav .nav li a {
  padding: 14.3px 15px;
}
.sidebar .sidebar-module-container .sidebar-widget .widget-header {
  background: #eeeeee;
  padding: 10px 15px;
}
.sidebar .sidebar-module-container .sidebar-widget .widget-header .widget-title {
  font-size: 14px;
  font-family: 'FjallaOneRegular';
  margin: 0px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle {
  clear: both;
  display: block;
  font-family: 'Roboto', sans-serif;
  font-size: 13px;
  font-weight: 300;
  line-height: 36px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle:after {
  /*content: "\f147";*/
  float: right;
  font-family: fontawesome;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle.collapsed {
  color: #666666;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle.collapsed:after {
  color: #636363;
  content: "\f196";
  font-family: fontawesome;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner {
  margin: 14px 0 20px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner ul {
  padding-left: 15px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner ul li {
  line-height: 27px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner ul li a {
  color: #666666;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner ul li a:before {
  content: "\f105";
  font-family: fontawesome;
  font-size: 14px;
  line-height: 15px;
  margin: 0 5px 0 0;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner ul li a:hover:before {
  margin: 0 8px 0 0;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder {
  padding: 0 0 20px;
  position: relative;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider {
  display: inline-block;
  position: relative;
  vertical-align: middle;
  margin-top: 15px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider.slider-horizontal {
  height: 20px;
  width: 100% !important;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider .slider-track {
  background-color: #f1f1f1;
  background-repeat: repeat-x;
  cursor: pointer;
  position: absolute;
  width: 94% !important;
  height: 6px;
  left: 0;
  margin-top: -5px;
  top: 50%;
  width: 100%;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider .slider-track .slider-selection {
  bottom: 0;
  height: 100%;
  top: 0;
  background-repeat: repeat-x;
  box-sizing: border-box;
  position: absolute;
  background: #c3c3c3;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider .slider-track .slider-handle {
  background-color: #FFFFFF;
  background-repeat: repeat-x;
  -webkit-border-radius: 400px;
  -moz-border-radius: 400px;
  border-radius: 400px;
  height: 20px;
  margin-left: -3px !important;
  opacity: 1;
  position: absolute;
  top: -3px;
  width: 20px;
  margin-top: -5px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider .tooltip {
  margin-top: -36px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .min-max {
  font-size: 15px;
  font-weight: 700;
  color: #fe5252;
  margin-top: 15px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .list li {
  clear: both;
  display: block;
  font-family: 'Roboto', sans-serif;
  font-size: 13px;
  font-weight: 300;
  line-height: 36px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .list li a {
  color: #666666;
  display: block;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .compare-report {
  margin-top: 20px;
  margin-bottom: 30px;
}
.sidebar .sidebar-widget .advertisement .item {
  background-color: #e7e7e7;
  background-position: center 55%;
  background-size: cover;
  height: 430px;
}
.sidebar .sidebar-widget .advertisement .item .caption {
  color: #636363;
  left: 12%;
  letter-spacing: -3px;
  position: absolute;
  top: 11%;
  z-index: 100;
  display: table-cell;
}
.sidebar .sidebar-widget .advertisement .item .caption .big-text {
  font-size: 60px;
  line-height: 125px;
  text-transform: uppercase;
  font-family: 'FjallaOneRegular';
  color: #fff;
  text-shadow: 1px 1px 3px #cfcfcf;
}
.sidebar .sidebar-widget .advertisement .item .caption .big-text .big {
  font-size: 120px;
  color: #ff7878;
  display: block;
  text-shadow: 1px 1px 3px #cfcfcf;
}
.sidebar .sidebar-widget .advertisement .item .caption .excerpt {
  font-size: 24px;
  letter-spacing: -1px;
  text-transform: uppercase;
  color: #e6e6e6;
  text-shadow: 1px 1px 3px #cfcfcf;
}
.sidebar .sidebar-widget .advertisement .owl-controls {
  bottom: 20px;
  position: absolute;
  text-align: center;
  top: auto;
  width: 100%;
}
.sidebar .sidebar-widget .advertisement .owl-controls .owl-pagination {
  display: inline-block;
}
.sidebar .sidebar-widget .advertisement .owl-controls .owl-pagination .owl-page {
  display: inline-block;
}
.sidebar .sidebar-widget .advertisement .owl-controls .owl-pagination .owl-page span {
  display: block;
  width: 15px;
  height: 15px;
  background: #fff;
  border: none;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  margin: 0 5px;
  -webkit-transition: all 200ms ease-out;
  -moz-transition: all 200ms ease-out;
  -o-transition: all 200ms ease-out;
  transition: all 200ms ease-out;
}
    </style>
</head>
<body>


<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
  
        <ul class="nav">
            <li class="dropdown menu-item">
              <?php $sql=mysqli_query($db,"SELECT id,categoryName  FROM category");
while($row=mysqli_fetch_array($sql))
{
    ?>
                <a href="category.php?cid=<?php echo $row['id'];?>" class="dropdown-toggle" 
                    style="color:#FF8C00" >
                <b><?php echo $row['categoryName'];?></b></a>
              


                <?php } ?>
                        
</li>
</ul>
    </nav>
</div>
</body>
</html>


