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

/* core/modules/system/templates/form.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_form.html.twig_1vI3ekObRY9lKQjCQ8WFVrAm8/mOp_MuLStdi0QtyG7ZGzev6N6pfE842Blz7ZHOUkrqY.php
class __TwigTemplate_2f16ba2414e394121350ec44b7b3c201 extends Template
========
class __TwigTemplate_b899ce1539df57e8a3aaaa28fc4ca55b extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_form.html.twig_-yWcZspL7Nhw2r2zu9u3aSvwP/khyzqf-wMbNix6bjCsLzE0nnFMOm3d3w6muNWpNrwTY.php
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
        echo "<form";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 15, $this->source), "html", null, true);
        echo ">
  ";
        // line 16
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 16, $this->source), "html", null, true);
        echo "
</form>
";
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 16,  39 => 15,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_form.html.twig_1vI3ekObRY9lKQjCQ8WFVrAm8/mOp_MuLStdi0QtyG7ZGzev6N6pfE842Blz7ZHOUkrqY.php
        return new Source("", "core/modules/system/templates/form.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\modules\\system\\templates\\form.html.twig");
========
        return new Source("", "core/modules/system/templates/form.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\modules\\system\\templates\\form.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_form.html.twig_-yWcZspL7Nhw2r2zu9u3aSvwP/khyzqf-wMbNix6bjCsLzE0nnFMOm3d3w6muNWpNrwTY.php
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
