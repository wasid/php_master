<?php 

// echo password_hash("secret", PASSWORD_BCRYPT, array('cost' => 12) );
echo password_hash("secret", PASSWORD_DEFAULT, array('cost' => 10) );

?>