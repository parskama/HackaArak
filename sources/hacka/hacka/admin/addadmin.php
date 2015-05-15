<?php

require("header.php");

?>
<div class="addevent">
	<div class="header_addevent">
    	اضافه کردن ادمین
    </div>
    <div class="content_addevent">
    	<div id="box1">
        	 <div class="labeltypeevent">
                  نام کاربری
             </div>
        	 <input type="text" id="username" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                پسورد
            </div>
            <input type="password" id="password" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                تکرار پسورد
            </div>
            <input type="password" id="repassword" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<div class="labeltypeevent">
                ایمیل
            </div>
            <input type="text" id="email" class="txtaddevent" placeholder="" />
        </div>
        <div class="box2">
        	<input type="button" value="ذخیره" class="btnsaveevent" id="saveadmin" />
        </div>
        </div>
    </div>
</div>