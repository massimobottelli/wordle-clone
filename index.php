<!doctype html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Wordle Solver</title>
</head>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<body>
<?php
if (isset($_POST["submit"])) {
	extract($_POST);
	// split user data into array
	$array_mustnotbe1 = str_split($mustnotbe1);
	$array_mustnotbe2 = str_split($mustnotbe2);
	$array_mustnotbe3 = str_split($mustnotbe3);
	$array_mustnotbe4 = str_split($mustnotbe4);
	$array_mustnotbe5 = str_split($mustnotbe5);
	$array_include = str_split($include);
	$array_exclude = str_split($exclude);
	}
?>
<div class="card">
	<div class="card-body">
		<h2 style="text-align: center"><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Wordle Solver</a></h2>
		<div class="text-center">
			<button class="btn btn-light " onclick="window.open('https://www.powerlanguage.co.uk/wordle/','_blank')">Wordle (daily)</button>
			<button class="btn btn-light " onclick="window.open('https://www.devangthakkar.com/wordle_archive/','_blank')">Wordle Archive</button>
		</div>
		<hr/>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
			<div class="table-responsive">
				<table class="table table-sm table-bordered">
					<thead class="bg-primary text-white">
						<tr>
							<th scope="col" class="text-center">LETTER</th>
							<th scope="col" class="text-center">1st</th>
							<th scope="col" class="text-center">2nd</th>
							<th scope="col" class="text-center">3rd</th>
							<th scope="col" class="text-center">4th</th>
							<th scope="col" class="text-center">5th</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row" class="align-middle table-success text-center bg-success"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Insert letter that must be in the position">MUST BE</button></th>
							<td class="align-middle"><input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="mustbe1" maxlength="1" value="<?php if (isset($_POST["submit"])) echo $mustbe1 ?>"/></td>
							<td class="align-middle"><input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="mustbe2" maxlength="1" value="<?php if (isset($_POST["submit"])) echo $mustbe2 ?>" /></td>
							<td class="align-middle"><input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="mustbe3" maxlength="1" value="<?php if (isset($_POST["submit"])) echo $mustbe3 ?>" /></td>
							<td class="align-middle"><input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="mustbe4" maxlength="1" value="<?php if (isset($_POST["submit"])) echo $mustbe4 ?>" /></td>
							<td class="align-middle"><input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="mustbe5" maxlength="1" value="<?php if (isset($_POST["submit"])) echo $mustbe5 ?>" /></td>
						</tr>
						<tr>
							<th scope="row" class="align-middle table-secondary text-center bg-warning"><button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Insert list of letters that must NOT be in the position">MUST NOT BE</button></th>
							<td class="align-middle"><input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="mustnotbe1" value="<?php if (isset($_POST["submit"])) foreach($array_mustnotbe1 as $item) echo $item ?>"/></td>
							<td class="align-middle"><input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="mustnotbe2" value="<?php if (isset($_POST["submit"])) foreach($array_mustnotbe2 as $item) echo $item ?>" /></td>
							<td class="align-middle"><input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="mustnotbe3" value="<?php if (isset($_POST["submit"])) foreach($array_mustnotbe3 as $item) echo $item ?>" /></td>
							<td class="align-middle"><input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="mustnotbe4" value="<?php if (isset($_POST["submit"])) foreach($array_mustnotbe4 as $item) echo $item ?>" /></td>
							<td class="align-middle"><input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="mustnotbe5" value="<?php if (isset($_POST["submit"])) foreach($array_mustnotbe5 as $item) echo $item ?>" /></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="input-group mb-3">
				<button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Insert list of letters that must be in the word">INCLUDE LETTERS</button>
				<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="include" value="<?php if (isset($_POST["submit"])) foreach($array_include as $item) echo $item ?>"/>
			</div>
			<div class="input-group mb-3">
				<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Insert list of letters that must NOT be in the word">EXCLUDE LETTERS</button>
				<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" onkeypress="return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)" name="exclude" value="<?php if (isset($_POST["submit"])) foreach($array_exclude as $item) echo $item ?>"/>
			</div>
			<div class="text-center">
				<input type="hidden" name="submit"/>
				<button class="btn btn-primary btn-lg" name="submit">Search</button>
