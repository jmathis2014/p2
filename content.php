<?php require('logic.php'); ?>

<img class = "images" src="img/xkcd.png" height="180" width="460" align = "middle">
<div class="title"> Password Generator </div><br>
<div class="password"><?php echo $password; ?></div>
<div class="container">
	<h2> Generate a new password </h2>
	<form method="POST" action="/index.php"> 
	<label name=""># of words (Max: 10)</label>
	<input type="text" id="count" name="count" maxlength="2" size="2"/><br>

        <label name="">Letters?</label>
	<select name="letters">
          <option value="1">Last</option>
	  <option value="2">All uppercase</option>
          <option value="3">All lowercase</option>
          <option value="4">First</option>
	</select><br>

        <label name="">Symbols?</label>
        <select name="symbols">
          <option value="1">None</option>
          <option value="2">First position</option>
          <option value="3">Last position</option>
        </select><br>

        <label name="">Numbers?</label>
        <select name="numbers">
          <option value="1">None</option>
          <option value="2">First position</option>
          <option value="3">Last position</option>
        </select><br>

	<input type="submit" name="submit" value="submit"/><br>
	</form><br>
</div>
<img class = "images" src="img/banner.png" height="80" width="320" align = "middle"> 

