<!DOCTYPE HTML>
<html>
<head>
    <title>Tip Calculator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
         body{
            border: 1px solid black;
            margin: 25px;
            width: 280px;
            height: auto;
         }
    </style>
</head>
<body>

<?php
  $total = $tip = $customs = $split = "";
  $y = 0.01;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $total = test_input($_POST["total"]);
  $tip = test_input($_POST["percentage"]);
  $customs = test_input($_POST["customs"]);
  $split = test_input($_POST["split"]);
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2 style="text-align:center;" >Tip Calculator</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Bill Total $: <input type="int" name="total">
  <br><br>
  Tip Percentage:<br><br>
        <?php
          for($x=10; $x<=20; $x+=5){
         ?>
           <input type="radio" name="percentage" value="<?php echo $x*$y; ?>"><?php echo "$x% ";?>

         <?php 
          }
         ?>
         <br>
        <input type="radio" name="percentage" value=$customs>Custom: <input type="float" name="customs">%
         <br><br>
         Split:<input text="int" name="split">person(s)
   <br><br>
   <input type="submit" name="submit" value="Submit">
</form>

<?php
global $s;
echo "<h2>Result:</h2>";
if($tip * $total > 0){
echo "Tip:  "; 
echo "$";
echo number_format($tip * $total,2,'.','');
echo "<br>";
echo "<br>";
echo "Total:  ";
echo "$";
echo number_format($total + ($tip*$total),2,'.','');
if($split > 1){
$s = 1/$split;
echo "<br>";
echo "<br>";
echo "Tip each:  ";
echo "$";
echo number_format($tip * $total * $s,2,'.','');
echo "<br>";
echo "<br>";
echo "Total each:  ";
echo "$";
echo number_format((($tip*$total)+$total)*$s,2,'.','');
}
}
if($customs*$y*$total > 0){
echo "Tip:  ";
echo "$";
echo number_format(($customs*$y)*$total,2,'.','');
echo "<br>";
echo "<br>";
echo "Total:  ";
echo "$";
echo number_format(($customs*$y)*$total + $total,2,'.','');
if($split > 1){
$s = 1/$split;
echo "<br>";
echo "<br>";
echo "Tip each:  ";
echo "$";
echo number_format((($customs*$y)*$total)*$s,2,'.','');
echo "<br>";
echo "<br>";
echo "Total each:  ";
echo "$";
echo number_format((($customs*$y*$total)+$total)*$s,2,'.','');
}
}

?>

</body>
</html>
