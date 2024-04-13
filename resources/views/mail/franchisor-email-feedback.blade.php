@extends('layout.mail.master')
@section('videoLink', 'https://youtu.be/OEDIHhUJkQE')
@section('content')

    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" style="padding:80px 0 26px 0; font-size:25px; text-align:center; color:#333333;" align="left" ><font face="Arial, sans-serif"> Hello  {{ $franData[0]->company_name }},</font> </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td valign="top">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" class="td-business" style="padding:0 20px 26px 33px; line-height:22px; text-align:center; font-size:18px; color:#333333; ">
                        <span style="font-family: Arial, Helvetica, sans-serif; ">
                            We are happy to have <b>{{ $franData[0]->company_name }}</b> as a part of the Franchise India family. We have come a long way together, as you have completed a successful tenure of <b>{{ $franData[1] }} months</b>.
                            <br><br>
                            <i><b>Your growth is our business</b></i>, so we hope to know your thoughts about the services we offer on FranchiseIndia.com.
                            <br><br>
                            Please share your valuable feedback with us.
                        </span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr><td valign="top" height="20px"></td></tr>

    <tr>
        <td valign="top">
            <table width="35%" align="center" cellspacing="0" cellpadding="0" class="view-btn">
                <tr>
                    <td valign="top">
                        <font face="Arial, Helvetica, sans-serif">
                            <a href="{{ Config('constants.MainDomain') }}/feedback-email?franID={{ base64_encode($franData[0]->franchisor_id) }}&month={{ $franData[1] }}" style="padding:15px 20px 15px 20px; text-transform:uppercase; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px; background:#202020; text-align:center; font-size:16px; color:#ffffff;text-transform:uppercase; text-decoration:none;">Share your feedback</a>
                        </font>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr><td valign="top" height="40px"></td></tr>

    <tr>
        <td valign="top"><table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" class="td-business" style="padding:0 20px 26px 33px; line-height:22px; text-align:center; font-size:18px; color:#333333; "><span style="font-family: Arial, Helvetica, sans-serif; "> We look forward to hearing from you! </span> </td>
                </tr>
            </table>
        </td>
    </tr>



    <tr>
        <td height="30"></td>
    </tr>
@endsection






