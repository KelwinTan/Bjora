<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bjora Documentation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900" rel="stylesheet">
    {{--    <link rel="stylesheet" href="scribbler-global.css">--}}
    {{--    <link rel="stylesheet" href="scribbler-doc.css">--}}
    <style>
        /* css variables*/
        :root {
            --primary-color: #432E30;
            --primary-color-light: #8E7474;
            --accent-color: #FE6A6B;
            --accent-color-light: #FFE4E4;
            --accent-color-dark: #B94B4C;
            --white-color: #FAFBFC;
            --light-gray-color: #C6CBD1;
            --medium-gray-color: #959DA5;
            --dark-gray-color: #444D56;
            --bg-color: #F8F8FA;
            --code-bg-color: #F0E8E8;
        }

        /* normalized */
        html, body {
            padding: 0;
            margin: 0;
            font-family: 'Nunito Sans', sans-serif;
            background-color: white;
        }

        p {
            font-weight: 300;
            color: #4A4A4A;
        }

        a, a:hover {
            text-decoration: none;
            color: var(--primary-color);
        }

        hr {
            padding: 1rem 0;
            border: 0;
            border-bottom: 1px solid var(--bg-color);
        }

        * {
            box-sizing: border-box;
        }

        /* global components */

        /* typography */
        .section__title {
            color: var(--primary-color);
        }

        /* tabs */
        .tab__container {
            position: relative;
        }

        .tab__container > ul {
            position: absolute;
            list-style: none;
            margin: 0;
            right: 1rem;
            top: -2rem;
            padding-left: 0;
        }

        .tab__container .code {
            white-space: normal;
            padding: 1rem 1.5rem;
        }

        .tab {
            display: inline-block;
            padding: 0.3rem 0.5rem;
            font-weight: 200;
            cursor: pointer;
        }

        .tab.active {
            border-bottom: 1px solid var(--primary-color);
            font-weight: 700;
            display: inline-block;
        }

        .tab__pane {
            display: none;
        }

        .tab__pane.active {
            display: block;
        }

        /* code */
        .code {
            border-radius: 3px;
            font-family: Space Mono, SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;
            background: var(--bg-color);
            border: 1px solid var(--code-bg-color);
            color: var(--primary-color-light);
        }

        .code--block {
            white-space: pre-line;
            padding: 0 1.5rem;
        }

        .code--inline {
            padding: 3px 6px;
            font-size: 80%;
        }

        /* buttons */
        .button--primary {
            padding: 10px 22px;
            background-color: var(--accent-color);
            color: white;
            position: relative;
            text-decoration: none;
            border: 0;
            transition: all .3s ease-out;
        }

        .button--primary:after {
            position: absolute;
            content: "";
            width: 1rem;
            height: 1rem;
            background-color: var(--accent-color-light);
            right: -0.4rem;
            top: -0.4rem;
            transition: all 0.3s ease-out;
        }

        .button--primary:hover {
            text-shadow: 0px 1px 1px var(--accent-color-dark);
            color: white;
            transform: translate3D(0, -3px, 0);
        }

        .button--primary:hover::after {
            transform: rotate(90deg);
        }

        .button--secondary {
            padding: 10px 22px;
            border: 2px solid var(--primary-color);
            transition: all 0.5s ease-out;
        }

        .button--secondary:hover {
            border-color: var(--accent-color);
            color: var(--accent-color);
        }

        /* links */
        .link {
            text-decoration: none;
            transition: all 0.3s ease-out;
        }

        .link:hover {
            color: var(--accent-color);
        }

        .link--dark {
            color: var(--primary-color);
        }

        .link--light {
            color: var(--accent-color);
        }

        /* menu */
        nav {
            display: grid;
            grid-template-columns: 70px auto;
        }

        .menu {
            margin: 0;
            text-align: right;
            overflow: hidden;
            list-style: none;
        }

        .toggle {
            display: none;
            position: relative;
        }

        .toggle span,
        .toggle span:before,
        .toggle span:after {
            content: '';
            position: absolute;
            height: 2px;
            width: 18px;
            border-radius: 2px;
            background: var(--primary-color);
            display: block;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            right: 0;
        }

        .toggle span:before {
            top: -6px;
        }

        .toggle span:after {
            bottom: -6px;
        }

        .toggle.open span {
            background-color: transparent;
        }

        .toggle.open span:before,
        .toggle.open span:after {
            top: 0;
        }

        .toggle.open span:before {
            transform: rotate(45deg);
        }

        .toggle.open span:after {
            transform: rotate(-45deg);
        }

        .menu__item {
            padding: 1rem;
            display: inline-block;
        }

        .menu__item.toggle {
            display: none;
        }

        /* table */
        table {
            border-collapse: collapse;
            width: 100%;
            transition: color .3s ease-out;
            margin-bottom: 2rem;
        }

        table td, table th {
            border: 1px solid var(--code-bg-color);
            padding: 0.8rem;
            font-weight: 300;
        }

        table th {
            text-align: left;
            background-color: white;
            border-color: white;
            border-bottom-color: var(--code-bg-color);
        }

        table td:first-child {
            background-color: var(--bg-color);
            font-weight: 600;
        }

        @media screen and (max-width: 600px) {
            nav {
                grid-template-columns: 70px auto;
            }

            .menu__item {
                display: none;
            }

            .menu__item.toggle {
                display: inline-block;
            }

            .menu {
                text-align: right;
                padding: 0.5rem 1rem;
            }

            .toggle {
                display: block;
            }

            .menu.responsive .menu__item:not(:first-child) {
                display: block;
                padding: 0 0 0.5rem 0;
            }
        }

        /* layout */
        .wrapper {
            margin: 0 auto;
            width: 65%;
        }

        .footer {
            text-align: center;
            background-color: var(--primary-color);
            padding: 2rem;
            color: white;
        }

        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translate3d(0, 30px, 0);
            }
            100% {
                transform: translate3d(0, 0, 0);
            }
        }

        html, body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* layout */
        .header {
            border-bottom: 1px solid var(--code-bg-color);
            grid-template-columns: 1fr 150px 60% 1fr;
        }

        .wrapper {
            display: flex;
            flex-grow: 1;
        }

        /* logo */
        .logo {
            font-weight: 900;
            color: var(--primary-color);
            font-size: 1.4em;
            grid-column: 2;
        }

        .logo__thin {
            font-weight: 300;
        }

        /* menu */
        .menu {
            grid-template-columns: 1fr 180px 60% 1fr;
        }

        .menu__item {
            padding: 1.5rem 1rem;
        }

        /* doc */
        .doc__bg {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 28%;
            background-color: var(--bg-color);
            z-index: -1;
        }

        .doc__nav {
            flex-basis: 20%;
            font-weight: 200;
        }

        .doc__nav ul {
            list-style: none;
            padding-left: 0;
            line-height: 1.8;
        }

        .doc__nav ul.fixed {
            position: fixed;
            top: 2rem;
        }

        .doc__nav li:hover {
            color: var(--primary-color-light);
            cursor: pointer;
            transition: color .3s ease-in-out;
        }

        .doc__nav .selected {
            color: var(--accent-color);
            position: relative;
        }

        .doc__nav .selected:after {
            position: absolute;
            content: "";
            width: 1rem;
            height: 1rem;
            background-color: var(--accent-color);
            left: -1.5rem;
            top: 0.3rem;
        }

        .doc__content {
            flex-basis: 80%;
            padding: 0 0 5rem 1rem;
        }

        @media (max-width: 750px) {
            .wrapper {
                flex-direction: column;
            }

            .doc__content {
                padding-left: 0;
            }

            .doc__nav ul {
                border-bottom: 1px solid var(--code-bg-color);
                padding-bottom: 0.5rem;
            }

            .doc__nav ul.fixed {
                /* nutralized the fixed menu for mobile*/
                position: relative;
                top: 0;
            }

            .doc__nav li {
                display: inline-block;
                padding-right: 1rem;
            }

            .doc__nav .selected:after {
                display: none;
            }
        }

    </style>

