<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<html>
    <head>
        <title>ShelbyBookingForm</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	

        <title>shelbyssidecartours | BOOKINGS</title>	

        <meta name="keywords" content="shelbyssidecartours | BOOKINGS" />
        <meta name="description" content="shelbyssidecartours | BOOKINGS">
        <meta name="author" content="John Byrne">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- 1. load the webfonts -->
        <link rel="stylesheet" href="<?php echo asset_url();?>css/MyFontsWebfontsKit.css"/>

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo asset_url();?>vendor/bootstrap/css/bootstrap.min.css">

        <!-- 2. set up some css styles using the webfonts -->
        <link rel="stylesheet" href="<?php echo asset_url();?>css/font.css"/>

        <!-- also not relavent to webfonts. just layout css for this doc. -->
        <link rel="stylesheet" href="<?php echo asset_url();?>css/layout.css">

    </head>
    <body>
        <div id="main" class="LuloCleanOutline page3-style">
			<div class="header">
				<img src="<?php echo asset_url();?>img/<?php echo $brand_url; ?>" />
				<h2 class="LuloCleanOne-Bold header-text"><?php echo $title; ?></h2>
			</div>
			<div class="body">
				<div class="row form-row">
					<div class="col-sm-12">
						<div class="input-box-container">
							<h3 class="LuloCleanOne-Bold text-center">Successfully Registered!</h3>
						</div>
					</div>
				</div>

			</div>
			<div class="footer" style="max-width: 345px; margin: 0 auto;">
				<div class="col-sm-6" style="text-align: left">
					<a class="LuloCleanOne-Bold" style="color: #08c; font-size: 10px;" href="<?php echo base_url();?>register">Register</a>
				</div>
				<div class="col-sm-6" style="text-align: right">
					<a class="LuloCleanOne-Bold" style="color: #08c; font-size: 10px;" href="<?php echo base_url();?>date_time_manage">GoTo Operator Panel</a>
				</div>
			</div>
        </div>

        <script src="<?php echo asset_url();?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo asset_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo asset_url();?>js/custom.js"></script>

    </body>
</html>