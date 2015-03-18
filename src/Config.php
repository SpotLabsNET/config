<?php

namespace Openclerk;

class Config {
  static $values = array();

  /**
   * Get the runtime site configuration variable named {@code $key}.
   * @throws ConfigException if config has not been initialised or there is no valid key (and no default has been provided)
   */
  static function get($key, $default = null) {
    if (isset(Config::$values[$key])) {
      return Config::$values[$key];
    } else {
      if (Config::isEmpty()) {
        throw new ConfigException("Site configuration has not been initialised for '$key'");
      } else if ($default !== null) {
        return $default;
      } else {
        throw new ConfigException("No site configuration value found for '$key'");
      }
    }
  }

  static function has($key) {
    return isset(Config::$values[$key]);
  }

  /**
   * If the input arrays have the same string keys, then the earlier value for that key will not be overwritten.
   * @see #overwrite()
   */
  static function merge($values) {
    Config::$values += $values;
  }

  /**
   * If the input arrays have the same string keys, then the later value for that key will overwrite the previous one.
   * @see #merge()
   */
  static function overwrite($values) {
    Config::$values = array_merge(Config::$values, $values);
  }

  /**
   * Has configuration not been initialised yet - i.e. there have been no calls to
   * {@link Config#merge()} or {@link Config#overwrite()}?
   */
  static function isEmpty() {
    return empty(Config::$values);
  }

  // TODO load from JSON?
}
