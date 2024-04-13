@extends('layout.mail.master')
@section('videoLink', 'https://youtu.be/f6HYmKW5KAc')
@section('content')
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td valign="top" style="padding:60px 0 26px 0; font-size:25px; text-align:center; color:#333333;" align="left"><span style="font-family: Arial, sans-serif; "> Dear {{$visitorName}}</span> </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top"><table width="100%" cellspacing="0" cellpadding="0">
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
                        <td valign="top" class="td-business" style="padding:0 82px 40px 82px; line-height:22px; text-align:center; font-size:18px; color:#666666;"><span style="font-family: Arial, Helvetica, sans-serif; ">Thanks for showing interest in <span style="color:#333333; font-weight:bold;">"{{$companyName}}"</span>Please create your Investor profile and Upgrade it to directly contact the Franchisor.</span></td>
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
                        <td valign="top" style="padding:15px 20px 15px 20px; text-transform:uppercase; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px; background:#202020; text-align:center; font-size:14px; color:#ffffff;"><span style="font-family: Arial, Helvetica, sans-serif; "><a href="{{Config('constants.MainDomain')}}/investor/create" style="text-decoration:none; color:#fff;">Create Profile</a></span></td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection


