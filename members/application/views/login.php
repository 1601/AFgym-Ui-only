<html>
	<head>
		<title> <?php echo $title;?></title>
				<style>
					*{
						font-family:Arial;
					  }
					body{
						background-color: #C7C7C7;
						}
					#login {
						background-color: #EDEDED;
						box-shadow: 0 2px 6px #959595;
						height: 266px;
						margin: 10px auto;
						padding: 15px;
						width: 370px;
						}			
					h1 {				
						color: #202020;				
						font-size: 30px;				
						font-weight: bold;				
						margin: 75px 0 0;				
						text-align: center;				
						text-shadow: 2px 2.5px 2px #6A6A6A;			
					}			
					span {				
						font-size: 78px;				
						letter-spacing: 10px;				
						line-height: 0.8;			
					}
					.login-logo {
						    width: 399px;
						    display: block;
						    margin-left: auto;
						    margin-right: auto;
						    margin-top: 100px;
						}
						.login-logo img {
						    width: 100%;
						    height: auto;
						}			
					#login input[type="text"], #login input[type="password"] {				
						border: 1px solid #000000;				
						display: block;				
						margin: 10px auto;				
						padding: 10px;				
						width: 300px;				
						box-shadow: 2px 2px 2px #999;			
					}			
					#login input[type="text"]:focus, #login input[type="password"]:focus{				
						background-color: #E6E6E6;			
					}			
					#login input[type="submit"] {				
						background-color: #9A9A9A;				
						border: 1px solid #000000;				
						color: #000000;				
						display: block;				
						font-size: 14px;				
						margin: 10px auto;				
						padding: 8px;				
						width: 300px;				
						box-shadow: 2px 2px 2px #999;				
						cursor: pointer;				
					}				
					form a p{					
						text-align:center;					
						font-size: 11px;				
					}				
					#prompt {					
						font-size: 15px;					
						text-align: center;				
					}				
					.error{					
						color: #970000;					
						text-align: center;					
						font-size: 12px;				
					}		
				</style>		
			</head>		
			<body>			
				<div class="login-logo">
					<img src="<?php echo base_url(); ?>Images/adrenaline.jpg" alt="logo">
				</div>
				<div id = "login">				
					<p id = "prompt">Log in to continue to website.</p>			
					<?php					
					echo "<p class= 'error'>" . $error . "</p>";
					echo form_open('login/validate_credentials');				
					echo form_input('username', set_value('username'), "placeholder='Username' autofocus");					
					echo form_password('password', set_value('password'), "placeholder='Password' autofocus");						
					echo form_submit('submit', 'Login');					
					echo anchor('#', '<p>Forgot  Password</p>');					
					echo form_close();			
					?>			
				</div>		
			</body>
			
</html>