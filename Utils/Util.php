<?php
class Util {
  private $title;
  private $message;
  private $topic;

  // Message playload
  private $data;
  /**Flag indicating wheather to show the push notification or not.
  This flag will be useful when perform some operation in in background
  when push is recevied
  **/

  private $is_background;

  public function __construct(){
    //
  }

  public function setTitle($title){
    $this->title = $title;
  }

  public function setMessage($message){
    $this->message = $message;
  }

  public function setTopic($topic){
    $this->topic = $topic;
  }

  public function setPayload($data) {
      $this->data = $data;
  }
  public function setIsBackground($is_background) {
      $this->is_background = $is_background;
  }

  public function getUtils() {
      $res = array();
      $res['data']['title'] = $this->title;
      $res['data']['message'] = $this->message;
      $res['data']['topic'] = $this->topic;
      $res['data']['is_background'] = $this->is_background;
      $res['data']['payload'] = $this->data;
      $res['data']['timestamp'] = date('Y-m-d G:i:s');
      return $res;
  }
}

?>
