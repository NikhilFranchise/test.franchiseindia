@extends('layout.mail.master')
@section('videoLink', 'https://youtu.be/CRnnlMbOEKE')
@section('content')

    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" style="padding:60px 0 26px 0; font-size:25px; text-align:center; color:#333333;" align="left" ><span style="font-family: Arial, sans-serif; "> Greetings From Franchise India,</span> </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" class="td-business" style="padding:0 20px 26px 33px; line-height:22px; text-align:center; font-size:18px; color:#333333; font-weight:bold;"><span style="font-family: Arial, Helvetica, sans-serif; ">You recently requested a password reset for <a href="#" style="color:#006699; text-decoration:none;">FranchiseIndia.com</a> account. To complete the process, click the link below.</span></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table width="20%" align="center" cellspacing="0" cellpadding="0" class="view-btn">
                <tr>
                    <div style="text-align: center;">
                        <a href="{{ Config('constants.MainDomain')}}/password/reset/{}" style="text-decoration: none; padding:15px 20px 15px 20px; text-transform:uppercase; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px; background:#202020; text-align:center; font-size:14px; color:#ffffff;"><span style="font-family: Arial, Helvetica, sans-serif; ">Reset Now</span></a>
                    </div>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top"><table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" class="td-business" style="padding:30px 90px 57px 90px; text-align:center; font-size:16px; color:#666666;"><span style="font-family: Arial, Helvetica, sans-serif; ">If you didn't make this change or if you believe an unauthorized person has accessed your account, Write into us at <a href="mailto:support@franchiseIndia.com" style="color:#333; text-decoration:none; font-weight:bold;">support@franchiseIndia.com</a></span></td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td height="30"></td>
    </tr>
@endsection







