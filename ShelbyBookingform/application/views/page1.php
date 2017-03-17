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
    <div id="main" class="LuloCleanOutline page1-style">
        <form action="<?php echo base_url();?>booking_choosedatetime" id="booking_form" method="post">

            <div class="header">
                <img src="<?php echo asset_url();?>img/<?php echo $brand_url; ?>" />
                <h2 class="LuloCleanOne-Bold header-text"><?php echo $title; ?></h2>
                <a class="LuloCleanOne-Bold" style="position: absolute; right: 20px; top: 13px; color: #08c; font-size: 10px;" href="<?php echo base_url();?>date_time_manage">GoTo Operator Panel</a>
            </div>

            <div class="body">
                <div class="top-space input-box-container">
                    <h3 class="LuloCleanOne-Bold">CHOOSE YOUR DATE</h3>
                    <div class="date-container LuloCleanOne">
                        <h3 class="LuloCleanOne-Bold monthofdate">MAY 2016</h3>
                        <div class="datesofweek">
                            <div class="cal-left-arrow"><span class="icon-left-arrow"></span></div>
                            <div class="day-item day-monday">
                                <p class="day-title">MON</p>
                                <div class="daynumber-container">
                                    <span class="LuloCleanOne-Bold daynumber">2</span>
                                    <span class="hidden date-string"></span>
                                </div>
                            </div>
                            <div class="day-item day-tuesday">
                                <p class="day-title">TUES</p>
                                <div class="daynumber-container">
                                    <span class="LuloCleanOne-Bold daynumber">3</span>
                                    <span class="hidden date-string"></span>
                                </div>
                            </div>
                            <div class="day-item day-wednesday">
                                <p class="day-title">WED</p>
                                <div class="active daynumber-container">
                                    <span class="LuloCleanOne-Bold daynumber">4</span>
                                    <span class="hidden date-string"></span>
                                </div>
                            </div>
                            <div class="day-item day-thursday">
                                <p class="day-title">THUR</p>
                                <div class="daynumber-container">
                                    <span class="LuloCleanOne-Bold daynumber">5</span>
                                    <span class="hidden date-string"></span>
                                </div>
                            </div>
                            <div class="day-item day-friday">
                                <p class="day-title">FRI</p>
                                <div class="daynumber-container">
                                    <span class="LuloCleanOne-Bold daynumber">6</span>
                                    <span class="hidden date-string"></span>
                                </div>
                            </div>
                            <div class="day-item day-saturday">
                                <p class="day-title">SAT</p>
                                <div class="daynumber-container">
                                    <span class="LuloCleanOne-Bold daynumber">7</span>
                                    <span class="hidden date-string"></span>
                                </div>
                            </div>
                            <div class="day-item day-sunday">
                                <p class="day-title">SUN</p>
                                <div class="daynumber-container">
                                    <span class="LuloCleanOne-Bold daynumber">8</span>
                                    <span class="hidden date-string"></span>
                                </div>
                            </div>
                            <div class="cal-right-arrow"><span class="icon-right-arrow"></span></div>
                        </div>
                    </div>
                    <input type="hidden" class="selected-date" name="date" />
                </div>

                <div class="select-time-container">
                    <h3 class="LuloCleanOne-Bold">CHOOSE YOUR TIME</h3>
                    <div class="time-container">
                     <input type="hidden" class="hour" name="hour" value="<?php echo $hour; ?>" />
                     <input type="hidden" class="time_array" value='<?php echo $json_year_data; ?>' />
                     <div class="row">
                        <div class="col-xs-4">
                            <div id="time_6am" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">6AM</span>    
                            </div>
                            <div id="time_7am" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">7AM</span>    
                            </div>
                            <div id="time_8am" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">8AM</span>    
                            </div>
                            <div id="time_9am" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">9AM</span>    
                            </div>
                            <div id="time_10am" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">10AM</span>    
                            </div>
                            <div id="time_11am" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">11AM</span>    
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div id="time_12pm" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">MIDDAY</span>    
                            </div>
                            <div id="time_1pm" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">1PM</span>    
                            </div>                   
                            <div id="time_2pm" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">2PM</span>    
                            </div>
                            <div id="time_3pm" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">3PM</span>    
                            </div>
                            <div id="time_4pm" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">4PM</span>    
                            </div>
                            <div id="time_5pm" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">5PM</span>    
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div id="time_6pm" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">6PM</span>    
                            </div>
                            <div id="time_7pm" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">7PM</span>    
                            </div>
                            <div id="time_8pm" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">8PM</span>    
                            </div>
                            <div id="time_9pm" class="disabled fullwith-line time-item">
                                <span class="LuloCleanOne-Bold">9PM</span>    
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="selected-time" name="time" />
                </div>
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
