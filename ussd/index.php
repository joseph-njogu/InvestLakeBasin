<?php
#We obtain the data which is contained in the post url on our server.
$text=$_POST['text'];
$phonenumber=$_POST['phoneNumber'];
$serviceCode=$_POST['serviceCode'];
$level = explode("*", $text);
if (isset($text)) {

    if ( $text == "" ) {
        $response="CON Welcome to the InvestLakeBasin portal.\nPlease enter you full name";
    }
    if(isset($level[0]) && $level[0]!="" && !isset($level[1])){
        $response="CON Hi ".$level[0].", enter your ID Number";

    }
    else if(isset($level[1]) && $level[1]!="" && !isset($level[2])){
        $response="CON Please enter you KRA Pin\n";
    }
    else if(isset($level[2]) && $level[2]!="" && !isset($level[3])){

        $response="CON Please enter your Nearest City\n";

    }
    else if(isset($level[3]) && $level[3]!="" && !isset($level[4])){
        $response="CON Please enter your farm's name\n";
    }
    else if(isset($level[4]) && $level[4]!="" && !isset($level[5])){
        $response="CON Please enter this month's Investment\n";
    }
    else if(isset($level[5]) && $level[5]!="" && !isset($level[6])){
        $response="CON Please enter this month's Profit \n";
    }
    else if(isset($level[6]) && $level[6]!="" && !isset($level[7])){
        //Save data to database
        $data=array(
            'phonenumber'=>$phonenumber,
            'fullname' =>$level[0],
            'electoral_ward' => $level[1],
            'national_id'=>$level[2]
        );
        $response="END Thank you ".$level[0]." for registering.\nWe will keep you updated";
    }
    header('Content-type: text/plain');
    echo $response;
}
?>
