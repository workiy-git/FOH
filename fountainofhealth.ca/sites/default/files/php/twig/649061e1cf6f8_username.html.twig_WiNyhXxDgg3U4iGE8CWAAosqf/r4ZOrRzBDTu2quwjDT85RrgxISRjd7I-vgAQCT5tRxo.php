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

/* core/modules/user/templates/username.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_username.html.twig_WiNyhXxDgg3U4iGE8CWAAosqf/r4ZOrRzBDTu2quwjDT85RrgxISRjd7I-vgAQCT5tRxo.php
class __TwigTemplate_4e82c3ad4a43d7f43e726af23e029bca extends Template
========
class __TwigTemplate_ef74bdf9b2030fb7115c550146377234 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_username.html.twig_mbhFpLOdMlp0S9Ykt_GmO4zQi/PgHmV_-4uJtzIRKxE5AaU0KH9r_dyvrBZu13BFKZb7U.php
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
        // line 27
        if (($context["link_path"] ?? null)) {
            // line 28
            echo "<a";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 28, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 28, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["extra"] ?? null), 28, $this->source), "html", null, true);
            echo "</a>";
        } else {
            // line 30
            echo "<span";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 30, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 30, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["extra"] ?? null), 30, $this->source), "html", null, true);
            echo "</span>";
        }
    }

    public function getTemplateName()
    {
        return "core/modules/user/templates/username.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 30,  41 => 28,  39 => 27,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_username.html.twig_WiNyhXxDgg3U4iGE8CWAAosqf/r4ZOrRzBDTu2quwjDT85RrgxISRjd7I-vgAQCT5tRxo.php
        return new Source("", "core/modules/user/templates/username.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\modules\\user\\templates\\username.html.twig");
========
        return new Source("", "core/modules/user/templates/username.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\modules\\user\\templates\\username.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_username.html.twig_mbhFpLOdMlp0S9Ykt_GmO4zQi/PgHmV_-4uJtzIRKxE5AaU0KH9r_dyvrBZu13BFKZb7U.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 27);
        static $filters = array("escape" => 28);
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
