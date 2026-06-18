@extends('layout.mail.master')
@section('videoLink', 'https://youtu.be/OEDIHhUJkQE')
@section('content')
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td valign="top" style="padding:60px 0 26px 0; font-size:25px; text-align:center; color:#333333;" align="left"><span style="font-family: Arial, sans-serif; "> Dear {{$franName}}</span> </td>
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
                    <td valign="top" class="td-business" style="padding:0 90px 26px 90px; line-height:22px; text-align:center; font-size:16px; color:#666666;"><span style="font-family: Arial, Helvetica, sans-serif; ">Greetings from Franchise India!</span></td>
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
                    <td valign="top" class="td-business" style="padding:0 90px 26px 90px; line-height:22px; text-align:center; font-size:22px; color:#333333; font-weight:bold;"><span style="font-family: Arial, Helvetica, sans-serif; ">Congratulations!</span></td>
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
                    <td valign="top" class="td-business" style="padding:0 32px 26px 32px; line-height:22px; text-align:center; font-size:18px; color:#333333; font-weight:bold;"><span style="font-family: Arial, Helvetica, sans-serif; ">Your profile at <a href="#" style="text-decoration:none; color:#006699;">FranchiseIndia.com</a> has generated the interest of an investor. Kindly upgrade your profile to get connected with the investor.</span></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top" style="padding-bottom:60px;">
            <table width="15%" align="center" cellspacing="0" cellpadding="0" class="view-btn">
                <tbody>
                    <tr>
                        <td valign="top" style="padding:15px 20px 15px 20px; text-transform:uppercase; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px; background:#202020; text-align:center; font-size:14px; color:#ffffff;"><span style="font-family: Arial, Helvetica, sans-serif; "><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/payment-plan" style="text-decoration:none; color:#fff;">UPGRADE</a></span></td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection




