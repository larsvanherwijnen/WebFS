@extends('layouts.app')

@section('content')
    <td align="center" style='font-size:5;border:1px solid black;background:floralwhite'><br>
        <h3>{!! __('global.description') !!} </h3>
        <br>
        <h2><u>{{ __('global.student_offer') }}</u></h2>
        <h1>{{ __('global.rice_table') }}</h1>
        <h3>
            {{ __('global.choose_dishes') }}<br><br>
            <table width="60%">
                <tr>
                    <td width="40%" style="text-align:right">
                        {{ __('global.dish_koe_loe_yuk') }}
                    </td>
                    <td width="20%">
                    </td>
                    <td width="40%">
                        {{ __('global.dish_foe_yong_hai') }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right">
                        {{ __('global.dish_tjap_tjoy') }}
                    </td>
                    <td>
                    </td>
                    <td>
                        {{ __('global.dish_shrimps_garlic') }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right">
                        {{ __('global.dish_babi_pangang') }}
                    </td>
                    <td>
                    </td>
                    <td>
                        {{ __('global.dish_chicken_black_bean') }}
                    </td>
                </tr>
            </table>
            <br>
            {{ __('global.with_rice') }}
        </h3>
        <h1>            {{ __('global.price') }}
        </h1>
    </td>
@endsection

