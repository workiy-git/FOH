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

/* core/modules/system/templates/container.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_container.html.twig_n3DKPA7o-MpEXy4BRfUNtn8kS/FdpnWkijffO20JRdG0lJlkwVDJZyFoyrJSrDJLu0VgU.php
class __TwigTemplate_0ef7fed47b825f724476e8fd43345faf extends Template
========
class __TwigTemplate_e8a32426581ae8c1741280f3684b47b9 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_container.html.twig_hBgkgto-67Pjg__vVZqdDCJvo/QF0Vwr3bDTWPftFPCr9KdGeN7QK9eunjzPQx1hEIDb4.php
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
        // line 25
        $context["classes"] = [0 => ((        // line 26
($context["has_parent"] ?? null)) ? ("js-form-wrapper") : ("")), 1 => ((        // line 27
($context["has_parent"] ?? null)) ? ("form-wrapper") : (""))];
        // line 30
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 30), 30, $this->source), "html", null, true);
        echo ">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 30, $this->source), "html", null, true);
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/container.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 30,  41 => 27,  40 => 26,  39 => 25,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_container.html.twig_n3DKPA7o-MpEXy4BRfUNtn8kS/FdpnWkijffO20JRdG0lJlkwVDJZyFoyrJSrDJLu0VgU.php
        return new Source("", "core/modules/system/templates/container.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\modules\\system\\templates\\container.html.twig");
========
        return new Source("", "core/modules/system/templates/container.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\modules\\system\\templates\\container.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_container.html.twig_hBgkgto-67Pjg__vVZqdDCJvo/QF0Vwr3bDTWPftFPCr9KdGeN7QK9eunjzPQx1hEIDb4.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 25);
        static $filters = array("escape" => 30);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set'],
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
