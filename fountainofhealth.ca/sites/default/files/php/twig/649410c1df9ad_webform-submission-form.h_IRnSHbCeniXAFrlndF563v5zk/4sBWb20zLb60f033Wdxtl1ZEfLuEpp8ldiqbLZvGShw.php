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

/* modules/webform/templates/webform-submission-form.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_webform-submission-form.h_u5NBxpA0WzPSXegC2IwnRYsIl/NNZgF3kYjWEIs8nL2ku3f31ERhxreGX3FN5Ee-CMrKI.php
class __TwigTemplate_bd45e4776fdd7677031bde9e57a90082 extends Template
========
class __TwigTemplate_7e179df2769f52566df1237aa1e89dd2 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_webform-submission-form.h_IRnSHbCeniXAFrlndF563v5zk/4sBWb20zLb60f033Wdxtl1ZEfLuEpp8ldiqbLZvGShw.php
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
        // line 12
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 12, $this->source), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-submission-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 12,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_webform-submission-form.h_u5NBxpA0WzPSXegC2IwnRYsIl/NNZgF3kYjWEIs8nL2ku3f31ERhxreGX3FN5Ee-CMrKI.php
        return new Source("", "modules/webform/templates/webform-submission-form.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\modules\\webform\\templates\\webform-submission-form.html.twig");
========
        return new Source("", "modules/webform/templates/webform-submission-form.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\modules\\webform\\templates\\webform-submission-form.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_webform-submission-form.h_IRnSHbCeniXAFrlndF563v5zk/4sBWb20zLb60f033Wdxtl1ZEfLuEpp8ldiqbLZvGShw.php
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 12);
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