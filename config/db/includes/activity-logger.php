<?php
    function logActivity($pdo,$user_id,$email,$action $status= 'success') {
    try{
        // get client IP address
        $ip_address = $_SERVER['HTTPS_X_FORWARDER_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
        
        //String to array
        if(strpos($ip, ',') !== false){
          $ip = trim(explode(',', $ip)[0]);    
        }

        // Get user agent (browser)
        $user_agent = substr($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown', 0, 255);

        // Application Query #1
        $stmt =$pdo -> prepare("
        INSERT INTO activity_logs(
            user_id,
            user_email,
            activity_log_action,
            activity_log_status,
            activity_log_status,
            activity_log_ip_address,
            activity_log_user_agent,
            ) VALUES ( ?, ?, ?, ?, ?, ?)
        ");
    } catch (PDOexception $e){
        error_log("activity Log Error: " . $e->getMessage());
        return false;
    }

    }
?>