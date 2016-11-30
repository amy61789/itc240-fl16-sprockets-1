<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>
		<h1>Contact Us</h1> 
        
<?php
//postback2.php

/*echo '<pre>';
var_dump($_SERVER);
echo '</pre>';
die;*/

/*echo $_SERVER['PHP_SELF'];
die;*/

/*echo basename($_SERVER['PHP_SELF']);
die;*/

//define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

/*echo THIS_PAGE;
die;*

/*

' . xxx . '

*/

if (isset($_POST['First_Name']))
{ 
    //echo $_POST['FirstName'];
/*    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';*/
    
    
$to      = 'afunk002@seattlecentral.edu';
$subject = 'ITC240 Contact Form';
$message = process_post();
$replyTo = $_POST['Email'];
$headers = 'From: noreply@seattlecentral.edu' . PHP_EOL .
    'Reply-To: ' . $replyTo . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

    
    echo '<p>
    <a href="' . THIS_PAGE . '">EXIT</a>
    </p>';
}else {
    echo '
    <form action="' . THIS_PAGE . '" method="post">
First Name: <input type="text" name="First_Name" required="required" autofocus="autofocus" title="First Name Is Required" placeholder="First Name Goes Here"/><br/>
Email: <input type="email" name="Email" required="required" /><br/>
Comments: <textarea name="Comments"></textarea><br/>
<input type="submit" value="Click Me"/>
</form>
    ';
}

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}
?>


<?php include 'includes/footer.php'; ?>
