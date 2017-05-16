<?php

namespace Drupal\Tests\ui_patterns\Unit;

use Drupal\Component\FileCache\FileCacheFactory;
use Drupal\Tests\UnitTestCase;

/**
 * Class AbstractUiPatternsTest.
 *
 * @package Drupal\Tests\ui_patterns\Unit
 */
abstract class AbstractUiPatternsTest extends UnitTestCase {

  /**
   * Get full test extension path.
   *
   * @param string $name
   *    Test extension name.
   *
   * @return string
   *    Full test extension path.
   */
  protected function getExtensionsPath($name) {
    return realpath(dirname(__FILE__) . '/../fixtures/' . $name . '/');
  }

  /**
   * Get ModuleHandler mock.
   *
   * @return \Drupal\Core\Extension\ModuleHandlerInterface
   *    ModuleHandler mock.
   */
  protected function getModuleHandlerMock() {
    $module_handler = $this->createMock('Drupal\Core\Extension\ModuleHandlerInterface');
    $module_handler->method('getModuleDirectories')->willReturn($this->getModuleDirectoriesMock());

    $extension = $this->getExtensionMock();
    $module_handler->method('getModule')->willReturn($extension);
    $module_handler->method('moduleExists')->willReturn(TRUE);

    /** @var \Drupal\Core\Extension\ModuleHandlerInterface $module_handler */
    return $module_handler;
  }

  /**
   * Get Extension mock.
   *
   * @return \Drupal\Core\Extension\Extension
   *    Extension mock.
   */
  protected function getExtensionMock() {
    $extension = $this->getMockBuilder('Drupal\Core\Extension\Extension')
      ->disableOriginalConstructor()
      ->getMock();
    $extension->method('getPath')->willReturn($this->getExtensionsPath('module'));

    /** @var \Drupal\Core\Extension\Extension $extension */
    return $extension;
  }

  /**
   * Get CacheBackend mock.
   *
   * @return \Drupal\Core\Cache\CacheBackendInterface
   *    CacheBackend mock.
   */
  protected function getCacheBackendMock() {
    FileCacheFactory::setPrefix('something');
    $cache_backend = $this->createMock('Drupal\Core\Cache\CacheBackendInterface');

    /** @var \Drupal\Core\Cache\CacheBackendInterface $cache_backend */
    return $cache_backend;
  }

  /**
   * Get ThemeHandler mock.
   *
   * @return \Drupal\Core\Extension\ThemeHandlerInterface
   *    ThemeHandler mock.
   */
  protected function getThemeHandlerMock() {
    $theme_handler = $this->getMockBuilder('Drupal\Core\Extension\ThemeHandlerInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $theme_handler->method('getThemeDirectories')->willReturn($this->getDefaultAndBaseThemesDirectoriesMock());
    $theme_handler->method('themeExists')->willReturn(TRUE);
    $theme_handler->method('getDefault')->willReturn('theme');
    $theme_handler->method('listInfo')->willReturn([]);
    $theme_handler->method('getBaseThemes')->willReturn([
      'base_theme' => new \stdClass(),
    ]);

    /** @var \Drupal\Core\Extension\ThemeHandlerInterface $theme_handler */
    return $theme_handler;
  }

  /**
   * ModuleHandlerInterface::getModuleDirectories method mock.
   *
   * @return array
   *   Array with module names as keys and full paths as values.
   */
  protected function getModuleDirectoriesMock() {
    return [
      'module' => $this->getExtensionsPath('module'),
    ];
  }

  /**
   * UiPatternsDiscovery::getDefaultAndBaseThemesDirectories method mock.
   *
   * @return array
   *   Array with theme names as keys and full paths as values.
   */
  protected function getDefaultAndBaseThemesDirectoriesMock() {
    return [
      'theme' => $this->getExtensionsPath('theme'),
      'base_theme' => $this->getExtensionsPath('base_theme'),
    ];
  }

  /**
   * Get Loader mock.
   *
   * @return \Twig_Loader_Chain
   *    Loader mock.
   */
  protected function getLoaderMock() {
    $loader = $this->getMockBuilder('Twig_Loader_Chain')
      ->disableOriginalConstructor()
      ->getMock();

    /** @var \Twig_Loader_Chain $loader */
    return $loader;
  }

  /**
   * Get fixtures base path.
   *
   * @return string
   *    Fixtures base path.
   */
  protected function getFixturePath() {
    return realpath(dirname(__FILE__) . '/../fixtures');
  }

}
