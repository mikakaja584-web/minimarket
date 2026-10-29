<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimarket</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@auth
<script>
    window.Echo.private('user.{{ auth()->id() }}')
        .listen('.order.placed', (event) => {
            console.log('OrderPlaced diterima:', event);

            alert(
                'Transaksi baru #' + event.order_id +
                '\nTotal: Rp' + event.total +
                '\nNama: ' + event.user_name
            );
        });
</script>
@endauth
</body>
</html>