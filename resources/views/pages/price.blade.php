@extends ('welcome')


@section('content')
    <div class="content">
        <h1>
            Spot price of
            {{ $cryptoCurrency }}
            is
            {{ $price }}
            {{ $currency }}
        </h1>
        <h2>

            {{ date('d-m-Y') }}
            <br>
            {{ date('H:i:s') }}
        </h2>
    </div>
@endsection
