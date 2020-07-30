<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<center>
<div id="container" style="width: 440px;">
	<h1 style="background-image: none;padding: 1px 0px 10px 0px;" >
		<div class="imgcontainer"><img src="/assets/icon/logo_ttips.png"></div>
	</h1>

	<div id="body">

<?php if(isset($msg)) { ?>
<span style="color:red"><?php echo $msg ?></span>
<?php } ?>


	<form action="/login/login" method="POST" style="padding: 20px; display: block; width: 100%; text-align: left; ">

	  <div class="form-line">
	    <div class="form-label">Username</div>
	    <div class="form-field"><input type="text" placeholder="Enter Username" name="uname" required></div>
	  </div>

	  <div class="form-line">	  
	   	<div class="form-label">Password</div>
	    <div class="form-field"><input type="password" placeholder="Enter Password" name="psw" required>
	  </div>


	  <div class="form-line">
	    <div class="form-label">&nbsp;</div>
	    <div class="form-field"><input type="checkbox" checked="checked" name="remember"> Remember me</div>
	  </div>

	</div>

	<p class="footer" > 

	  <div class="form-line"> 
	    <div class="form-label">&nbsp;</div>
	    <div class="form-field"><button type="submit">Login</button></div>
	  </div>

	</p>
	</form>

</div>

</center>

<style>
body {
	margin: 70px 0px;
}

input, button{
	border-radius: 5px;
}

.form-line {
	style="width:100%; 
	display: block; 
	margin: 5px; 
}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4C50AF;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 40%;
  border-radius: 50%;
}

/* Add padding to containers */
.logincontainer {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}
</style>