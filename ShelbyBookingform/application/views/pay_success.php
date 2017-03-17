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
    <link rel="stylesheet" href="<?php echo asset_url();?>vendor/font-awesome/css/font-awesome.min.css">
    
</head>
<body>
    <div id="main" class="LuloCleanOne page1-style">
        <form action="http://www.shelbyssidecartours.com" id="booking_form" method="post">

            <div class="header">
                <img src="<?php echo asset_url();?>img/<?php echo $brand_url; ?>" />
                <h2 class="LuloCleanOne-Bold header-text"><?php echo $title; ?></h2>
            </div>
            <div class="body">
                <div class="top-space input-box-container">
                    <h3 class="LuloCleanOne-Bold">Thank you for booking with Shelby's Sidecar Tours.</h3>
                    <h3 class="LuloCleanOne-Bold">We will contact you shortly to confirm your tour.</h3>
                </div>
            </div>
            <div class="footer">
                <button class="btn-next LuloCleanOne-Bold" type="submit">NEXT</button>
            </div>
        </form>
    </div>

    <script src="<?php echo asset_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo asset_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo asset_url();?>js/custom.js"></script>

</body>
</html>

