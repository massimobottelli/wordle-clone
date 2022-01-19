<!doctype html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Wordle</title>
</head>
<?php
$green="rgb(85,140,81)";
$yellow="rgb(180,158,67)";
$gray="rgb(58,58,60)";
$white="rgb(215,218,220)";
$black="rgb(18,18,19)";

if (isset($_POST['submit'])) {
  extract($_POST);
  $word=$G1.$G2.$G3.$G4.$G5;
  $word_history=$word_history.";".$word;
  $letters_array = str_split($word);
  $L1=$letters_array[0];
  $L2=$letters_array[1];
  $L3=$letters_array[2];
  $L4=$letters_array[3];
  $L5=$letters_array[4];
  }

if (!isset($secret_word)||isset($_POST["reset"])) {
  $filename=getcwd()."/words.txt";
  $words_list=explode("\n", file_get_contents($filename));
  $secret_word=$words_list[mt_rand(0,count($words_list))];
  $row=0; $word_history="";
  }

?>
<body style="background: <?php echo $black?>" onload="document.getElementById('G1').focus()">
  	<div class="card-body">
  		<h2 style="text-align: center"><a href="<?php echo $_SERVER['PHP_SELF'];?>" style=" color: <?php echo $white ?>; text-decoration: none!important">WORDLE</a></h2>
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
      <div class="table-responsive">
        <table class="table table-sm" style="margin: auto; max-width: 250px">
          <tbody style="border-color: black!important;">
<?php
$word = explode (";",$word_history);
for ($i=0;$i<5;$i++) {
  if ($i==$row) {
    echo "            <tr>\n";
    echo "              <td><input type=\"text\" class=\"form-control text-center\" style=\"width: 40px; background: white\" onkeyup=\"this.value = this.value.toUpperCase();document.getElementById('G2').focus()\" onkeypress=\"return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)\" name=\"G1\" id=\"G1\" maxlength=\"1\" /></td>\n";
    echo "              <td><input type=\"text\" class=\"form-control text-center\" style=\"width: 40px; background: white\" onkeyup=\"this.value = this.value.toUpperCase();document.getElementById('G3').focus()\" onkeypress=\"return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)\" name=\"G2\" id=\"G2\" maxlength=\"1\" /></td>\n";
    echo "              <td><input type=\"text\" class=\"form-control text-center\" style=\"width: 40px; background: white\" onkeyup=\"this.value = this.value.toUpperCase();document.getElementById('G4').focus()\" onkeypress=\"return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)\" name=\"G3\" id=\"G3\" maxlength=\"1\" /></td>\n";
    echo "              <td><input type=\"text\" class=\"form-control text-center\" style=\"width: 40px; background: white\" onkeyup=\"this.value = this.value.toUpperCase();document.getElementById('G5').focus()\" onkeypress=\"return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)\" name=\"G4\" id=\"G4\" maxlength=\"1\" /></td>\n";
    echo "              <td><input type=\"text\" class=\"form-control text-center\" style=\"width: 40px; background: white\" onkeyup=\"this.value = this.value.toUpperCase()\" onkeypress=\"return(event.charCode>64&&event.charCode<91)||(event.charCode>96&&event.charCode<123)||(event.charCode==32)\" name=\"G5\" id=\"G5\" maxlength=\"1\" /></td>\n";
    echo "            </tr>\n";
  }
  else {
    $letters_array = str_split($word[$i+1]);
    $L1=$letters_array[0];
    $L2=$letters_array[1];
    $L3=$letters_array[2];
    $L4=$letters_array[3];
    $L5=$letters_array[4];
    $R1=$secret_word[0];
    $R2=$secret_word[1];
    $R3=$secret_word[2];
    $R4=$secret_word[3];
    $R5=$secret_word[4];
    $score=0;

    if (strpos($secret_word,$L1)!==false) {
      if ($L1==$R1) { $C1=$green; $score++; } else $C1=$yellow;
    } else $C1=$gray;

    if (strpos($secret_word,$L2)!==false) {
      if ($L2==$R2) { $C2=$green; $score++; } else $C2=$yellow;
      } else $C2=$gray;

    if (strpos($secret_word,$L3)!==false) {
      if ($L3==$R3) { $C3=$green; $score++; } else $C3=$yellow;
      } else $C3=$gray;

    if (strpos($secret_word,$L4)!==false) {
      if ($L4==$R4) { $C4=$green; $score++; } else $C4=$yellow;
    } else $C4=$gray;

    if (strpos($secret_word,$L5)!==false) {
      if ($L5==$R5) { $C5=$green; $score++; } else $C5=$yellow;
    } else $C5=$gray;

if ($i>$row) { $C1=$black; $C2=$black; $C3=$black; $C4=$black; $C5=$black; }

    echo "            <tr>\n";
    echo "              <td><input type=\"text\" class=\"form-control text-center\" style=\"width: 40px; color: $white; background: $C1\" value='$L1' readonly /></td>\n";
    echo "              <td><input type=\"text\" class=\"form-control text-center\" style=\"width: 40px; color: $white; background: $C2\" value='$L2' readonly /></td>\n";
    echo "              <td><input type=\"text\" class=\"form-control text-center\" style=\"width: 40px; color: $white; background: $C3\" value='$L3' readonly /></td>\n";
    echo "              <td><input type=\"text\" class=\"form-control text-center\" style=\"width: 40px; color: $white; background: $C4\" value='$L4' readonly /></td>\n";
    echo "              <td><input type=\"text\" class=\"form-control text-center\" style=\"width: 40px; color: $white; background: $C5\" value='$L5' readonly /></td>\n";
    echo "            </tr>\n";
  }
  if ($score==5) {
    echo "<div class=\"alert alert-success text-center mb-3\" role=\"alert\" style=\"width: 200px; margin: auto\">Congratulations!</div>\n";
    break;
  }
}
$row++;
?>
          </tbody>
        </table>
      </div>
      <div class="mx-auto mt-4 mb-4"style="width: 200px;">
        <input type="hidden" name="row" value="<?php echo $row ?>"/>
        <input type="hidden" name="word_history" value="<?php echo $word_history ?>"/>
        <input type="hidden" name="submit" value="submit"/>
        <input type="hidden" name="secret_word" value="<?php if (isset($secret_word)) echo $secret_word; ?>"/>
        <button class="btn btn-primary btn-lg" name ="submit" onclick="document.forms[0].submit()">Check</button>
        <button class="btn btn-warning btn-md" name="reset" onclick="window.open('<?php echo $_SERVER['PHP_SELF']?>','_self')">New game</button>
      </div>
    </form>
    <div class="card text-center" style="background: <?php echo $black ?>; color: <?php echo $white ?>">
      <div class="card-header">
        Massimo Bottelli &gt; <a href="https://massimobottelli.it/progetti-didattici/wordle/wordle.php">Wordle</a>
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
    			<footer class="blockquote-footer"><small>&copy; Copyright 2022 - All rights reserved</footer>
        </blockquote>
      </div>
    </div>

    </div>
    </body>
    </html>
