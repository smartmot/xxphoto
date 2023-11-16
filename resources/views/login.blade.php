<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ "Login - ".config("app.name") }}</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
</head>
<body>
<div class="w-300 mg-0a bc-blk bdr-5 t_30 ps-r">
    <div class="pd-10 c-whi fm-anton fs-26">Login</div>
    <div class="bdb-whi"></div>
    <div class="pd-10 c-whi">
        <div class="pdr-5 pdl-5 pdb-10">
            <form action="#" method="post">
                <div class="fm-anton">Email</div>
                <div class="ds-f">
                    <input class="ol-n bd-n bc-whi wp-100 pdr-10 pdl-10 pdt-2 pdb-2 bdr-3 fs-16 fm-anton" type="email" placeholder="Email">
                </div>
                <div class="pdt-10 fm-anton">Password</div>
                <div class="ds-f">
                    <input class="ol-n bd-n bc-whi wp-100 pdr-10 pdl-10 pdt-2 pdb-2 bdr-3 fs-16 fm-anton" type="password" placeholder="Password">
                </div>
                <div class="pdt-10 pdb-5 rowc">
                    <div class="flx">
                        <a href="#" class="td-n c-whi fs-14 hc-red fm-anton">Reset password</a>
                    </div>
                    <div class="">
                        <button class="pdt-2 pdb-2 pdr-10 pdl-10 csr-p fm-anton fs-16 hbc-dred hc-whi ol-n bd-n bdr-2">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
