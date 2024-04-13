@extends('layout.mail.master')
@section('videoLink', 'https://youtu.be/CRnnlMbOEKE')
@section('content')
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" style="padding:60px 0 26px 0; font-size:25px; text-align:center; color:#333333;" align="left" ><span style="font-family: Arial, sans-serif; ">Greetings</span> </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" class="td-business" style="padding:0 120px 26px 120px; line-height:22px; text-align:center; font-size:18px; color:#333333; font-weight:bold;"><span style="font-family: Arial, Helvetica, sans-serif; ">Thank you for subscribing for <a href="{{Config('constants.MainDomain')}}" style="color:#006699; text-decoration:none;">FranchiseIndia.com</a> "Daily / Weekly Newsletter"</span></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table width="40%" align="center" cellspacing="0" cellpadding="0" class="view-btn">
                <tr>
                    <td valign="top" style="padding:15px 20px 15px 20px; text-transform:uppercase; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px; background:#202020; text-align:center; font-size:14px; color:#ffffff;"><a href="{{Config('constants.MainDomain')}}/newsletter/{{$code}}" style="color:#ffffff; text-decoration: none;"><span style="font-family: Arial, Helvetica, sans-serif; ">Confirm Your Subscription</span></a></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr height="30"></tr>
@endsection




