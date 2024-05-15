<head>
	<!-- Chatbot CSS -->
	<link href="http://localhost/chatbot/assets/css/chat.css" rel="stylesheet" />
</head>

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
