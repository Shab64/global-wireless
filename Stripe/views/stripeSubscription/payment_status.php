<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Payment Status</title>
</head>
<body>
<!--<span> Payment Status Page</span>-->
<!--   <span> --><?php //var_dump($subscription); ?><!--</span>-->
<span><?= ucfirst($subscription['object']) ?></span><br/>
<span>Billing Cycle <?php echo date("Y-m-d H:i:s", $subscription['billing_cycle_anchor']) ?></span><br/>
<span>Subscription Starts: <?php echo date("Y-m-d H:i:s", $subscription['current_period_start']) ?></span><br/>
<span>Subscription Ends: <?php echo date("Y-m-d H:i:s", $subscription['current_period_end']) ?></span><br/>
<span>Amount: <?= ($subscription['items']['data'][0]['plan']['amount'] / 100) . ' ' . strtoupper($subscription['items']['data'][0]['plan']['currency']) ?></span><br/>
<span>Interval: <?= ucfirst($subscription['items']['data'][0]['plan']['interval']) ?></span><br/>

</body>
</html>
