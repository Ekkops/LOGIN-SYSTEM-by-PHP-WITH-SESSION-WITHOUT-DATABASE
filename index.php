<?php 
session_start();
include "Application/class/UserInfo.php";
/*###########################################################################################################
	second step : create class to store the data which user enter 
#############################################################################################################*/	
/*################################################################################################################
	third step : when user press on submit button 
##############################################################################################################*/	
	if(isset($_POST['signUp']))
	{
		$user = new UserInfo();
		/*#########################################################################################################
			errors and validaition
		########################################################################################################*/	
		if (strlen($user->fullName) <= 5)
		{
			$nameShortError = "Full Name Must be Greater Than <b>5</b> letters";
		}
		if ($user->email == false )
		{
			$emailInvalidError = "please enter invaid email";
		}
		if (strlen($user->password) < 8)
		{
			$passwordShortError = "please enter 8 char at least ,any number or letters as you like ";
		}
		if ($user->password != $user->confirmPassword)
		{
			$confirmPasswordError = "THE CONFIRM PASSWORD IS NOT AS SAME THE PASSWORD ABOVE";
		}
		if (strlen($user->mobile) < 11 )
		{
			$mobileShortError ="mobile phone must have at least 11 number";
		}
		
		$imgTypesAllowed = array("png","PNG","JPEG","jpeg","JPG","jpg","GIF","gif");
		$imgTypes = explode(".",$user->imgName);
		$ext = end($imgTypes);
		
		if (!(in_array($ext,$imgTypesAllowed)))
		{
			$imgTypeError = "your file must be png or jpeg or jpg or gif";
		}
		if ($user->imgSize > 2000000)
		{
			$imgSizeError = "image size must be smaller than 4MG";		
		}
		if ($user->imgSize = 0)
		{
			$imgEmptyError = "YOU MUST UPLODE YOUR PHOTO";
		}
		/*#######################################################################################################
			five step : uplode user photo if no errors in photo type or size 
		######################################################################################################*/
		if (!isset($imgSizeError)&& !isset($imgTypeError)  && !isset($imgEmptyError))
		{
			move_uploaded_file($user->imgTmpName,"Application/userPhoto/".$user->fullName.".JPEG");
		}
		/*#######################################################################################################
			sex step : convert user to dashboard  page if no errors 
		######################################################################################################*/	
		if (!isset($nameShortError) && !isset($emailInvalidError) &&     !isset($passwordShortError) && !isset($mobileShortError) &&  !isset($imgSizeError)&& !isset($imgTypeError)  && !isset($imgEmptyError))
		{
			$user->sessionVaribles();
			header("location: Application/dashboard.php");
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
    <head>
       <!--#######################################################################################################
				meta tag 
		#######################################################################################################-->
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--#####################################################################################################
				title 
		#######################################################################################################-->
		 <title></title>
        <!--########################################################################################################
                css files
        ########################################################################################################-->
        <!-- main file -->
        <link rel="stylesheet" href="Design/css/style.css">
        <!-- fontawesome liberary -->
        <link rel="stylesheet" href="Design/css/font-awesome.min.css">
        
    </head>
<body>
<!--############################################################################################################
		FIRST STEP : CREATE HTML FORM 
############################################################################################################-->
	<div class="container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" 
	     enctype="multipart/form-data">
			<!--#######################################################################################
					full name 
			##########################################################################################-->
			<!--full name box -->
			<input type="text" name="fullName" placeholder="Full Name" 
				   value="<?php if(isset($user->fullName)){ echo $user->fullName;} ?>" />
			<!--full name error -->
			<div class="error">
				<?php
					if(isset($nameShortError))
					{
						echo $nameShortError;
					}
				?>
			</div>
			<div class="error">
				<?php
					if(isset($nameHuckerError))
					{
						echo $nameHuckerError;
					}
				?>
			</div>
			<!--#######################################################################################
					email
			##########################################################################################-->
			<!-- email box -->
			<input type="email" name="email"  placeholder="Email"
				    value="<?php if(isset($user->email)){ echo $user->email;} ?>" />
			<!-- email errors -->
			<div class="error">
				<?php
					if(isset($emailInvalidError))
					{
						echo $emailInvalidError;
					}
				?>
			</div>
			<!--#######################################################################################
					password 
			##########################################################################################-->
			<!--password box -->
			<input type="password" name="password"  placeholder="Password"
				    value="<?php if(isset($user->password)){ echo $user->password;} ?>" />
			<!--password errror -->
			<div class="error">
				<?php
					if(isset($passwordShortError))
					{
						echo $passwordShortError;
					}
				?>
			</div>
			
			<!--#######################################################################################
					confirm password 
			##########################################################################################-->
			<!--confirm password box -->
			<input type="password" name="confirmPassword"  placeholder="Confirm Password"
				    value="<?php if(isset($user->confirmPassword)){ echo $user->confirmPassword;} ?>" />
			<!--confirm password error -->
			<div class="error">
				<?php
					if(isset($confirmPasswordError))
					{
						echo $confirmPasswordError;
					}
				?>
			</div>
			<!--#######################################################################################
					mobile
			##########################################################################################-->
			<!--mobile box -->
			<input type="text" name="mobile"  placeholder="Mobile" 
				    value="<?php if(isset($user->mobile)){ echo $user->mobile;} ?>" />
			<!-- mobile error -->
			
			<div class="error">
				<?php
					if(isset($mobileShortError))
					{
						echo $mobileShortError;
					}
				?>
			</div>
			<!--#######################################################################################
					photos
			##########################################################################################-->
		    choose your photo :
			<!--photo uplode button -->
		    <input type="file" name="image"   />
			<!-- photo error -->
			<div class="error">
				<?php
					if(isset($imgEmptyError))
					{
						echo $imgEmptyError;
					}
				?>
			</div>
			<div class="error">
				<?php
					if(isset($imgSizeError))
					{
						echo $imgSizeError;
					}
				?>
			</div>
			<div class="error">
				<?php
					if(isset($imgTypeError))
					{
						echo $imgTypeError;
					}
				?>
			</div>
		
			<!--#######################################################################################
					submit 
			##########################################################################################-->
			<input type="submit"  name="signUp" value="sign up"/>
			
		</form>
	</div> 
    
    
    
    
    
    
    
<!--################################################################################################################
        javascript files 
#################################################################################################################-->
<!-- main file -->
<script src="Design/js/main.js"></script>
<!-- jquery ------------------------------------------------------------------------------------------------------>
<!-- jquery liberary --->     
<script src="Design/js/jquery/jquery-3.1.1.min.js"></script>
<!-- jquery file -->
<script src="Design/js/jquery/jquery-ana.js"></script>    

</body>    
</html>