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

/* core/themes/claro/templates/views/views-ui-display-tab-setting.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_views-ui-display-tab-sett_hFm3dzjP3F8za96gsAmuOsVKF/RSK5DX-3tZ2BKwc5BLj5ESsVDH1MjoU7cl1nqpFxnC8.php
class __TwigTemplate_fd5d5281aed124f2663abf35635259bf extends Template
========
class __TwigTemplate_985accda3ac3ac33e6104793a85167e9 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_views-ui-display-tab-sett_QgPZ5hcq6JuvGgQP3T6j7Wquk/-1Vpw0FhxLcGQdQ2DFRj5azfvxCIeK7WziMEFcjBLW8.php
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
        $context["classes"] = [0 => "views-display-setting", 1 => "views-ui-display-tab-setting", 2 => ((        // line 25
($context["defaulted"] ?? null)) ? ("defaulted") : ("")), 3 => ((        // line 26
($context["overridden"] ?? null)) ? ("overridden") : (""))];
        // line 29
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 29), 29, $this->source), "html", null, true);
        echo ">
  ";
        // line 30
        if (($context["description"] ?? null)) {
            // line 31
            echo "<span class=\"label\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 31, $this->source), "html", null, true);
            echo "</span>";
        }
        // line 33
        echo "  ";
        if (($context["settings_links"] ?? null)) {
            // line 34
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(($context["settings_links"] ?? null), 34, $this->source), "<span class=\"label label--separator\">&nbsp;|&nbsp;</span>"));
            echo "
  ";
        }
        // line 36
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/claro/templates/views/views-ui-display-tab-setting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 36,  58 => 34,  55 => 33,  50 => 31,  48 => 30,  43 => 29,  41 => 26,  40 => 25,  39 => 22,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_views-ui-display-tab-sett_hFm3dzjP3F8za96gsAmuOsVKF/RSK5DX-3tZ2BKwc5BLj5ESsVDH1MjoU7cl1nqpFxnC8.php
        return new Source("", "core/themes/claro/templates/views/views-ui-display-tab-setting.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\themes\\claro\\templates\\views\\views-ui-display-tab-setting.html.twig");
========
        return new Source("", "core/themes/claro/templates/views/views-ui-display-tab-setting.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\themes\\claro\\templates\\views\\views-ui-display-tab-setting.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_views-ui-display-tab-sett_QgPZ5hcq6JuvGgQP3T6j7Wquk/-1Vpw0FhxLcGQdQ2DFRj5azfvxCIeK7WziMEFcjBLW8.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 22, "if" => 30);
        static $filters = array("escape" => 29, "safe_join" => 34);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'safe_join'],
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
