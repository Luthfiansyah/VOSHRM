<?php
$imagePath = theme_path("images/login");
?>
<style type="text/css">

    /*body {
        background-color: #FFFFFF;
        height: 100%;
    }

    img {
        border: none;
    }
    #btnLogin {
        padding: 0;
    }
    input:not([type="image"]) {
        background-color: transparent;
        border: none;
    }

    input:focus, select:focus, textarea:focus {
        background-color: transparent;
        border: none;
    }

    .textInputContainer {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        color: #666666;
    }*/

    /*#divLogin {*/
        /*background: transparent url(<?php echo "{$imagePath}/login.png"; ?>) no-repeat center top;*/
		/*margin:50px 0 0 -20px;
        height: 520px;
        width: 500px;
        border-style: hidden;*/
        /*margin: auto;*/
        /*padding-left: 10px;
		border: 1px solid #333333;
		height: 300px;
    }*/

    /*#divUsername {
        padding-top: 153px;
        padding-left: 50%;
    }

    #divPassword {
        padding-top: 35px;
        padding-left: 50%;
    }

    #txtUsername {
        width: 240px;
        border: 0px;
        background-color: transparent;
    }

    #txtPassword {
        width: 240px;
        border: 0px;
        background-color: transparent;
    }

    #txtUsername, #txtPassword {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        color: #666666;
        vertical-align: middle;
        padding-top:0;
    }

    #divLoginHelpLink {
        width: 270px;
        background-color: transparent;
        height: 20px;
        margin-top: 12px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 50%;
    }

    #divLoginButton {
        padding-top: 2px;
        padding-left: 49.3%;
        float: left;
        width: 350px;
    }

    #btnLogin {
        background: url(<?php echo "{$imagePath}/Login_button.png"; ?>) no-repeat;
        cursor:pointer;
        width: 94px;
        height: 26px;
        border: none;
        color:#FFFFFF;
        font-weight: bold;
        font-size: 13px;
    }

    #divLink {
        padding-left: 230px;
        padding-top: 105px;
        float: left;
    }

    #divLogo {
        padding-left: 30%;
        padding-top: 70px;
    }

    #spanMessage {
        background: transparent url(<?php echo "{$imagePath}/mark.png"; ?>) no-repeat;
        padding-left: 18px;
        padding-top: 0px;
        color: #DD7700;
        font-weight: bold;
    }

    #logInPanelHeading{
        position:absolute;
        padding-top:100px;
		padding-left:49.5%;
        font-family:sans-serif;
        font-size: 15px;
        color: #544B3C;
        font-weight: bold;
    }

    .form-hint {
    color: #878787;
    padding: 4px 8px;
    position: relative;
    left:-254px;
}*/
</style>

