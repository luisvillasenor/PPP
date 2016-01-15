<?php 
	$curl_connection = curl_init('https://checkout.shopify.com/10163863/checkouts/d35c79939826456bcdcbc55b806047ae/offsite_gateway_callback');
	
	$x_callback_complete = $_GET['x_complete'];
	$x_accountID = $_GET['x_account_id'];
	$x_reference = $_GET['x_reference'];
	$x_currency = $_GET['x_currency'];
	$x_test = $_GET['x_test'];
	$x_amount = $_GET['x_amount'];
	$x_gateway_reference = $_GET['x_gateway_reference'];
	$x_timestamp = $_GET['x_timestamp'];
	$x_result = $_GET['x_result'];
	$x_signature = $_GET['x_signature'];

	$timestamp = new DateTime('NOW');
	$i_time = $timestamp->format(DateTime::ISO8601);

	$cadena = 'x_account_id' . $x_accountID . 'x_amount' . $x_amount . 'x_currencyMXNx_gateway_reference8233x_reference' . $x_reference . 'x_resultcompletedx_testfalsex_timestamp2016-01-13T00:00:05Z';
	$secretKey = "x099jd";
	$sigma = hash_hmac('sha256', $cadena, $secretKey);
	//echo 'HMAC-SHA256: ', $sigma;

?>
<html>
<head>
	<title>Callback Shopify</title>
</head>
<body>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<form method="GET" id="max-power" action="<?php echo $x_callback_complete; ?>" style="display:none;">
	<label>Account ID:</label>
	<input type="text" id="" name="x_account_id" value="<?php echo $x_accountID; ?>"><br>
	<label>Reference:</label>
	<input type="text" id="" name="x_reference" value="<?php echo $x_reference; ?>"><br>
	<label>Currency:</label>
	<input type="text" id="" name="x_currency" value="MXN"><br>
	<label>test mode:</label>
	<input type="text" id="" name="x_test" value="false"><br>
	<label>Amount:</label>
	<input type="text" id="" name="x_amount" value="<?php echo $x_amount; ?>"><br>
	<label>Gateway Reference:</label>
	<input type="text" id="" name="x_gateway_reference" value="8233"><br>
	<label>TimeStamp:</label>
	<input type="text" id="" name="x_timestamp" value="2016-01-13T00:00:05Z"><br>
	<label>Result:</label>
	<input type="text" id="" name="x_result" value="completed"><br>
	<label>Signature:</label>
	<input type="text" id="" name="x_signature" value="<?php echo $sigma; ?>"><br>
	<input id="trigger" type="submit" value="Go!">
</form>

<script type="text/javascript">
$( document ).ready(function() {
	$('#max-power').submit();
});
</script>
<!--
<form method="post" action=" https://checkout.shopify.com/10163863/checkouts/2bb758daf539b7c63f389363bf36f3ea/offsite_gateway_callback">
	<input type="text" id="" name="x_account_id" value="dolly"><br>
	<input type="text" id="" name="x_reference" value="5584685637"><br>
	<input type="text" id="" name="x_currency" value="MXN"><br>
	<input type="text" id="" name="x_test" value="false"><br>
	<input type="text" id="" name="x_amount" value="10.00"><br>
	<input type="text" id="" name="x_gateway_reference" value="123"><br>
	<input type="text" id="" name="x_timestamp" value="2016-01-13T17:00:05Z"><br>
	<input type="text" id="" name="x_result" value="completed"><br>
	<input type="text" id="" name="x_signature" value="6d0dbbc0d4b6d236a3555f2b37e801ae3f0c1254586d298db8a7e975bf75fdc6"><br>
	<input id="trigger2" type="submit" value="Go!">
</form>
-->

<div id="result"></div>

<!--
<script type="text/javascript">
$(document).ready(function() {
	/*
		x_account_id
		x_reference
		x_currency
		x_test
		x_amount
		x_gateway_reference
		x_timestamp
		x_result
		x_signature
	*/
	//create post data
	var postData = { 
		'x_account_id': 'AQgp4EaaWYotqFC5VmX9envViRfVcNM5JIR8h8lYrlgiqqeVG3WtXvFhYbmTBijoG4Eagifnejvzvgfk/EFzv9IOYFRPNCDDc4hz-m9ECqn1Vx1VhlNFZQoOw_yL6FjW0VbbZbKSGU6W4ec4W7XZUziix5yXA6eSh',
		'x_reference': '190161e65cc1025aa7a85394854b7b6d',
		'x_currency': 'MXN',
		'x_test': false,
		'x_amount': '10.00',
		'x_gateway_reference': 'paypal',
		'x_timestamp': '2016-01-13T14:02:41Z',
		'x_result': 'completed',
		'x_signature': 'de7abb3eb5b2ecbcaa2d78005169a1293687deac6450c5f272c0f270beebfb71'
	};

	var url = "https://checkout.shopify.com/10163863/checkouts/190161e65cc1025aa7a85394854b7b6d/offsite_gateway_callback";

	//make the call
	/*
	$.ajax({
	type: "POST",
	url: "https://checkout.shopify.com/10163863/checkouts/190161e65cc1025aa7a85394854b7b6d/offsite_gateway_callback",
	data: postData, //send it along with your call
	success: function(response){
	  alert(response); //see what comes out
	  //fill your div with the response
	  $("#result").html(response);
	}
	});
	*/

	//make the call 2

	$.post(url, postData, function(result) {
      hash = $.parseJSON(result)
      if (hash.redirect)
        window.location = hash.redirect
      else
        $('#result').html('<pre>' + result + '</pre>')
    });

});
</script>
-->

<!--
<script type="text/javascript">

$(document).ready(function() {
  //$('.tip').tipr();
  $('a.execute').on('click',function(){
    data = {"x_reference":"5581915333","x_account_id":"alan","x_amount":"10.00","x_currency":"MXN","x_url_callback":"https://checkout.shopify.com/services/ping/notify_integration/universal/10163863","x_url_complete":"https://checkout.shopify.com/10163863/checkouts/190161e65cc1025aa7a85394854b7b6d/offsite_gateway_callback","x_shop_country":"MX","x_shop_name":"mitaller","x_test":"false","x_customer_first_name":"Alan Kimo","x_customer_last_name":"Alvarado Martínez","x_customer_email":"alan@iceberg9.com","x_customer_phone":"2288260778","x_customer_shipping_country":"MX","x_customer_shipping_first_name":"Alan Kimo","x_customer_shipping_last_name":"Alvarado Martínez","x_customer_shipping_city":"Xalapa","x_customer_shipping_company":"Iceberg9","x_customer_shipping_address1":"Ficus 80 Fracc. Jacarandas","x_customer_shipping_state":"VER","x_customer_shipping_zip":"91190","x_customer_shipping_phone":"2288260778","x_invoice":"#5581915333","x_amount_shipping":"0.00","x_amount_tax":"0.00","x_description":"mitaller - #5581915333","x_url_cancel":"http://mitaller-2.myshopify.com/cart","x_signature":"2dffa4b2de99244d61c0a0a3f898b6676c27b53cb7e08f151247dc677f4e225a"}
    action = $(this).attr('data-result')
    fire_callback = $(this).attr('data-callback')
    url = "execute/" + action + "?fire_callback=" + fire_callback
    $.post(url, data, function(result) {
      hash = $.parseJSON(result)
      if (hash.redirect)
        window.location = hash.redirect
      else
        $('#result').html('<pre>' + result + '</pre>')
    });
  })
});

</script>
-->

</body>
</html>