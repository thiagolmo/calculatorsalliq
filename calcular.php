
<?php
	require_once('calcular.php');
	$valor_sal     = $_POST['valor_sal'];
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Calculo Salário Líquido</title>
<link href="estilo_css.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
	<header>
		<nav class="wrapper">
			<ul>
				<li class="logo"><a href="index.html">CALCULATOR 1.0</a></li>
			</ul>
		</nav>
	</header>
	<section id="content-main" class="wrapper clear">

<?php
  	//DECLARAÇÃO DE VARIAVEIS
	$valor_sal_INSS = 0;
	$valor_IR = 0;
	$valor_INSS = 0;
	$salario_liquido = 0;


	//PRIMEIRO PASSO
	//CALCULO DO INSS
	
	
		//FAIXA A
	if($valor_sal<=1556.94){
		$valor_INSS = $valor_sal * 0.08;
		$valor_sal_INSS = $valor_sal - $valor_INSS;
		//FAIXA B
		}else if($valor_sal<=2594.92){
			$valor_INSS = $valor_sal * 0.09;
			$valor_sal_INSS = $valor_sal - $valor_INSS;
					//FAIXA C
		}else if($valor_sal>2594.93){
			//TETO
			if($valor_sal>=5189.82){
				$valor_sal_INSS=5189.82;}
				else {
					$valor_sal_INSS=$valor_sal;
				}

			$valor_INSS = $valor_sal_INSS * 0.11;
			$valor_sal_INSS = $valor_sal - $valor_INSS;
		}

	//SEGUNDO PASSO
	//CALCULO IMPOSTO DE RENDA
	
		
		//FAIXA A
		if ($valor_sal_INSS<=1903.98){
			$valor_IR = 0;
		//FAIXA B
			}else if ($valor_sal_INSS<=2826.65){
					$valor_IR = ($valor_sal_INSS * 0.075)-142.80;
		//FAIXA C
				}else if ($valor_sal_INSS<=3751.05){
						$valor_IR = ($valor_sal_INSS * 0.15)-354.80;
		//FAIXA D
					}else if($valor_sal_INSS<=4664.68){
						$valor_IR = ($valor_sal_INSS * 0.225)-636.13;
		//FAIXA E
					}else if ($valor_sal_INSS>4664.68){
						$valor_IR = ($valor_sal_INSS * 0.275)-869.36;
					}

	$salario_liquido = ($valor_sal - $valor_INSS) - $valor_IR;

	?>
		
		
		<div class="col-1-3 sidebar">
		<form action="calcular.php" method="post">
			<h3>Resultado</h3>
			<nav>
				<ul>
					<li> <?php echo '- Valor Salário: R$ ' .number_format($valor_sal,2); ?></li>
					<li> <?php echo '- Valor INSS: R$ ' .number_format($valor_INSS,2); ?></li>
					<li> <?php echo '- Valor IR: R$ ' .number_format($valor_IR,2); ?> </li>
					<li><h4></br><center><?php echo 'Valor Salário Liquído: R$ ' .number_format($salario_liquido,2); ?></h4></center>
					</br>
				</ul>
			</nav>
		</div>
	</section>
	<footer class="wrapper">
		<div class="col-1">
			<p>Copyright 2016 - THIAGO LUIZ M. OLIVEIRA ©</p>
		</div>
	</footer>
</body>
</html>
			