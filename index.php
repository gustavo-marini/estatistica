<?php require_once __DIR__ . '/vendor/autoload.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<title>Estatística</title>
	<link rel="stylesheet" type="text/css" href="includes/css/plugins/jquery-ui/jquery-ui.min.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="includes/css/main.css">
	<meta name="application-path" content="<?= dirname($_SERVER["SCRIPT_FILENAME"]) ?>">
</head>
<body>
	<main class="main-content">
		<div class="content">
			<div class="title-wrapper">
				<h1>Trabalho Estatística</h1>
			</div>
			<div class="tabs-wrapper">
				<ul>
					<li>
						<a href="#tabs-1">Todas as frequências</a>
					</li>
					<li>
						<a href="#tabs-2">Frequências com quantidade</a>
					</li>
				</ul>
				<div class="frequency-wrapper" id="tabs-1">
					<div class="option-title">
						<span>Insira o valor de todas as frequências, separados por vírgula:</span>
					</div>
					<form id="form-frequencies" method="post" action="">
						<input type="hidden" name="frequency-option" value="all">
						<div class="form-group">
							<textarea class="form-control" rows="5" name="frequency-values">150, 151, 152, 153, 154, 155, 155, 155, 156, 156, 156, 157, 158, 158, 160, 160, 160, 160, 160, 161, 161, 161, 161, 162, 162, 163, 163, 164, 164, 164, 165, 166, 167, 168, 168, 169, 170, 170, 172, 173</textarea>
						</div>
						<button type="submit" class="btn btn-primary calculate">Calcular</button>
					</form>
				</div>
				<div class="frequency-wrapper" id="tabs-2">
					<div class="option-title">
						<span>Insira o valor da frequência e a quantidade de vezes que ela se repete:</span>
					</div>
					<form id="form-frequencies" method="post" action="">
						<input type="hidden" name="frequency-option" value="qty">
						<div class="form-group columns">
							<ul id="value-column" class="form-column">
								<span class="title">Valor</span>
								<?php for($i=0; $i<3; $i++) { ?>
									<li class="input">
										<input type="text" name="frequency_value">
									</li>
								<? } ?>
							</ul>
							<ul id="qty-column" class="form-column">
								<span class="title">Quantidade</span>
								<?php for($i=0; $i<3; $i++) { ?>
									<li class="input">
										<input type="text" name="frequency_qty">
										<i class="fa fa-times"></i>
									</li>
								<? } ?>
							</ul>
						</div>
						<button type="button" class="btn btn-secondary add-frequency">Adicionar frequência</button>
						<button type="submit" class="btn btn-primary calculate">Calcular</button>
					</form>
				</div>
			</div>
			<div class="results-wrapper">
				<h3 class="title">Resultados</h3>
				<div class="results-tabs">
					<ul>
						<li>
							<a href="#tabs-1">Tabela de distribuição de frequências</a>
						</li>
						<li>
							<a href="#tabs-2"> Medidas de tendência central</a>
						</li>
						<li>
							<a href="#tabs-3">Gráficos</a>
						</li>
					</ul>

					<div class="frequency-wrapper" id="tabs-1">
						<table class="table frequency-table">
							<thead>
								<tr>
									<th scope="col">Classe</th>
									<th scope="col">Frequência absoluta (Fi)</th>
									<th scope="col">Ponto médio (Xi)</th>
									<th scope="col">Frequência acumulada (Fac)</th>
									<th scope="col">Frequência relativa (Fi(%))</th>
									<th scope="col">Frequência acumulada relativa (FacR)</th>
								</tr>
							</thead>
							<tbody></tbody>
							<tfoot>
								<tr>
									<td align="center">Total</td>
									<td align="right"></td>
									<td align="center">-</td>
									<td align="center">-</td>
									<td align="right"></td>
									<td align="center">-</td>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="frequency-wrapper" id="tabs-2">
						<table class="table trend_measures">
							<tbody>
								<tr id="simple_arithmetical_average">
									<td align="center">Média aritmética simples</td>
									<td></td>
								</tr>
								<tr id="weighted_arithmetical_average">
									<td align="center">Média aritmética ponderada</td>
									<td></td>
								</tr>
								<tr id="geometric_average">
									<td align="center">Média geométrica</td>
									<td></td>
								</tr>
								<tr id="moda">
									<td align="center">Moda</td>
									<td></td>
								</tr>
								<tr id="median">
									<td align="center">Mediana</td>
									<td></td>
								</tr>
								<tr id="standard_deviation">
									<td align="center">Desvio padrão amostral</td>
									<td></td>
								</tr>
								<tr id="sample_variance">
									<td align="center">Variância amostral</td>
									<td></td>
								</tr>
								<tr id="population_standard_deviation">
									<td align="center">Desvio padrão populacional</td>
									<td></td>
								</tr>
								<tr id="population_variance">
									<td align="center">Variância populacional</td>
									<td></td>
								</tr>
								<tr id="sample_variance_coefficient">
									<td align="center">Coeficiente de variação amostral</td>
									<td></td>
								</tr>
							</tbody>			
						</table>
					</div>
					<div class="frequency-wrapper" id="tabs-3">
						<div class="graphs">
							<div class="graph-wrapper">
								<div id="histogram_graph"></div>
							</div>
							<div class="graph-wrapper">
								<div id="frequency_polygon_graph"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
	<script src="includes/js/jquery.min.js"></script>
	<script src="includes/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
	<script src="https://www.google.com/jsapi" type="text/javascript"></script>
	<script src="https://www.gstatic.com/charts/loader.js" type="text/javascript"></script>
	<script src="includes/js/Statistic.class.js"></script>
	<script src="includes/js/script.js" type="text/javascript"></script>
</html>