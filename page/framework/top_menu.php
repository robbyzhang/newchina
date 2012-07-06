<table>
	<tr>
		<td>
		<ul class="nav nav-pills" style="clear:left">
			<li>
				<a href="">test</a>
			</li>
		</ul></td>
		<td>
		<div id="div_top_menu">
			<div id="div_login_loading" style="display:none">loading ...</div>
			<?php
			   echo '<form id="frm_login" action="http://'.$_SERVER[SERVER_ADDR].':80/newchina/page/account/login.php" class="form-inline">';
			?>
				<input type="text" class="input-small" placeholder="用户名" name="username">
				<input type="password" class="input-small" placeholder="密码" name="password">
				<input type="submit"  class="btn" id="btn_login" value="登录">
				<input type="submit"  class="btn" id="btn_register" value="注册">
			</form>
		</div></td>
	</tr>
</table>