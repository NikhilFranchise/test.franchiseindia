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
                <tbody><tr>
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
                    <td valign="top" class="td-business" style="padding:0 76px 40px 76px; line-height:22px; text-align:center; font-size:18px; color:#666666;"><span style="font-family: Arial, Helvetica, sans-serif; "><b style="color:#333;">"{{$name}}"</b> is interested in your brand at FranchiseIndia.com. Please find the below the contact details of the investor</span></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top" style="padding-bottom:60px;">
            <table width="89%" class="tbl-main" cellpadding="0" align="center" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#666;text-align:left; border:1px solid #eaeaea; ">
                <tbody>
                <tr>
                    <td valign="top" class="mt-tbl"><table width="100%" class="tbl-mo" cellpadding="0" cellspacing="0">
                            <tbody><tr>
                                <td width="25%" class="td-name" valign="top" style="background:#f4f4f4;padding:10px 010px 20px;">Name</td>
                                <td width="5%" class="td-dot" valign="top" style="background:#f4f4f4;padding:10px 20px 10px 0;">:</td>
                                <td width="70%" class="td-value" valign="top" style="background:#f4f4f4; color:#333333;line-height:21px;padding:10px 0;">{{$name}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" valign="top" height="1" bgcolor="#eaeaea"></td>
                            </tr>
                            <tr>
                                <td width="25%" class="td-name" valign="top" style="background:#f9f9f9;padding:10px 010px 20px;">Phone</td>
                                <td width="5%" class="td-dot" valign="top" style="background:#f9f9f9;padding:10px 20px 10px 0;">:</td>
                                <td width="70%" class="td-value" valign="top" style="background:#f9f9f9; color:#333333;line-height:21px;padding:10px 0;">{{$phone}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" valign="top" height="1" bgcolor="#eaeaea"></td>
                            </tr>
                            <tr>
                                <td width="25%" valign="top" class="td-name" style="background:#f4f4f4;padding:10px 010px 20px;">Email</td>
                                <td width="5%" valign="top" class="td-dot" style="background:#f4f4f4;padding:10px 20px 10px 0;">:</td>
                                <td width="70%" valign="top" class="td-value" style="background:#f4f4f4; color:#333333;line-height:21px;padding:10px 0; word-wrap:break-word; max-width:180px;"><a href="mailto:{{$email}}" style=" text-decoration:none; color:#333333;">{{$email}}</a></td>
                            </tr>
                            <tr>
                                <td colspan="3" valign="top" height="1" bgcolor="#eaeaea"></td>
                            </tr>
                            <tr>
                                <td width="25%" valign="top" class="td-name" style="background:#f9f9f9;padding:10px 010px 20px;">State</td>
                                <td width="5%" valign="top" class="td-dot" style="background:#f9f9f9;padding:10px 20px 10px 0;">:</td>
                                <td width="70%" valign="top" class="td-value" style="background:#f9f9f9; color:#333333;line-height:21px;padding:10px 0;">{{$state}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" valign="top" height="1" bgcolor="#eaeaea"></td>
                            </tr>
                            <tr>
                                <td width="25%" valign="top" class="td-name" style="background:#f4f4f4;padding:10px 0 10px 20px;">City</td>
                                <td width="5%" valign="top" class="td-dot" style="background:#f4f4f4;padding:10px 20px 10px 0;">:</td>
                                <td height="70%" valign="top" class="td-value" style="background:#f4f4f4; color:#333333;line-height:21px;padding:10px 0;">{{$city}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" valign="top" height="1" bgcolor="#eaeaea"></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>    
@endsection