<style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /*still in the works :P*/
/*variables*/
/*general style*/
/*google font*/
	@import "http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700)";
	body {
	  	font: 13px/20px "Open Sans", Tahoma, Verdana, sans-serif;
	  	color: #a7a599;
	  	/*background: #efefef;*/
	  	/*background: #31302b;*/
	  	margin: 0;
		background: url(<?php echo "{$imagePath}/bg-login.jpg"; ?>) no-repeat center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		background-position:100% 100%;
	}

	/*Login form style*/
	/* === Logo === */
	.logo {
	  background-position: center;
	  height: 60px;
	  width: 140px;
	  margin: 100px auto 30px auto;
	}

	/* === Form === */
	/*.form {
	  width: 100%;
	  margin:30% 0 0 0;
	  height: 100%;
	}*/
	#content-right{
		float: left;
		width: 55%;
		height: 100%;
	}
	#logo-k{
		margin:0 0 0 5px;
	}

	#login-title{
		margin:70% 0 0 -20%;
		color: #FFFFFF;
		font-size: 4vw;
		font-weight: bold;
		line-height: 1em;
	}

	#content-left{
		float: left;
		width: 30%;
		height:100%;
		min-width: 320px;
		margin:0 0 0 0;
		position: relative;
		/*background-color: #000000;*/
	}
	#content-left #log {
		margin:80% 0 0 0;
	}

	#spanMessage {
		padding: 10px 0 0 0;
	}

	#header-login{
		/*background-color: #000000;*/
		background: url(<?php echo "{$imagePath}/bg-login-right.jpg"; ?>) no-repeat center fixed;
		height: 40px;
		font-size: 3vh;
		font-weight: bold;
		color: #FFFFFF;
		line-height: 40px;
		padding:2% 5% 2% 5%;
	}
	/* Active Small Screen */
	@media(max-width:768px) {
		#content-right   {
			display: none;
		}
		#content-left{
			width: 100%;
		}
		#content-left #log {
			margin:30% 0 0 0;
		}
        body {
           
            background:none;

        }
	}
	/* Active Wide Screen */
	@media(min-width:768px) {
		#content-left{
			left:6%;
		}
		#header-login{
			display: none;
		}
	}

	.form .field {
	  position: relative;
	  margin: 0 0 0 0px;
	  width: 100%;
	}

	.form .field i {
	  /*font-size: 18px;*/
	  font-size: 30px;
	  /*left: 0px;*/
	  left:-40px;
	  top: 10px;
	  position: absolute;
	  height: 44px;
	  width: 44px;
	  /*color: #f7f3eb;*/
	  color: #CCCCCC;
	  /*background: #C63A02;*/
	  text-align: center;
	  line-height: 44px;
	  transition: all 0.3s ease-out;
	  pointer-events: none;
	}

	/* === Login styles === */
	.login {
	  position:absolute;
	  /*margin: 18% 13em 0 3%;*/
	  margin: 18% 0 0 45%;
	  /*margin-left:35%;*/
	  right: 13em;
	  width: 30%;
	  max-width: 400px;
	  min-width: 250px;
	  /*max-width: 300px;*/
	  height: 315px;
	  /*background: white;*/
	  /*border-radius: 3px;*/
	  float:right;
	  /*text-align: left;*/
	}
	/*.login:before {
	  content: '';
	  position: relative;;
	  top: -8px;
	  right: -8px;
	  bottom: -8px;
	  left: -8px;
	  z-index: -1;
	  background: rgba(255, 255, 255, 0.1);
	  border-radius: 4px;
	}
	.login h1 {
	  line-height: 55px;
	  font-size: 24px;
	  font-weight: bold;
	  font-family: 'Open Sans', sans-serif;
	  text-transform: uppercase;
	  color: #fff;
	  text-align: center;
	  background: #1abc9c;
	  border-top-left-radius: 3px;
	  border-top-right-radius: 3px;
	}
	.login .submit {
	  text-align: center;
	}
	.login p:first-child {
	  margin-top: 30px;
	}
	.login p .remember {
	  float: left;
	}
	.login p .remember label {
	  color: #a7a599;
	  font-size: 12px;
	  cursor: pointer;
	}
	.login p .forgot {
	  float: right;
	  margin-right: 50px;
	}
	.login p .forgot a {
	  color: #a7a599;
	  font-size: 12px;
	  text-decoration: none;
	  font-style: italic;
	  transition: all 0.3s ease-out;
	}
	.login p .forgot a:hover {
	  color: #f2672e;
	}*/

	/*input style*/
	/* === Input Form === */
	::-webkit-input-placeholder {
	  color: #ded9cf;
	  font-family: 'Open Sans';
	}

	:-moz-placeholder {
	  color: #ded9cf !important;
	  font-family: 'Open Sans';
	}

	.form {
		margin:20px 20px 20px 50px;
		max-width: 400px;
		width: 72%;
	}

	.form input[type=text], input[type=password] {
	  font-family: 'Open Sans', Calibri, Arial, sans-serif;
	  /*margin-top: -5px;*/
	  /*margin-left:35%;*/
	  font-size: 20px;
	  font-weight: 400;
	  padding: 10px 15px 10px 10px;
	  position: relative;
	  width: 100%;
	  max-width: 350px;
	  height: 24px;
	  color: #676056;
	  border: none;
	  /* Update 03-03-2017*/
	  /*background: #f7f3eb;*/
	  border-bottom: 2px solid #CCCCCC;
	  color: #777;
	  transition: color 0.3s ease-out;
	}

	.form input[type=text] {
	  margin-bottom: 15px;
	}

	.form input[type=text]:hover ~ i,
	.form input[type=password]:hover ~ i {
	  color: #1abc9c;
	}

	.form input[type=text]:focus ~ i,
	.form input[type=password]:focus ~ i {
	  color: #1abc9c;
	}

	.form input[type=text]:focus,
	.form input[type=password]:focus,
	.form button[type=submit]:focus {
	  outline: none;
	}

	#btnLogin{
		float: right;
		margin-right: -25px;
	}

	.form input[type=submit] {
	  margin-top: 15px;
	  /*margin-left:35%;*/
	  float: right;
	  width: 100px;
	  text-align: center;
	  font-size: 20px;
	  font-family: 'Open Sans',sans-serif;
	  font-weight: bold;
	  padding: 8px 0;
	  letter-spacing: 0;
	  box-shadow: inset 0px 0px 0px 0px #1abc9c;
	  color: #fff;
	  background-color: #16a085;
	  text-shadow: none;
	  text-transform: uppercase;
	  border: none;
	  cursor: pointer;
	  position: relative;
	  margin-bottom: 20px;
	  -webkit-animation: shadowFadeOut 0.4s;
	  -moz-animation: shadowFadeOut 0.4s;
	}

	.form input[type=submit]:hover, input[type=submit]:focus {
	  color: #fff;
	  box-shadow: inset 0px 46px 0px 0px #1abc9c;
	  -webkit-animation: shadowFade 0.4s;
	  -moz-animation: shadowFade 0.4s;
	}

	/*keyframes for input animation*/
	@keyframes shadowFade {
	  0% {
	    box-shadow: inset 0px 0px 0px 0px #1abc9c;
	    color: #fff;
	  }
	  100% {
	    box-shadow: inset 0px 46px 0px 0px #1abc9c;
	    color: #fff;
	  }
	}
	@keyframes shadowFadeOut {
	  0% {
	    box-shadow: inset 0px 46px 0px 0px #1abc9c;
	    color: #fff;
	  }
	  100% {
	    box-shadow: inset 0px 0px 0px 0px #1abc9c;
	    color: #fff;
	  }
	}
	@-webkit-keyframes shadowFade {
	  0% {
	    box-shadow: inset 0px 0px 0px 0px #1abc9c;
	    color: #fff;
	  }
	  100% {
	    box-shadow: inset 0px 46px 0px 0px #1abc9c;
	    color: #fff;
	  }
	}
	@-webkit-keyframes shadowFadeOut {
	  0% {
	    box-shadow: inset 0px 46px 0px 0px #1abc9c;
	    color: #fff;
	  }
	  100% {
	    box-shadow: inset 0px 0px 0px 0px #1abc9c;
	    color: #fff;
	  }
	}
	@-moz-keyframes shadowFade {
	  0% {
	    box-shadow: inset 0px 0px 0px 0px #1abc9c;
	    color: #fff;
	  }
	  100% {
	    box-shadow: inset 0px 46px 0px 0px #1abc9c;
	    color: #fff;
	  }
	}
	@-moz-keyframes shadowFadeOut {
	  0% {
	    box-shadow: inset 0px 44px 0px 0px #1abc9c;
	    color: #fff;
	  }
	  100% {
	    box-shadow: inset 0px 0px 0px 0px #1abc9c;
	    color: #fff;
	  }
	}
	/*continued styling for input */
	.form input[type="checkbox"] {
	  display: none;
	}

	/*.form input[type="checkbox"] + label span {
	    display:inline-block;
	    width:16px;
	    height:16px;
	    margin: -2px 4px 0 50px;
	    vertical-align:middle;
	    background:url("../img/checkbox.png") left top no-repeat;
	    cursor:pointer;
	}
	.form input[type="checkbox"]:checked + label span {
	    background:url("../img/checkbox.png") -16px top no-repeat;
	}*/
	/* === Copyright === */
	.copyright {
	  margin-top: 30px;
	  text-align: center;
	}
	.copyright p, .copyright a {
	  color: #828078;
	  font-size: 12px;
	  text-decoration: none;
	  transition: color 0.3s ease-out;
	}
	.copyright p a:hover, .copyright a a:hover {
	  color: #f2672e;
	}

