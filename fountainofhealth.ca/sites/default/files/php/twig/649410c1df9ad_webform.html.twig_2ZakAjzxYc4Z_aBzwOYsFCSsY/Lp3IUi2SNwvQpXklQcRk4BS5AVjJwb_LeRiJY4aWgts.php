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

/* modules/webform/templates/webform.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_webform.html.twig_QE4xW5PrsYE9MzG2aZHvkEWS7/P6ftG2yC7ZBiQddO46JbdL2uvWwFj5RslYk-iq9ZTHM.php
class __TwigTemplate_24dc89eea78f7fef2fbd1feaaf0d7a73 extends Template
========
class __TwigTemplate_f4463a3333db2f4d976533d4deb3cd96 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_webform.html.twig_2ZakAjzxYc4Z_aBzwOYsFCSsY/Lp3IUi2SNwvQpXklQcRk4BS5AVjJwb_LeRiJY4aWgts.php
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
        // line 24
        echo "<form";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 24, $this->source), "html", null, true);
        echo ">
  ";
        // line 25
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 25, $this->source), "html", null, true);
        echo "
  ";
        // line 26
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 26, $this->source), "html", null, true);
        echo "
  ";
        // line 27
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 27, $this->source), "html", null, true);
        echo "
</form>
";
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 27,  48 => 26,  44 => 25,  39 => 24,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_webform.html.twig_QE4xW5PrsYE9MzG2aZHvkEWS7/P6ftG2yC7ZBiQddO46JbdL2uvWwFj5RslYk-iq9ZTHM.php
        return new Source("", "modules/webform/templates/webform.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\modules\\webform\\templates\\webform.html.twig");
========
        return new Source("", "modules/webform/templates/webform.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\modules\\webform\\templates\\webform.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_webform.html.twig_2ZakAjzxYc4Z_aBzwOYsFCSsY/Lp3IUi2SNwvQpXklQcRk4BS5AVjJwb_LeRiJY4aWgts.php
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 24);
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
