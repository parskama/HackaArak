<?php

require("header.php");
require_once("../dataAccessLayer.php");
require_once("../func.php");
?>
<div class="addevent" id="organizer_wrapper">
	<div class="header_addevent header_m" id="organizer_wrapper">
    	لیست تیم اجرایی
    </div>
    <div class="content_addevent editboxheight content" id="organizer_wrapper">
    		<ul id="editboxheader" class="editboxtable">
            	<li>نام و نام خانوادگی</li>
                <li>تخصص</li>
                <li>تصویر</li>
                <li>آدرس ایمیل</li>
                <li>فیسبوک</li>
                <li>توییتر</li>
                <li>لینکداین</li>
            </ul>
            <?php
				$sqlquery = "SELECT * FROM `organizer`";
				$result = $connect->query($sqlquery);
				
				
				while($row = $result->fetch(PDO::FETCH_ASSOC)){
					$linkfb=limitword($row['linkfb'],10);
					$linkdin=limitword($row['linkdin'],10);
					$linktweet=limitword($row['linktweet'],10);
					echo "<ul id='editboxcontetnt_m_".$row['id']."' class='editboxtable'>
            				<li id='familyname'>".$row['firstname']." ".$row['lastname']."</li>
							<li id='skill'>".$row['about']."</li>
							<li id='img'>".$row['linkimg']."</li>
							<li id='mail'>".$row['email']."</li>
							<li id='fb'>".$linkfb."</li>
							<li id='tw'>".$linkdin."</li>
							<li id='li'>".$linktweet."</li>
            			</ul>";
				}
			?>
            
        </div>
</div>
<div class="addevent" id="organizer_wrapper">
	<div class="header_addevent header_m" id="organizer_wrapper">
    	اضافه کردن به تیم اجرایی
    </div>
    <div class="content_addevent" id="organizer_wrapper">
    	<div id="linksadd">
        	<form id="addlinks" method="post" action="serverReply.php">
                	<div class='addorgboxes' title=''>
                    	<div id="box1">
        	 <div class="labeltypeevent">
                  نام
             </div>
        	 <input type="text" id="m_name" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                نام خانوادگی
            </div>
            <input type="text" id="m_family" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                تخصص
            </div>
            <input type="text" id="m_skill" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                تصویر
            </div>
            <input type="text" id="m_img" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                آدرس ایمیل
            </div>
            <input type="text" id="m_mail" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                فیسبوک
            </div>
            <input type="text" id="m_fb" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                توییتر
            </div>
            <input type="text" id="m_tw" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                لینکداین
            </div>
            <input type="text" id="m_li" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2 box2_2">
        	<input type="button" value="ذخیره" class="btnsaveevent" id="addorgenizer" />
        </div>

                    </div>
                </div>
                
            </form>
        </div>

    </div>
</div>