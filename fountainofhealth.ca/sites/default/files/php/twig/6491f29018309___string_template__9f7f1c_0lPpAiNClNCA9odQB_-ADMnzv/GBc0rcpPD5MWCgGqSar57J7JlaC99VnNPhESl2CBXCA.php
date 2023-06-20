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

/* __string_template__9f7f1c7e96e0e249370ab6a90694438a */
class __TwigTemplate_658712174606c196c0a0021af158a70d extends Template
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
        echo "Program name is ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pid", [], "any", false, false, true, 1), 1, $this->source), "html", null, true);
        echo "
";
        // line 2
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "schedul_id", [], "any", false, false, true, 2))) {
            // line 3
            $context["nodeId"] = twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "schedul_id", [], "any", false, false, true, 3);
        } else {
            // line 5
            $context["nodeId"] = 0;
        }
        // line 7
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalField("title", "node", $this->sandbox->ensureToStringAllowed(($context["nodeId"] ?? null), 7, $this->source), "default"), "html", null, true);
    }

    public function getTemplateName()
    {
        return "__string_template__9f7f1c7e96e0e249370ab6a90694438a";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 7,  49 => 5,  46 => 3,  44 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__9f7f1c7e96e0e249370ab6a90694438a", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2, "set" => 3);
        static $filters = array("escape" => 1);
        static $functions = array("drupal_field" => 7);

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