</style>

<!-- <div id="divLogin">
    <div id="divLogo">
        <img src="<?php echo "{$imagePath}/1.png"; ?>" height="60px" />
    </div>

    <form id="frmLogin" method="post" action="<?php echo url_for('auth/validateCredentials'); ?>">
        <input type="hidden" name="actionID"/>
        <input type="hidden" name="hdnUserTimeZoneOffset" id="hdnUserTimeZoneOffset" value="0" />
        <?php
            echo $form->renderHiddenFields(); // rendering csrf_token
        ?>
        <div id="logInPanelHeading"><?php echo __('LOGIN Panel'); ?></div>

        <div id="divUsername" class="textInputContainer">
            <?php echo $form['Username']->render(); ?>
          <span class="form-hint" ><?php echo __('Username'); ?></span>
        </div>
        <div id="divPassword" class="textInputContainer">
            <?php echo $form['Password']->render(); ?>
         <span class="form-hint" ><?php echo __('Password'); ?></span>
        </div>
        <div id="divLoginHelpLink"><?php
            include_component('core', 'ohrmPluginPannel', array(
                'location' => 'login-page-help-link',
            ));
            ?></div>
        <div id="divLoginButton">
            <input type="submit" name="Submit" class="button" id="btnLogin" value="<?php echo __('LOGIN'); ?>" />
            <?php if (!empty($message)) : ?>
            <span id="spanMessage"><?php echo __($message); ?></span>
            <?php endif; ?>
        </div>
    </form>

