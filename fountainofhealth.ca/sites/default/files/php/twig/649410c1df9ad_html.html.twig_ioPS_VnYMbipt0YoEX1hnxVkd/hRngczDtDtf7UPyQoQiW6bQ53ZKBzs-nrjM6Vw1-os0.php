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

/* themes/bootstrap/templates/system/html.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_html.html.twig_tl2exKT1ATy0p7jSStXkwu2aT/qGQKvXNsWwJCrAQO8u8eAwFhp05ZozvjwE-RhfMlSZ0.php
class __TwigTemplate_ebe8e52d69e9d8585c56555446857bd3 extends Template
========
class __TwigTemplate_ab034cd7d4c6ed05cc68f0ed6bcf34d2 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_html.html.twig_ioPS_VnYMbipt0YoEX1hnxVkd/hRngczDtDtf7UPyQoQiW6bQ53ZKBzs-nrjM6Vw1-os0.php
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
        // line 48
        $context["body_classes"] = [0 => ((        // line 49
($context["logged_in"] ?? null)) ? ("user-logged-in") : ("")), 1 => (( !        // line 50
($context["root_path"] ?? null)) ? ("path-frontpage") : (("path-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["root_path"] ?? null), 50, $this->source))))), 2 => ((        // line 51
($context["node_type"] ?? null)) ? (("page-node-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["node_type"] ?? null), 51, $this->source)))) : ("")), 3 => ((        // line 52
($context["db_offline"] ?? null)) ? ("db-offline") : ("")), 4 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 53
($context["theme"] ?? null), "settings", [], "any", false, false, true, 53), "navbar_position", [], "any", false, false, true, 53)) ? (("navbar-is-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 53), "navbar_position", [], "any", false, false, true, 53), 53, $this->source))) : ("")), 5 => ((twig_get_attribute($this->env, $this->source,         // line 54
($context["theme"] ?? null), "has_glyphicons", [], "any", false, false, true, 54)) ? ("has-glyphicons") : (""))];
        // line 57
        echo "<!DOCTYPE html>
<html ";
        // line 58
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["html_attributes"] ?? null), 58, $this->source), "html", null, true);
        echo ">
  <head>
    <head-placeholder token=\"";
        // line 60
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 60, $this->source));
        echo "\">
    <title>";
        // line 61
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(($context["head_title"] ?? null), 61, $this->source), " | "));
        echo "</title>
    <css-placeholder token=\"";
        // line 62
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 62, $this->source));
        echo "\">
    <js-placeholder token=\"";
        // line 63
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 63, $this->source));
        echo "\">
  </head>
  <body";
        // line 65
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["body_classes"] ?? null)], "method", false, false, true, 65), 65, $this->source), "html", null, true);
        echo ">
    <a href=\"#main-content\" class=\"visually-hidden focusable skip-link\">
      ";
        // line 67
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Skip to main content"));
        echo "
    </a>
    ";
        // line 69
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_top"] ?? null), 69, $this->source), "html", null, true);
        echo "
    ";
        // line 70
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page"] ?? null), 70, $this->source), "html", null, true);
        echo "
    ";
        // line 71
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_bottom"] ?? null), 71, $this->source), "html", null, true);
        echo "
    <js-bottom-placeholder token=\"";
        // line 72
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 72, $this->source));
        echo "\">
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap/templates/system/html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 72,  90 => 71,  86 => 70,  82 => 69,  77 => 67,  72 => 65,  67 => 63,  63 => 62,  59 => 61,  55 => 60,  50 => 58,  47 => 57,  45 => 54,  44 => 53,  43 => 52,  42 => 51,  41 => 50,  40 => 49,  39 => 48,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_html.html.twig_tl2exKT1ATy0p7jSStXkwu2aT/qGQKvXNsWwJCrAQO8u8eAwFhp05ZozvjwE-RhfMlSZ0.php
        return new Source("", "themes/bootstrap/templates/system/html.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\themes\\bootstrap\\templates\\system\\html.html.twig");
========
        return new Source("", "themes/bootstrap/templates/system/html.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\themes\\bootstrap\\templates\\system\\html.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_html.html.twig_ioPS_VnYMbipt0YoEX1hnxVkd/hRngczDtDtf7UPyQoQiW6bQ53ZKBzs-nrjM6Vw1-os0.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 48);
        static $filters = array("clean_class" => 50, "escape" => 58, "raw" => 60, "safe_join" => 61, "t" => 67);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['clean_class', 'escape', 'raw', 'safe_join', 't'],
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
