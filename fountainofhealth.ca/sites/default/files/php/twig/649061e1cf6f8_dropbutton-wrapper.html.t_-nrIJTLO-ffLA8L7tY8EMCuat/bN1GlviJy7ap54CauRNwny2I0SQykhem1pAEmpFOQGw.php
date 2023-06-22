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

/* core/modules/system/templates/dropbutton-wrapper.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_dropbutton-wrapper.html.t_-nrIJTLO-ffLA8L7tY8EMCuat/bN1GlviJy7ap54CauRNwny2I0SQykhem1pAEmpFOQGw.php
class __TwigTemplate_58ed99f62b680440f5627b260731cb72 extends Template
========
class __TwigTemplate_f4d9cf88485adc8bed1fad52ce1125a5 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_dropbutton-wrapper.html.t_7dmsMZHQ-kFQCGseEoVzzaUXp/c8s7yHBu7CqQ3K2LUc1d1MCEFekWsf85zHtydgmUe0E.php
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
        // line 14
        if (($context["children"] ?? null)) {
            // line 15
            echo "  ";
            ob_start(function () { return ''; });
            // line 16
            echo "    <div class=\"dropbutton-wrapper\">
      <div class=\"dropbutton-widget\">
        ";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 18, $this->source), "html", null, true);
            echo "
      </div>
    </div>
  ";
            $___internal_parse_2_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 15
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_spaceless($___internal_parse_2_));
        }
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/dropbutton-wrapper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 15,  48 => 18,  44 => 16,  41 => 15,  39 => 14,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_dropbutton-wrapper.html.t_-nrIJTLO-ffLA8L7tY8EMCuat/bN1GlviJy7ap54CauRNwny2I0SQykhem1pAEmpFOQGw.php
        return new Source("", "core/modules/system/templates/dropbutton-wrapper.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\core\\modules\\system\\templates\\dropbutton-wrapper.html.twig");
========
        return new Source("", "core/modules/system/templates/dropbutton-wrapper.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\core\\modules\\system\\templates\\dropbutton-wrapper.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_dropbutton-wrapper.html.t_7dmsMZHQ-kFQCGseEoVzzaUXp/c8s7yHBu7CqQ3K2LUc1d1MCEFekWsf85zHtydgmUe0E.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 14, "apply" => 15);
        static $filters = array("escape" => 18, "spaceless" => 15);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'apply'],
                ['escape', 'spaceless'],
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
