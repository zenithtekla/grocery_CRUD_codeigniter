<?php
    session_start();
	$_SESSION['is_auth'] = false;
	echo $_SESSION['is_auth'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>LOGIN</title>
    <link href="<?php echo base_url();?>assets/__css/typeahead.css" rel="stylesheet">

    <?php
    foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    
    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>
    
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

</head>
<body>
    <div class="container col-md-12">
    <!--<form action="../controller/front_post.php" method="post">-->
        <div class="padding input-group input-group-md pull-left col-md-3 col-md-offset-3">
            <span class="input-group-addon" id="basic-addon1">Username</span>
            <input type="text" name="username" class="form-control" required placeholder="Username" aria-describedby="basic-addon1">
        </div>
        <div class="padding input-group input-group-md pull-left col-md-3">
            <span class="input-group-addon" id="basic-addon2">Password</span>
            <input type="password" id="password" name="password" class="form-control" required placeholder="Password" aria-describedby="basic-addon2">
        </div>
        <div class="padding pull-left col-md-3">
        <button type="button" id="login" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-log-in"></span>
			  Login</button>
		</div>
    <!--</form>-->
    </div>
</body>
</html>

