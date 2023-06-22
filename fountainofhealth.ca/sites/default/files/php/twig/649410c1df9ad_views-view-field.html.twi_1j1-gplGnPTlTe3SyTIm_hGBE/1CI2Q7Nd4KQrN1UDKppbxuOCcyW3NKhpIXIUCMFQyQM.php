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

/* core/modules/views/templates/views-view-field.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_views-view-field.html.twi_2d7D1750IuiIkPqjp1s9xo3DW/aYUqLVomIURVoMa3DlPbIE5zpAgDjOA7B1ILEYZIbyI.php
class __TwigTemplate_318943f96f5a7d80310a25b5e1779386 extends Template
========
class __TwigTemplate_443b615d843bd1d58b7ea26123475d48 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_views-view-field.html.twi_1j1-gplGnPTlTe3SyTIm_hGBE/1CI2Q7Nd4KQrN1UDKppbxuOCcyW3NKhpIXIUCMFQyQM.php
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
        // line 23
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["output"] ?? null), 23, $this->source), "html", null, true);
    }

    public function getTemplateName()
    {
        return "core/modules/views/templates/views-view-field.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 23,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_views-view-field.html.twi_2d7D1750IuiIkPqjp1s9xo3DW/aYUqLVomIURVoMa3DlPbIE5zpAgDjOA7B1ILEYZIbyI.php
        return new Source("", "core/modules/views/templates/views-view-field.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\modules\\views\\templates\\views-view-field.html.twig");
========
        return new Source("", "core/modules/views/templates/views-view-field.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\modules\\views\\templates\\views-view-field.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_views-view-field.html.twi_1j1-gplGnPTlTe3SyTIm_hGBE/1CI2Q7Nd4KQrN1UDKppbxuOCcyW3NKhpIXIUCMFQyQM.php
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 23);
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
