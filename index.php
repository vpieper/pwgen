<html>
<head>
<title>~PWGEN</title>
<body>
<font size="4">
<i>~PWGEN~ by Vincent</i>
</font>

<?php
$alpha = "abcdefghijklmnopqrstuvwxyz"; //Lower Case Letters: (a-z)
$alpha_upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; //Upper Case Letters: (A-Z)
$numeric = "0123456789"; //Numbers: (0-9)
$special = "~`!@#$%^&*()_-+={[}]|\":;'<,>.?/\\"; //Special Characters or Symbols
$chars = "";
 
if (isset($_POST['length'])){
    // if you want a form like above
    if (isset($_POST['alpha_lower_include']) && $_POST['alpha_lower_include'] == 'yes')
        $chars .= $alpha;
     
    if (isset($_POST['alpha_upper_include']) && $_POST['alpha_upper_include'] == 'yes')
        $chars .= $alpha_upper;
     
    if (isset($_POST['number_include']) && $_POST['number_include'] == 'yes')
        $chars .= $numeric;
     
    if (isset($_POST['symbol_include']) && $_POST['symbol_include'] == 'yes')
        $chars .= $special;
     
    $length = $_POST['length'];
}else{
    $chars = $alpha . $alpha_upper . $numeric;
    $length = 12;
}
 
$len = strlen($chars);
$pw = '';
 
for ($i=0;$i<$length;$i++)
        $pw .= substr($chars, rand(0, $len-1), 1);
 
$pw = str_shuffle($pw);

?>
<form method="post" action="">                

  <p>
    Include Alpha Uppercase (A-Z): <select name="alpha_upper_include" id="alpha_upper_include">
    <?php
    $alpha_upper_include = array( 'yes' => "Yes", 'no' => "No" );
    foreach( $alpha_upper_include as $key => $val ):
    $selected = '';
    if( $key == $_POST['alpha_upper_include'] ) {
      $selected = 'selected="selected"';            
    }
    ?>
    <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
    <?php
    endforeach;
    ?> 
    </select>
  </p>
  
  <p>
    Include Alpha Lowercase (a-z): <select name="alpha_lower_include" id="alpha_lower_include">
    <?php
    $alpha_lower_include = array( 'yes' => "Yes", 'no' => "No" );
    foreach( $alpha_lower_include as $key => $val ):
    $selected = '';
    if( $key == $_POST['alpha_lower_include'] ) {
      $selected = 'selected="selected"';            
    }
    ?>
    <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
    <?php
    endforeach;
    ?> 
    </select>
  </p>
  
  <p>
    Include Number (0-9): <select name="number_include" id="number_include">
    <?php
    $number_include = array( 'yes' => "Yes", 'no' => "No" );
    foreach( $number_include as $key => $val ):
    $selected = '';
    if( $key == $_POST['number_include'] ) {
      $selected = 'selected="selected"';            
    }
    ?>
    <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
    <?php
    endforeach;
    ?> 
    </select>
  </p>
  
  <p>
    Include Symbol: <select name="symbol_include" id="symbol_include">
    <?php
    $symbol_include = array( 'yes' => "Yes", 'no' => "No" );
    foreach( $symbol_include as $key => $val ):
    $selected = '';
    if( $key == $_POST['symbol_include'] ) {
      $selected = 'selected="selected"';            
    }
    ?>
    <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
    <?php
    endforeach;
    ?> 
    </select>
  </p>
  
  <?php
  $length = ( empty($_POST['length']) ) ? 12 : $_POST['length'] ;
  ?>
  <p>Password Length: <input type="text" name="length" value="<?php echo $length; ?>" /></p>
  
  <input type="submit" name="submit" value="Generate Password" />
  </form>
  
  
  Password: <?php echo $pw; ?>
</body>
</head>
</html>
