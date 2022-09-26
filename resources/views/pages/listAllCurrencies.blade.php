@extends ('welcome')


@section ('content')
<div class="ListOfCurrencies">
	<h1>
		List of currencies
	</h1>
	<p>
		Click on a currency to add it to your favourite currenices
	</p>

	<form action={{ route ('favorite/add') }} method="get">

		@foreach ($currency as $currency)
		<input type="submit" name="currency" class="button" value="{{$currency}}" />
		@endforeach
	</form>
	@csrf
</div>
<script>
	if (window.history.replaceState) {
		window.history.replaceState(null, null, window.location.href);
	}
</script>
@endsection