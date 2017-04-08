<link rel="icon" type="image/x-icon" href="<?php echo base_url()."assets/images/favicon.ico"?>">
<title>ArchiveWeb | Prijava</title>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-box-body">
			<center><img src="../assets/images/logo.png" alt="logo"/></center>
			<h1 style="text-align: center;">ArchiveWeb<small> - prijava</small></h1>
			<div>
				<p class="date-text">
					<?php
					$hrformat="<B>%A - %d.%m.%Y.</B>";
					setlocale(LC_ALL,'croatian');
					$res=strftime($hrformat);
					$vrijeme=iconv('ISO-8859-2', 'UTF-8', $res);
					echo $vrijeme;
					?>
				</p>
			</div>
			<?php if($this->session->flashdata("messagePr")){?>
				<div class="alert alert-info">
					<?php echo $this->session->flashdata("messagePr")?>
				</div>
				<?php } ?>
				<form action="<?php echo base_url().'user/auth_user'; ?>" method="post">
					<div class="form-group has-feedback">
						<input type="text" name="email" class="form-control" id="" placeholder="E-mail adresa">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="password" class="form-control" id="pwd" placeholder="Zaporka" >
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat btn-color">Prijavi se</button>
						</div>
					</div>
				</form>
			</div>
		</div>
</body>
