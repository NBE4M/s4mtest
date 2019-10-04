<?php
// DO NOT EDIT! Generated by Protobuf-PHP protoc plugin 1.0
// Source: google/type/color.proto
//   Date: 2016-11-23 22:55:01

namespace google\type {

  class Color extends \DrSlump\Protobuf\Message {

    /**  @var float */
    public $red = null;
    
    /**  @var float */
    public $green = null;
    
    /**  @var float */
    public $blue = null;
    
    /**  @var \google\protobuf\FloatValue */
    public $alpha = null;
    

    /** @var \Closure[] */
    protected static $__extensions = array();

    public static function descriptor()
    {
      $descriptor = new \DrSlump\Protobuf\Descriptor(__CLASS__, 'google.type.Color');

      // OPTIONAL FLOAT red = 1
      $f = new \DrSlump\Protobuf\Field();
      $f->number    = 1;
      $f->name      = "red";
      $f->type      = \DrSlump\Protobuf::TYPE_FLOAT;
      $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
      $descriptor->addField($f);

      // OPTIONAL FLOAT green = 2
      $f = new \DrSlump\Protobuf\Field();
      $f->number    = 2;
      $f->name      = "green";
      $f->type      = \DrSlump\Protobuf::TYPE_FLOAT;
      $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
      $descriptor->addField($f);

      // OPTIONAL FLOAT blue = 3
      $f = new \DrSlump\Protobuf\Field();
      $f->number    = 3;
      $f->name      = "blue";
      $f->type      = \DrSlump\Protobuf::TYPE_FLOAT;
      $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
      $descriptor->addField($f);

      // OPTIONAL MESSAGE alpha = 4
      $f = new \DrSlump\Protobuf\Field();
      $f->number    = 4;
      $f->name      = "alpha";
      $f->type      = \DrSlump\Protobuf::TYPE_MESSAGE;
      $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
      $f->reference = '\google\protobuf\FloatValue';
      $descriptor->addField($f);

      foreach (self::$__extensions as $cb) {
        $descriptor->addField($cb(), true);
      }

      return $descriptor;
    }

    /**
     * Check if <red> has a value
     *
     * @return boolean
     */
    public function hasRed(){
      return $this->_has(1);
    }
    
    /**
     * Clear <red> value
     *
     * @return \google\type\Color
     */
    public function clearRed(){
      return $this->_clear(1);
    }
    
    /**
     * Get <red> value
     *
     * @return float
     */
    public function getRed(){
      return $this->_get(1);
    }
    
    /**
     * Set <red> value
     *
     * @param float $value
     * @return \google\type\Color
     */
    public function setRed( $value){
      return $this->_set(1, $value);
    }
    
    /**
     * Check if <green> has a value
     *
     * @return boolean
     */
    public function hasGreen(){
      return $this->_has(2);
    }
    
    /**
     * Clear <green> value
     *
     * @return \google\type\Color
     */
    public function clearGreen(){
      return $this->_clear(2);
    }
    
    /**
     * Get <green> value
     *
     * @return float
     */
    public function getGreen(){
      return $this->_get(2);
    }
    
    /**
     * Set <green> value
     *
     * @param float $value
     * @return \google\type\Color
     */
    public function setGreen( $value){
      return $this->_set(2, $value);
    }
    
    /**
     * Check if <blue> has a value
     *
     * @return boolean
     */
    public function hasBlue(){
      return $this->_has(3);
    }
    
    /**
     * Clear <blue> value
     *
     * @return \google\type\Color
     */
    public function clearBlue(){
      return $this->_clear(3);
    }
    
    /**
     * Get <blue> value
     *
     * @return float
     */
    public function getBlue(){
      return $this->_get(3);
    }
    
    /**
     * Set <blue> value
     *
     * @param float $value
     * @return \google\type\Color
     */
    public function setBlue( $value){
      return $this->_set(3, $value);
    }
    
    /**
     * Check if <alpha> has a value
     *
     * @return boolean
     */
    public function hasAlpha(){
      return $this->_has(4);
    }
    
    /**
     * Clear <alpha> value
     *
     * @return \google\type\Color
     */
    public function clearAlpha(){
      return $this->_clear(4);
    }
    
    /**
     * Get <alpha> value
     *
     * @return \google\protobuf\FloatValue
     */
    public function getAlpha(){
      return $this->_get(4);
    }
    
    /**
     * Set <alpha> value
     *
     * @param \google\protobuf\FloatValue $value
     * @return \google\type\Color
     */
    public function setAlpha(\google\protobuf\FloatValue $value){
      return $this->_set(4, $value);
    }
  }
}

