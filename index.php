<?php
	session_start();
	if (!isset($_SESSION['usernamefamiily']))
		$username_session=0;
	else
		$username_session=$_SESSION['usernamefamiily'];
?>
<!doctype html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>هاکا ایران</title>
            
            <link rel="stylesheet" type="text/css" href="css/iStyle.css" />
        	<link rel="stylesheet" type="text/css" href="css/webfonts.css" />
            <link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
            <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css" />
            <link rel="icon" href="img/favicon.ico" />
            
        	<script type="text/javascript" src="js/jquery-2.1.1.js" ></script>
        	<script type="text/javascript" src="js/jquery.easing.1.3.js" ></script>
        	<script type="text/javascript" src="js/jquery.easing.compatibility.js" ></script>
            <script type="text/javascript" src="js/modernizr.js" ></script>
            <script type="text/javascript" src="js/velocity.min.js" ></script>
        	<script type="text/javascript" src="js/jquery.tooltipster.js" ></script>
            <script type="text/javascript" src="js/googlemap.js" ></script>
            <script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
            <script type="text/javascript" src="js/iScript.js" ></script>
            <script src="js/ajax.js"></script>
            <script type="text/javascript">
			function init_map(){
				var myOptions = {
					zoom:3,
					center:new google.maps.LatLng(34.102201, 49.711705),
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
				marker = new google.maps.Marker({
					map: map,position: new google.maps.LatLng(34.102201, 49.711705)
				});
				infowindow = new google.maps.InfoWindow({
					content:"<b>نام محل برگزاری</b><br/>آدرس برگزاری رویداد بعدی"
				});
				google.maps.event.addListener(marker, "click", function(){
					infowindow.open(map,marker);
				});
				infowindow.open(map,marker);
			}google.maps.event.addDomListener(window, 'load', init_map);
        	</script>
            <script type="text/javascript">
			
			<?php
				$db = new PDO("mysql:host=localhost; dbname=hacka; charset=UTF8", "root", "");
				$stmt = $db->prepare("SELECT * FROM `event` WHERE `city`='اراک' ORDER BY id DESC") or die(mysql_error);
				$stmt->execute()  or die(mysql_error);
				$arak=array();
				foreach($stmt as $row){
					$date=explode('/',$row['datestart']);
					if($row['timestart']=="1")
						$sup="AM";
					else
						$sup="PM";
						
					$arak[0]=$date[1];
					$arak[1]=$date[2];
					$arak[2]=$row['timestart'];
					$arak[3]=$sup;
					$arak[4]=$row['location'];
				}
			?>
			<?php
				$db = new PDO("mysql:host=localhost; dbname=hacka; charset=UTF8", "root", "");
				$stmt = $db->prepare("SELECT * FROM `event` WHERE `city`='تهران' ORDER BY id DESC") or die(mysql_error);
				$stmt->execute()  or die(mysql_error);
				$tehran=array();
				foreach($stmt as $row){
					$date=explode('/',$row['datestart']);
					if($row['timestart']=="1")
						$sup="AM";
					else
						$sup="PM";
						
					$tehran[0]=$date[1];
					$tehran[1]=$date[2];
					$tehran[2]=$row['timestart'];
					$tehran[3]=$sup;
					$tehran[4]=$row['location'];
				}
			?>
			<?php
				$db = new PDO("mysql:host=localhost; dbname=hacka; charset=UTF8", "root", "");
				$stmt = $db->prepare("SELECT * FROM `event` WHERE `city`='اصفهان' ORDER BY id DESC") or die(mysql_error);
				$stmt->execute()  or die(mysql_error);
				$isfahan=array();
				foreach($stmt as $row){
					$date=explode('/',$row['datestart']);
					if($row['timestart']=="1")
						$sup="AM";
					else
						$sup="PM";
						
					$isfahan[0]=$date[1];
					$isfahan[1]=$date[2];
					$isfahan[2]=$row['timestart'];
					$isfahan[3]=$sup;
					$isfahan[4]=$row['location'];
				}
			?>
			<?php
				$db = new PDO("mysql:host=localhost; dbname=hacka; charset=UTF8", "root", "");
				$stmt = $db->prepare("SELECT * FROM `event` WHERE `city`='اهواز' ORDER BY id DESC") or die(mysql_error);
				$stmt->execute()  or die(mysql_error);
				$ahwaz=array();
				foreach($stmt as $row){
					$date=explode('/',$row['datestart']);
					if($row['timestart']=="1")
						$sup="AM";
					else
						$sup="PM";
						
					$ahwaz[0]=$date[1];
					$ahwaz[1]=$date[2];
					$ahwaz[2]=$row['timestart'];
					$ahwaz[3]=$sup;
					$ahwaz[4]=$row['location'];
				}
			?>
			<?php
				$db = new PDO("mysql:host=localhost; dbname=hacka; charset=UTF8", "root", "");
				$stmt = $db->prepare("SELECT * FROM `event` WHERE `city`='مشهد' ORDER BY id DESC") or die(mysql_error);
				$stmt->execute()  or die(mysql_error);
				$mashhad=array();
				foreach($stmt as $row){
					$date=explode('/',$row['datestart']);
					if($row['timestart']=="1")
						$sup="AM";
					else
						$sup="PM";
						
					$mashhad[0]=$date[1];
					$mashhad[1]=$date[2];
					$mashhad[2]=$row['timestart'];
					$mashhad[3]=$sup;
					$mashhad[4]=$row['location'];
				}
			?>
			<?php
				$db = new PDO("mysql:host=localhost; dbname=hacka; charset=UTF8", "root", "");
				$stmt = $db->prepare("SELECT * FROM `event` WHERE `city`='شیراز' ORDER BY id DESC") or die(mysql_error);
				$stmt->execute()  or die(mysql_error);
				$shiraz=array();
				foreach($stmt as $row){
					$date=explode('/',$row['datestart']);
					if($row['timestart']=="1")
						$sup="AM";
					else
						$sup="PM";
						
					$shiraz[0]=$date[1];
					$shiraz[1]=$date[2];
					$shiraz[2]=$row['timestart'];
					$shiraz[3]=$sup;
					$shiraz[4]=$row['location'];
				}
			?>
			
			<?php
		echo "var c_month	=	['".$arak[0]."','".$tehran[0]."','".$isfahan[0]."','".$shiraz[0]."','".$ahwaz[0]."','".$mashhad[0]."'];";
		echo "var c_days	=	['".$arak[1]."','".$tehran[1]."','".$isfahan[1]."','".$shiraz[1]."','".$ahwaz[1]."','".$mashhad[1]."'];";
		echo "var c_time	=	['".$arak[2]."','".$tehran[2]."','".$isfahan[2]."','".$shiraz[2]."','".$ahwaz[2]."','".$mashhad[2]."'];";
		echo "var c_sup		=	['".$arak[3]."','".$tehran[3]."','".$isfahan[3]."','".$shiraz[3]."','".$ahwaz[3]."','".$mashhad[3]."'];";
		echo "var place		=	['".$arak[4]."','".$tehran[4]."','".$isfahan[4]."','".$shiraz[4]."','".$ahwaz[4]."','".$mashhad[4]."'];";
			?>
				//MeetUpCalendar(c_days[3],c_month[3]);
			</script>
		</head>

		<body>
        	<!-- View 1 -->
            <div id="view1">
        	<!-- header -->
        		<div id="header">
                <?php
					if(!$username_session){?>
                	<a href="#0" class="cd-nav-trigger"><img class="cd-icon" src="img/member-icon.png" /></a>
                	<nav>
                    	<div class="cd-primary-nav" id="">
                        	<div id="loginfrm">
							<form action="" method="post">
                            	<input type="hidden" name="command" value="login" />
                                <table>
                                <tr>
                                	<td><label for="username">نام کاربری</label></td>
                                    <td><input type="text" name="username" id="username" /></td>
                                </tr>
                                <tr>
                                	<td><label for="password">کلمه عبور</label></td>
                                    <td><input type="password" name="password" id="password" /></td>
                                </tr>
                                <tr>
                                    <td id="submitform_1" colspan="2">
                                    	<div id="submitform">
                                        	<div id="animate"></div>
                                            <span>ورود</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                	<td colspan="2">
                                    	<span id="forgetpass" onClick="forgetopass();">کلمه عبور خود را فراموش کرده اید؟!</span>
                                    </td>
                                </tr>
                                </table>
                            </form>
                            </div>
                            <div id="signupform">
							<form action="" method="post">
                            	<input type="hidden" name="command" value="signup" />
                                <table>
                                <tr>
                                	<td><label for="firstname">نام</label></td>
                                    <td><input type="text" name="firstname" id="firstname" /></td>
                                </tr>
                                <tr>
                                	<td><label for="lastname">نام خانوادگی</label></td>
                                    <td><input type="text" name="lastname" id="lastname" /></td>
                                </tr>
                                <tr>
                                	<td><label for="singpass">کلمه عبور</label></td>
                                    <td><input type="password" name="singpass" id="singpass" /></td>
                                </tr>
                                <tr>
                                	<td><label for="resingpass">تکرار کلمه عبور</label></td>
                                    <td><input type="password" name="singpass" id="singpass2" /></td>
                                </tr>
                                <tr>
                                	<td><label for="phone">شماره تماس</label></td>
                                    <td><input type="text" name="phone" id="phone" /></td>
                                </tr>
                                <tr>
                                	<td><label for="mail">پست الکترونیک</label></td>
                                    <td><input type="text" name="mail" id="mail" /></td>
                                </tr>
                                <tr>
                                    <td id="submitsignup" colspan="2">
                                    	<div id="submitform">
                                        	<div id="animate"></div>
                                            <span>ثبت نام</span>
                                        </div>
                                    </td>
                                </tr>
                                </table>
                            </form>
                            </div>
                            <div id="forgetpassform">
							<form action="" method="post">
                            	<input type="hidden" name="command" value="forgetpass" />
                                <table>
                                <tr>
                                	<td><label for="mail">پست الکترونیک</label></td>
                                    <td><input type="text" name="mail" id="mail" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                    	<div id="submitform">
                                        	<div id="animate"></div>
                                            <span>ارسال کلمه عبور</span>
                                        </div>
                                    </td>
                                </tr>
                                </table>
                            </form>
                            </div>
						</div>
					</nav>
                    <!-- cd-overlay-nav -->
    					<div class="cd-overlay-nav">
							<span></span>
						</div>
                    <!-- end cd-overlay-nav -->
                    <!-- cd-overlay-content -->
                    	<div class="cd-overlay-content">
                    		<span></span>
						</div>
                    <!-- end cd-overlay-content -->
                    
                    <a href="#0" class="cd-nav-trigger"><img class="cd-icon" src="img/member-icon.png" /></a>
                    <div id="signbox">
                    	<a href="#" id="circlepopTrigger" onClick="loginfunc('1');">عضویت</a>&nbsp;|&nbsp;
                    	<a href="#" id="circlepopTrigger" onClick="loginfunc('2');">ورود</a>
                    </div>
                    <?php }else echo "<div id='usermsg'>".$username_session." عزیز خوش آمدید</div>"; ?>
                    <div id="social">
                    	<ul>
                        	<li title="دانلود اپلیکیشن اندروید" class="tooltip"><a href="#"><img src="img/app-icon.png" /></a></li>
                        	<li title="فیسبوک" class="tooltip"><a href="https://facebook.com/hackaIran"><img src="img/fb-icon.png" /></a></li>
                            <li title="توییتر" class="tooltip"><a href="https://twitter.com/hackaIran"><img src="img/twitter-icon.png" /></a></li>
                        </ul>
                    </div>
            	</div>
            <!-- end header -->
            <!-- logo -->
            	<div id="logo"><img usemap="#imgmap" src="img/main-pic.png"/></div>
                <map id="imgmap" name="imgmap">
                    <area shape="rect" coords="107,45,233,102" title="" alt="" href="#hackaglobal" onClick="p_kit('HACKA GLOBAL');">
                    <area shape="rect" coords="267,57,376,172" title="" alt="" href="#login" onClick="p_kit('YOUR NAME');">
                    <area shape="rect" coords="423,38,458,77" title="" alt="" href="#php" onClick="p_kit('PHP SCRIPTING');">
                    <area shape="rect" coords="390,115,425,144" title="" alt="" href="#VS" onClick="p_kit('VISUAL STUDIO');">
				</map>
                <div id="logo_divider">
                	<div id="logo_divider_1"></div>
                	<div id="logo_divider_2"></div>
				</div>
			<!-- end logo -->
            <!-- programming kit -->
            <div id="programming_wrapper">
            <div id="p_fade"></div>
        	<div id="kit">
        		<ul id="section_1">
                	<li><img src="img/hacka-icon.png" /></li>
                    <li><img src="img/hacka-icon.png" /></li>
                    <li><img src="img/hacka-icon.png" /></li>
                    <li id="center"><img src="img/hacka-icon.png" /></li>
                    <li><img src="img/hacka-icon.png" /></li>
                    <li><img src="img/hacka-icon.png" /></li>
                    <li><img src="img/hacka-icon.png" /></li>
            	</ul>
            	<ul id="section_2">
                	<li><img src="img/hacka-icon.png" /></li>
                    <li><img src="img/hacka-icon.png" /></li>
                    <li><img src="img/hacka-icon.png" /></li>
                    <li id="center"><img src="img/hacka-icon.png" /></li>
                    <li><img src="img/hacka-icon.png" /></li>
                    <li><img src="img/hacka-icon.png" /></li>
                    <li><img src="img/hacka-icon.png" /></li>
            	</ul>
        	</div>
        </div>
        <!-- end programming kit -->
        <!-- meetup -->
        <div id="meetup_wrapper">
        	<div id="meetup_cities">
            	<ul>
                	<li onClick="MeetUpCalendar(c_days[0],c_month[0],c_time[0],c_sup[0],place[0],1); nextprev(1);"><a href="#" id="c_1" class="selected">اراک</a>&nbsp; | &nbsp;</li>
                    <li onClick="MeetUpCalendar(c_days[1],c_month[1],c_time[1],c_sup[1],place[1],2); nextprev(2);"><a href="#" id="c_2">تهران</a>&nbsp; | &nbsp;</li>
                    <li onClick="MeetUpCalendar(c_days[2],c_month[2],c_time[2],c_sup[2],place[2],3); nextprev(3);"><a href="#" id="c_3">اصفهان</a>&nbsp; | &nbsp;</li>
                    <li onClick="MeetUpCalendar(c_days[3],c_month[3],c_time[3],c_sup[3],place[3],4); nextprev(4);"><a href="#" id="c_4">شیراز</a>&nbsp; | &nbsp;</li>
                    <li onClick="MeetUpCalendar(c_days[4],c_month[4],c_time[4],c_sup[4],place[4],5); nextprev(5);"><a href="#" id="c_5">اهواز</a>&nbsp; | &nbsp;</li>
                    <li onClick="MeetUpCalendar(c_days[5],c_month[5],c_time[5],c_sup[5],place[5],6); nextprev(6);"><a href="#" id="c_6">مشهد</a></li>
                </ul>
            </div>
            <div id="calendar">
            	<div id="month_wrapper">
                    <ul id="month">
                        <li id="m_1">فروردیــــــن</li>
                        <li id="m_2">اردیبهــشت</li>
                        <li id="m_3">خــــــرداد</li>
                        <li id="m_4">تــــــیر</li>
                        <li id="m_5">مــــــــرداد</li>
                        <li id="m_6">شهریــــــور</li>
                        <li id="m_7">مهــــــــر</li>
                        <li id="m_8">آبــــان</li>
                        <li id="m_9">آذر</li>
                        <li id="m_10">دی</li>
                        <li id="m_11">بهمــــــــن</li>
                        <li id="m_12">اسفنـــــــد</li>
                    </ul>
           	 	</div>
                <div id="days_wrapper">
                    <ul id="days">
                        <li id="e_1">1</li>
                        <li id="e_2">2</li>
                        <li id="e_3">3</li>
                        <li id="e_4">4</li>
                        <li id="e_5">5</li>
                        <li id="e_6">6</li>
                        <li id="e_7">7</li>
                        <li id="e_8">8</li>
                        <li id="e_9">9</li>
                        <li id="e_10">10</li>
                        <li id="e_11">11</li>
                        <li id="e_12">12</li>
                        <li id="e_13">13</li>
                        <li id="e_14">14</li>
                        <li id="e_15">15</li>
                        <li id="e_16">16</li>
                        <li id="e_17">17</li>
                        <li id="e_18">18</li>
                        <li id="e_19">19</li>
                        <li id="e_20">20</li>
                        <li id="e_21">21</li>
                        <li id="e_22">22</li>
                        <li id="e_23">23</li>
                        <li id="e_24">24</li>
                        <li id="e_25">25</li>
                        <li id="e_26">26</li>
                        <li id="e_27">27</li>
                        <li id="e_28">28</li>
                        <li id="e_29">29</li>
                        <li id="e_30">30</li>
                        <li id="e_31">31</li>
                    </ul>
                    <div id="indicator">
                        <img src="img/arrow-icon.png"/>
                    </div>
            	</div>
                <!-- meetup_board -->
                <div id="meetup_board">
                	<table>
                    	<tr>
                        	<td class="btns" id="rb"><button class="meetup_btn tooltip" id="next" title="رویداد بعدی" class="tooltip" value="1" name="aa" onClick="nextbtn(this);"></button></td>
                            <td id="clock">
                            	<img src="img/clock-frame.png" id="frame"/>
                                <img src="img/hand-big.png"  id="big"/>
                                <img src="img/hand-little.png"  id="little"/>
                            </td>
                            <td id="time">
                            	<span>میت آب بعـــدی</span>
                                <span id="date">16:15 <sup>PM</sup></span>
                            </td>
                            <td id="place"><img src="img/location-icon.png" /></td>
                            <td id="address">اراک، دانشگاه اراک ساختمان فنی</td>
                            <td class="btns" id="lb"><button onClick="prevtbn(this);" class="meetup_btn tooltip" id="prev" title="رویداد قبلی" class="tooltip" value="0"></button></td>
                        </tr>
                    </table>
                </div>
                <!-- end meetup_board -->

        </div>
        <!-- end meetup -->
        </div>
        </div>
        <!-- end View 1 -->
        <!-- View 2 -->
        <div id="view2">
        	<div id="aboutHacka">
            	<ul>
                	<li class="sides"><img src="img/green-R.png" /></li>
                    <li id="center">
                    	<h3>درباره هاکا</h3>
                        <p>یک نبرد بین المللی برنامه نویسی جهت هم افزایی و شبکه سازی در بین جامعه برنامه نویسان در کل دنیاست، که تاکنون در چندین شهر دنیا برگزار شده است. تعداد هاکاسیتی ها در حال افزایش است و در آینده‌ی نردیک نیز افرادی از هر هاکاسیتی  در یک هاکاتون جهانی به نام هاکاگلوبال شرکت میکنند که در یک شهر توریستی برگزار میشود.</p>
                    </li>
                    <li class="sides"><img src="img/green-L.png" /></li>
                </ul>
            </div>
            <!-- gmapwrapper -->
            <div id="gmapwrapper">
            	<div id="gmap_canvas"></div>
                <div id="icon"></div></div>
			</div>
            <!-- end gmapwrapper -->
            
            <div id="organizers_divider">برگزار کنندگان</div>
            <div id="organizers_wrapper">
            <!-- section i -->
            	
                        <?php
							$db = new PDO("mysql:host=localhost; dbname=hacka; charset=UTF8", "root", "");
							$stmt = $db->prepare("SELECT * FROM `organizer` ORDER BY `id` DESC LIMIT 3") or die(mysql_error);
							$stmt->execute()  or die(mysql_error);
							$c=1;
							foreach($stmt as $row){
								echo "<div class='sections' id='sec_".$c."'>
                						<div class='img'>
                    						<img src='img/person-icon.png' />";
								echo "<a href='".$row['linkfb']."' class='fb tooltip' title='فیسبوک'><img src='img/fb-icon.png'/></a>
                        				<a href='".$row['linkdin']."' class='gh tooltip' title='لینکداین'><img src='img/fb-icon.png'/></a>
                       					 <a href='".$row['linktweet']."' class='tw tooltip' title='توییتر'><img src='img/twitter-icon.png'/></a>";
										echo "</div>";
										echo "<div class='name'>
                    						<span>".$row['firstname']." ".$row['lastname']."</span>
                        					<span>".$row['about']."</span>
                    					</div>";
										echo "</div>";
								$c++;
							}
						?>
                <!-- end section i -->
                
            </div>
            <!-- end oganizer_wrapper -->
            <!-- archive -->
			<div id="archive_wrapper">
            	<div id="archive_divider">آرشیـــــــــــــو&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div id="archieve_head">
                	<ul>
                    	<li><span>نوع رویداد</span></li>
                        <li><span>تاریه شروع</span></li>
                        <li><span>تاریخ پایان</span></li>
                    </ul>
                </div>
                <div id="archieve_content" class="content">
                	<table>
                    <?php
							$db = new PDO("mysql:host=localhost; dbname=hacka; charset=UTF8", "root", "");
							$stmt = $db->prepare("SELECT * FROM `event` ORDER BY `id` DESC LIMIT 15") or die(mysql_error);
							$stmt->execute()  or die(mysql_error);
							foreach($stmt as $row){
								echo "<tr>
										<td>".$row['nameevent']."</td>
										<td>".$row['datestart']."</td>
										<td>".$row['dateend']."</td>
									</tr>";
							}
					?>
                    	<tr>
                        	<td>هاکا گلوبال</td>
                            <td>جمعه 25 اردیبهشت 1394</td>
                            <td>1 روز</td>
                        </tr>
                        <tr>
                        	<td>هاکا گلوبال</td>
                            <td>جمعه 25 اردیبهشت 1394</td>
                            <td>1 روز</td>
                        </tr>
                        <tr>
                        	<td>هاکا گلوبال</td>
                            <td>جمعه 25 اردیبهشت 1394</td>
                            <td>1 روز</td>
                        </tr>
                        <tr>
                        	<td>هاکا گلوبال</td>
                            <td>جمعه 25 اردیبهشت 1394</td>
                            <td>1 روز</td>
                        </tr>
                        <tr>
                        	<td>هاکا گلوبال</td>
                            <td>جمعه 25 اردیبهشت 1394</td>
                            <td>1 روز</td>
                        </tr>
                        <tr>
                        	<td>هاکا گلوبال</td>
                            <td>جمعه 25 اردیبهشت 1394</td>
                            <td>1 روز</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- end archive -->
            <!-- supporters -->
            <div id="supporters">
            <div id="archive_divider">حمایت کنندگان&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            	<ul>
                	<li><img src="img/azad-logo.jpg"/></li>
                    <li><img src="img/parskama-logo.jpg"/></li>
                    <li><img src="img/karafarini-logo.jpg"/></li>
                </ul>
            </div>
            <!-- end supporters -->
        </div>
        <!-- end View 2 -->
		
        <!-- footer -->
        	<div id="footer">
            	<span>Copyright ©2015, All Rights Reserved</span>
            </div>
        <!-- end footer -->
		</body>
	</html>