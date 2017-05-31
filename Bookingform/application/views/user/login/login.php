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
            <form action="<?php echo base_url();?>login" id="booking_form" method="post">

                <div class="header">
                    <img src="<?php echo asset_url();?>img/<?php echo $brand_url; ?>" />
                    <h2 class="LuloCleanOne-Bold header-text"><?php echo $title; ?></h2>
                </div>
                <div class="body" style="max-width: 650px; margin: 0 auto;">
                    <div class="row form-row">
						<?php if (validation_errors()) : ?>
							<div class="col-md-12">
								<div class="alert alert-danger" role="alert">
									<?= validation_errors() ?>
								</div>
							</div>
						<?php endif; ?>
						<?php if (isset($error)) : ?>
							<div class="col-md-12">
								<div class="alert alert-danger" role="alert">
									<?= $error ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="row form-row">
					    <div class="col-sm-6">
                            <div class="input-box-container">
                                <h3 class="LuloCleanOne-Bold">Username<span class='required'>*</span></h3>
                                <input type="text" name="username" class="require LuloCleanOne full-width" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-box-container">
                                <h3 class="LuloCleanOne-Bold">Password<span class='required'>*</span></h3>
                                <input type="password" name="password" class="require LuloCleanOne full-width" />
                            </div>
                        </div>
                    </div>
                    <div class="bottom-space input-box-container">
                    	<h3 class="LuloCleanOne-Bold text-center"><span class='required'>*</span> - Mandatory field</h3>
                    </div>
                </div>
                <div class="footer">
                    <button style="padding: 6.5px 100px !important;" class="btn-submit LuloCleanOne-Bold" type="submit">Login</button>
                </div>
            </form>
        </div>

        <script src="<?php echo asset_url();?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo asset_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo asset_url();?>js/custom.js"></script>

    </body>
</html>
