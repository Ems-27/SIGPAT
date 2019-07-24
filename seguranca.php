
<?php 

if( isset( $_GET[ 'Submit' ] ) ) { 
    // Check Anti-CSRF token 
    checkToken( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], 'index.php' ); 

    // Get input 
    $id = $_GET[ 'id' ]; 

    // Was a number entered? 
    if(is_numeric( $id )) { 
        // Check the database 
        $data = $db->prepare( 'SELECT prinome, email FROM utilizador WHERE user_id = (:id) LIMIT 1;' ); 
        $data->bindParam( ':id', $id, PDO::PARAM_INT ); 
        $data->execute(); 
        $row = $data->fetch(); 

        // Make sure only 1 result is returned 
        if( $data->rowCount() == 1 ) { 
            // Get values 
            $nome = $row[ 'prinome' ]; 
            $email  = $row[ 'email' ]; 

           
        } 
    } 
} 

// Generate Anti-CSRF token 
generateSessionToken(); 

?> 
