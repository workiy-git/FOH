<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* core/modules/layout_builder/layouts/twocol_section/layout--twocol-section.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_layout--twocol-section.ht_GEwIVHOGtMv4KEXZjHy_RGycD/cwYqyhFh_coqOl5Udjp3S9bEc-Qgm-g5UTh_ZZVnHSE.php
class __TwigTemplate_23712fdcd82629ea9a70cb4156c4cd38 extends Template
========
class __TwigTemplate_090300cad7e0d1bb0eb0ba1418ad0cb6 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_layout--twocol-section.ht_zopHBRZgydv_tRfGrO4DF8AFY/yxvn5kuyfThn8czKt-SBpUpMn5RzRI6L2DeCwcwA0Wk.php
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        if (($context["content"] ?? null)) {
            // line 15
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 15, $this->source), "html", null, true);
            echo ">

    ";
            // line 17
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "first", [], "any", false, false, true, 17)) {
                // line 18
                echo "      <div ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "first", [], "any", false, false, true, 18), "addClass", [0 => "layout__region", 1 => "layout__region--first"], "method", false, false, true, 18), 18, $this->source), "html", null, true);
                echo ">
        ";
                // line 19
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "first", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 22
            echo "
    ";
            // line 23
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "second", [], "any", false, false, true, 23)) {
                // line 24
                echo "      <div ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "second", [], "any", false, false, true, 24), "addClass", [0 => "layout__region", 1 => "layout__region--second"], "method", false, false, true, 24), 24, $this->source), "html", null, true);
                echo ">
        ";
                // line 25
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "second", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 28
            echo "
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "core/modules/layout_builder/layouts/twocol_section/layout--twocol-section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 28,  70 => 25,  65 => 24,  63 => 23,  60 => 22,  54 => 19,  49 => 18,  47 => 17,  41 => 15,  39 => 14,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_layout--twocol-section.ht_GEwIVHOGtMv4KEXZjHy_RGycD/cwYqyhFh_coqOl5Udjp3S9bEc-Qgm-g5UTh_ZZVnHSE.php
        return new Source("", "core/modules/layout_builder/layouts/twocol_section/layout--twocol-section.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\modules\\layout_builder\\layouts\\twocol_section\\layout--twocol-section.html.twig");
========
        return new Source("", "core/modules/layout_builder/layouts/twocol_section/layout--twocol-section.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\modules\\layout_builder\\layouts\\twocol_section\\layout--twocol-section.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_layout--twocol-section.ht_zopHBRZgydv_tRfGrO4DF8AFY/yxvn5kuyfThn8czKt-SBpUpMn5RzRI6L2DeCwcwA0Wk.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 14);
        static $filters = array("escape" => 15);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
