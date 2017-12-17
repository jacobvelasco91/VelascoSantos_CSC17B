<?php
//This class will instaniate a NewUser object with POST form information | sanitized: yes
class NewUser {
  private $firstname;
  private $lastname;
  private $email;
  private $password;
  public $Conn;
//passing into this class the connection | connection is used to securely sanitize input
  public function __construct ($conn){
  $this->Conn = $conn;
  }
//Setting the values from form
  public function setFirstname() {
    $this->firstname = $this->clean_input($this->Conn,$_POST['firstname']);
  }
  public function setLastname() {
    $this->lastname = $this->clean_input($this->Conn,$_POST['lastname']);
  }
  public function setEmail() {
    $this->email = $this->clean_input($this->Conn,$_POST['email']);
  }
  public function setPassword() {
    //password has been hashed | compare w/password_verify
    $this->password = password_hash(trim($_POST['password']),PASSWORD_DEFAULT);
  }
  public function getFirstname(){
    $this->setFirstname();
    return $this->firstname;
  }
  public function getLastname(){
    $this->setLastname();
    return $this->lastname;
  }
  public function getEmail(){
    $this->setEmail();
    return $this->email;
  }
  public function getPassword(){
    $this->setPassword();
    return $this->password;
  }
//cleans input | requires database connection  | html tags,whitespace: removed
  public function clean_input ($conn,$input){
    $input = mysqli_real_escape_string($conn,strip_tags(trim($input)));
    return $input;
  }
}
 ?>
