<?php 
require("session.php");
require("header.php"); ?>
			<section class="mainContent passmgmtCls" id="changepassbox">
				<form action="#">
					<b>نام کاربری:</b><span> <?php echo $_SESSION['usernamefamiily']; ?></span>
					<b>ایمیل:</b><span><?php echo $_SESSION["email"] ?></span>
					<div>
						<b>پسورد فعلی:</b><input type="password" id="oldpass" >
					</div>
					<div>
						<b>پسورد جدید</b><input type="password"  id="newpass">
					</div>
					<div>
						<b>تکرار پسورد</b><input type="password"  id="renpass">
					</div>
					<div id="submitform" class="changepassbtn">
                        <div id="animate"></div>
                         <b>تغییر کلمه عبور</b>
                    </div>
				</form>
			</section>
		</div>
	</div>
	<footer class="site-footer">
		<p>Copyright &copy; 2014 - All right reserved</p>	
	</footer>
</body>
</html>