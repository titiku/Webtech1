
<?php

$a=password_hash("1234", PASSWORD_DEFAULT);

$b=password_hash("1234", PASSWORD_DEFAULT);
echo "$a";
echo "<br>";
echo "$b";
echo "<br>";

 if(password_verify('1234', '$2y$10$voTHkMzmcS6fLIs4Ny0Kqu3Lyl4gxR69wFZoCoe8bEmd6lpVUXOb.')){
   echo "true";
 }else{
   echo "false";
 }
 ?>
