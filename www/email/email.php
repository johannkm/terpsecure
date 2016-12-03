<?php require $_SERVER["DOCUMENT_ROOT"] . "/__header.php"; ?>



	<div class="container">
		<div class="">
			<h1>TerpMail <span id="unread" class="badge"></span><b></h1>
			<div id="column-wrap" class="row">
				<div class="col-sm-6 main-left-col">
					<div class="list-group" id="messages">
					</div>
				</div>
				<div class="col-sm-6 main-right-col">
					<div id='messDisplay' class="list-group"></div>
				</div>
			</div>
			<!-- /.container -->
		</div>
	</div>


	<script src="email.js"></script>
	<link rel="stylesheet" type="text/css" href="emailstyle.css">

</body>

</html>
