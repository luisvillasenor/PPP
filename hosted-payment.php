<?php
	
	$x_accountID = $_POST['x_account_id'];
	$x_currency = $_POST['x_currency'];
	$x_amount = $_POST['x_amount'];
	$x_amount_shipping = $_POST['x_amount_shipping'];
	$x_amount_tax = $_POST['x_amount_tax'];
	$x_reference = $_POST['x_reference'];
	$x_shop_country = $_POST['x_shop_country'];
	$x_shop_name = $_POST['x_shop_name'];
	$x_description = $_POST['x_description'];
	$x_invoice = $_POST['x_invoice'];
	$x_test = $_POST['x_test'];
	$x_customer_first_name = $_POST['x_customer_first_name'];
	$x_customer_last_name = $_POST['x_customer_last_name'];
	$x_customer_email = $_POST['x_customer_email'];
	$x_customer_phone = $_POST['x_customer_phone'];
	$x_customer_shipping_city = $_POST['x_customer_shipping_city'];
	$x_customer_shipping_company = $_POST['x_customer_shipping_company'];
	$x_customer_shipping_address1 = $_POST['x_customer_shipping_address1'];
	$x_customer_shipping_address2 = $_POST['x_customer_shipping_address2'];
	$x_customer_shipping_state = $_POST['x_customer_shipping_state'];
	$x_customer_shipping_zip = $_POST['x_customer_shipping_zip'];
	$x_customer_shipping_country = $_POST['x_customer_shipping_country'];
	$x_customer_shipping_phone = $_POST['x_customer_shipping_phone'];
	
	$x_url_callback = $_POST['x_url_callback'];
	$x_url_cancel = $_POST['x_url_cancel'];
	$x_url_complete = $_POST['x_url_complete'];
	$x_signature = $_POST['x_signature'];

	echo 'x_account_id: ', $x_accountID, '<br>';
	echo 'x_currency: ', $x_currency, '<br>';
	echo 'x_amount: ', $x_amount, '<br>';
	echo 'x_amount_shipping: ', $x_amount_shipping, '<br>';
	echo 'x_amount_tax: ', $x_amount_tax, '<br>';
	echo 'x_reference: ', $x_reference, '<br>';
	echo 'x_shop_country: ', $x_shop_country, '<br>';
	echo 'x_description: ', $x_description, '<br>';
	echo 'x_invoice: ', $x_invoice, '<br>';
	echo 'x_test: ', $x_test, '<br>';
	echo 'x_customer_first_name: ', $x_customer_first_name, '<br>';
	echo 'x_customer_last_name: ', $x_customer_last_name, '<br>';
	echo 'x_customer_email: ', $x_customer_email, '<br>';
	echo 'x_customer_phone: ', $x_customer_phone, '<br>';
	echo 'x_customer_shipping_city: ', $x_customer_shipping_city, '<br>';
	echo 'x_customer_shipping_address1: ', $x_customer_shipping_address1, '<br>';
	echo 'x_customer_shipping_address2: ', $x_customer_shipping_address2, '<br>';
	echo 'x_customer_shipping_state: ', $x_customer_shipping_state, '<br>';
	echo 'x_customer_shipping_zip: ', $x_customer_shipping_zip, '<br>';
	echo 'x_customer_shipping_country: ', $x_customer_shipping_country, '<br>';
	
	echo 'x_url_callback: ', $x_url_callback, '<br>';
	echo 'x_url_cancel: ', $x_url_cancel, '<br>';
	echo 'x_url_complete: ', $x_url_complete, '<br>';
	echo 'x_signature: ', $x_signature, '<br>';

?>