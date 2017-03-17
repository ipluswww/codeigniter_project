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
    <div id="main" class="LuloCleanOutline page4-style">
        <form action="<?php echo base_url();?>booking_summary" id="booking_form" method="post">

            <div class="header">
                <img src="<?php echo asset_url();?>img/<?php echo $brand_url; ?>" />
                <h2 class="LuloCleanOne-Bold header-text">BOOKING SUMMARY</h2>
            </div>

            <div class="body">
                <div class="seperate-line-top"></div>
                <div class="row-container">
                    <h3 class="LuloCleanOne-Bold">TOUR</h3>
                    <p class="LuloCleanOne"><?php echo $title; ?></p>
                </div>
                <div class="seperate-line"></div>
                <div class="row-container">
                    <h3 class="LuloCleanOne-Bold">HUMBER OF PASSENGERS</h3>
                    <p class="LuloCleanOne"><?php echo $numberofpeople; ?></p>
                </div>
                <div class="seperate-line"></div>
                <div class="row-container">
                    <h3 class="LuloCleanOne-Bold">NUMBER OF MOTORBIKES</h3>
                    <p class="LuloCleanOne"><?php echo $numberofmotorbike; ?></p>
                </div>
                <div class="seperate-line"></div>
                <div class="row-container">
                    <h3 class="LuloCleanOne-Bold">NUMBER OF PICNIC HAMPERS</h3>
                    <p class="LuloCleanOne"><?php echo $numberofpicnic; ?></p>
                </div>
                <div class="seperate-line"></div>
                <div class="row-container">
                    <h3 class="LuloCleanOne-Bold">DATE</h3>
                    <p class="LuloCleanOne"><?php echo $date; ?></p>
                </div>
                <div class="seperate-line"></div>
                <div class="row-container">
                    <h3 class="LuloCleanOne-Bold">PICK-UP TIME</h3>
                    <p class="LuloCleanOne"><?php echo $time; ?></p>
                </div>
                <div class="seperate-line"></div>
                <div class="row-container">
                    <h3 class="LuloCleanOne-Bold">DURATION</h3>
                    <p class="LuloCleanOne"><?php echo $hour; ?> hour</p>
                </div>
                <div class="seperate-line"></div>
                <div class="row-container">
                    <h3 class="LuloCleanOne-Bold">TOTAL</h3>
                    <p class="LuloCleanOne">$<?php echo $total; ?></p>
                </div>

                <div class="seperate-line-bottom"></div>
            </div>
            
            <div class="footer">
                <button class="btn-paynow LuloCleanOne-Bold" value="1" name="paynow" type="submit">PAY NOW</button>
            </div>

        </form>
    </div>

    <script src="<?php echo asset_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo asset_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo asset_url();?>js/custom.js"></script>

</body>
</html>
