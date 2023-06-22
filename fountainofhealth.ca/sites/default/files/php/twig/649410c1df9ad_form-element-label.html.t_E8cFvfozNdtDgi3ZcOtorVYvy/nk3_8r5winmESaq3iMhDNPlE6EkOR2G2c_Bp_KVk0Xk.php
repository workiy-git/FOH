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

/* core/themes/claro/templates/form-element-label.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_form-element-label.html.t_b_5ANdK2sRpr4DpapoFUCcvIB/Wh_kG62udpB9SJXipQmRUFMfuEy5fZDbM7rS0_px4i8.php
class __TwigTemplate_b7a1b99742279d59ac7e69d54a8b33b6 extends Template
========
class __TwigTemplate_745d699564291ac468601bd18e6daa16 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_form-element-label.html.t_E8cFvfozNdtDgi3ZcOtorVYvy/nk3_8r5winmESaq3iMhDNPlE6EkOR2G2c_Bp_KVk0Xk.php
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
        $context["classes"] = [0 => "form-item__label", 1 => (((        // line 18
($context["title_display"] ?? null) == "after")) ? ("option") : ("")), 2 => (((        // line 19
($context["title_display"] ?? null) == "invisible")) ? ("visually-hidden") : ("")), 3 => ((        // line 20
($context["required"] ?? null)) ? ("js-form-required") : ("")), 4 => ((        // line 21
($context["required"] ?? null)) ? ("form-required") : (""))];
        // line 24
        if (( !twig_test_empty(($context["title"] ?? null)) || ($context["required"] ?? null))) {
            // line 25
            echo "<label";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 25), 25, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 25, $this->source), "html", null, true);
            echo "</label>";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/claro/templates/form-element-label.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 25,  45 => 24,  43 => 21,  42 => 20,  41 => 19,  40 => 18,  39 => 16,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_form-element-label.html.t_b_5ANdK2sRpr4DpapoFUCcvIB/Wh_kG62udpB9SJXipQmRUFMfuEy5fZDbM7rS0_px4i8.php
        return new Source("", "core/themes/claro/templates/form-element-label.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\themes\\claro\\templates\\form-element-label.html.twig");
========
        return new Source("", "core/themes/claro/templates/form-element-label.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\themes\\claro\\templates\\form-element-label.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_form-element-label.html.t_E8cFvfozNdtDgi3ZcOtorVYvy/nk3_8r5winmESaq3iMhDNPlE6EkOR2G2c_Bp_KVk0Xk.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 16, "if" => 24);
        static $filters = array("escape" => 25);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
