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
    <div id="main" class="LuloCleanOutline">
        <form action="<?php echo base_url();?>booking_inputpeoplecount" id="booking_form" method="post">

            <div class="header">
                <img src="<?php echo asset_url();?>img/<?php echo $brand_url; ?>" />
                <h2 class="LuloCleanOne-Bold header-text"><?php echo $title; ?></h2>
            </div>

            <div class="body">
                <div class="seperate-line-top"></div>
                <div class="top-space input-box-container">
                    <h3 class="LuloCleanOne-Bold">HOW MANY PEOPLE ARE ON YOUR TOUR?<span class='required'>*</span></h3>
                    <input type="text" name="numberofpeople" class="LuloCleanOne-Bold number require" />
                </div>
                <div class="input-box-container">
                    <h3 class="LuloCleanOne-Bold">HOW MANY MOTORBIKES WITH SIDECARES DO YOU REQUIRE?<span class='required'>*</span></h3>
                    <input type="text" name="numberofmotorbike" class="LuloCleanOne-Bold number require" />
                </div>
                <div class="bottom-space input-box-container">
                    <h3 class="LuloCleanOne-Bold">NUMBER OF PICNIC HAMPERS, IF REQUIRED(OPTIONAL)?</h3>
                    <input type="text" name="numberofpicnic" class="LuloCleanOne-Bold number" />
                </div>
                <div class="bottom-space input-box-container">
                    <h3 class="LuloCleanOne-Bold" >Each motorbike has a sidecar and can take up to two passengers.</h3>
                    <h3 class="LuloCleanOne-Bold" >One in the sidecar and one as a pillion passenger.</h3>
                    <h3 class="LuloCleanOne-Bold text-center" ><span class='required'>*</span> - Mandatory field</h3>
                </div>
                <div class="seperate-line-bottom"></div>
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
