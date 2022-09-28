@extends ('welcome')


@section('content')
    <div class="ListOfCurrencies">
        <h1>
            List of currencies
        </h1>
        <p>
            Click on a currency to add it to your favourite currenices
        </p>

        <form action={{ route('favorite/add') }} method="get">
            @foreach ($currency as $value)
                <input type="submit" name="favorite" class="button" value="{{ $value }}" />
            @endforeach
        </form>
        @csrf
    </div>
@endsection
