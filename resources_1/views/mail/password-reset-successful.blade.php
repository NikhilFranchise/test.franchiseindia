@extends('layout.mail.master')
@section('videoLink', 'https://youtu.be/CRnnlMbOEKE')
@section('content')
    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td valign="top" style="padding:60px 0 26px 0; font-size:25px; text-align:center; color:#333333;" align="left"><span style="font-family: Arial, sans-serif; "> Dear User,</span> </td>
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
        <td valign="top"><table width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td valign="top" class="td-business" style="padding:0 82px 40px 82px; line-height:22px; text-align:center; font-size:18px; color:#666666;"><span style="font-family: Arial, Helvetica, sans-serif; ">Thanks for visiting FranchiseIndia.com! Your password has been sucessfully changed as per your request.</span></td>
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
                    <td valign="top" class="td-business" style="padding:0 82px 40px 82px; line-height:22px; text-align:center; font-size:18px; color:#666666;"><span style="font-family: Arial, Helvetica, sans-serif; ">Login your account in <a href="{{Config('constants.MainDomain')}}/loginform" style="color:#006699; text-decoration:none;">FranchiseIndia.com</a> to view your dashboard, make changes to your profile, upgrade your subscriptions, and much more.</span></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td height="30"></td>
    </tr>
@endsection




