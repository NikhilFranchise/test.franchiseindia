<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
    @csrf
    <input type=hidden name=encRequest value={{ $encrypted_data }}>
    <input type=hidden name=access_code value={{ $access_code_new }}>
</form>
<script language='javascript'>document.redirect.submit();</script>