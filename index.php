<!DOCTYPE html>
<html>
<head>
	<title>Activity Display</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<header>
	<h1 class='roboto-medium'>What to do?</h1>
</header>

<div class="content">

	<p class="roboto-medium" style="margin: 1rem 0 5rem; font-size: 1.5rem;">Here are some things you can do when bored.</p>

	<button id="showButton">Show me</button>

	<div id="activities"></div>

</div>

<script>
	document.getElementById('showButton').addEventListener('click', function() {
		fetch('admin/getActivities.php')
			.then(response => response.text())
			.then(data => {
				document.getElementById('activities').innerHTML = data;
				//Hide the button
				document.getElementById('showButton').style.display = 'none';
			});
	});
</script>

</body>
</html>