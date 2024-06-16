<!doctype html>
<html>

<head>
    <title>The Golden Dragon</title>
    <style>
        body {
            background-color: darkred;
            margin: 15px;
            margin-left: 50px;
            margin-right: 50px
        }

        td {
            padding: 0px;
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

        .animate-marquee {
            animation: marquee 10s linear infinite;
        }
    </style>
</head>

<body>
<table id="main_table" style="padding:5px;width:100%;border-collapse: collapse">
    <tr style="height:50px;background-color:red">
        <td style="text-align:center;width:30%;color:yellow;font-size:30px">
            <img style="vertical-align: middle;" src="/images/dragon-small.png" alt="Golden Dragon" height="50px">
            <span style="font-family:'chinese_takeawayregular'">{{ __('global.title') }}</span>
            <img style="vertical-align: middle;" src="/images/dragon-small-flipped.png" alt="Golden Dragon"
                 height="50px">
        </td>
        <td>
            <a href="paginas/aanbiedingen.html" style="color:yellow;font-weight:bold;text-decoration: none;">
                <div style="width: 100%; overflow: hidden">
                    <div class="animate-marquee">
                        {{__('global.welcome_message')}}
                    </div>
                </div>
            </a>
        </td>
        <td style="text-align:center;width:30%;color:yellow;font-size:30px">
            <img style="vertical-align: middle;" src="/images/dragon-small.png" alt="Golden Dragon" height="50px">
            <span style="font-family:'chinese_takeawayregular'">{{ __('global.title') }}</span>
            <img style="vertical-align: middle;" src="/images/dragon-small-flipped.png" alt="Golden Dragon"
                 height="50px">
        </td>
    </tr>
</table>
<table id="main_table" style="padding:5px;width:100%;border-collapse: collapse">
    <tr style="height:7px;background-color:red">
        <td colspan="9">
        </td>
    <tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        </td>
        <td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="border-top:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px"></td>
        <td></td>
        <td style="width:25px"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border-bottom:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:50px;background-color:red">
        <td width="7px">
        <td style="width:25px;border-right:4px solid yellow;border-left:4px solid yellow"></td>
        <td style="width:25px;"></td>
        <td style="width:25px;"></td>
        <td style="text-align:center">
            <!-- CONTENT HERE! -->
            <table width=100%>
                <tr>
                    <td colspan='3'>
                        <p>
                            <img src="/images/dragon-small.png" style="float:left;height:200px" alt="Golden Dragon">
                            <img src="/images/dragon-small-flipped.png" style="float:right;height:200px"
                                 alt="Golden Dragon">
                            <span style="font-size:40px;font-weight:bold;color:yellow">{{__('global.specialties')}}</span><br>
                            <span style="font-size:50px;font-weight:bold;color:yellow">{{ __('global.title') }}</span><br>
                        </p>
                        <p>
                        <table style="margin:auto;font-size:20px;color:white" border="1px solid white">
                            <tr background="/images/menu_bg_gradient.png">
                                <td valign="middle">
                                    <a href="paginas/MENUKAART.html" style="color:white">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('global.menu') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </a>
                                </td>
                                <td valign="middle">
                                    <a href="{{route('news')}}" style="color:white">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('global.news')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </a>
                                </td>
                                <td valign="middle">
                                    <a href="{{route('contact')}}" style="color:white">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('global.contact')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </a>
                                </td>
                            </tr>
                        </table>
                        </p>
                    </td>
                </tr>
                <tr style="padding-top:50px">
                    <td colspan="3" height="50px">
                    </td>
                </tr>
                @yield('content')
            </table>
            <br>
            <div text-align="center"><a href="{{ route('contact-new') }}">{{ __('global.to_contact') }}</a>
                <form action="{{ route('language.change') }}" method="POST" class="bg-green-500">
                    @csrf
                    <button type="submit" name="locale" value="nl"
                            class="text-yellow-500 text-xl">{{ __('global.dutch') }}</button>
                    <button type="submit" name="locale" value="en" class="text-yellow-500 text-xl">{{ __('global.english') }}</button>
                </form></div>
        </td>
        <td style="width:25px;"></td>
        <td style="width:25px;"></td>
        <td style="width:25px;border-right:4px solid yellow;border-left:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px"></td>
        <td></td>
        <td style="width:25px"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border-top:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        <td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        </td>
        <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow"></td>
        <td style="border-top:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-left:4px solid yellow;"></td>
        <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:7px;background-color:red">
        <td colspan="9">
        </td>
    <tr>
</table>
</body>

</html>
