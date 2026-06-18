@extends('layout.mail.master')
@section('videoLink', 'https://youtu.be/f6HYmKW5KAc')
@section('content')
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td valign="top" style="padding:60px 0 26px 0; font-size:25px; text-align:center; color:#333333;" align="left"><span style="font-family: Arial, sans-serif; "> Dear {{$investorName}}</span> </td>
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
                    <td valign="top" class="td-business" style="padding:0 82px 40px 82px; line-height:22px; text-align:center; font-size:18px; color:#666666;"><span style="font-family: Arial, Helvetica, sans-serif; ">Thank you for showing interest in <span style="color:#333333; font-weight:bold;">"{{$companyName}}" </span>Please create your Investor Profile and upgrade it to directly connect with the Franchisor.</span></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top" style="padding-bottom:60px;">
            <table width="25%" align="center" cellspacing="0" cellpadding="0" class="view-btn">
                <tbody>
                <tr>
                    <td valign="top" style="padding:15px 20px 15px 20px; text-transform:uppercase; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px; background:#202020; text-align:center; font-size:14px; color:#ffffff;"><span style="font-family: Arial, Helvetica, sans-serif; "><a href="{{Config('constants.MainDomain')}}/investor/myaccount/payment" style="text-decoration:none; color:#fff;">Upgrade Profile</a></span></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

@endsection
