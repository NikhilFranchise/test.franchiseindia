@extends('layout.mail.master')
@section('videoLink', 'https://youtu.be/CRnnlMbOEKE')
@section('content')
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" style="padding:60px 0 26px 0; font-size:25px; text-align:center; color:#333333;" align="left"><span style="font-family: Arial, sans-serif; ">Welcome {{ $companyName }}</span></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" class="td-business" style="padding:0 20px 26px 33px; line-height:22px; text-align:center; font-size:18px; color:#333333; font-weight:bold;">
                        <span style="font-family: Arial, Helvetica, sans-serif; ">You recently made a Profile on <a href="{{Config('constants.MainDomain')}}" style="color:#006699; text-decoration:none;">FranchiseIndia.com</a> To proceed, verify the email address by clicking the link below.</span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table width="20%" align="center" cellspacing="0" cellpadding="0" class="view-btn">
                <tr>
                    <td>
                        <center>
                            <a style="text-decoration: none; padding:15px 13px 15px 13px; text-transform:uppercase; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px; background:#202020; text-align:center; font-size:14px; color:#ffffff;" href="{{Config('constants.MainDomain')}}/confirm/{{$companyCode}}">Confirm Email</a>
                        </center>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" class="td-business" style="padding:30px 90px 57px 90px; text-align:center; font-size:16px; color:#666666;">
                        <span style="font-family: Arial, Helvetica, sans-serif; ">If you facing any problem then you can mail us on:<a href="mailto:support@franchiseIndia.com" style="color:#333; text-decoration:none; font-weight:bold;">support@franchiseIndia.com</a></span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection

