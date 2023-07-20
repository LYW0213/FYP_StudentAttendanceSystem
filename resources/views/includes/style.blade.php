<link rel="stylesheet" href="{{ asset('Template/assets/css/main/app.css') }} ">
<link rel="shortcut icon" href="{{ asset('Template/assets/images/logo/favicon.png') }}" type="image/png">

<link rel="stylesheet" href="{{ asset('Template/assets/css/shared/iconly.css') }}">

{{-- database table --}}
<link rel="stylesheet" href="{{ asset('Template/assets/extensions/simple-datatables/style.css') }} ">
<link rel="stylesheet" href="{{ asset('Template/assets/css/pages/simple-datatables.css') }}">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">



<style>
    /* Sidebar background */
    .sidebar-wrapper {

        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
    }

    .custom-button {
        background-color: #7787a7;
        color: #ffffff;
    }

    .custom-button:hover {
        background-color: #7084aa;
        /* Same color as background */
        color: #ffffff;
        /* Same color as text */
    }

    .tbl-container {
        width: 400px;
        margin-top: 10px;
        margin-left: 10px;
    }

    .bg-blue {
        background-color: #5F618F;
        color: white;
    }

    .btn-primary.bg-blue:hover {
        background-color: white;
        color: black;
        border-color: #5F618F;
    }

    .card {
        border-radius: 35px;
        background-color: #9ba4b54c;
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .bg-white {
        background-color: white;
    }

    .bdr {
        border-radius: 6px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .text-bold-700 {
        font-weight: 700;
    }

    .badge.bg-success {
        font-size: 1em;
        padding: 0.2em 0.5em;
        border-radius: 0.3em;
    }

    .badge.bg-end {
        font-size: 1em;
        padding: 0.2em 0.5em;
        border-radius: 0.3em;
        background-color: #808080;
    }

    .badge.bg-absent {
        font-size: 1em;
        padding: 0.2em 0.5em;
        border-radius: 0.3em;
        background-color: #c60000;
    }

    .late {
        background-color: #808080;
        color: black;
    }

    .present {
        background-color: #00a917;
        color: black;
    }

    .absent {
        background-color: #c60000;
        color: black;
    }

    .custom-bg-color {
        background-color: #f2f2f2;
        /* Replace with your desired background color */
    }

    .custom-long-button {
        margin-top: 5px;
        width: 100%;
        /* Adjust the width as needed */
    }

    .search-margin-bottom {
        margin-bottom: 1%;
    }

    .margin-bottom {
        margin-bottom: 5%;
    }

    @media print {
        .badge {
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
        }

        .bg-blue {
            color: black !important;
        }

        .bg-success {
            background-color: #28a745 !important;
        }

        .bg-end {
            background-color: #dc3545 !important;
        }

        .bg-absent {
            background-color: #ffc107 !important;
        }
    }

    .t-name {
        color: rgb(183, 0, 0);
    }

    .login-clean {
        background: #f1f7fc;
        padding: 80px 0;
    }

    .login-clean form {
        max-width: 320px;
        width: 90%;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 4px;
        color: #505e6c;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
    }

    .login-clean .illustration {
        text-align: center;
        padding: 0 0 20px;
        font-size: 100px;
        color: rgb(244, 71, 107);
    }

    .login-clean form .form-control {
        background: #f7f9fc;
        border: none;
        border-bottom: 1px solid #dfe7f1;
        border-radius: 0;
        box-shadow: none;
        outline: none;
        color: inherit;
        text-indent: 8px;
        height: 42px;
    }

    .login-clean form .btn-primary {
        background: #f4476b;
        border: none;
        border-radius: 4px;
        padding: 11px;
        box-shadow: none;
        margin-top: 26px;
        text-shadow: none;
        outline: none !important;
    }

    .login-clean form .btn-primary:hover,
    .login-clean form .btn-primary:active {
        background: #eb3b60;
    }

    .login-clean form .btn-primary:active {
        transform: translateY(1px);
    }

    .login-clean form .forgot {
        display: block;
        text-align: center;
        font-size: 12px;
        color: #6f7a85;
        opacity: 0.9;
        text-decoration: none;
    }

    .login-clean form .forgot:hover,
    .login-clean form .forgot:active {
        opacity: 1;
        text-decoration: none;
    }
</style>
