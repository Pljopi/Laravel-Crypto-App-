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

		<!--- do not remove or everything breaks -->
			@foreach ($favorite as $tag)
		<form action type="submit" name = favorite class = button value = "{{$tag}}" >
		</form>
	@endforeach
	<!-------------------------->
		<form
			action={{ route ('favorite/remove') }} method="post">

			@foreach ($favorite as $favorite)
				<input type="submit" name="favorite" class="button"	value="{{$favorite}}" />
			@endforeach
			@csrf
		</form>
	</div>

	<script>
		if (window.history.replaceState) {
window.history.replaceState(null, null, window.location.href);
}
	</script>

@endsection
