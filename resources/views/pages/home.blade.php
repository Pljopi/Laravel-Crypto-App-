@extends ('welcome')


@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

    <p>
        Select a currency pair to see the current price.
    </p>

    <form action={{ route('price') }}>
        <div>
            <label for="CriptoCurrency">
                Choose a cripto currency:
            </label>
            <select id="currency" name="cryptoCurrency">

                @foreach ($currency as $value)
                    <option value={{ $value }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>

            <label for="id-of-input" class="custom-checkbox2">
                <input type="checkbox" id="id-of-input" />
                <i class="glyphicon glyphicon-star-empty"></i>
                <i class="glyphicon glyphicon-star"></i>
                <span>
                    Add as favorite
                </span>
            </label>
        </div>

        <div>
            <label for="Currency">
                Choose a currency:
            </label>
            <select id="currency" name="currency">

                @foreach ($currency as $value)
                    <option value={{ $value }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>

            <label for="id-of-input2" class="custom-checkbox">
                <input type="checkbox" id="id-of-input2" />
                <i class="glyphicon glyphicon-star-empty"></i>
                <i class="glyphicon glyphicon-star"></i>
                <span>
                    Add as favorite
                </span>
            </label>
        </div>
        <input type="submit" value="Show price">

    </form>
@endsection
