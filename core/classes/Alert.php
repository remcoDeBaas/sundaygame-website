<?php

class Alert
{
    //Properties
    private $_type;
    private $_title;
    private $_text;

    //Constructor
    public function __construct($type, $title, $text)
    {
        $this->setType($type);
        $this->setTitle($title);
        $this->setText($text);
    }

    //Methods
    public function createAlert()
    {   
        //Variabelen krijgen waarde van de get methods
        $alertType = $this->getType();
        $alertTitle = $this->getTitle();
        $alertText = $this->getText();

        return '<div class="alert alert-'.$alertType.' alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>'.$alertTitle.'</strong> '.$alertText.'
      </div>
      <script>
        $(".alert").alert();
      </script>';
    }

    
     
    //Setter en getters
    public function setType($type)
    {
        $this->_type = $type;
    }
    public function setTitle($title)
    {
        $this->_title = $title;
    }
    public function setText($text)
    {
        $this->_text = $text;
    }
    public function getType()
    {
        return $this->_type;
    }
    public function getTitle()
    {
        return $this->_title;
    }
    public function getText()
    {
        return $this->_text;
    }
}

?>

<div class="alert alert-warning alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong></strong> 
</div>

