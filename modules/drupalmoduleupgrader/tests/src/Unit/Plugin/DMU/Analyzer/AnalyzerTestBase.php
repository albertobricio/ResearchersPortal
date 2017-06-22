<?php

namespace Drupal\Tests\drupalmoduleupgrader\Unit\Plugin\DMU\Analyzer;

use Drupal\Tests\drupalmoduleupgrader\Unit\TestBase;

abstract class AnalyzerTestBase extends TestBase {

  /**
   * @var \Drupal\drupalmoduleupgrader\AnalyzerInterface
   */
  protected $analyzer;

  /**
   * {@inheritdoc}
   */
  protected function getPlugin(array $configuration = [], $plugin_definition = []) {
    $plugin_definition += [
      'message' => $this->getRandomGenerator()->sentences(4),
      'summary' => NULL,
      'documentation' => [],
      'tags' => [],
    ];
    return parent::getPlugin($configuration, $plugin_definition);
  }

  /**
   * Tests an issue generated by an analyzer to ensure that it has all the
   * default values pulled from the plugin definition.
   *
   * @param $issue
   *  The issue to test. Will be checked for IssueInterface conformance.
   */
  protected function assertIssueDefaults($issue) {
    $this->assertInstanceOf('\Drupal\drupalmoduleupgrader\IssueInterface', $issue);

    $plugin_definition = $this->analyzer->getPluginDefinition();
    $this->assertEquals($plugin_definition['message'], $issue->getTitle());
    $this->assertEquals($plugin_definition['summary'], $issue->getSummary());
    $this->assertSame($issue->getDocumentation(), $plugin_definition['documentation']);
  }

}
