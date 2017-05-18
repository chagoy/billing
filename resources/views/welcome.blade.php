<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <script>
            var Laracasts = {
                csrfToken: "{{ csrf_token() }}",
                stripeKey: "{{ config('services.stripe.key') }}"
            };
        </script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">

            <checkout-form :plans="{{ $plans }}"></checkout-form>        
    
        </div>
    
        <script src="https://checkout.stripe.com/checkout.js"></script>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
