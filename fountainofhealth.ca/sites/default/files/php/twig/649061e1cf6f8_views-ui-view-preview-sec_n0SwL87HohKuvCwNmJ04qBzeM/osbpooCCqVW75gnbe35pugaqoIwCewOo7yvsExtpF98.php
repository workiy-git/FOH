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

/* core/modules/views_ui/templates/views-ui-view-preview-section.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_views-ui-view-preview-sec_n0SwL87HohKuvCwNmJ04qBzeM/osbpooCCqVW75gnbe35pugaqoIwCewOo7yvsExtpF98.php
class __TwigTemplate_a4e9e066dc00677db5d92e4df109ed2c extends Template
========
class __TwigTemplate_cc334eb2f8b4dc1fa4fde8133e9d412e extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_views-ui-view-preview-sec_Q51fBCgxg6S3x7h4gI-ofRB9b/8pCwS-mM9V4h8rKHecwkylzevv4e6SHuNVR7QvmwPEc.php
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
        echo "<h1 class=\"section-title\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 16, $this->source), "html", null, true);
        echo "</h1>
";
        // line 17
        if (($context["links"] ?? null)) {
            // line 18
            echo "  <div class=\"contextual\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["links"] ?? null), 18, $this->source), "html", null, true);
            echo "</div>
";
        }
        // line 20
        echo "<div class=\"preview-section\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 20, $this->source), "html", null, true);
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/views_ui/templates/views-ui-view-preview-section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 20,  46 => 18,  44 => 17,  39 => 16,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_views-ui-view-preview-sec_n0SwL87HohKuvCwNmJ04qBzeM/osbpooCCqVW75gnbe35pugaqoIwCewOo7yvsExtpF98.php
        return new Source("", "core/modules/views_ui/templates/views-ui-view-preview-section.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\modules\\views_ui\\templates\\views-ui-view-preview-section.html.twig");
========
        return new Source("", "core/modules/views_ui/templates/views-ui-view-preview-section.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\modules\\views_ui\\templates\\views-ui-view-preview-section.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_views-ui-view-preview-sec_Q51fBCgxg6S3x7h4gI-ofRB9b/8pCwS-mM9V4h8rKHecwkylzevv4e6SHuNVR7QvmwPEc.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 17);
        static $filters = array("escape" => 16);
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
