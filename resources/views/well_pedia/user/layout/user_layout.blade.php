<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $page_title }}</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" href="/assets/css/global_style/global_style.css">
    <!-- global stylesEnd -->

    <!-- Components -->
    <link rel="stylesheet" href="/assets/css/components/components.css">
    <!-- ComponentsEnd -->
    <!-- forms-->
    <link rel="stylesheet" href="/assets/css/forms/forms.css">
    <!-- forms End-->

    <!-- EXTRA -->
    <link rel="stylesheet" href="/assets/extra/customize.css">
    <link rel="stylesheet" href="/assets/extra/toastr.css">
    <script src="/assets/extra/jquery-3.6.0.js"></script>

    <style>
        #contact_section {
            background: var(--text-5b);
            color: var(--text-white);
            padding-top: 7.4rem;
            padding-bottom: 7.9rem;
        }

        @media (max-width: 1199px) {
            #contact_section {
            padding-top: 4rem;
                padding-bottom: 4rem;
            }
        }
    </style>
</head>

<body>

    @yield('content')

</body>

<script type="text/javascript" src="/assets/extra/toastr.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

</html>
