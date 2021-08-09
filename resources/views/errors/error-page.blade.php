<head>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
        }
        .err {
            color: grey;
            font-family: 'Nunito Sans', sans-serif;
            font-size: 11rem;
            position: absolute;
            top: 8%;
        }

        .mainbox {
            margin: auto;
            height: 600px;
            width: 600px;
            position: relative;
        }

        .msg {
            text-align: center;
            font-family: 'Nunito Sans', sans-serif;
            font-size: 1.6rem;
            position: absolute;
            left: 16%;
            top: 45%;
            width: 100%;
        }

        a {
            text-decoration: none;
            color: grey;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>

<body>
    <div class="mainbox">
        <div class="err">404</div>
        <div class="msg">This page could not be found!
            <div class="msg">
                <p>Let's go <a href="{{ route('index') }}">home</a> and try from there.</p>
            </div>
        </div>
    </div>
