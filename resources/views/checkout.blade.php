<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Realizar pago</h1>

    <form action="{{ route('checkout') }}" method="post">
        @csrf
        <script
            src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"
            data-preference-id="{{ $preference->id }}">
        </script>
    </form>

    <script src="https://www.mercadopago.com/v2/security.js" view=""></script>
</body>
</html>