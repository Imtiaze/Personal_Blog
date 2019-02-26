<?php

class Session{

  public static function  init() {
    session_start();
  }

  public static function set($key, $value) {
    $_SESSION[$key] = $value;
  }
  public static function get($key) {
    if(isset($_SESSION[$key])) {
      return  $_SESSION[$key];
    }
    else {
      return false;
    }
  }

  public function loginSession() {
    if(Session::get('login') == true) {
      header('Location:index.php');
    }
  }
  // public function loginCheck() {
  //   if(Session::get('login') == false) {
  //     header('Location:login.php');
  //   }
  // }

  public static function checkSession() {
    self::init();
    if(self::get('login') == false) {
      self:: destroy();
      header("Location:login.php");
    }
  }

  public static function destroy() {
    session_destroy();
    header("Location:login.php");
  }


}
