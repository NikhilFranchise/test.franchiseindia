<?php
/**
 * Created by PhpStorm.
 * User: vasanthmuthusamy
 * Date: 12-09-2017
 * Time: 16:41
 */
?>

<html>
<head>
    <script>
        var hash = '{{$paymentDetails['hash']}}';

        function submitPayuForm() {
            if (hash == '') {
                return;
            }
            var payuForm = document.forms.payuForm;
            payuForm.submit();
        }
    </script>
</head>
<body onload="submitPayuForm()">

<br/>
<form action="{{$paymentDetails['actionUrl']}}" method="post" name="payuForm">
    <input type="hidden" name="key" value="{{$paymentDetails['merchant_key']}}"/>
    <input type="hidden" name="hash" value="{{$paymentDetails['hash']}}"/>
    <input type="hidden" name="txnid" value="{{$paymentDetails['txnId']}}"/>

    <input type="hidden" name="surl" value="{{$paymentDetails['surl']}}"/>
    <!--Please change this parameter value with your success page absolute url like http://mywebsite.com/response.php. -->
    <input type="hidden" type="hidden" name="furl" value="{{$paymentDetails['furl']}}"/>
    <!--Please change this parameter value with your failure page absolute url like http://mywebsite.com/response.php. -->
    <input type="hidden" name="amount" value="{{$paymentDetails['amount']}}"/>
    <input type="hidden" name="firstname" value="{{$paymentDetails['firstname']}}"/>
    <input type="hidden" name="email" value="{{$paymentDetails['email']}}"/>
    <input type="hidden" name="phone" value="{{$paymentDetails['phone']}}"/>
    <input type="hidden" name="country" value="{{$paymentDetails['country']}}"/>
    <input type="hidden" name="productinfo" value="{{$paymentDetails['productinfo']}}"/>



    <table>

        <tr>

            <td colspan="4"><input type="submit" value="Submit" style="display:none"/></td>

        </tr>
    </table>
</form>
</body>
</html>