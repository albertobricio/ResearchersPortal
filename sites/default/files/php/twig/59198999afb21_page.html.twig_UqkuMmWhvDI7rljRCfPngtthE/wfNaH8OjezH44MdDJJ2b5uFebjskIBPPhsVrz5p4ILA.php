<?php

/* themes/da_vinci/templates/layout/page.html.twig */
class __TwigTemplate_f698363f5472e0769a2c6dbc68aeb721fc209a4c3670add9841adeaf85556ba8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("if" => 52);
        $filters = array("t" => 51);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
                array('t'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 48
        echo "<div class=\"layout-container\">


  <header role=\"banner\" aria-label=\"";
        // line 51
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Site header")));
        echo "\">
    ";
        // line 52
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "top_bar", array())) {
            // line 53
            echo "      <div class=\"top-bar\">
        ";
            // line 54
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "top_bar", array()), "html", null, true));
            echo "
      </div>
    ";
        }
        // line 57
        echo "    <div class=\"site-header\">
      ";
        // line 58
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "secondary_menu", array())) {
            // line 59
            echo "        ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "secondary_menu", array()), "html", null, true));
            echo "
      ";
        }
        // line 61
        echo "      ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array()), "html", null, true));
        echo "
    <div>
  </header>

  ";
        // line 65
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array())) {
            // line 66
            echo "    ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array()), "html", null, true));
            echo "
  ";
        }
        // line 68
        echo "
  ";
        // line 69
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "primary_menu", array())) {
            // line 70
            echo "    ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "primary_menu", array()), "html", null, true));
            echo "
  ";
        }
        // line 72
        echo "
  ";
        // line 73
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "breadcrumb", array())) {
            // line 74
            echo "    ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "breadcrumb", array()), "html", null, true));
            echo "
  ";
        }
        // line 76
        echo "
  ";
        // line 77
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "featured_top", array())) {
            // line 78
            echo "    ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "featured_top", array()), "html", null, true));
            echo "
  ";
        }
        // line 80
        echo "
  ";
        // line 81
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array())) {
            // line 82
            echo "    ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array()), "html", null, true));
            echo "
  ";
        }
        // line 84
        echo "

  <main role=\"main\">
    <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 88
        echo "
    <div class=\"layout-content\">
      ";
        // line 90
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true));
        echo "
    </div>";
        // line 92
        echo "
    ";
        // line 93
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array())) {
            // line 94
            echo "      <aside class=\"layout-sidebar-first\" role=\"complementary\">
        ";
            // line 95
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array()), "html", null, true));
            echo "
      </aside>
    ";
        }
        // line 98
        echo "
    ";
        // line 99
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array())) {
            // line 100
            echo "      <aside class=\"layout-sidebar-second\" role=\"complementary\">
        ";
            // line 101
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array()), "html", null, true));
            echo "
      </aside>
    ";
        }
        // line 104
        echo "  </main>

  ";
        // line 106
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array())) {
            // line 107
            echo "    <footer class=\"site-footer\" role=\"complementary\">
      ";
            // line 108
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array()), "html", null, true));
            echo "
    </footer>
  ";
        }
        // line 111
        echo "
  ";
        // line 112
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_info", array())) {
            // line 113
            echo "    <footer class=\"site-footer\" role=\"contentinfo\">
      ";
            // line 114
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_info", array()), "html", null, true));
            echo "
    </footer>
  ";
        }
        // line 117
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "themes/da_vinci/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 117,  198 => 114,  195 => 113,  193 => 112,  190 => 111,  184 => 108,  181 => 107,  179 => 106,  175 => 104,  169 => 101,  166 => 100,  164 => 99,  161 => 98,  155 => 95,  152 => 94,  150 => 93,  147 => 92,  143 => 90,  139 => 88,  134 => 84,  128 => 82,  126 => 81,  123 => 80,  117 => 78,  115 => 77,  112 => 76,  106 => 74,  104 => 73,  101 => 72,  95 => 70,  93 => 69,  90 => 68,  84 => 66,  82 => 65,  74 => 61,  68 => 59,  66 => 58,  63 => 57,  57 => 54,  54 => 53,  52 => 52,  48 => 51,  43 => 48,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Theme override to display a single page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.html.twig template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - base_path: The base URL path of the Drupal installation. Will usually be
 *   \"/\" unless you have installed Drupal in a sub-directory.
 * - is_front: A flag indicating if the current page is the front page.
 * - logged_in: A flag indicating if the user is registered and signed in.
 * - is_admin: A flag indicating if the user has permission to access
 *   administration pages.
 *
 * Site identity:
 * - front_page: The URL of the front page. Use this instead of base_path when
 *   linking to the front page. This includes the language domain or prefix.
 *
 * Page content (in order of occurrence in the default page.html.twig):
 * - node: Fully loaded node, if there is an automatically-loaded node
 *   associated with the page and the node ID is the second argument in the
 *   page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - page.top_bar: Items for the top bar region.
 * - page.secondary_menu: Items for the secondary menu region.
 * - page.header: Items for the header region.
 * - page.highlighted: Items for the highlighted content region.
 * - page.primary_menu: Items for the primary menu region.
 * - page.breadcrumb: Items for the breadcrumb region.
 * - page.featured_top: Items for the featured top region.
 * - page.help: Dynamic help text, mostly for admin pages.
 * - page.content: The main content of the current page.
 * - page.sidebar_first: Items for the first sidebar.
 * - page.sidebar_second: Items for the second sidebar.
 * - page.footer: Items for the footer region.
 * - page.footer_info: Items for the Da Vinci footer region.
 *
 * @see template_preprocess_page()
 * @see html.html.twig
 */
#}
<div class=\"layout-container\">


  <header role=\"banner\" aria-label=\"{{ 'Site header'|t}}\">
    {% if page.top_bar %}
      <div class=\"top-bar\">
        {{ page.top_bar }}
      </div>
    {% endif %}
    <div class=\"site-header\">
      {% if page.secondary_menu %}
        {{ page.secondary_menu }}
      {% endif %}
      {{ page.header }}
    <div>
  </header>

  {% if page.highlighted %}
    {{ page.highlighted }}
  {% endif %}

  {% if page.primary_menu %}
    {{ page.primary_menu }}
  {% endif %}

  {% if page.breadcrumb %}
    {{ page.breadcrumb }}
  {% endif %}

  {% if page.featured_top %}
    {{ page.featured_top }}
  {% endif %}

  {% if page.help %}
    {{ page.help }}
  {% endif %}


  <main role=\"main\">
    <a id=\"main-content\" tabindex=\"-1\"></a>{# link is in html.html.twig #}

    <div class=\"layout-content\">
      {{ page.content }}
    </div>{# /.layout-content #}

    {% if page.sidebar_first %}
      <aside class=\"layout-sidebar-first\" role=\"complementary\">
        {{ page.sidebar_first }}
      </aside>
    {% endif %}

    {% if page.sidebar_second %}
      <aside class=\"layout-sidebar-second\" role=\"complementary\">
        {{ page.sidebar_second }}
      </aside>
    {% endif %}
  </main>

  {% if page.footer %}
    <footer class=\"site-footer\" role=\"complementary\">
      {{ page.footer }}
    </footer>
  {% endif %}

  {% if page.footer_info %}
    <footer class=\"site-footer\" role=\"contentinfo\">
      {{ page.footer_info }}
    </footer>
  {% endif %}

</div>{# /.layout-container #}
";
    }
}
