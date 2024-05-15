<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="http://localhost/chatbot/assets/css/styles.css" rel="stylesheet" />

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<!-- Chatbot CSS -->
	<link href="http://localhost/chatbot/assets/css/chat.css" rel="stylesheet" />

	<title>Chatbot</title>
</head>

<body id="page-top">

	<!-- Landing Page -->
	<?php include 'landing.php'; ?>

	<!-- Chatbot -->
	<div class="chatbot">
		<input type="checkbox" id="check"> <label class="chat-btn" for="check"> <i class="fa fa-commenting-o comment"></i> <i class="fa fa-close close"></i> </label>
		<div class="wrapper">
			<div class="title">Chatbot</div>
			<div class="form" id="form">
				<div class="bot-inbox inbox">
					<div class="icon">
						<i class="fa fa-user"></i>
					</div>
					<div class="msg-header">
						<p>Hai, ada yang bisa dibantu? </p>
					</div>
				</div>
			</div>
			<div class="typing-field">
				<div class="input-data">
					<input id="text-pesan" type="text" placeholder="Ketikkan sesuatu disini..." required>
					<button id="send-btn">Kirim</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Chatbot JS -->
	<script>
		$(document).ready(function() {
			$("#send-btn").on("click", function() {
				$pesan = $("#text-pesan").val();

				$msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $pesan + '</p></div></div>';
				$("#form").append($msg);

				$.ajax({
					url: 'http://localhost/chatbot/home/chatbot',
					type: 'POST',
					data: 'isi_pesan=' + $pesan,
					success: function(result) {
						$balasan = '<div class="bot-inbox inbox"><div class="icon"><i class="fa fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>'
						$("#form").append($balasan);
						$("#form").scrollTop($("#form")[0].scrollHeight);
					}
				})

				$pesan = $("#text-pesan").val('');
			})
		})
	</script>

	<!-- Core theme JS-->
	<script src="http://localhost/chatbot/js/scripts.js"></script>
	<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
