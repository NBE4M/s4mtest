<?php
// DO NOT EDIT! Generated by Protobuf for PHP protoc plugin @package_version@
// Source: php.proto
//   Date: 2011-03-20 01:27:38

namespace {

  \google\protobuf\FileOptions::extension(function(){
      // optional  php.namespace = 50002
    $f = new \DrSlump\Protobuf\Field();
    $f->number    = 50102;
    $f->name      = "json.namespace";
    $f->type      = 9;
    $f->rule      = 1;
    return $f;
  });
  \google\protobuf\FileOptions::extension(function(){
      // optional  php.suffix = 50003
    $f = new \DrSlump\Protobuf\Field();
    $f->number    = 50103;
    $f->name      = "json.suffix";
    $f->type      = 9;
    $f->rule      = 1;
    $f->default   = ".pb.js";
    return $f;
  });
}
