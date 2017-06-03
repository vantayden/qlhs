<?php
$title = 'Đăng nhập';
include('../includes/user.php');
if($user->logged() && isset($_SESSION['user']) && isset($_GET['logout'])){
    unset($_SESSION['user']);
    $alert = '<div class="alert alert-success">'.config::logout_success.'</div>';
} else if($user->logged()){
    header('Location: quan-ly');
}
if(isset($_POST['user']) && isset($_POST['pass'])){
	$result = $user->login($_POST['user'], $_POST['pass']);
	if(!$result['error'])
		header('Location: quan-ly');
    $alert = (isset($result) && $result['error']) ? '<div class="alert alert-danger"><strong>'.config::error.'!</strong> '.$result['message'].'</div>' : '';
}
include('../includes/header.php');
?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?=config::login_title?></h3>
				</div>
				<div class="panel-body">
					<?=(isset($alert)) ? $alert : ''?>
					<form action="" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="<?=config::username?>" name="user" value="<?=(isset($_POST['username'])) ? $_POST['username'] : ''?>" type="text" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="<?=config::password?>" name="pass" type="password">
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<button class="btn btn-success btn-block"><?=config::login?></button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include('../includes/footer.php');
?>