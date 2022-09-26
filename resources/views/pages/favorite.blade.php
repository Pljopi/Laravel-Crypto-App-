@extends('welcome')

@section('content')
    	<div
		class="favorites">
		<h1>
			Your favorite currencies are:
		</h1>
		<p>
			Click on a currency to remove it from your favorites
		</p>
		<form
			action={{ route ('favorite/remove') }} method="GET">

			@foreach ($favorite as $favorite)
				<input
					type="submit"
					name="favorite"
					class="button"
					onclick="<script>window.location.reload();</script>" value="{{ $favorite }}" />
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
