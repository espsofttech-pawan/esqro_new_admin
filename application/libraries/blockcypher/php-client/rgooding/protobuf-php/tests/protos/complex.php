<?php
// DO NOT EDIT! Generated by Protobuf-PHP protoc plugin @package_version@
// Source: complex.proto
//   Date: 2011-10-04 14:21:14

namespace tests\Complex {

  class Enum extends \DrSlump\Protobuf\Enum {
    const FOO = 1;
    const BAR = 2;
    const BAZ = 10;
  }
}
namespace tests\Complex {

  class Nested extends \DrSlump\Protobuf\Message {

    /**  @var string */
    public $foo = null;
    

    /** @var \Closure[] */
    protected static $__extensions = array();

    public static function descriptor()
    {
      $descriptor = new \DrSlump\Protobuf\Descriptor(__CLASS__, 'tests.Complex.Nested');

      // OPTIONAL STRING foo = 1
      $f = new \DrSlump\Protobuf\Field();
      $f->number    = 1;
      $f->name      = "foo";
      $f->type      = \DrSlump\Protobuf::TYPE_STRING;
      $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
      $descriptor->addField($f);

      foreach (self::$__extensions as $cb) {
        $descriptor->addField($cb(), true);
      }

      return $descriptor;
    }

    /**
     * Check if <foo> has a value
     *
     * @return boolean
     */
    public function hasFoo(){
      return $this->_has(1);
    }
    
    /**
     * Clear <foo> value
     *
     * @return \tests\Complex\Nested
     */
    public function clearFoo(){
      return $this->_clear(1);
    }
    
    /**
     * Get <foo> value
     *
     * @return string
     */
    public function getFoo(){
      return $this->_get(1);
    }
    
    /**
     * Set <foo> value
     *
     * @param string $value
     * @return \tests\Complex\Nested
     */
    public function setFoo( $value){
      return $this->_set(1, $value);
    }
  }
}

namespace tests {

  class Complex extends \DrSlump\Protobuf\Message {

    /**  @var int - \tests\Complex\Enum */
    public $enum = null;
    
    /**  @var \tests\Complex\Nested */
    public $nested = null;
    

    /** @var \Closure[] */
    protected static $__extensions = array();

    public static function descriptor()
    {
      $descriptor = new \DrSlump\Protobuf\Descriptor(__CLASS__, 'tests.Complex');

      // OPTIONAL ENUM enum = 1
      $f = new \DrSlump\Protobuf\Field();
      $f->number    = 1;
      $f->name      = "enum";
      $f->type      = \DrSlump\Protobuf::TYPE_ENUM;
      $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
      $f->reference = '\tests\Complex\Enum';
      $descriptor->addField($f);

      // OPTIONAL MESSAGE nested = 2
      $f = new \DrSlump\Protobuf\Field();
      $f->number    = 2;
      $f->name      = "nested";
      $f->type      = \DrSlump\Protobuf::TYPE_MESSAGE;
      $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
      $f->reference = '\tests\Complex\Nested';
      $descriptor->addField($f);

      foreach (self::$__extensions as $cb) {
        $descriptor->addField($cb(), true);
      }

      return $descriptor;
    }

    /**
     * Check if <enum> has a value
     *
     * @return boolean
     */
    public function hasEnum(){
      return $this->_has(1);
    }
    
    /**
     * Clear <enum> value
     *
     * @return \tests\Complex
     */
    public function clearEnum(){
      return $this->_clear(1);
    }
    
    /**
     * Get <enum> value
     *
     * @return int - \tests\Complex\Enum
     */
    public function getEnum(){
      return $this->_get(1);
    }
    
    /**
     * Set <enum> value
     *
     * @param int - \tests\Complex\Enum $value
     * @return \tests\Complex
     */
    public function setEnum( $value){
      return $this->_set(1, $value);
    }
    
    /**
     * Check if <nested> has a value
     *
     * @return boolean
     */
    public function hasNested(){
      return $this->_has(2);
    }
    
    /**
     * Clear <nested> value
     *
     * @return \tests\Complex
     */
    public function clearNested(){
      return $this->_clear(2);
    }
    
    /**
     * Get <nested> value
     *
     * @return \tests\Complex\Nested
     */
    public function getNested(){
      return $this->_get(2);
    }
    
    /**
     * Set <nested> value
     *
     * @param \tests\Complex\Nested $value
     * @return \tests\Complex
     */
    public function setNested(\tests\Complex\Nested $value){
      return $this->_set(2, $value);
    }
  }
}

