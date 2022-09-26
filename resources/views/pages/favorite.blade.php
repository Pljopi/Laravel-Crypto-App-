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
			action={{ route ('favorite/remove') }} method="get">

			@foreach ($favorite as $favorite)
				<input
					type="submit"
					name="favorite"
					class="button"
					onclick="submit" value="{{ $favorite }}" />
			@endforeach

		</form>

	</div>





@endsection