</head>
<body>
<div class="doc__bg"></div>
<nav class="header">
    <h1 class="logo">Bjora <span class="logo__thin">Doc</span></h1>
    <ul class="menu">
        <div class="menu__item toggle"><span></span></div>
        <li class="menu__item"><a href="https://github.com/KelwinTan" class="link link--dark"><i
                        class="fa fa-github"></i> Github</a></li>
        <li class="menu__item"><a href="/home" class="link link--dark"><i class="fa fa-home"></i> Home</a></li>
    </ul>
</nav>
<div class="wrapper">
    {{--    <aside class="doc__nav">--}}
    {{--        <ul>--}}
    {{--            <li class="js-btn selected">Get Started</li>--}}
    {{--            <li class="js-btn">Configuration</li>--}}
    {{--            <li class="js-btn">Keybindings</li>--}}
    {{--            <li class="js-btn">Issues</li>--}}
    {{--        </ul>--}}
    {{--    </aside>--}}
    <article class="doc__content">
        <section class="js-section">
            <h3 class="section__title">Global</h3>
            <table id="customers">
                <tr>
                    <td>Home</td>
                    <td><a href="/home">/home</a></td>
                </tr>
{{--                <tr>--}}
{{--                    <td>Register</td>--}}
{{--                    <td><a href="/register">/register</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>prettyTable</td>--}}
{{--                    <td>Render table with Scribbler’s pretty table style.</td>--}}
{{--                </tr>--}}
            </table>
        </section>


        <section class="js-section">
            <h3 class="section__title">Guest</h3>
            <table id="customers">
                <tr>
                    <td>Login</td>
                    <td><a href="/login">/login</a></td>
                </tr>
                <tr>
                    <td>Register</td>
                    <td><a href="/register">/register</a></td>
                </tr>
                <tr>
                    <td>prettyTable</td>
                    <td>Render table with Scribbler’s pretty table style.</td>
                </tr>
            </table>
        </section>
        <section class="js-section">
            <h3 class="section__title">Admin</h3>
            <table id="customers">
                <tr>
                    <td>highlighting</td>
                    <td>Show syntax highlight on markdown text.</td>
                </tr>
                <tr>
                    <td>prettyTable</td>
                    <td>Render table with Scribbler’s pretty table style.</td>
                </tr>
            </table>
            <p>Malis percipitur an pro. Pro aperiam persequeris at, at sonet sensibus mei, id mea postulant definiebas
                concludaturque. Id qui malis abhorreant, mazim melius quo et. At eam altera dolorum, case dicant
                lobortis ius te, ad vel affert oportere reprehendunt. Quo no verterem deseruisse, mea brute postea te,
                ne per tacimates suavitate vituperatoribus.</p>
            <hr/>
        </section>
        <section class="js-section">
            <h3 class="section__title">Keybindings</h3>
            <p>Lorem ipsum dolor sit amet, scripta tibique indoctum sit ei, mel inani aeterno ad. Facer oratio ex per.
                At eam movet verear, in sea brute patrioque disputando, usu nonumes torquatos an. Ex his quaerendum
                intellegebat, ut vel homero accusam. Eum at debet tibique, in vocibus temporibus adversarium sed. Porro
                verear eu vix, ne usu tation vituperata.</p>
            <p>Malis percipitur an pro. Pro aperiam persequeris at, at sonet sensibus mei, id mea postulant definiebas
                concludaturque. Id qui malis abhorreant, mazim melius quo et. At eam altera dolorum, case dicant
                lobortis ius te, ad vel affert oportere reprehendunt. Quo no verterem deseruisse, mea brute postea te,
                ne per tacimates suavitate vituperatoribus.</p>
            <p>Malis percipitur an pro. Pro aperiam persequeris at, at sonet sensibus mei, id mea postulant definiebas
                concludaturque. Id qui malis abhorreant, mazim melius quo et. At eam altera dolorum, case dicant
                lobortis ius te, ad vel affert oportere reprehendunt. Quo no verterem deseruisse, mea brute postea te,
                ne per tacimates suavitate vituperatoribus.</p>
            <hr/>
        </section>
        <section class="js-section">
            <h3 class="section__title">Issues</h3>
            <p>Lorem ipsum dolor sit amet, scripta tibique indoctum sit ei, mel inani aeterno ad. Facer oratio ex per.
                At eam movet verear, in sea brute patrioque disputando, usu nonumes torquatos an. Ex his quaerendum
                intellegebat, ut vel homero accusam. Eum at debet tibique, in vocibus temporibus adversarium sed. Porro
                verear eu vix, ne usu tation vituperata.</p>
            <p>Malis percipitur an pro. Pro aperiam persequeris at, at sonet sensibus mei, id mea postulant definiebas
                concludaturque. Id qui malis abhorreant, mazim melius quo et. At eam altera dolorum, case dicant
                lobortis ius te, ad vel affert oportere reprehendunt. Quo no verterem deseruisse, mea brute postea te,
                ne per tacimates suavitate vituperatoribus.</p>
        </section>
    </article>
</div>

<footer class="footer">Scribbler is a free HTML template created exclusively for <a href="https://tympanus.net/codrops/"
                                                                                    target="_blank"
                                                                                    class="link link--light">Codrops</a>.
    Mantap Yak!
</footer>

</body>
</html>