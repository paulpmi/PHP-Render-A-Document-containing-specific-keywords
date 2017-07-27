<?php

session_start();

if ($_POST)
{
	if (isset($_POST['key']))
	{
		$databaseCon = new mysqli("localhost", "root", "", "examen");

		$stmt = $databaseCon->prepare("INSERT INTO Keyword (key0, value) VALUES(?, ?)");
		$stmt->bind_param("ss", $key, $value);


		$key = $_POST['key'];
		$value = $_POST['value'];
	
		$stmt->execute();
	}

	if (isset($_POST['private']))
	{
		$databaseCon = new mysqli("localhost", "root", "", "examen");

		$stmt = $databaseCon->prepare("INSERT INTO Template (name, textContent, private) VALUES(?, ?, ?)");
		$stmt->bind_param("ssi", $name, $text, $private);


		$name = $_POST['name'];
		$text = $_POST['text'];
		$private = $_POST['private'];
	
		$stmt->execute();
	}

	if (isset($_POST['title']))
	{
		$databaseCon = new mysqli("localhost", "root", "", "examen");

		$stmt = $databaseCon->prepare("INSERT INTO Document (title, listOfTemplates) VALUES(?, ?)");
		$stmt->bind_param("ss", $title, $list);


		$title = $_POST['title'];
		$list = $_POST['templates'];
		
		$stmt->execute();
	}

	if (isset($_POST['username']))
	{
		echo "Hello ", $_POST['username'];
	}
}


?>



<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("search").innerHTML="";
    return;
  }
   xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("search").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getALL.php?part="+str,true);
  xmlhttp.send();
}
</script>


<style>
div form{
	background-color: lightblue;
	width: 250px;
	box-shadow: 10px 10px 5px #888888;
}
div h4
{
	background-color: lightgray;
	color: black;
	box-shadow: 10px 10px 5px #888888;
	width: 250px;
	
}
</style>

<body>
<div class="AddDiv">
<h4 id='AddH'> Add Keyword </h4>
<form action="" method="post">
    Key: <input type="text" name="key"><br>
    Value: <input type="text" name="value"><br>
    <input type="submit" value = "Add">
</form>
</div>


<div class="AddDiv">
<h4 class="AddH"> Add Template </h4>
<form action="" method="post">
    Name: <input type="text" name="name"><br>
    Text: <input type="text" name="text"><br>
    private: <input type="text" name="private"><br>

    <input type="submit" value = "Add">
</form>
</div>

<div class="AddDiv">
<h4 class="AddH"> Add Document </h4>
<form action="" method="post">
    Title: <input type="text" name="title"><br>
    List of Templates (ID): <input type="text" name="templates"><br>
    <input type="submit" value = "Add">
</form>
</div>


<div>
<h4> Search Documents </h4>
<form>
    Part of Name: <input type="text" name="part" onkeyup = "showResult(this.value)"><br>
    <div id="search"> </div>
</form>
</div>

</body>