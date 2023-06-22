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

/* core/themes/claro/templates/off-canvas-page-wrapper.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_off-canvas-page-wrapper.h_c-v88LKt8QovCGzYqOxVls7RT/LIna35BGXR2CwGlZknEgIFFTLLNKvjB3R-BoB1jFUIk.php
class __TwigTemplate_062552f85da144c45dbb16946f16fdf0 extends Template
========
class __TwigTemplate_0265e18a39c1772bb62b274b69eacd00 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_off-canvas-page-wrapper.h_pfsMIzBm9udYIispTt5_JGSwZ/PUbpIJl88djNs99eaGPX4xpxD2MFdISoNVmmCVCJWRI.php
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
        // line 22
        if (($context["children"] ?? null)) {
            // line 23
            echo "  <div class=\"page-wrapper dialog-off-canvas-main-canvas\" data-off-canvas-main-canvas>
    ";
            // line 24
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 24, $this->source), "html", null, true);
            echo "
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/claro/templates/off-canvas-page-wrapper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 24,  41 => 23,  39 => 22,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_off-canvas-page-wrapper.h_c-v88LKt8QovCGzYqOxVls7RT/LIna35BGXR2CwGlZknEgIFFTLLNKvjB3R-BoB1jFUIk.php
        return new Source("", "core/themes/claro/templates/off-canvas-page-wrapper.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\themes\\claro\\templates\\off-canvas-page-wrapper.html.twig");
========
        return new Source("", "core/themes/claro/templates/off-canvas-page-wrapper.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\themes\\claro\\templates\\off-canvas-page-wrapper.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_off-canvas-page-wrapper.h_pfsMIzBm9udYIispTt5_JGSwZ/PUbpIJl88djNs99eaGPX4xpxD2MFdISoNVmmCVCJWRI.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 22);
        static $filters = array("escape" => 24);
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
