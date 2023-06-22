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

/* core/themes/claro/templates/navigation/menu-local-task--views-ui.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_menu-local-task--views-ui_VVly1knPHJQRUqUYMI35uxlob/iLlptIAiWsWTIsbPP78PFy6FxH4sQ8rJ0Qso2mVzT54.php
class __TwigTemplate_0d29df46b3e5930089b1810a3be73e1a extends Template
========
class __TwigTemplate_5c1a9899a2fe252be80ae895f94e800b extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_menu-local-task--views-ui__mJG4JWSllzOx2-xEZxlB0c8c/bCySeZmRaBbPNexRK_Jm4erl3fbo9-2iMPlRAwgA0ys.php
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
        // line 19
        echo "<li";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ((($context["is_active"] ?? null)) ? ("is-active") : (""))], "method", false, false, true, 19), 19, $this->source), "html", null, true);
        echo ">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["link"] ?? null), 19, $this->source), "html", null, true);
        echo "</li>
";
    }

    public function getTemplateName()
    {
        return "core/themes/claro/templates/navigation/menu-local-task--views-ui.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 19,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_menu-local-task--views-ui_VVly1knPHJQRUqUYMI35uxlob/iLlptIAiWsWTIsbPP78PFy6FxH4sQ8rJ0Qso2mVzT54.php
        return new Source("", "core/themes/claro/templates/navigation/menu-local-task--views-ui.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\themes\\claro\\templates\\navigation\\menu-local-task--views-ui.html.twig");
========
        return new Source("", "core/themes/claro/templates/navigation/menu-local-task--views-ui.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\themes\\claro\\templates\\navigation\\menu-local-task--views-ui.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_menu-local-task--views-ui__mJG4JWSllzOx2-xEZxlB0c8c/bCySeZmRaBbPNexRK_Jm4erl3fbo9-2iMPlRAwgA0ys.php
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 19);
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
