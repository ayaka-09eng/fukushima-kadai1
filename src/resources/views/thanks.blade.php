<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>

<body>
    <div class="thanks-page">
        <div class="thanks-background-text">Thank you</div>
        <div class="thanks-content">
            <h1 class="thanks-message">お問い合わせありがとうございました</h1>
            <a class="thanks-home-button" href="{{ route('contact') }}">HOME</a>
        </div>
    </div>
</body>

</html>