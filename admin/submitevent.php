<?php require("header.php"); ?>
<div class="submitevent">
	<div class="title_submit">
    	<div class="texttitle_submit">
        	حاضرین رویداد
        </div>
    </div>
    <div class="content_submit">
    	<div class="box3">
        	<div class="labelbox3">
            	شهر برگزار کننده
            </div>
            <select id="selectcitybox3">
            	<option>
                	اراک
                </option>
                <option>
                	تهران
                </option>
            </select>
            <div class="label2box3">
            	نوع رویداد
            </div>
            <select id="selecttypebox3">
            	<option>
                	اراک
                </option>
                <option>
                	تهران
                </option>
            </select>
        </div>
        <div class="box3">
        	<input type="button" id="searchsubmit" value="جستجو" />
        	<input type="text" class="txtsearchbyname" placeholder="جستو اسامی خاص" />
        </div>
    </div>
</div><!-- end submit event -->
<div class="dispaysubmit">
	<ul class="ul-header">
    	<li class="lifirstname">
        	نام و نام خانوادگی
        </li>
        <li class="liemail">
        	ایمیل
        </li>
        <li class="nameevents">
        	نام رویداد
        </li>
    </ul>
    <?php 
		require("../dataAccessLayer.php");
		$sql = "SELECT * FROM `submitevent` ORDER BY `id`";
		$result = $connect->query($sql);
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
	?>
    <ul class="ul-header">
    	<li class="lifirstname">
        	<?php echo $row["namefamily"]; ?>
        </li>
        <li class="liemail">
        	<?php echo $row["email"]; ?>
        </li>
        <li style="width:100px;">
        	<?php echo $row["nameevent"]; ?>
        </li>
    </ul>
    <?php } ?>
    
</div>
