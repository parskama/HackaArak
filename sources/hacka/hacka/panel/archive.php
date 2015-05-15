<?php require_once("header.php"); ?>
			<section class="mainContent">
				<header class="mainheader"> 
					<label>شهر</label>
					<select name="" id="" class="select-cities">
						<?php  
							require("../dataAccessLayer.php");
							$sql = "SELECT * FROM `city`";
							$result = $connect->query($sql);
							while($row = $result->fetch(PDO::FETCH_ASSOC))
							{
							?>
							<option  value="<?php echo $row["city"]; ?>"><?php echo $row["city"]; ?></option>
							<?php }
							?>
					</select>
					<label>رویداد</label>
					<select name="" id="" class="select-cities">
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
					<div id="submitform">
                        <div id="animate"></div>
                         <b>جستجو</b>
                    </div>				
                </header>
				<div class="content-calender content">
					<ul>
                    	<?php 
							$sql = "SELECT * FROM `event` WHERE `status` = 0 ORDER BY `id`";
							$result = $connect->query($sql);
							while($row = $result->fetch(PDO::FETCH_ASSOC))
							{
						?>
						<li id="<?php echo $row["id"]; ?>">
							<span><?php echo $row["nameevent"]; ?></span>	
							<span><?php echo $row["datestart"]; ?></span>	
							<span><?php echo $row["timestart"]; if($row["timestartpm"] == 1) echo "PM";else echo "AM"; ?></span>	
							<span><?php echo $row["timeend"]; if($row["timeendpm"] == 1) echo "PM";else echo "AM"; ?></span>
                            <input type="hidden" id="location" value="<?php echo $row["location"]; ?>" />	
						</li>
                        <?php } ?>						
					</ul>
				</div>
					
			</section>
		</div>
	</div>
	<footer class="site-footer">
		<p>Copyright &copy; 2014 - All right reserved</p>	
	</footer>
</body>
</html>