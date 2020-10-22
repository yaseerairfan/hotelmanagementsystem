
<?php
include "connect.php";
$firstname=null;
$lastname=null;
$username=null;
$password=null;
$cnicno=null;
$email=null;
$option=null;
$phone=null;
$gender=null;
$fnameerror=null;
$lnameerror=null;
$emailerror=null;
$phoneerror=null;
$opterror=null;
$gendererror=null;
$namecheck="/^[a-zA-Z-' ]*$/";
$phonecheck='/^[0-9]{10}+$/';
$cniccheck='/^[0-9]{5}-[0-9]{7}-[0-9]$/';
$Uppercase ='@[A-Z]@';
$Lowercase ='@[a-z]@';
$Number    ='@[0-9]@';
class Uppercasepassword extends Exception{}
class Lowercasepassword extends Exception{}
class Numberpassword extends Exception{}
try{
    if(empty($_POST['usname']))
    {
        // echo"please enter your username";
        throw new Exception("please enter your username");
    } elseif (isset($_POST['usname']))
    {
        $username=$_POST['usname'];
        try{
            if($username!="yaseera")
        {
            // echo "Incorrect username";
            throw new Exception("Incorrect username");
        } else{
            echo "welcome $username";
        }
        }
        catch(Exception $inus){
            echo"<br>".$inus->getMessage();
        }
        
    }
}
catch(Exception $un){
    echo $un->getMessage();
}
try{
    if(empty($_POST['pass'])) 
    {
        // echo"please enter some password";
        throw new Exception("please enter some password");
    } elseif(isset($_POST['pass'])) 
    { try{
        $password=$_POST['pass'];
        if(!preg_match($Uppercase,$password)) 
        {
            // echo"your password must contain atleast 1 uppercase letter";
            throw new Uppercasepassword("your password must contain atleast 1 uppercase letter"); 
        } if(!preg_match($Lowercase,$password))
        {
            // echo"your password must contain atleast 1 lowercase letter";
            throw new Lowercasepassword("your password must contain atleast 1 lowercase letter");
        } if(!preg_match($Number,$password))
        {
            // echo"your password must contain atleast 1 digit";
            throw new Numberpassword("your password must contain atleast 1 digit");
        }
    }
    catch(Uppercasepassword $upp){
        echo"<br>".$upp->getMessage();
    }
    catch(Lowercasepassword $lpp){
        echo"<br>".$lpp->getMessage();
    }
    catch(Numberpassword $np) {
        echo"<br>".$np->getMessage();
    }  
    } 
}
catch(Exception $pass){
    echo"<br>" .$pass->getMessage();
} 
try{
    if(empty($_POST['fname'])){ 
     throw new Exception("please enter your first name");
        // echo"please enter your first name";
       } elseif(isset($_POST['fname']))
       {
           try{
            $firstname=$_POST['fname'];
            if(!preg_match($namecheck,$firstname))
            {
             $fnameerror="only enter letters";
             throw new Exception($fnameerror);
            //  echo "\n $fnameerror";
            } else
            {
             echo"\n firstname: $firstname";
            }
           }
           catch(Exception $fne){
               echo"<br>".$fne->getMessage();
           }
           
       }
}   
catch(Exception $fn){
    echo"<br>".$fn->getMessage();
} 
try{
    if(empty($_POST['lname'])) 
        {
            throw new Exception("please enter your last name");
            //  echo"please enter your last name";
           } elseif(isset($_POST['lname']))
           {
               $lastname=$_POST['lname'];
               if(!preg_match($namecheck,$lastname))
               {
                $lnameerror="only enter letters";
                echo "\n $lnameerror";
               } else
               {
                echo"\n lastname: $lastname";
               }
           }
}    
catch(Exception $ln){
    echo"<br>".$ln->getMessage();
}  
try{
    if (empty($_POST['email']))
        {
            $emailerror="please enter your emailaddress";
            throw new Exception($emailerror);
            // echo "\n $emailerror";
        } elseif(isset($_POST['email']))
           {
            try{
                $email=$_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailerror="please enter the valid email";
                // echo "\n $emailerror";
                throw new Exception($emailerror);
            } else{
                echo"\n your email: $email";
                }
            }
            catch(Exception $ee){
                echo "<br>".$ee->getMessage();
            }
            
    }
} 
catch(Exception $em){
    echo"<br>".$em->getMessage();
}
try{
    if(empty($_POST['cnic']))
    {
    // echo"please enter your cnic no";
    throw new Exception("please enter your cnic no");
    } elseif(isset($_POST['cnic']))
    {
        try{
            $cnicno=$_POST['cnic'];
            if(!preg_match($cniccheck, $cnicno))
            {
                // echo"\n CNIC No must follow the XXXXX-XXXXXXX-X format!";
                throw new Exception("\n CNIC No must follow the XXXXX-XXXXXXX-X format!");
            } else{
                echo"\n your cnic no: $cnicno";
            }  
        }
        catch(Exception $cc){
            echo"<br>".$cc->getMessage();
        }
     
    }
}
catch(Exception $cn){
    echo"<br>".$cn->getMessage();
}
try{
    if (empty($_POST['phone'])){
        $phoneerror="please enter your phone no";
        // echo "\n $phoneerror";
        throw new Exception($phoneerror);
    } elseif(isset($_POST['phone'])){
        try{
            $phone=$_POST['phone'];
            if(!preg_match($phonecheck, $phone))
            {
                $phoneerror="enter a valid phone no";
                // echo "\n $phoneerror";
                throw new Exception($phoneerror);

            } else{
                    echo"\n your phone no: $phone";
            }
        }
        catch(Exception $pp){
            echo"<br>".$pp->getMessage();
        }
    }
}
catch(Exception $ph){
    echo"<br>".$ph->getMessage();
} 
try{
    if (isset($_POST['option']))
    {
        try{
            $option=$_POST['option'];
            if(!ctype_alnum($option)){
                // echo "only alpha numeric values are allowed";
                throw new Exception("only alpha numeric values are allowed");
            } else{
                    echo"\n your room no: $option";
            }
        }
        catch(Exception $oo){
            echo"<br>".$oo->getMessage();
        }
        
    }else{
        $opterror="please select one of the option";
        // echo "\n $opterror";
        throw new Exception($opterror);
    }
} 
catch(Exception $op){
    echo"<br>".$op->getMessage();
} 
try{  
    if (!empty($_POST['Gender'])){
        $gender=$_POST['Gender'];
        echo "\n you are: $gender";
    }
    else{
        $gendererror="please select your gender";
        // echo "\n $gendererror";
        throw new Exception($gendererror);
    }

}  
catch(Exception $gn){
    echo"<br>".$gn->getMessage();
}   


    // insertion in database
$new_connection=new Connection('localhost','root','','hotelmanagementsystem','customes_info','3000');

try{
    if ($new_connection->new_connect()->query($new_connection->insert(array('firstname','lastname','username','password','room_no','gender','email','cnic','phone_no'),array("'$firstname'","'$lastname'","'$username'","'$password'","'$option'","'$gender'","'$email'","'$cnicno'",$phone)))){
        echo "\n new record inserted successfully";
        echo "\n Values are:(".$firstname.",".$lastname.",".$username.",".$password.",".$option.",".$gender.",".$email.",".$cnicno.",".$phone.")";
        
    
    }
    else{
        throw new Exception("Error: ". $new_connection->insert(array('firstname','lastname','username','password','room_no','gender','email','cnic','phone_no'),array($firstname,"'$lastname'","'$username'","'$password'","'$option'","'$gender'","'$email'","'$cnicno'","'$phone'")) ."
        ". $new_connection->new_connect()->error);
        
        }
    
}
catch(Exception $exc){
    echo $exc->getMessage();
}
finally{
    $new_connection->new_connect()->close();
}


?>