<!--  			<button class="btn btn-danger" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>#">Reset</button> -->
			</div>
		</form>
	</div>
<?php

if (isset($_POST["submit"])) {

	// compose conditions
	$partial_condition="";
	if (isset($mustbe1)&&$mustbe1!="") {
		$partial_condition.='$letter[0]==$mustbe1';
	}
	if (isset($mustbe2)&&$mustbe2!="") {
		if ($partial_condition!="") $partial_condition.=" && ";
		$partial_condition.='$letter[1]==$mustbe2';
	}
	if (isset($mustbe3)&&$mustbe3!="") {
		if ($partial_condition!="") $partial_condition.=" && ";
		$partial_condition.='$letter[2]==$mustbe3';
	}
	if (isset($mustbe4)&&$mustbe4!="") {
		if ($partial_condition!="") $partial_condition.=" && ";
		$partial_condition.='$letter[3]==$mustbe4';
	}
	if (isset($mustbe5)&&$mustbe5!="") {
		if ($partial_condition!="") $partial_condition.=" && ";
		$partial_condition.='$letter[4]==$mustbe5';
	}
	if (isset($mustnotbe1)&&$mustnotbe1!="") {
		for ($i=0;$i<count($array_mustnotbe1);$i++) {
			if ($partial_condition!="") $partial_condition.=" && ";
			$partial_condition.='$letter[0]!=$array_mustnotbe1['.$i.']';
		}
	}
	if (isset($mustnotbe2)&&$mustnotbe2!="") {
		for ($i=0;$i<count($array_mustnotbe2);$i++) {
			if ($partial_condition!="") $partial_condition.=" && ";
			$partial_condition.='$letter[1]!=$array_mustnotbe2['.$i.']';
		}
	}
	if (isset($mustnotbe3)&&$mustnotbe3!="") {
		for ($i=0;$i<count($array_mustnotbe3);$i++) {
			if ($partial_condition!="") $partial_condition.=" && ";
			$partial_condition.='$letter[2]!=$array_mustnotbe3['.$i.']';
		}
	}
	if (isset($mustnotbe4)&&$mustnotbe4!="") {
		for ($i=0;$i<count($array_mustnotbe4);$i++) {
			if ($partial_condition!="") $partial_condition.=" && ";
			$partial_condition.='$letter[3]!=$array_mustnotbe4['.$i.']';
		}
	}
	if (isset($mustnotbe5)&&$mustnotbe5!="") {
		for ($i=0;$i<count($array_mustnotbe5);$i++) {
			if ($partial_condition!="") $partial_condition.=" && ";
			$partial_condition.='$letter[4]!=$array_mustnotbe5['.$i.']';
		}
	}
	if (isset($include)&&$include!="") {
		for ($i=0;$i<count($array_include);$i++) {
			if ($partial_condition!="") $partial_condition.=" && ";
			$partial_condition.='strpos($word, $array_include['.$i.'])!==false';
		}
	}
	if (isset($exclude)&&$exclude!="") {
		for ($i=0;$i<count($array_exclude);$i++) {
			if ($partial_condition!="") $partial_condition.=" && ";
			$partial_condition.='strpos($word, $array_exclude['.$i.'])===false';
		}
	}
	$condition="return ".$partial_condition.";";
	//debug echo $condition;

	// import words list to array
	$filename=getcwd()."/words-list.txt";
	$words_list = explode("\n", file_get_contents($filename));

	// print filtered words list
	echo "<div class=\"container\">\n";
	echo "<ul class=\"list-group\">\n";
	foreach ($words_list as $word) {
		$letter=str_split($word);
		// scan words letters
		if (eval($condition)) {
			echo "<li class=\"list-group-item list-group-item-action list-group-item-light\">".$word."</li>\n";
		}
	}
	echo "</ul>\n</div>\n<br/>";
}
?>
<div class="card">
  <div class="card-header" style="text-align: center">
    Massimo Bottelli - <a href="https://massimobottelli.it/wordle-solver/">Wordle Solver</a>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
			<footer class="blockquote-footer" style="text-align: center"><small>Github Repository: <a href="https://github.com/massimobottelli/wordle-solver">massimobottelli/wordle-solver</a></small></footer>
    </blockquote>
  </div>
</div>

</div>
</body>
</html>
