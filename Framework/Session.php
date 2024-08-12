<?php
namespace Framework;

class Session{

// Start a session if one is not already started
public static function start() {
  if(session_status() == PHP_SESSION_NONE){
    session_start();  //Starts a new session or resumes the existing session
  } 
}

  // Set a session variable with the given key and value
public static function set($key,$value){
  $_SESSION[$key] = $value;  // Store the value in the session with the specified key

}

 // Get the value of a session variable by key, or return the default value if the key doesn't exist
 
public static function get($key,$default = null){
return isset($_SESSION[$key]) ?  $_SESSION[$key] : $default;
  
 // If the session key exists, return its value; otherwise, return the default value
 
}


 // Check if a session variable with the given key exists
public static function has($key){
  return isset($_SESSION[$key]);
    // Returns true if the session key is set, false otherwise
   
  }

   // Remove a session variable by key
  public static function clear($key){
  if (isset($_SESSION[$key])){
      unset($_SESSION[$key]);
  }
  // Unsets or removes the session variable if it exists
     

    }

 // Clear all session variables and destroy the session
    public static function clearAll(){
      session_unset();
      session_destroy();
   }


    // Set a flash message
    public static function flash($key, $message) {
      $_SESSION['flash'][$key] = $message;
  }

  // Retrieve and clear a flash message
  public static function getFlash($key) {
      if (isset($_SESSION['flash'][$key])) {
          $message = $_SESSION['flash'][$key];
          unset($_SESSION['flash'][$key]);
          return $message;
      }
      return null;
  }

}

