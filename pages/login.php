<?php
$title = 'Đăng nhập';
include('../includes/user.php');
	var_dump($_POST);
if($user->logged())
	header('Location: quan-ly');
if(isset($_POST['user']) && isset($_POST['pass'])){
	$result = $user->login($_POST['user'], $_POST['pass']);
	if(!$result->error)
		header('Location: quan-ly');
}
$alert = (isset($result) && $result['error']) ? '<div class="alert alert-danger"><strong>'.config::error.'!</strong> '.$result['message'].'</div>' : '';
include('../includes/header.php');
?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Đăng nhập hệ thống</h3>
				</div>
				<div class="panel-body">
					<?=$alert?>
					<form action="" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Tài khoản" name="user" type="text" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="pass" type="password">
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<button type="submit" class="btn btn-success btn-block">Đăng nhập</button>
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