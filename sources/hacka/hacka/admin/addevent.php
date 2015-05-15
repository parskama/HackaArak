<?php

require("header.php");
require("../dataAccessLayer.php");
?>
<div class="addevent">
	<div class="header_addevent">
    	افزودن رویداد جدید
    </div>
    <div class="content_addevent">
    	<div id="box1">
            <div class="labeltypeevent">
                نوع رویداد
            </div>
            <select id="select_typeevent">
            	<option value="1"  selected>نوع رویداد</option>
            	<?php
                $sql = "SELECT * FROM `typeevent`";
				$result = $connect->query($sql);
				while($row = $result->fetch(PDO::FETCH_ASSOC))
				{
				?>
                <option  value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
                <?php }
				?>
            </select>
            <input type="text" class="txtaddevent" id="txtnameevent" placeholder="در صورتی که نام خاصی در نظر دارید" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                تاریخ برگزاری
            </div>
            <input type="text" class="txtaddevent" id="dateevent" style="margin-right:0px;" placeholder="" />
             <select id="select_addevent" style="margin-right:22px;">
             	<?php  
				$sql = "SELECT * FROM `city`";
				$result = $connect->query($sql);
				while($row = $result->fetch(PDO::FETCH_ASSOC))
				{
				?>
                <option  value="<?php echo $row["city"]; ?>"><?php echo $row["city"]; ?></option>
                <?php }
				?>
            </select>
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                تاریخ پایان
            </div>
            <input type="text" class="txtaddevent" id="enddateevent" style="margin-right:0px;" placeholder="" />
         </div>
        <div class="box2">
        	<div class="labeltypeevent">
                مختصات
            </div>
            <input type="text" id="map" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                ساعت
            </div>
            <select id="selectpmstart">
            	<option value="1">AM</option>
                <option value="2">PM</option>
            </select>
            <input type="text" class="txtclock" id="clockstart" placeholder="ساعت شروع" />
            <select id="selectpmend">
            	<option value="1">AM</option>
                <option value="2">PM</option>
            </select>
            <input type="text" class="txtclock" id="endclock" placeholder="ساعت پایان" />
        </div>
        <div class="box2">
            <div class="labeltypeevent">
                  تگ
             </div>
        	<textarea class="txtarea_addevent" id="tags">
            </textarea>
        </div>
        <div class="box2">
            <div class="labeltypeevent">
                  آدرس
             </div>
        	<textarea class="txtarea_addevent" id="descriptions">
            </textarea>
        </div>
        <div class="box2">
        	<input type="button" value="ذخیره" id="btnaddevent" class="btnsaveevent" />
        </div>
    </div>        
</div>