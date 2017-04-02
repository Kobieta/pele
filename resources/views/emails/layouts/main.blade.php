<html>
    <head>
        <title>Epelemele</title>
        <link rel="stylesheet" type="text/css" href="/css/mail.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Alegreya:400,700|Roboto+Condensed:400,700|Roboto:400,700&subset=latin-ext');
            h1 {
                font-family: 'Alegreya', serif;
                font-weight: 700;
                line-height: 46px;
                font-size: 46px;
                margin: 0 0 43px 0;
            }
            h2 {
                font-family: 'Roboto Condensed', sans-serif;
                font-weight: normal;
                font-size: 21px;
                line-height: 23px;
                text-transform: uppercase;
                letter-spacing: 2px;
                margin: 0 0 23px 0;
            }
            p {
                font-family: 'Roboto', sans-serif;
                font-size: 15px;
                line-height: 23px;
                margin: 0 0 23px 0;
            }

            div.main {
                color: #535b63;
                padding: 50px 0;
                text-align: center;
            }

            a.main_button {
                display: block;
                padding: 20px 10px;
                max-width: 200px;
                margin: auto;
                font-size: 20px;
                font-weight: 700;
                background: #4183C4;
                letter-spacing: 7px;
                color: #FFF;
                text-decoration: none;
                border-radius: 20px;
            }

            .footer {
                text-align: center;
                font-size: 15px;
            }

            .footer p {
                margin-bottom: 5px;
            }
            
            p.quotation {
                text-align: right;
                font-style: italic;
            }

        </style>
    </head>
    <body>
        <div class="main">
            @yield('content')
            <div class="footer">
                <p>Epelemele</p>
                <p><a href="{{ route('listings.index') }}">{{ route('listings.index') }}</a></p>
            </div>
        </div>
    </body>
</html>
