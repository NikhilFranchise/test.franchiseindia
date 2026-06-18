@extends('layout.mail.master')
@section('videoLink', 'https://youtu.be/CRnnlMbOEKE')
@section('content')
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td valign="top" style="padding:60px 0 26px 0; font-size:25px; text-align:center; color:#333333;" align="left"><span style="font-family: Arial, sans-serif; "> Dear {{ $name }}</span></td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td valign="top" class="td-business" style="padding:0 90px 26px 90px; line-height:22px; text-align:center; font-size:16px; color:#666666;">
                            <span style="font-family: Arial, Helvetica, sans-serif; ">Greetings from Franchise India!</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td valign="top" class="td-business" style="padding:0 82px 40px 82px; line-height:22px; font-size:18px; color:#666666;">
                        <span style="font-family: Arial, Helvetica, sans-serif; ">Kindly note that your comment on the article <span style="color:#333333; font-weight:bold;"> {{ $artName }} </span> posted on  <a href="https://www.franchiseindia.com" style="color:#333333; font-weight:bold; text-decoration: none;">Franchise India </a> has been replied by the Franchise India Team.</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td valign="top" class="td-business" style="padding:0 82px 40px 82px; line-height:22px; font-size:18px; color:#666666;">
                        <span style="font-family: Arial, Helvetica, sans-serif; ">To view your comment please <a href="{{ $url }}" style="color:#333333; font-weight:bold; text-decoration: none;">click here </a></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection
