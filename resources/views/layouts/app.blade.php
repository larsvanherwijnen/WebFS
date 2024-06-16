<!doctype html>
<html>

<head>
    <title>The Golden Dragon</title>
    <style>
        body {
            background-color: darkred;
            margin: 15px 50px;
        }


        @font-face {
            font-family: 'chinese_takeawayregular';
            src: url('fonts/chinesetakeaway-webfont.woff2') format('woff2'),
                url('fonts/chinesetakeaway-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        a {
            text-decoration: none;
            color: yellow;
        }


        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .marquee {
            color: yellow;
            font-weight: bold;
            animation: marquee 10s linear infinite;
        }

        .main-table {
            border-collapse: collapse;
            padding: 5px;
            width: 100%;
        }

        .table-row {
            height: 50px;
            background-color: red;
        }

        .cell {
            text-align: center;
            color: yellow;
            font-size: 30px;
            width: 30%;
        }

        .cell img {
            vertical-align: middle;
        }

        .cell span {
            vertical-align: middle;
        }

        .marquee-container {
            overflow: hidden;
        }

        .nav-table {
            width: 100%;
        }

        .nav-row {
            padding-top: 50px;
        }

        .nav-cell {
            width: 50px;
        }

        .nav-content-cell {
            background: floralwhite;
            text-align: center;
            border: 1px solid black;
        }

        .nav-link {
            color: white;
            text-decoration: none;
        }

        .nav-link-cell {
            vertical-align: middle;
            background-image: linear-gradient(#00F3FF, #165FE9);
        }

        .nav-image {
            float: left;
            height: 200px;
        }

        .nav-image-flipped {
            float: right;
            height: 200px;
        }

        .nav-title {
            color: yellow;
            font-size: 40px;
            font-weight: bold;
        }

        .nav-subtitle {
            color: yellow;
            font-size: 50px;
            font-weight: bold;
        }

        .nav-table-inner {
            margin: auto;
            color: white;
            font-size: 20px;
        }

        .table-row-padding {
            background-color: red;
            height: 7px;
        }

        .table-row-base {
            height: 25px;
            background-color: red;
        }

        .table-data-padding {
            width: 7px;
        }

        .table-data-lefttop {
            border-left: 4px solid yellow;
            border-top: 4px solid yellow;
            width: 25px;
        }

        .table-data-righttop {
            border-right: 4px solid yellow;
            border-top: 4px solid yellow;
            width: 25px;
        }

        .table-data-rightbottom {
            border-right: 4px solid yellow;
            border-bottom: 4px solid yellow;
            width: 25px;
        }

        .table-data-topbottom {
            border-top: 4px solid yellow;
            border-bottom: 4px solid yellow;
        }

        .table-data-leftbottom {
            border-left: 4px solid yellow;
            border-bottom: 4px solid yellow;
            width: 25px;
        }

        .table-data-all {
            width: 25px;
            border: 4px solid yellow;
        }

        .table-data-none {
            width: 25px;
        }

        .table-data-bottom {
            width: 25px;
            border-bottom: 4px solid yellow;
        }

        .table-data-rightleft {
            width: 25px;
            border-right: 4px solid yellow;
            border-left: 4px solid yellow;
        }

        .center {
            text-align: center;
        }

        .a-style {
            color: yellow;
            text-decoration: none;
        }

        .table-data-top {
            width: 25px;
            border-top: 4px solid yellow;
        }

        .table-data-right {
            width: 25px;
            border-right: 4px solid yellow;
        }

        .table-data-left {
            width: 25px;
            border-left: 4px solid yellow;
        }

        .small-img {
            height: 50px;
        }

        .colspan-3 {
            grid-column: span 3;
        }

        .h50 {
            height: 50px;
        }
    </style>
    @vite('recources/css/app.css')
</head>

<body>
    <table id="main_table" class="main-table">
        <tr class="table-row">
            <td class="cell">
                <img src="/images/dragon-small.png" alt="Golden Dragon" class="small-img">
                <span>{{__('global.title')}}</span>
                <img src="/images/dragon-small.png" alt="Golden Dragon" class="small-img">
            </td>
            <td class="marquee-container">
                <div class="marquee">
                    {{__('global.welcome_message')}}
                </div>
            </td>
            <td class="cell">
                <img src="{{ asset('images/dragon-small.png') }}" alt="Golden Dragon" class="small-img">
                <span>{{__('global.title')}}</span>
                <img src="{{ asset('images/dragon-small-flipped.png') }}" alt="Golden Dragon" class="small-img">
            </td>
        </tr>
    </table>
    <table id="main_table" class="main-table">
        <tr class="table-row-padding">
            <td class="col-span-9" />
        <tr>
        <tr class="table-row-base">
            <td class="table-data-padding" />
            <td class="table-data-lefttop" />
            <td class="table-data-righttop" />
            <td class="table-data-rightbottom" />
            <td class="table-data-topbottom" />
            <td class="table-data-leftbottom" />
            <td class="table-data-lefttop" />
            <td class="table-data-righttop" />
            <td class="table-data-padding" />
        </tr>
        <tr class="table-row-base">
            <td class="table-data-padding" />
            <td class="table-data-leftbottom" />
            <td class="table-data-all" />
            <td class="table-data-all" />
            <td />
            <td class="table-data-all" />
            <td class="table-data-all" />
            <td class="table-data-rightbottom" />
            <td class="table-data-padding" />
        </tr>
        <tr class="table-row-base">
            <td class="table-data-padding" />
            <td class="table-data-rightbottom" />
            <td class="table-data-all" />
            <td class="table-data-none" />
            <td />
            <td class="table-data-none" />
            <td class="table-data-all" />
            <td class="table-data-bottom" />
            <td class="table-data-padding" />
        </tr>
        <tr class="table-row-base">
            <td class="table-data-padding" />
            <td class="table-data-rightleft" />
            <td class="table-data-none" />
            <td class="table-data-none" />
            <td class="center">
                <table class="nav-table">
                    <tr>
                        <td colspan="3">
                            <p>
                                <img src="{{ asset('images/dragon-small.png') }}" class="nav-image" alt="Golden Dragon">
                                <img src="{{ asset('images/dragon-small-flipped.png') }}" class="nav-image-flipped"
                                    alt="Golden Dragon">
                                <span class="nav-title">{{ __('global.specialties') }}</span><br>
                                <span class="nav-subtitle">De Gouden Draak</span><br>
                            </p>
                            <table class="nav-table-inner">
                                <tr>
                                    <td class="nav-link-cell">
                                        <a href="{{route('menu.download')}}" class="nav-link">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('global.menu') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </a>
                                    </td>
                                    <td class="nav-link-cell">
                                        <a href="{{ route('news') }}" class="nav-link">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('global.news')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </a>
                                    </td>
                                    <td class="nav-link-cell">
                                        <a href="{{ route('contact') }}" class="nav-link">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('global.contact') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="nav-row">
                        <td colspan="3" height="50">
                        </td>
                    </tr>
                    <tr class="nav-row">
                        <td class="nav-cell">
                        </td>
                        <td class="nav-content-cell">
                            @yield('content')
                        </td>
                        <td class="nav-cell">
                        </td>
                    </tr>
                </table>
                <div text-align="center"><a href="{{ route('contact-new') }}">{{ __('global.to_contact') }}</a>
                    <form action="{{ route('language.change') }}" method="POST" class="bg-green-500">
                        @csrf
                        <button type="submit" name="locale" value="nl"
                            class="text-yellow-500 text-xl">{{ __('global.dutch') }}</button>
                        <button type="submit" name="locale" value="en"
                            class="text-yellow-500 text-xl">{{ __('global.english') }}</button>
                    </form>
                </div>
            </td>
            <td class="table-data-none" />
            <td class="table-data-none" />
            <td class="table-data-rightleft" />
            <td class="table-data-padding" />
        </tr>
        <tr class="table-row-base">
            <td class="table-data-padding" />
            <td class="table-data-righttop" />
            <td class="table-data-all" />
            <td class="table-data-none" />
            <td />
            <td class="table-data-none" />
            <td class="table-data-all" />
            <td class="table-data-top" />
            <td class="table-data-padding" />
        </tr>
        <tr class="table-row-base">
            <td class="table-data-padding" />
            <td class="table-data-lefttop" />
            <td class="table-data-all" />
            <td class="table-data-all" />
            <td />
            <td class="table-data-all" />
            <td class="table-data-all" />
            <td class="table-data-righttop" />
            <td class="table-data-padding" />
        </tr>
        <tr class="table-row-base">
            <td class="table-data-padding" />
            <td class="table-data-leftbottom" />
            <td class="table-data-rightbottom" />
            <td class="table-data-right" />
            <td class="table-data-topbottom" />
            <td class="table-data-left" />
            <td class="table-data-leftbottom" />
            <td class="table-data-rightbottom" />
            <td class="table-data-padding" />
        </tr>
        <tr class="table-row-padding">
            <td colspan="9" />
        <tr>
    </table>
</body>

</html>