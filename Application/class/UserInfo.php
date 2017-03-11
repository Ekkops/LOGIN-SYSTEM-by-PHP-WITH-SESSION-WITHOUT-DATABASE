<?php 
	class UserInfo
	{
		public $fullName;
		public $email;
		public $password;
		public $confirmPassword;
		public $mobile;
		public $imgName;
		public $imgType;
		public $imgSize;
		public $imgTmpName;
		public $imgError;
		
		public function __construct()
		{
			$this->fullName = filter_var($_POST['fullName'],FILTER_SANITIZE_STRING) ;
			$this->email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
			$this->password = htmlspecialchars($_POST['password']);
			$this->confirmPassword =htmlspecialchars($_POST['confirmPassword']);
			$this->mobile = filter_var($_POST['mobile'],FILTER_SANITIZE_NUMBER_INT);
			$this->imgName = filter_var($_FILES['image']['name'],FILTER_SANITIZE_STRING);
			$this->imgType = $_FILES['image']['type'];
			$this->imgSize = $_FILES['image']['size'];
			$this->imgTmpName = $_FILES['image']['tmp_name'];
			$this->imgError = $_FILES['image']['error'];
		}
		public function sessionVaribles()
		{
			$_SESSION['fullName'] = $this->fullName;
			$_SESSION['email'] = $this->email ;
			$_SESSION['password'] = $this->password;
			$_SESSION['confirmPassword'] = $this->confirmPassword;
			$_SESSION['mobile'] = $this->mobile;
			$_SESSION['imgName'] = $this->imgName;
			$_SESSION['imgType'] = $this->imgType;
			$_SESSION['imgSize'] = $this->imgSize;
			$_SESSION['imgTmpName'] = $this->imgTmpName;
		}
	}