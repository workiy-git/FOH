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

/* core/themes/claro/templates/form/textarea.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_textarea.html.twig_vSbkXukQ-qgr8FvSYTd-ZfLb1/hT9nInNWlB6iPXrslY1DKow2SCn19D2WMDJ7DBL-QpU.php
class __TwigTemplate_a9f0a17b9593440bb365251395bb2c64 extends Template
========
class __TwigTemplate_8254045aa203a13e3628bdaf672d6992 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_textarea.html.twig_zTxdpoT3d7E-gjX6_NJptccNt/fVYxv0Zh7Bz9X1KzZiuliiuZv3y3BWdKvb_7-5bfLBs.php
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
        // line 17
        $context["classes"] = [0 => "form-textarea", 1 => ((        // line 19
($context["resizable"] ?? null)) ? (("resize-" . $this->sandbox->ensureToStringAllowed(($context["resizable"] ?? null), 19, $this->source))) : ("")), 2 => ((        // line 20
($context["required"] ?? null)) ? ("required") : ("")), 3 => "form-element", 4 => "form-element--type-textarea", 5 => "form-element--api-textarea"];
        // line 26
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["wrapper_attributes"] ?? null), "addClass", [0 => "form-textarea-wrapper"], "method", false, false, true, 26), 26, $this->source), "html", null, true);
        echo ">
  <textarea";
        // line 27
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 27), 27, $this->source), "html", null, true);
        echo ">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["value"] ?? null), 27, $this->source), "html", null, true);
        echo "</textarea>
</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/claro/templates/form/textarea.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 27,  43 => 26,  41 => 20,  40 => 19,  39 => 17,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_textarea.html.twig_vSbkXukQ-qgr8FvSYTd-ZfLb1/hT9nInNWlB6iPXrslY1DKow2SCn19D2WMDJ7DBL-QpU.php
        return new Source("", "core/themes/claro/templates/form/textarea.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\themes\\claro\\templates\\form\\textarea.html.twig");
========
        return new Source("", "core/themes/claro/templates/form/textarea.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\themes\\claro\\templates\\form\\textarea.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_textarea.html.twig_zTxdpoT3d7E-gjX6_NJptccNt/fVYxv0Zh7Bz9X1KzZiuliiuZv3y3BWdKvb_7-5bfLBs.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 17);
        static $filters = array("escape" => 26);
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
