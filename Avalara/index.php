<?php


// Include the AvaTaxClient library
require '../vendor/autoload.php';
use Avalara\AvaTaxClient;

// Create a new client
$client = new Avalara\AvaTaxClient('phpTestApp', '1.0', 'localhost', 'sandbox');
$client->withSecurity('accounts@gwidata.com', 'GlobalTeam321');

// If I am debugging, I can call 'Ping' to see if I am connected to the server
$p = $client->ping();
echo('<h2>Ping</h2>');
echo('<pre>' . json_encode($p, JSON_PRETTY_PRINT) . '</pre>');
if ($p->authenticated == true) {
	echo '<p>Authenticated!</p>';
}

//// Create a simple transaction for $100 using the fluent transaction builder
//$tb = new Avalara\TransactionBuilder($client, "DEFAULT", Avalara\DocumentType::C_SALESINVOICE, 'ABC');
//$t = $tb->withAddress('SingleLocation', '3rd Floor Trafalgar Place', null, null, 'Brighton', 'UK', 'BN1 4FU', 'US')
//		->withLine(1000, 1, null, "P0000000")
//		->create();
//echo('<pre>' . json_encode($t, JSON_PRETTY_PRINT) . '</pre>');

// Now, let's create a more complex transaction!
$tb = new Avalara\TransactionBuilder($client, "DEFAULT", Avalara\DocumentType::C_SALESINVOICE, 'ABC');
$t = $tb->withAddress('ShipFrom', '301 S perimeter park Dr suite 100', null, null, 'Nashville', 'TN', '37211', 'US')
		->withAddress('ShipTo', '100 Ravine Lane', null, null, 'Bainbridge Island', 'WA', '98110', 'US')
		->withLine(100.0, 1, null, "P0000000")
		->withLine(1234.56, 1, null, "P0000000")
		->withExemptLine(50.0, null, "NT")
		->withLine(2000.0, 1, null, "P0000000")
		->withLineAddress(Avalara\TransactionAddressType::C_SHIPFROM, "123 Main Street", null, null, "Irvine", "CA", "92615", "US")
		->withLineAddress(Avalara\TransactionAddressType::C_SHIPTO, "1500 Broadway", null, null, "New York", "NY", "10019", "US")
		->withLine(50.0, 1, null, "FR010000")
		->create();
echo('<h2>Transaction #2</h2>');
echo('<pre>' . json_encode($t, JSON_PRETTY_PRINT) . '</pre>');

?>
