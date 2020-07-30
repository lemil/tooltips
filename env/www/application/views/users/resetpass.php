<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div id="container">
	<h1><?php echo $title; ?></h1>

	<!-- breadcrumbs -->
	<div class="dbc">
		<p class='pbc'><a href="/" >Home</a> &gt;
			<?php
		 $tot = sizeof($bc);
		 $pos = 0;
		 foreach ($bc as $k) {
			$pos++;  
		 	?><a href="<?php echo $k->href ?>" ><?php echo $k->title; ?></a><?php 
		 	if($tot > $pos) { echo '&nbsp;&gt;&nbsp;';}
		} ?></p>
	</div>

	<div id="body">

<style type="text/css">
.form {
	font-family: 'Montserrat';
}

.form-input {
	border: 1px solid #666;
	padding: 5px;
	border-radius: 5px;
	width: 200px;
}

.form-submit {
	width: 200px;
	padding: 5px;
	border-radius: 5px;
	background: #3175B1;
	border: 1px solid #666;
	color: white;
}

.form-message-error {
border: 1px solid red;
background: #ddcccc;
border-radius: 5px;
padding: 15px 0 0 15px;
color: red;
margin: 20px 0 0 0;
}
div.form-message-error > p {
	margin: 0px 0px 5px 0px;
}
.form-closebtn{
position: relative;
float: right;
right: 12px;
font-size: 27px;
cursor: pointer;
}
</style> 

	<div class="menu-row"><img class="menu-row-img" width="18" src="/assets/icon/gear_black.png">&nbsp;&nbsp;Reset password</div>

<?php 
if(isset($message) && sizeof($message) > 0) {
?>
<div class="form-message-error" >		
	<div class="form-closebtn" onclick="$('.form-message-error').hide()">&times;</div>
	<p>Something went wrong </p>
	<ul><?php 
		foreach ($message as $v ) {
		echo "<li style='background-color: transparent'>$v</li>";		
		} ?>
	</ul>
</div>
<?php 
}
?>

    <form id="resetpass" autocomplete="off" action="/users/resetpass/<?php echo $userId ?>" class="form" method="post">
      <div class="form-group"><br>
      	  User ID<br>
          <input id="userId" name="userId" readonly class="form-input" type="text" value="<?php echo $userId ?>">
          <br><br>
      	  Username<br>
          <input id="username" name="username" readonly class="form-input" type="text" value="<?php echo $username ?>">
          <br><br>
      	  New Password*<br>
          <input id="pwd" name="pwd" placeholder="New Password" class="form-input" type="Password">
          <br><br>
          Confirm Password*<br>
          <input id="pwd2" name="pwd2" placeholder="Confirm Password" class="form-input" type="Password">
      </div>
      <br>
      <div class="form-group">
        <input name="recover-submit" value="Reset Password" type="submit" class="form-submit">
      </div>      
      <input type="hidden" class="hide" name="token" id="token" value=""> 
    </form>

	</div>
	<p class="footer" >&nbsp;</p>
	
</div>
