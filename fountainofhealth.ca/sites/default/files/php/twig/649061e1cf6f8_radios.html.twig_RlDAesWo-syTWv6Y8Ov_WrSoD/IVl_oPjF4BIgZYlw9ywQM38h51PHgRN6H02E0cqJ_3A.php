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

/* core/modules/system/templates/radios.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_radios.html.twig_RlDAesWo-syTWv6Y8Ov_WrSoD/IVl_oPjF4BIgZYlw9ywQM38h51PHgRN6H02E0cqJ_3A.php
class __TwigTemplate_ae9a6e729aa3b8c47bcdbdc34dabd63f extends Template
========
class __TwigTemplate_7b419a58ffd24004d61077b4f05271c4 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_radios.html.twig_YOnsILfl1FH4O0xdadjcnjUvG/WuvcwNZSlxlwJ-AvbY3YkmuJkRVADardPLRhG7Zp7Lg.php
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
        // line 15
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 15, $this->source), "html", null, true);
        echo ">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 15, $this->source), "html", null, true);
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/radios.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 15,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_radios.html.twig_RlDAesWo-syTWv6Y8Ov_WrSoD/IVl_oPjF4BIgZYlw9ywQM38h51PHgRN6H02E0cqJ_3A.php
        return new Source("", "core/modules/system/templates/radios.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\modules\\system\\templates\\radios.html.twig");
========
        return new Source("", "core/modules/system/templates/radios.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\modules\\system\\templates\\radios.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_radios.html.twig_YOnsILfl1FH4O0xdadjcnjUvG/WuvcwNZSlxlwJ-AvbY3YkmuJkRVADardPLRhG7Zp7Lg.php
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 15);
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
