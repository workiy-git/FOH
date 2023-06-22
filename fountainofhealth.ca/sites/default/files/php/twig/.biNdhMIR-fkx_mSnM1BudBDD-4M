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

/* themes/bootstrap/templates/system/region.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/.biNdhMIR-fkx_mSnM1BudBDD-4M
class __TwigTemplate_0b84cb2c564e155b45e5e7c50194826e extends Template
========
class __TwigTemplate_1fb29a70d50be6ad2dc6bdd200c7e880 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_region.html.twig_mkcMkSBz8jRscEVinJgE05jA2/ztoQO3sP-z-05IbSqI-bFtTesCJYxRA8bpxjF6sCxXA.php
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
        // line 18
        $context["classes"] = [0 => "region", 1 => ("region-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 20
($context["region"] ?? null), 20, $this->source)))];
        // line 23
        if (($context["content"] ?? null)) {
            // line 24
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 24), 24, $this->source), "html", null, true);
            echo ">
    ";
            // line 25
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 25, $this->source), "html", null, true);
            echo "
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/bootstrap/templates/system/region.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 25,  44 => 24,  42 => 23,  40 => 20,  39 => 18,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/.biNdhMIR-fkx_mSnM1BudBDD-4M
        return new Source("", "themes/bootstrap/templates/system/region.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\themes\\bootstrap\\templates\\system\\region.html.twig");
========
        return new Source("", "themes/bootstrap/templates/system/region.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\themes\\bootstrap\\templates\\system\\region.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_region.html.twig_mkcMkSBz8jRscEVinJgE05jA2/ztoQO3sP-z-05IbSqI-bFtTesCJYxRA8bpxjF6sCxXA.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 18, "if" => 23);
        static $filters = array("clean_class" => 20, "escape" => 24);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
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
