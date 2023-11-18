<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - {{ config("app.name") }}</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/app.css") }}">
    <script src="{{ asset("assets/js/app.js") }}"></script>
</head>
<body class="bc-drk">
<div class="wp-100 h-40 lh-40 ps-f bc-blk c-whi t-0 l-0">
    <div class="cw h-40 lh-40 fm-df fs-24 fw-b">
        Admin
    </div>
</div>
<div class="h-40 wp-100 bc-blk"></div>
<?php
$tabs = [
    "Upload",
    "Photo",
    "Tags",
    "Users",
    "Settings",
];
$ctab = request()->route()->parameters["tab"];
?>
<div class="cw" style="height: calc(100% - 40px)">
    <div class="rowc hp-100">
        <div class="xl-2 bc-lgra">
            @foreach($tabs as $t)
                <div><a href="{{ route("tab", mb_strtolower($t)) }}" class="td-n c-blk hc-whi fw-b fm-df pdr-10 pdl-10 pdt-5 pdb-5 ds-b hbc-dred <?php echo $ctab ==  mb_strtolower($t) ? ' bc-dred c-whi' : ''; ?>">{{ $t }}</a></div>
            @endforeach
        </div>
        <div class="xl-10 bc-whi">
            <div class="pd-10 fm-df">
                @yield("content")
            </div>
        </div>
    </div>
</div>
</body>
</html>
