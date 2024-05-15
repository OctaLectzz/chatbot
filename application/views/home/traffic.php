<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="http://localhost/chatbot/assets/css/styles.css" rel="stylesheet" />

	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<!-- Core theme JS-->
	<script src="http://localhost/chatbot/js/scripts.js"></script>
	<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

	<title>Traffic Pengunjung</title>
</head>

<body>
	<!-- Header -->
	<?php include 'layouts/header.php'; ?>

	<div class="container" style="padding: 200px; margin-bottom: 400px; background-color: aliceblue;">
		<h1>Jumlah Pengunjung</h1>
		<p>Jumlah kunjungan: <?php echo $visit['visit_count']; ?></p>
	</div>

	<!-- Chatbot -->
	<?php include 'chatbot.php'; ?>

	<!-- Footer -->
	<?php include 'layouts/footer.php'; ?>
</body>

</html>
