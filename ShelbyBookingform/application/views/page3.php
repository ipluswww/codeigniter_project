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
        <form action="<?php echo base_url();?>booking_inputpersonalinfo" id="booking_form" method="post">

            <div class="header">
                <img src="<?php echo asset_url();?>img/<?php echo $brand_url; ?>" />
                <h2 class="LuloCleanOne-Bold header-text"><?php echo $title; ?></h2>
            </div>

            <div class="body">
                <div class="row form-row">
                    <div class="col-sm-6">
                        <div class="input-box-container">
                            <h3 class="LuloCleanOne-Bold">YOUR NAME<span class='required'>*</span></h3>
                            <input type="text" name="customername" class="require LuloCleanOne full-width" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-box-container">
                            <h3 class="LuloCleanOne-Bold">COUNTRY OF RESIDENCE</h3>
                            <input type="text" name="countryofresidence" class="LuloCleanOne full-width" />
                        </div>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-sm-6">
                        <div class="input-box-container">
                            <h3 class="LuloCleanOne-Bold">EMAIL<span class='required'>*</span></h3>
                            <input type="text" name="email" class="require email LuloCleanOne full-width" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-box-container">
                            <h3 class="LuloCleanOne-Bold">NATIONALITY</h3>
                            <input type="text" name="nationality" class="LuloCleanOne full-width" />
                        </div>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-sm-6">
                        <div class="input-box-container">
                            <h3 class="LuloCleanOne-Bold">PHONE (* COUNTRY CODE)</h3>
                            <input type="text" name="phonenumber" class="LuloCleanOne full-width" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-box-container">
                            <h3 class="LuloCleanOne-Bold">LANGUAGES SPOKEN</h3>
                            <input type="text" name="languagessponken" class="LuloCleanOne full-width" />
                        </div>
                    </div>
                </div>

                <div class="input-box-container form-row">
                    <h3 class="LuloCleanOne-Bold">ADDRESS OF HOTEL WHILE STAYING IN SYDNEY<span class='required'>*</span></h3>
                    <input type="text" name="addressofhotel" class="require LuloCleanOneer full-width" />
                </div>

                <div class="input-box-container form-row mb-sm">
                    <h3 class="LuloCleanOne-Bold">NAMES OF OTHER PASSENGERS</h3>
                    <input type="text" name="namesofotherpassengers" class="LuloCleanOne full-width" />
                </div>

                <div class="input-box-group-container form-row mb-sm">
                    <h3 class="LuloCleanOne-Bold">HELMET SIZES OF PASSENGERS&nbsp;</h3><span class="notice">(place number of helmets in box next to size required)</span>
                    <div>
                        <div class="input-box-container">
                            <input type="text" name="numberofsmallhelmet" class="LuloCleanOne-Bold number" />
                            <span class="LuloCleanOne-Bold">SMALL</span>
                        </div>
                        <div class="input-box-container">
                            <input type="text" name="numberofmediumhelmet" class="LuloCleanOne-Bold number" />
                            <span class="LuloCleanOne-Bold">MEDIUM</span>
                        </div>
                        <div class="input-box-container">
                            <input type="text" name="numberoflargehelmet" class="LuloCleanOne-Bold number" />
                            <span class="LuloCleanOne-Bold">LARGE</span>
                        </div>
                        <div class="input-box-container">
                            <input type="text" name="numberofextralargehelmet" class="LuloCleanOne-Bold number" />
                            <span class="LuloCleanOne-Bold">EXTRA LARGE</span>
                        </div>
                    </div>
                </div>

                <div class="input-box-group-container form-row">
                    <h3 class="LuloCleanOne-Bold">AGE RANGE OF PASSENGERS&nbsp;</h3><span class="notice">(place number in box next to age range)</span>
                    <div>
                        <div class="input-box-container">
                            <input type="text" name="numberof7to16" class="LuloCleanOne-Bold number" />
                            <span class="LuloCleanOne-Bold">7-16</span>
                        </div>
                        <div class="input-box-container">
                            <input type="text" name="numberof17to49" class="LuloCleanOne-Bold number" />
                            <span class="LuloCleanOne-Bold">17-49</span>
                        </div>
                        <div class="input-box-container">
                            <input type="text" name="numberof50to69" class="LuloCleanOne-Bold number" />
                            <span class="LuloCleanOne-Bold">50-69</span>
                        </div>
                        <div class="input-box-container">
                            <input type="text" name="numberof70plus" class="LuloCleanOne-Bold number" />
                            <span class="LuloCleanOne-Bold">70+</span>
                        </div>
                    </div>
                </div>

                <div class="input-box-container form-row">
                    <h3 class="LuloCleanOne-Bold">SPECIAL NEEDS</h3>
                    <input type="text" name="specialneeds" class="LuloCleanOne full-width" />
                </div>

                <div class="input-box-container form-row">
                    <h3 class="LuloCleanOne-Bold">ADDITIONAL COMMENTS</h3>
                    <textarea name="namesofotherpassengers" class="LuloCleanOne full-width" ></textarea>
                </div>

                <div class="bottom-space input-box-container">
                   <h3 class="LuloCleanOne-Bold text-center" ><span class='required'>*</span> - Mandatory field</h3>
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
