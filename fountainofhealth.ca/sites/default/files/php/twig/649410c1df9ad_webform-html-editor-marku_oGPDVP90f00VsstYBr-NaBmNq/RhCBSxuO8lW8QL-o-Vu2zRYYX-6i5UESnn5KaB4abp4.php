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

/* modules/webform/templates/webform-html-editor-markup.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_webform-html-editor-marku_zmqo87m4dTmRRwfDGhfAVG1i1/t8Xeic3gyaLWCx9ubJJTvYuvBA6-UEpUS1tCkNV_hH4.php
class __TwigTemplate_c16834d0df76dd4444488863cf0c2a56 extends Template
========
class __TwigTemplate_2ce940506db6d23dceacf5aed7aa4e30 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_webform-html-editor-marku_oGPDVP90f00VsstYBr-NaBmNq/RhCBSxuO8lW8QL-o-Vu2zRYYX-6i5UESnn5KaB4abp4.php
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
        // line 21
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 21, $this->source), "html", null, true);
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-html-editor-markup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 21,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_webform-html-editor-marku_zmqo87m4dTmRRwfDGhfAVG1i1/t8Xeic3gyaLWCx9ubJJTvYuvBA6-UEpUS1tCkNV_hH4.php
        return new Source("", "modules/webform/templates/webform-html-editor-markup.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\modules\\webform\\templates\\webform-html-editor-markup.html.twig");
========
        return new Source("", "modules/webform/templates/webform-html-editor-markup.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\modules\\webform\\templates\\webform-html-editor-markup.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_webform-html-editor-marku_oGPDVP90f00VsstYBr-NaBmNq/RhCBSxuO8lW8QL-o-Vu2zRYYX-6i5UESnn5KaB4abp4.php
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 21);
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
