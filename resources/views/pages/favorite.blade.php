@extends('welcome')

@section('content')
    <div class="favorites">
        <h1>
            Your favorite currencies are:
        </h1>
        <p>
            Click on a currency to remove it from your favorites
        </p>

        <form action={{ route('favorite/remove') }} method="post">

            @foreach ($favorite as $value)
                <input type="submit" name="favorite" class="button" value="{{ $value }}" />
            @endforeach
            @csrf
        </form>
    </div>
@endsection
