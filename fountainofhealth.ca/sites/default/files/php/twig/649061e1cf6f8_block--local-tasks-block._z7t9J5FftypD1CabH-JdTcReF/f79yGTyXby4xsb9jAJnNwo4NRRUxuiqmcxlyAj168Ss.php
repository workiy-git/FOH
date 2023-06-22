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

/* themes/bootstrap/templates/block/block--local-tasks-block.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_block--local-tasks-block._z7t9J5FftypD1CabH-JdTcReF/f79yGTyXby4xsb9jAJnNwo4NRRUxuiqmcxlyAj168Ss.php
class __TwigTemplate_cd47c896537cc2d658cb007abeb4e811 extends Template
========
class __TwigTemplate_5046fd44937e6456bce4bcffba1f1777 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_block--local-tasks-block._UvH9BgETYcONm4fTS4ThVoFS6/Rn9W3M_TwH94-99lmzZ5O2VnxkrxsNn4hLI01x3j_f0.php
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "block--bare.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("block--bare.html.twig", "themes/bootstrap/templates/block/block--local-tasks-block.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "  ";
        if (($context["content"] ?? null)) {
            // line 12
            echo "    <nav class=\"tabs\" role=\"navigation\" aria-label=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Tabs"));
            echo "\">
      ";
            // line 13
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 13, $this->source), "html", null, true);
            echo "
    </nav>
  ";
        }
    }

    public function getTemplateName()
    {
        return "themes/bootstrap/templates/block/block--local-tasks-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 13,  55 => 12,  52 => 11,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_block--local-tasks-block._z7t9J5FftypD1CabH-JdTcReF/f79yGTyXby4xsb9jAJnNwo4NRRUxuiqmcxlyAj168Ss.php
        return new Source("", "themes/bootstrap/templates/block/block--local-tasks-block.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\themes\\bootstrap\\templates\\block\\block--local-tasks-block.html.twig");
========
        return new Source("", "themes/bootstrap/templates/block/block--local-tasks-block.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\themes\\bootstrap\\templates\\block\\block--local-tasks-block.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_block--local-tasks-block._UvH9BgETYcONm4fTS4ThVoFS6/Rn9W3M_TwH94-99lmzZ5O2VnxkrxsNn4hLI01x3j_f0.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 11);
        static $filters = array("t" => 12, "escape" => 13);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['t', 'escape'],
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
