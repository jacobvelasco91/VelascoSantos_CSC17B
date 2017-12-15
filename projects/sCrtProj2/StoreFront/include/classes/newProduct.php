<?php
//This class will instaniate a NewProduct object with POST form information | sanitized: yes
class NewProduct {
  private $pName;
  private $pType;
  private $pDescription;
  private $pImage;
  private $pPrice;
  public $Conn;
//passing into this class the connection | connection is used to securely sanitize input
  public function __construct ($conn){
  $this->Conn = $conn;
  }
//Setting the values from form
  public function setpName() {
    $this->pName = $this->clean_input($this->Conn,$_POST['product_name']);
  }
  public function setpType() {
    $this->pType = $this->clean_input($this->Conn,$_POST['product_type']);
  }
  public function setpDescription(){
    $this->pDescription = $this->clean_input($this->Conn,$_POST['product_description']);
  }
  public function setpImage(){
    $this->pImage = $this->clean_input($this->Conn,$_POST['product_image']);
  }
  public function setpPrice() {
    //password has been hashed | compare w/password_verify
    $this->pPrice = $this->clean_input($this->Conn,$_POST['product_price']);
  }
  public function getpName(){
    $this->setpName();
    return $this->pName;
  }
  public function getpType(){
    $this->setpType();
    return $this->pType;
  }
  public function getpDescription(){
    $this->setpDescription();
    return $this->pDescription;
  }
  public function getpImage(){
    $this->setpImage();
    return $this->pImage;
  }
  public function getpPrice(){
    $this->setpPrice();
    return $this->pPrice;
  }
//cleans input | requires database connection  | html tags,whitespace: removed
  public function clean_input ($conn,$input){
    $input = mysqli_real_escape_string($conn,strip_tags(trim($input)));
    return $input;
  }
}
 ?>
