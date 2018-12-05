<?php

/* project/project_create.html.twig */
class __TwigTemplate_ddc2956cf11e11642e0317c2d1382e7fc7b5a24f29ea1e774f138ad2da4f7de0 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "project/project_create.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "project/project_create.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "project/project_create.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/multiple-select.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 7
        echo "    ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 7, $this->source); })()), 'form_start');
        echo "
    ";
        // line 8
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 8, $this->source); })()), 'errors');
        echo "

<div class=\"container\">
    <div>
        ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 12, $this->source); })()), "name", array()), 'label');
        echo "
        ";
        // line 13
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 13, $this->source); })()), "name", array()), 'errors');
        echo "
        ";
        // line 14
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 14, $this->source); })()), "name", array()), 'widget');
        echo "
    </div>

    <div>
        ";
        // line 18
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 18, $this->source); })()), "url", array()), 'label');
        echo "
        ";
        // line 19
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 19, $this->source); })()), "url", array()), 'errors');
        echo "
        ";
        // line 20
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 20, $this->source); })()), "url", array()), 'widget');
        echo "
    </div>

    <div>
        ";
        // line 24
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 24, $this->source); })()), "publicVisible", array()), 'label');
        echo "
        ";
        // line 25
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 25, $this->source); })()), "publicVisible", array()), 'errors');
        echo "
        ";
        // line 26
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 26, $this->source); })()), "publicVisible", array()), 'widget');
        echo "
    </div>
    <div>

        ";
        // line 30
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 30, $this->source); })()), "defaultLang", array()), 'errors');
        echo "
        ";
        // line 31
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 31, $this->source); })()), "defaultLang", array()), 'widget');
        echo "
    </div>


    <div>
        <label>Default language</label>
        <select name=\"default_lang\">
            ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new Twig_Error_Runtime('Variable "languages" does not exist.', 38, $this->source); })()));
        foreach ($context['_seq'] as $context["code"] => $context["fullname"]) {
            // line 39
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $context["code"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["fullname"], "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['code'], $context['fullname'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "        </select>

    </div>

    <form name=\"sub_form\">
    <div >
        <div class=\"form-group\">
            <label> Translate to Languages</label>
            <select id=\"ms\" name=\"choised_lang[]\" multiple=\"multiple\">
                ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new Twig_Error_Runtime('Variable "languages" does not exist.', 50, $this->source); })()));
        foreach ($context['_seq'] as $context["code"] => $context["fullname"]) {
            // line 51
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $context["code"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["fullname"], "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['code'], $context['fullname'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "
            </select>
        </div>
    </div>
    </form>

    <!--<button  type=\"submit\" >OKAY</button>-->
    <div>
        ";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 61, $this->source); })()), "submit", array()), 'widget');
        echo "
    </div>

</div>
";
        // line 65
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formP"]) || array_key_exists("formP", $context) ? $context["formP"] : (function () { throw new Twig_Error_Runtime('Variable "formP" does not exist.', 65, $this->source); })()), 'form_end');
        echo "
    ";
        // line 66
        $this->displayBlock('javascripts', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 67
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/multiple-select.js"), "html", null, true);
        echo "\"></script>
        <script>
            \$(function() {
                \$('#ms').change(function() {
                    console.log(\$(this).val());
                }).multipleSelect({
                    width: '100%'
                });
            });
        </script>
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "project/project_create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  237 => 68,  232 => 67,  214 => 66,  210 => 65,  203 => 61,  193 => 53,  182 => 51,  178 => 50,  167 => 41,  156 => 39,  152 => 38,  142 => 31,  138 => 30,  131 => 26,  127 => 25,  123 => 24,  116 => 20,  112 => 19,  108 => 18,  101 => 14,  97 => 13,  93 => 12,  86 => 8,  81 => 7,  72 => 6,  60 => 4,  55 => 3,  46 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap.css') }}\" />
    <link rel=\"stylesheet\" href=\"{{ asset('css/multiple-select.css') }}\" />
{% endblock %}
{% block body %}
    {{ form_start(formP) }}
    {{ form_errors(formP) }}

<div class=\"container\">
    <div>
        {{ form_label(formP.name) }}
        {{ form_errors(formP.name) }}
        {{ form_widget(formP.name) }}
    </div>

    <div>
        {{ form_label(formP.url) }}
        {{ form_errors(formP.url) }}
        {{ form_widget(formP.url) }}
    </div>

    <div>
        {{ form_label(formP.publicVisible) }}
        {{ form_errors(formP.publicVisible) }}
        {{ form_widget(formP.publicVisible) }}
    </div>
    <div>

        {{ form_errors(formP.defaultLang) }}
        {{ form_widget(formP.defaultLang) }}
    </div>


    <div>
        <label>Default language</label>
        <select name=\"default_lang\">
            {% for code , fullname in languages %}
            <option value=\"{{ code }}\">{{ fullname }}</option>
            {% endfor %}
        </select>

    </div>

    <form name=\"sub_form\">
    <div >
        <div class=\"form-group\">
            <label> Translate to Languages</label>
            <select id=\"ms\" name=\"choised_lang[]\" multiple=\"multiple\">
                {% for code , fullname in languages %}
                    <option value=\"{{ code }}\">{{ fullname }}</option>
                {% endfor %}

            </select>
        </div>
    </div>
    </form>

    <!--<button  type=\"submit\" >OKAY</button>-->
    <div>
        {{ form_widget(formP.submit) }}
    </div>

</div>
{{ form_end(formP) }}
    {% block javascripts %}
        <script src=\"{{ asset('js/jquery.min.js') }}\"></script>
        <script src=\"{{ asset('js/multiple-select.js') }}\"></script>
        <script>
            \$(function() {
                \$('#ms').change(function() {
                    console.log(\$(this).val());
                }).multipleSelect({
                    width: '100%'
                });
            });
        </script>
        {% endblock %}
{% endblock %}

", "project/project_create.html.twig", "/mnt/DATA/ETNA/Projets 2018/Crowdin/templates/project/project_create.html.twig");
    }
}
