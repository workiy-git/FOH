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

/* core/themes/claro/templates/classy/layout/region.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_region.html.twig_vrJDriBEvmrzhPAszOtU3qOGf/pz7nFl8lZ3WZCmiw7m9TskyAAPFCuFc86c2Z2jC0O-8.php
class __TwigTemplate_cf89255183adb06823e16acadd7e10d2 extends Template
========
class __TwigTemplate_03aa373c2ec30b6becc262526f55bf66 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_region.html.twig_p0gzwnJ2aLhmPEpCibLeoGcnc/7eeDFnwzxg3RTP_THwE9GbYD_QfU_2FAEjtZbnZMEXQ.php
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
        // line 16
        $context["classes"] = [0 => "region", 1 => ("region-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 18
($context["region"] ?? null), 18, $this->source)))];
        // line 21
        if (($context["content"] ?? null)) {
            // line 22
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 22), 22, $this->source), "html", null, true);
            echo ">
    ";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 23, $this->source), "html", null, true);
            echo "
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/claro/templates/classy/layout/region.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 23,  44 => 22,  42 => 21,  40 => 18,  39 => 16,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_region.html.twig_vrJDriBEvmrzhPAszOtU3qOGf/pz7nFl8lZ3WZCmiw7m9TskyAAPFCuFc86c2Z2jC0O-8.php
        return new Source("", "core/themes/claro/templates/classy/layout/region.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\themes\\claro\\templates\\classy\\layout\\region.html.twig");
========
        return new Source("", "core/themes/claro/templates/classy/layout/region.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\themes\\claro\\templates\\classy\\layout\\region.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_region.html.twig_p0gzwnJ2aLhmPEpCibLeoGcnc/7eeDFnwzxg3RTP_THwE9GbYD_QfU_2FAEjtZbnZMEXQ.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 16, "if" => 21);
        static $filters = array("clean_class" => 18, "escape" => 22);
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
