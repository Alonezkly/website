<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>JSO Generator</title>
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Caveat&display=swap" rel="stylesheet">
	<script type="text/javascript">
		function copy_text() {
			document.getElementById("pilih").select();
			document.execCommand("copy");
			alert("Text berhasil dicopy ");
		}
	</script>
	<style>
	body {
		background-color:#2C3A49;
		color:white;
		font-family: 'Fredoka One', cursive;
	}
	.head {
		font-family: 'Fredoka One', cursive;
		text-shadow: 4px 1px red;
	}
	.textarea {
		width: 200px;
		height: 100px;
		border-radius: 10px;
		border-style: unset;
	}
	.btn {
		border-radius: 3px;
		background-color: white;
		border-style: unset;
		font-family: 'Fredoka One', cursive;
	}
	.foot {
		font-family: 'Caveat', cursive;
		text-shadow: 4px 1px red;
	}
	.ress {
		font-size: 20px;
   	color: aqua;
		font-family: 'Fredoka One', cursive;
	}
	</style>
   <script>
		function runCharCodeAt() {
			input = document.charCodeAt.input.value;
			output = "";
			for(i=0; i<input.length; ++i) {
				if (output != "") output += ", ";
				output += input.charCodeAt(i);
			}
			document.charCodeAt.output.value = output;
		}
	</script>
</head>
<body>
<center>
<h1 class="head">Jso Generator</h1>
<form name="charCodeAt" method="post">
		<textarea name="input" class="textarea" placeholder="Paste sc Deface lu disini om"></textarea><br><br>
		<input type="button" onclick="runCharCodeAt()" value="Convert" class="btn"><br><br>
		<textarea name="output" class="textarea"></textarea><br><br>
		<input type="submit" name="submit" value="Refresh" class="btn"><br><br>
</form>
<h2 class='foot'>@2020 Copyright By Fathan Raffi</h2>
</body>
</html>