</div> -->
<div id="header-login"><h6>VOS HRMS</h6></div>
<div id="content-right">
	<p id="login-title">
	<!-- <img src="<?php echo "{$imagePath}/5.png"; ?>" id="logo-k" width="100px"><br> -->
		VOS<br>
		HUMAN<br>
		RESOURCE<br>
		MANAGEMENT
	</p>
</div>
<div id="content-left">
	<div id="log">
		<form id="" class="form" method="post" action="<?php echo url_for('auth/validateCredentials'); ?>">
			<input type="hidden" name="actionID"/>
			<input type="hidden" name="hdnUserTimeZoneOffset" id="hdnUserTimeZoneOffset" value="0" />
			<?php
				echo $form->renderHiddenFields(); // rendering csrf_token
			?>

		  <p class="field">
			  <?php echo $form['Username']->render(); ?>
			  <!-- <span class="form-hint" ><?php echo __('Username'); ?></span> -->
			<!-- <input type="text" name="login" placeholder="Username" required/> -->
			<i class="fa fa-user"></i>
		  </p>

		  <p class="field">
			<!-- <input type="password" name="password" placeholder="Password" required/> -->
			<?php echo $form['Password']->render(); ?>
		 <!-- <span class="form-hint" ><?php echo __('Password'); ?></span> -->
			<i class="fa fa-lock"></i>
		  </p>

		  <!-- <p class="submit"><input type="submit" name="sent" value="Login"></p> -->
			<div id="divLoginHelpLink"><?php
			include_component('core', 'ohrmPluginPannel', array(
				'location' => 'login-page-help-link',
			));
			?>
			</div>
			<p>
				<?php if (!empty($message)) : ?>
				<span id="spanMessage"><?php echo __($message); ?></span>
				<?php endif; ?>
			</p>
		  <p class="submit">
			<input type="submit" name="Submit" class="button" id="btnLogin" value="<?php echo __('LOGIN'); ?>" />
		  </p>

		</form>
	</div>
</div>


<!-- <div class="copyright"> -->
    <!-- <p>Copyright &copy; 2014. Created by <a href="http://febbygunawan.com" target="_blank">Febby Gunawan</a></p> -->
</body>

<!-- <div style="text-align: center">
    <?php include_component('core', 'ohrmPluginPannel', array(
                'location' => 'other-login-mechanisms',
            )); ?>
</div> -->

<!-- <?php include_partial('global/footer_copyright_social_links'); ?> -->

<script type="text/javascript">

	$("#sidemenu").hide();
    function calculateUserTimeZoneOffset() {
        var myDate = new Date();
        var offset = (-1) * myDate.getTimezoneOffset() / 60;
        return offset;
    }

    function addHint(inputObject, hintImageURL) {
        if (inputObject.val() == '') {
            inputObject.css('background', "url('" + hintImageURL + "') no-repeat 10px 3px");
        }
    }

    function removeHint() {
       $('.form-hint').css('display', 'none');
    }

    function showMessage(message) {
        if ($('#spanMessage').size() == 0) {
            $('<span id="spanMessage"></span>').insertAfter('#btnLogin');
        }

        $('#spanMessage').html(message);
    }

    function validateLogin() {
        var isEmptyPasswordAllowed = false;

        if ($('#txtUsername').val() == '') {
            showMessage('<?php echo __('Username cannot be empty'); ?>');
            return false;
        }

        if (!isEmptyPasswordAllowed) {
            if ($('#txtPassword').val() == '') {
                showMessage('<?php echo __('Password cannot be empty'); ?>');
                return false;
            }
        }

        return true;
    }

    $(document).ready(function() {
        /*Set a delay to compatible with chrome browser*/
        setTimeout(checkSavedUsernames,100);

        $('#txtUsername').focus(function() {
            removeHint();
        });

        $('#txtPassword').focus(function() {
             removeHint();
        });

        $('.form-hint').click(function(){
            removeHint();
            $('#txtUsername').focus();
        });

        $('#hdnUserTimeZoneOffset').val(calculateUserTimeZoneOffset().toString());

        $('#frmLogin').submit(validateLogin);

    });

    function checkSavedUsernames(){
        if ($('#txtUsername').val() != '') {
            removeHint();
        }
    }

    if (window.top.location.href != location.href) {
        window.top.location.href = location.href;
    }
</script>
