<html>
<title>Esay Pay Payment</title>
<body>
    <form action="https://easypaystg.easypaisa.com.pk/easypay/Index.jsf" method="POST" name="easyPayStartForm" id="easyPayStartForm">
    <input name="storeId" value="<?php echo $storeId; ?>" type="hidden" />
    <input name="amount" value="<?php echo $amount; ?>"  type="hidden" />
    <input name="postBackURL" value="<?php echo $postBackURL; ?>" type="hidden" />
    <input name="orderRefNum" value="<?php echo $orderRefNum; ?>" type="hidden" />
    <input type="hidden" name="autoRedirect" value="0" />
    <input type="hidden" name="paymentMethod" value="<?php echo $paymentMethod; ?>" />
    <input type="hidden" name="emailAddr" value="<?php echo $emailAddr; ?>" />
    <input type="hidden" name="mobileNum" value="<?php echo $mobileNum; ?>" />
    <input type="hidden" name="merchantHashedReq" value="<?php echo $hashkey; ?>" />
    <button type="submit">Submit</button>
</form>
<script>
(function() {
  document.getElementById("easyPayStartForm").submit();
})();
</script>
</body>
</html>