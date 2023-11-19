<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config("app.name") }}</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/cropper.css") }}">
    <script src="{{ asset("js/cropper.js") }}" type="text/javascript"></script>
</head>
<body>
<div class="wp-100 h-50 bc-dred p-r">
    <div class="wp-100 h-50 bc-dred p-f t-0 r-0 lh-50">
        <div class="wp-100">
            <div class="pdr-15 pdl-15">
                <div class="c-whi fs-24">{{ config("app.name") }}</div>
            </div>
        </div>
    </div>
</div>

<?PHP

?>

<div class="w-320">
    <img class="wp-100" id="image" src="{{ asset("image/001.jpg") }}" alt="">
</div>

<script type="text/javascript">
    let cropper = new Cropper("image",{

    })
</script>

</body>
</html>
