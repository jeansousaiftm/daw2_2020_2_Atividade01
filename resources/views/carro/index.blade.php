<!DOCTYPE html>
<html>
	<head>
		<title>CRUD Autoescola</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
	</head>
	<body>
		<div class="container">
			<h3>Cadastro</h3>
			<form class="row" method="POST" action="/carro">
				<div class="form-group col-4">
					<label for="marca">Marca:</label>
					<input type="text" name="marca" class="form-control" value="{{ $carro->marca }}" />
				</div>
				<div class="form-group col-4">
					<label for="modelo">Modelo:</label>
					<input type="text" name="modelo" class="form-control" value="{{ $carro->modelo }}" />
				</div>
				<div class="form-group col-4">
					<label for="placa">Placa:</label>
					<input type="text" name="placa" class="form-control" value="{{ $carro->placa }}" />
				</div>
				<div class="form-group col-4">
					<label for="cor">Cor:</label>
					<input type="text" name="cor" class="form-control" value="{{ $carro->cor }}" />
				</div>
				<div class="form-group col-4">
					<label for="ano">Ano:</label>
					<input type="number" name="ano" class="form-control" value="{{ $carro->ano }}" />
				</div>
				<div class="col-4">
					@csrf
					<input type="hidden" name="id" value="{{ $carro->id }}" />
					<button type="submit" class="btn btn-success bottom">Salvar</button>
					<a href="/carro" class="btn btn-primary bottom">Novo</a>
				</div>
			</form>
			<hr/>
			<h3>Listagem</h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Placa</th>
						<th>Cor</th>
						<th>Ano</th>
						<th>Edit</th>
						<th>Del</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($carros as $carro)
						<tr>
							<td>{{ $carro->marca }}</td>
							<td>{{ $carro->modelo }}</td>
							<td>{{ $carro->placa }}</td>
							<td>{{ $carro->cor }}</td>
							<td>{{ $carro->ano }}</td>
							<td>
								<a href="/carro/{{ $carro->id }}/edit" class="btn btn-warning">Editar</a>
							</td>
							<td>
								<form action="/carro/{{ $carro->id }}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="DELETE" />
									<button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?');">Excluir</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</body>
</html>