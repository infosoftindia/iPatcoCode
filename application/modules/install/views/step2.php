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
		<center><h1>Install Step 2</h1></center>
		<?php if(is_writable(FCPATH.'.env')){?>
			<?=isset($message)?'<p class="error">' . $message . '</p>':''?>
			<form id="install_form" method="post">
				<fieldset>
					<legend>Website settings</legend>
					<label for="title">Site Title </label>
					<input type="text" id="title" class="input_text" name="title" value="<?=getenv('title')?>" autocomplete="off" />
					<span class="errorText"><?=form_error('title')?></span>
					<label for="tag">Tagline</label>
					<input type="text" id="tag" class="input_text" name="tag" value="<?=getenv('tag')?>" autocomplete="off" />
					<span class="errorText"><?=form_error('tag')?></span>
					<input type="submit" value="Continue" id="submit" />
				</fieldset>
			</form>
		<?php } else { ?>
			<p class="error">Please make the environment file (.env) file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 .env</code></p>
		<?php } ?>
	</body>
</html>