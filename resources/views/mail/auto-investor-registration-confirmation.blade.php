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
                        <span style="font-family: Arial, Helvetica, sans-serif; ">You recently made a Profile on <a href="{{Config('constants.MainDomain')}}" style="color:#006699; text-decoration:none;">FranchiseIndia.com</a> To explore business opportunities, kindly click on the the below link and verify your email id.</span>
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
                        <div style="text-align: center;">
                            <a style="text-decoration: none; padding:15px 13px 15px 13px; text-transform:uppercase; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px; background:#202020; text-align:center; font-size:14px; color:#ffffff;" href="{{Config('constants.MainDomain')}}/confirm/{{$companyCode}}">Confirm Email</a>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" class="td-business" style="padding:30px 90px 0px 90px; text-align:center; font-size:16px; color:#666666;">
                        <span style="font-family: Arial, Helvetica, sans-serif; ">Your current password is <b>{{ $password }}</b>.</span>
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
                        <span style="font-family: Arial, Helvetica, sans-serif; "> To change your password kindly click here.</span>
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
                        <div style="text-align: center;">
                            <a style="text-decoration: none; width: 160px; padding:15px 13px 15px 13px; text-transform:uppercase; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px; background:#202020; text-align:center; font-size:14px; color:#ffffff; display: inline-block;" href="{{Config('constants.MainDomain')}}/change-password/{{$companyCode}}">Change Password</a>
                        </div>
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
                        <span style="font-family: Arial, Helvetica, sans-serif; ">If you facing any problem then you can mail us On:<a href="mailto:support@franchiseIndia.com" style="color:#333; text-decoration:none; font-weight:bold;">support@franchiseIndia.com</a></span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection

