<html>
	<head>
		<title>Sistema de Gestao de Vendas</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico" type="image/x-icon">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('css/style.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('css/normalize.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('css/font-awesome.min.css');?>" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    	<link href="https://fonts.googleapis.com/css?family=Anton|Russo+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="<?php echo base_url('js/jquery.maskedinput.min.js');?>"></script>
        <script src="<?php echo base_url('js/jquery.maskMoney.js');?>"></script>
        <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('js/main.js');?>"></script>
        <script src="<?php echo base_url('js/jquery-ui.min.js');?>"></script>
	</head>
	<body style="background-image:url('<?php echo base_url('img/back.jpg');?>'); background-repeat: no-repeat;background-size: cover;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 main">
					<div class="row">
						<div class="col-lg-11 header"><span></span> <span style="font-style:italic;font-size:13px"></span></div>
						<div class="col-lg-1 header">Versao 1.0.0</div>
						<div class="row">
							<div class="col-lg-12 top">
								<div id="gestao" style="margin-top:-30;color:#efb310;margin-bottom:10px;margin-left:-10px;display:none;font-size:130px">SELLCONTROL<span style="font-size:30px">®</span></div>

								<div class="row">
									<div class="col-lg-4">
																		
									</div>
									<div class="col-lg-4">
									<?php if(isset($_GET['hash']))
											{
												$hash_pass = $_GET['hash'];
												$email     = base64_decode($hash_pass);

												$result = $this->db->query("SELECT * from tb_hash where hash = '$hash_pass' and data_hash > NOW() ")->row();

												if($result)
												{
													$this->db->query("DELETE from tb_hash where hash = '$hash'");
												

											

											?>
										<div class="box-login" style="width:270px;height:270px;margin-left:75px;padding:30px;padding-top:60px;background:#f7f7f7;margin-bottom:50px">
											<form id="form_nova_senha" method="post">
											
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1">
												  	<i class="fa fa-key" aria-hidden="true"></i>
												  </span>
												  <input type="text"  id="new_senha" name="nem_senha" class="form-control" placeholder="Informe nova senha" required aria-describedby="basic-addon1">
												</div>
												<br>
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1">
												  	<i class="fa fa-key" aria-hidden="true"></i>
												  </span>
												  <input type="text"  id="confirm_senha" name="confirm_senha" class="form-control" placeholder="Confirme nova senha" required aria-describedby="basic-addon1">
												</div>
												<input type="hidden" name="email" value="<?php echo $email; ?>" />
												<br/>
												<button type="submit" class="btn btn-primary" id="bt_rescue">Cadastrar</button>
												<br><br>
												<br/>
												<span id="msg_erro"
												style="text-align:center;font-family:arial;margin-top:0px;margin-left:85px;font-size:15px"><a href="<?php echo site_url()?>">voltar</a></span>
											</form>
										</div>
										<?php 
													}
												}
												else{
													echo "<div class='box-login' style='width:270px;height:270px;margin-left:75px;padding:50px;padding-top:110px;background:#f7f7f7;margin-bottom:50px;font-family:arial;color:red;text-align:center'>Desculpe! link expirado.<br><br><a href='".site_url('login')."'>voltar</a></div><br><br>";


												}
										?>
										<div style="margin-top:-250px;margin-left:-40;color:white;font-size:12px;font-family:arial"><img src="<?php echo base_url('img/logofs.png');?>" width=38 height=38><br/><br/>Todos os Direitos Reservados - FS System</div>
									</div>
									<div class="col-lg-4"></div>
									<div id="msg_error" style="display:none">
									  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Enviamos um link nesse email para cadastro de nova senha.</p>
									</div><!-- end basic modal -->
									<div id="msg_error2" style="display:none">
									  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Email não encontrado em nosso sistema.</p>
									</div><!-- end basic modal -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		$(function(){
			
			$('#gestao').fadeIn('slow');
			

			$('#form_rescue').submit(function(){
				var email = $('#email_rescue').serialize();
				$.post('<?php echo site_url()?>login/rescueSenha', email)
				.done(function(data){
					if(data)
					{
						$('#msg_error').dialog({
							modal:true,
							resizable:false,
							width:450
						});
						return false;
					}

					$('#msg_error2').dialog({
							modal:true,
							resizable:false,
							width:450
						});
					
				});

				setTimeout(function(){location.reload()}, 2500);
				return false;
			});

		});
	</script>>
</html>