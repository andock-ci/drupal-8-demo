<?php

namespace Drupal\ui_patterns;

use Drupal\Component\Plugin\PluginManagerInterface;

/**
 * Defines an interface for ui_patterns managers.
 */
interface UiPatternsManagerInterface extends PluginManagerInterface {

  /**
   * Get a fully instantiated pattern object.
   *
   * @param string $id
   *    Pattern ID.
   *
   * @return \Drupal\ui_patterns\UiPatternBase
   *    Pattern object instance.
   */
  public function getPattern($id);

  /**
   * Get pattern definition object.
   *
   * @param array $definition
   *    Pattern definition array.
   *
   * @return \Drupal\ui_patterns\Plugin\DataType\Pattern
   *    Pattern definition object.
   */
  public function getPatternDefinition(array $definition);

  /**
   * Return list of available patterns to be used as select options.
   *
   * @return array
   *    List of available patterns.
   */
  public function getPatternsOptions();

  /**
   * Build and return pattern theme definitions.
   *
   * @return array
   *    Theme definitions.
   *
   * @see ui_patterns_theme()
   */
  public function hookTheme();

  /**
   * Get patterns library info.
   *
   * @return array
   *   Array of libraries as expected by hook_library_info_build().
   *
   * @see hook_library_info_build()
   * @see ui_patterns_library_info_build()
   */
  public function hookLibraryInfoBuild();

  /**
   * Check whereas the given theme hook is an actual pattern hook.
   *
   * @param string $hook
   *    Theme hook.
   *
   * @return bool
   *    Whereas the given theme hook is an actual pattern hook.
   */
  public function isPatternHook($hook);

}
