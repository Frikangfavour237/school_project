
        
    <?php
session_start();
session_unset();
session_destroy();
header('Location: ../signup&signin/Signin.php');
exit();
