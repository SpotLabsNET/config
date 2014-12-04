<?php

namespace Openclerk;

class Config {
  static $values = array();

  static function get($key, $default = null) {
    if (isset(Config::$values[$key])) {
      return Config::$values[$key];
    } else {
      if (empty(Config::$values[$key])) {
        throw new ConfigException("Site configuration has not been initialised");
      } else if ($default !== null) {
        return $default;
      } else {
        throw new ConfigException("No site configuration value found for '$key'");
      }
    }
  }

  // TODO merge
  // TODO load from JSON
}
