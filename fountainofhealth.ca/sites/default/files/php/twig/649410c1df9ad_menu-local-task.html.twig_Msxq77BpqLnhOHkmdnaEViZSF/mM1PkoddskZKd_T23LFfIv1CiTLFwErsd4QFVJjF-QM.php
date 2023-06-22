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

/* themes/bootstrap/templates/menu/menu-local-task.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_menu-local-task.html.twig_eJYUKJ7HSsoSnvJfm39qbRL-6/8eCZo9Lx90Tzxp7yqwkUK-HyvjaA4aTVkyQfp5uVYw4.php
class __TwigTemplate_933abb7478a5120bd2b621d2286ce98b extends Template
========
class __TwigTemplate_d003b4eeb277d0ad7dcec052f1c572ff extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_menu-local-task.html.twig_Msxq77BpqLnhOHkmdnaEViZSF/mM1PkoddskZKd_T23LFfIv1CiTLFwErsd4QFVJjF-QM.php
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
        $context["classes"] = [0 => ((        // line 20
($context["is_active"] ?? null)) ? ("active") : (""))];
        // line 22
        echo "<li";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 22), 22, $this->source), "html", null, true);
        echo ">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["link"] ?? null), 22, $this->source), "html", null, true);
        echo "</li>
";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap/templates/menu/menu-local-task.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 22,  40 => 20,  39 => 19,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_menu-local-task.html.twig_eJYUKJ7HSsoSnvJfm39qbRL-6/8eCZo9Lx90Tzxp7yqwkUK-HyvjaA4aTVkyQfp5uVYw4.php
        return new Source("", "themes/bootstrap/templates/menu/menu-local-task.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\themes\\bootstrap\\templates\\menu\\menu-local-task.html.twig");
========
        return new Source("", "themes/bootstrap/templates/menu/menu-local-task.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\themes\\bootstrap\\templates\\menu\\menu-local-task.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_menu-local-task.html.twig_Msxq77BpqLnhOHkmdnaEViZSF/mM1PkoddskZKd_T23LFfIv1CiTLFwErsd4QFVJjF-QM.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 19);
        static $filters = array("escape" => 22);
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
