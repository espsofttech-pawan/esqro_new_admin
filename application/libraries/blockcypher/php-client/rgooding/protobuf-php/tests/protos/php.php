<?php
// DO NOT EDIT! Generated by Protobuf-PHP protoc plugin @package_version@
// Source: php.proto
//   Date: 2011-10-04 14:32:12

namespace {
  \google\protobuf\FileOptions::extension(function(){
      // OPTIONAL STRING php\namespace = 50002
    $f = new \DrSlump\Protobuf\Field();
    $f->number    = 50002;
    $f->name      = "php\namespace";
    $f->type      = \DrSlump\Protobuf::TYPE_STRING;
    $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
    return $f;
  });
  \google\protobuf\FileOptions::extension(function(){
      // OPTIONAL STRING php\suffix = 50003
    $f = new \DrSlump\Protobuf\Field();
    $f->number    = 50003;
    $f->name      = "php\suffix";
    $f->type      = \DrSlump\Protobuf::TYPE_STRING;
    $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
    $f->default   = ".php";
    return $f;
  });
  \google\protobuf\FileOptions::extension(function(){
      // OPTIONAL BOOL php\multifile = 50004
    $f = new \DrSlump\Protobuf\Field();
    $f->number    = 50004;
    $f->name      = "php\multifile";
    $f->type      = \DrSlump\Protobuf::TYPE_BOOL;
    $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
    $f->default   = false;
    return $f;
  });
  \google\protobuf\FileOptions::extension(function(){
      // OPTIONAL BOOL php\generic_services = 50005
    $f = new \DrSlump\Protobuf\Field();
    $f->number    = 50005;
    $f->name      = "php\generic_services";
    $f->type      = \DrSlump\Protobuf::TYPE_BOOL;
    $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
    $f->default   = false;
    return $f;
  });
}