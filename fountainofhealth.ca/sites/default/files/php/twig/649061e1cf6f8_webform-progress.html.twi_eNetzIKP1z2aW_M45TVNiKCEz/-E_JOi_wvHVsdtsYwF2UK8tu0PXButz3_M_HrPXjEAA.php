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

/* modules/webform/templates/webform-progress.html.twig */
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_webform-progress.html.twi_eNetzIKP1z2aW_M45TVNiKCEz/-E_JOi_wvHVsdtsYwF2UK8tu0PXButz3_M_HrPXjEAA.php
class __TwigTemplate_5cbf8573b28a662fc7d3d70cb061f8f5 extends Template
========
class __TwigTemplate_6f7c6dcd8260aa3031b350ab4d302e37 extends Template
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_webform-progress.html.twi_WTR8W-RgyLBkwPJihMhuTbZ0Y/o45B3IXznrC8jtFd9PJRndQ6r8KicYhMnPWDEaDHBes.php
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
        // line 21
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("webform/webform.progress"), "html", null, true);
        echo "

<div class=\"webform-progress\">

  ";
        // line 25
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["bar"] ?? null), 25, $this->source), "html", null, true);
        echo "

  ";
        // line 27
        if ((($context["summary"] ?? null) || ($context["percentage"] ?? null))) {
            // line 28
            echo "    <div class=\"webform-progress__status\">
      ";
            // line 29
            if (($context["summary"] ?? null)) {
                // line 30
                echo "        <span class=\"webform-progress__summary\" data-webform-progress-summary>";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["summary"] ?? null), 30, $this->source), "html", null, true);
                echo "</span>
        ";
                // line 31
                if (($context["percentage"] ?? null)) {
                    // line 32
                    echo "          <span class=\"webform-progress__percentage\">(<span data-webform-progress-percentage>";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["percentage"] ?? null), 32, $this->source), "html", null, true);
                    echo "</span>)</span>
        ";
                }
                // line 34
                echo "      ";
            } else {
                // line 35
                echo "        <span class=\"webform-progress__percentage\" data-webform-progress-percentage>";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["percentage"] ?? null), 35, $this->source), "html", null, true);
                echo "</span>
      ";
            }
            // line 37
            echo "    </div>
  ";
        }
        // line 39
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-progress.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 39,  80 => 37,  74 => 35,  71 => 34,  65 => 32,  63 => 31,  58 => 30,  56 => 29,  53 => 28,  51 => 27,  46 => 25,  39 => 21,);
    }

    public function getSourceContext()
    {
<<<<<<<< Updated upstream:fountainofhealth.ca/sites/default/files/php/twig/649061e1cf6f8_webform-progress.html.twi_eNetzIKP1z2aW_M45TVNiKCEz/-E_JOi_wvHVsdtsYwF2UK8tu0PXButz3_M_HrPXjEAA.php
        return new Source("", "modules/webform/templates/webform-progress.html.twig", "D:\\xampp\\htdocs\\fountainofhealth.ca\\modules\\webform\\templates\\webform-progress.html.twig");
========
        return new Source("", "modules/webform/templates/webform-progress.html.twig", "D:\\xampp\\htdocs\\FOH\\fountainofhealth.ca\\modules\\webform\\templates\\webform-progress.html.twig");
>>>>>>>> Stashed changes:fountainofhealth.ca/sites/default/files/php/twig/649410c1df9ad_webform-progress.html.twi_WTR8W-RgyLBkwPJihMhuTbZ0Y/o45B3IXznrC8jtFd9PJRndQ6r8KicYhMnPWDEaDHBes.php
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 27);
        static $filters = array("escape" => 21);
        static $functions = array("attach_library" => 21);

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                ['attach_library']
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
