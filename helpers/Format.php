<?php


class Format {

  public function formatDate($date) {
    return date('F j, Y, D g:i a', strtotime($date));
  }

  public function formatPost($postBody, $limit=400) {
    $postBody = $postBody." ";
    $postBody = substr($postBody, 0, $limit);
    $postBody = substr($postBody, 0, strrpos($postBody, ' '));
    $postBody = $postBody."...";
    return $postBody;
  }

  public function validate($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);

    return $data;
  }



}
