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

/* modules/webform/templates/webform-actions.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_webform-actions.html.twig_-0oqSvWQy_0xTfAoS1TWtjHlE/RvKRXOCz1g3-2C9rQ6XMFbCLEayAMDRZjNDo2u2Ww2M.php
class __TwigTemplate_6455706e1373b934eeebae1252bbfb96 extends Template
========
class __TwigTemplate_90d94ef4ca3f7e2ea14736a72ae0f170 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_webform-actions.html.twig_oDlGS1OudvM-bvOLPaxC6obxZ/u2O2T_YhiCHpSZK_TI5ZyUd14gYlMyjGRI828pidTrk.php
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
        // line 13
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["element"] ?? null), 13, $this->source), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-actions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 13,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_webform-actions.html.twig_-0oqSvWQy_0xTfAoS1TWtjHlE/RvKRXOCz1g3-2C9rQ6XMFbCLEayAMDRZjNDo2u2Ww2M.php
        return new Source("", "modules/webform/templates/webform-actions.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\modules\\webform\\templates\\webform-actions.html.twig");
========
        return new Source("", "modules/webform/templates/webform-actions.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\modules\\webform\\templates\\webform-actions.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_webform-actions.html.twig_oDlGS1OudvM-bvOLPaxC6obxZ/u2O2T_YhiCHpSZK_TI5ZyUd14gYlMyjGRI828pidTrk.php
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 13);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
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
