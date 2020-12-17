<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Install | iPatco CodeBase</title>
		<style type="text/css">
			body {
				font-size: 75%;
				font-family: Helvetica,Arial,sans-serif;
				width: 300px;
				margin: 0 auto;
			}
			input, label {
				display: block;
				font-size: 18px;
				margin: 0;
				padding: 10px;
				border-radius:10px;
			}
			label {
				margin-top: 5px;
			}
			input.input_text {
				width: 270px;
			}
			input#submit {
				margin: 25px auto 0;
				font-size: 25px;
			}
			fieldset {
				padding: 15px;
				border-radius:10px;
			}
			legend {
				font-size: 18px;
				font-weight: bold;
			}
			.error {
				background: #ffd1d1;
				border: 1px solid #ff5858;
				padding: 4px;
			}
			.errorText{
				color: red;
			}
		</style>
	</head>
	<body>
		<center><h1>Install Step 3</h1></center>
		<?php if(is_writable(FCPATH.'.env')){?>
			<?=isset($message)?'<p class="error">' . $message . '</p>':''?>
			<form id="install_form" method="post">
				<fieldset>
					<legend>Admin settings</legend>
					<label for="fname">First Name </label>
					<input type="text" id="fname" class="input_text" name="fname" value="<?=set_value('fname')?>" autocomplete="off" />
					<span class="errorText"><?=form_error('fname')?></span>
					<label for="lname">Last Name</label>
					<input type="text" id="lname" class="input_text" name="lname" value="<?=set_value('lname')?>" autocomplete="off" />
					<span class="errorText"><?=form_error('lname')?></span>
					<label for="email">Email</label>
					<input type="text" id="email" class="input_text" name="email" value="<?=set_value('email')?>" autocomplete="off" />
					<span class="errorText"><?=form_error('email')?></span>
					<label for="password">Password</label>
					<input type="text" id="password" class="input_text" name="password" value="<?=set_value('password')?>" autocomplete="off" />
					<span class="errorText"><?=form_error('password')?></span>
					<label for="phone">Phone</label>
					<input type="text" id="phone" class="input_text" name="phone" value="<?=set_value('phone')?>" autocomplete="off" />
					<span class="errorText"><?=form_error('phone')?></span>
					<input type="submit" value="Finish" id="submit" />
				</fieldset>
			</form>
		<?php } else { ?>
			<p class="error">Please make the environment file (.env) file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 .env</code></p>
		<?php } ?>
	</body>
</html>