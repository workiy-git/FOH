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

/* core/modules/system/templates/off-canvas-page-wrapper.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_off-canvas-page-wrapper.h_xYUuMbMpSiXr-1CHqma3hXgeh/TjOH2dvtx9LhGeaFX59070nZ8QhLZpECNpVtG7RwHp8.php
class __TwigTemplate_278d51d068abe6e605c1144d1de25369 extends Template
========
class __TwigTemplate_fd3d2f5986f7e65e051b6a1ed0a78910 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_off-canvas-page-wrapper.h_JgvH1d2gqFpn_CKa4UMpb9aJH/WowgBm9tPnsDJxmNhw6L9mgzEL0waONgYl_Jb50_JTg.php
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
            echo "  <div class=\"dialog-off-canvas-main-canvas\" data-off-canvas-main-canvas>
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
        return "core/modules/system/templates/off-canvas-page-wrapper.html.twig";
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
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_off-canvas-page-wrapper.h_xYUuMbMpSiXr-1CHqma3hXgeh/TjOH2dvtx9LhGeaFX59070nZ8QhLZpECNpVtG7RwHp8.php
        return new Source("", "core/modules/system/templates/off-canvas-page-wrapper.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\modules\\system\\templates\\off-canvas-page-wrapper.html.twig");
========
        return new Source("", "core/modules/system/templates/off-canvas-page-wrapper.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\modules\\system\\templates\\off-canvas-page-wrapper.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_off-canvas-page-wrapper.h_JgvH1d2gqFpn_CKa4UMpb9aJH/WowgBm9tPnsDJxmNhw6L9mgzEL0waONgYl_Jb50_JTg.php
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
