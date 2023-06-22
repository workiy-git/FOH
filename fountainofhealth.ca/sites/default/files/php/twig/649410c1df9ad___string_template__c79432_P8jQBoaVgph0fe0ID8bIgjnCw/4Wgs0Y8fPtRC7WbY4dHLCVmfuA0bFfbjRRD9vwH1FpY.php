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

/* __string_template__c794325ea79ede0211eb338726a3a854 */
class __TwigTemplate_5ce450ece7d94fbb19c1f1c9e82d0629 extends Template
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
        // line 1
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pid", [], "any", false, false, true, 1))) {
            // line 2
            $context["nodeId"] = twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pid", [], "any", false, false, true, 2);
        } else {
            // line 4
            $context["nodeId"] = 0;
        }
        // line 6
        echo "Wellness Together Canada and Fountain of Health : ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalField("title", "node", $this->sandbox->ensureToStringAllowed(($context["nodeId"] ?? null), 6, $this->source), "default"), "html", null, true);
        echo " | Webinar";
    }

    public function getTemplateName()
    {
        return "__string_template__c794325ea79ede0211eb338726a3a854";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 6,  44 => 4,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__c794325ea79ede0211eb338726a3a854", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1, "set" => 2);
        static $filters = array("escape" => 6);
        static $functions = array("drupal_field" => 6);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
                ['escape'],
                ['drupal_field']
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
