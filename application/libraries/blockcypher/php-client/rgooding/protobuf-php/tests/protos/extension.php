<?php
// DO NOT EDIT! Generated by Protobuf-PHP protoc plugin @package_version@
// Source: extension.proto
//   Date: 2012-09-19 15:03:23

namespace tests {

  class ExtA extends \DrSlump\Protobuf\Message {

    /**  @var string */
    public $first = null;
    

    /** @var \Closure[] */
    protected static $__extensions = array();

    public static function descriptor()
    {
      $descriptor = new \DrSlump\Protobuf\Descriptor(__CLASS__, 'tests.ExtA');

      // OPTIONAL STRING first = 1
      $f = new \DrSlump\Protobuf\Field();
      $f->number    = 1;
      $f->name      = "first";
      $f->type      = \DrSlump\Protobuf::TYPE_STRING;
      $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
      $descriptor->addField($f);

      foreach (self::$__extensions as $cb) {
        $descriptor->addField($cb(), true);
      }

      return $descriptor;
    }

    /**
     * Check if <first> has a value
     *
     * @return boolean
     */
    public function hasFirst(){
      return $this->_has(1);
    }
    
    /**
     * Clear <first> value
     *
     * @return \tests\ExtA
     */
    public function clearFirst(){
      return $this->_clear(1);
    }
    
    /**
     * Get <first> value
     *
     * @return string
     */
    public function getFirst(){
      return $this->_get(1);
    }
    
    /**
     * Set <first> value
     *
     * @param string $value
     * @return \tests\ExtA
     */
    public function setFirst( $value){
      return $this->_set(1, $value);
    }
  }
}

namespace tests {

  class ExtB extends \DrSlump\Protobuf\Message {


    /** @var \Closure[] */
    protected static $__extensions = array();

    public static function descriptor()
    {
      $descriptor = new \DrSlump\Protobuf\Descriptor(__CLASS__, 'tests.ExtB');

      foreach (self::$__extensions as $cb) {
        $descriptor->addField($cb(), true);
      }

      return $descriptor;
    }
  }
}

namespace {
  \tests\ExtA::extension(function(){
      // OPTIONAL STRING tests\ExtB\second = 2
    $f = new \DrSlump\Protobuf\Field();
    $f->number    = 2;
    $f->name      = "tests\ExtB\second";
    $f->type      = \DrSlump\Protobuf::TYPE_STRING;
    $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
    return $f;
  });
}