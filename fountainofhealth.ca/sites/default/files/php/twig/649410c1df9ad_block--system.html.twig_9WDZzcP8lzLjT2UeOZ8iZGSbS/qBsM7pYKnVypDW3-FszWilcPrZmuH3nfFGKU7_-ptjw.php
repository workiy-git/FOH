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

/* themes/bootstrap/templates/block/block--system.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_block--system.html.twig_EMVavEcmWDi-AJWGq4hEiepOs/lGnWyq3DYJ4oaLGSYv5S9h-_kMoQ2tqHE7T0cDt8cug.php
class __TwigTemplate_102e68c120bf7c3b7b5819dd5b6cb30b extends Template
========
class __TwigTemplate_231cc6faa23d944b3b4584495485d9f2 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_block--system.html.twig_9WDZzcP8lzLjT2UeOZ8iZGSbS/qBsM7pYKnVypDW3-FszWilcPrZmuH3nfFGKU7_-ptjw.php
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 9
        return "block--bare.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("block--bare.html.twig", "themes/bootstrap/templates/block/block--system.html.twig", 9);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "themes/bootstrap/templates/block/block--system.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 9,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_block--system.html.twig_EMVavEcmWDi-AJWGq4hEiepOs/lGnWyq3DYJ4oaLGSYv5S9h-_kMoQ2tqHE7T0cDt8cug.php
        return new Source("", "themes/bootstrap/templates/block/block--system.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\themes\\bootstrap\\templates\\block\\block--system.html.twig");
========
        return new Source("", "themes/bootstrap/templates/block/block--system.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\themes\\bootstrap\\templates\\block\\block--system.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_block--system.html.twig_9WDZzcP8lzLjT2UeOZ8iZGSbS/qBsM7pYKnVypDW3-FszWilcPrZmuH3nfFGKU7_-ptjw.php
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
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
