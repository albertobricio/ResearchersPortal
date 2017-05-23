<?php

/* themes/da_vinci/templates/layout/page.html.twig */
class __TwigTemplate_0196f4d5ce97cb6f29acf6d5540678b7f1b2125758af41a6fceefe1d4ff4a3ae extends Twig_Template
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
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array('t'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

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
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Site header")));
        echo "\">
    ";
        // line 52
        if ($this->getAttribute(($context["page"] ?? null), "top_bar", array())) {
            // line 53
            echo "      <div class=\"top-bar\">
        ";
            // line 54
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "top_bar", array()), "html", null, true));
            echo "
      </div>
    ";
        }
        // line 57
        echo "    <div class=\"site-header\">
      ";
        // line 58
        if ($this->getAttribute(($context["page"] ?? null), "secondary_menu", array())) {
            // line 59
            echo "        ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "secondary_menu", array()), "html", null, true));
            echo "
      ";
        }
        // line 61
        echo "      ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "header", array()), "html", null, true));
        echo "
    <div>
  </header>

  ";
        // line 65
        if ($this->getAttribute(($context["page"] ?? null), "highlighted", array())) {
            // line 66
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "highlighted", array()), "html", null, true));
            echo "
  ";
        }
        // line 68
        echo "
  ";
        // line 69
        if ($this->getAttribute(($context["page"] ?? null), "primary_menu", array())) {
            // line 70
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "primary_menu", array()), "html", null, true));
            echo "
  ";
        }
        // line 72
        echo "
  ";
        // line 73
        if ($this->getAttribute(($context["page"] ?? null), "breadcrumb", array())) {
            // line 74
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "breadcrumb", array()), "html", null, true));
            echo "
  ";
        }
        // line 76
        echo "
  ";
        // line 77
        if ($this->getAttribute(($context["page"] ?? null), "featured_top", array())) {
            // line 78
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "featured_top", array()), "html", null, true));
            echo "
  ";
        }
        // line 80
        echo "
  ";
        // line 81
        if ($this->getAttribute(($context["page"] ?? null), "help", array())) {
            // line 82
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "help", array()), "html", null, true));
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
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "content", array()), "html", null, true));
        echo "
    </div>";
        // line 92
        echo "
    ";
        // line 93
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", array())) {
            // line 94
            echo "      <aside class=\"layout-sidebar-first\" role=\"complementary\">
        ";
            // line 95
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "sidebar_first", array()), "html", null, true));
            echo "
      </aside>
    ";
        }
        // line 98
        echo "
    ";
        // line 99
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", array())) {
            // line 100
            echo "      <aside class=\"layout-sidebar-second\" role=\"complementary\">
        ";
            // line 101
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "sidebar_second", array()), "html", null, true));
            echo "
      </aside>
    ";
        }
        // line 104
        echo "  </main>

  ";
        // line 106
        if ($this->getAttribute(($context["page"] ?? null), "footer", array())) {
            // line 107
            echo "    <footer class=\"site-footer\" role=\"complementary\">
      ";
            // line 108
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer", array()), "html", null, true));
            echo "
    </footer>
  ";
        }
        // line 111
        echo "
  ";
        // line 112
        if ($this->getAttribute(($context["page"] ?? null), "footer_info", array())) {
            // line 113
            echo "    <footer class=\"site-footer\" role=\"contentinfo\">
      ";
            // line 114
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer_info", array()), "html", null, true));
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

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/da_vinci/templates/layout/page.html.twig", "C:\\xampp\\htdocs\\ResearchersPortal\\themes\\da_vinci\\templates\\layout\\page.html.twig");
    }
}
