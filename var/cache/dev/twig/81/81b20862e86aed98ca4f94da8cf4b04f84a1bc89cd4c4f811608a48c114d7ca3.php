<?php

/* @ApiPlatform/DataCollector/request.html.twig */
class __TwigTemplate_4060853c5cba3fca84f244869c157c90163df7caa0706cf3bd37adc6e6437992 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@ApiPlatform/DataCollector/request.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@ApiPlatform/DataCollector/request.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@ApiPlatform/DataCollector/request.html.twig"));

        // line 10
        $context["apiPlatform"] = $this;
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 12
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        // line 13
        echo "    ";
        ob_start();
        // line 14
        echo "        ";
        $context["status_color"] = ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "counters", array(), "any", false, true), "ignored_filters", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "counters", array(), "any", false, true), "ignored_filters", array()), false)) : (false))) ? ("yellow") : ("default"));
        // line 15
        echo "        ";
        echo twig_include($this->env, $context, "@ApiPlatform/DataCollector/api-platform-icon.svg");
        echo "
        <span class=\"sf-toolbar-value\"></span>
    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 18
        echo "
    ";
        // line 19
        ob_start();
        // line 20
        echo "        <div class=\"sf-toolbar-info-piece\">
            <b>Resource Class</b>
            <span>";
        // line 22
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "resourceClass", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "resourceClass", array()), "Not an API Platform resource")) : ("Not an API Platform resource")), "html", null, true);
        echo "</span>
        </div>
        ";
        // line 24
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "counters", array(), "any", false, true), "ignored_filters", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "counters", array(), "any", false, true), "ignored_filters", array()), false)) : (false))) {
            // line 25
            echo "            <div class=\"sf-toolbar-info-piece\">
                <b>Ignored Filters</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-yellow\">";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 27, $this->source); })()), "counters", array()), "ignored_filters", array()), "html", null, true);
            echo "</span>
            </div>
        ";
        }
        // line 30
        echo "    ";
        $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 31
        echo "
    ";
        // line 32
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", array("link" => true, "status" => (isset($context["status_color"]) || array_key_exists("status_color", $context) ? $context["status_color"] : (function () { throw new Twig_Error_Runtime('Variable "status_color" does not exist.', 32, $this->source); })())));
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 35
    public function block_menu($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 36
        echo "    ";
        // line 37
        echo "    <span class=\"label";
        echo ((twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 37, $this->source); })()), "resourceClass", array())) ? ("") : (" disabled"));
        echo "\">
        <span class=\"icon\">
            ";
        // line 39
        echo twig_include($this->env, $context, "@ApiPlatform/DataCollector/api-platform.svg");
        echo "
        </span>
        <strong>API Platform</strong>
    </span>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 45
    public function block_panel($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 46
        echo "    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">";
        // line 48
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "resourceClass", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "resourceClass", array()), "Not an API Platform resource")) : ("Not an API Platform resource")), "html", null, true);
        echo "</span>
            <span class=\"label\">Resource class</span>
        </div>
    </div>

    ";
        // line 53
        if (twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 53, $this->source); })()), "resourceMetadata", array())) {
            // line 54
            echo "        <h2>Metadata</h2>
        <h3>Short name: \"";
            // line 55
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 55, $this->source); })()), "resourceMetadata", array()), "shortName", array()), "html", null, true);
            echo "\"</h3>
        <table>
            <thead>
                <tr>
                    <th scope=\"col\" class=\"key\">
                        Item operations
                    </th>
                    <th scope=\"col\">
                        Attributes
                    </th>
                </tr>
            </thead>

            <tbody>
                ";
            // line 69
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 69, $this->source); })()), "resourceMetadata", array()), "itemOperations", array()));
            foreach ($context['_seq'] as $context["key"] => $context["itemOperation"]) {
                // line 70
                echo "                    ";
                echo $context["apiPlatform"]->macro_operationLine($context["key"], $context["itemOperation"], ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "requestAttributes", array(), "any", false, true), "item_operation_name", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "requestAttributes", array(), "any", false, true), "item_operation_name", array()), "")) : ("")));
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['itemOperation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th scope=\"col\" class=\"key\">
                        Collection operations
                    </th>
                    <th scope=\"col\">
                        Attributes
                    </th>
                </tr>
            </thead>

            <tbody>
                ";
            // line 88
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 88, $this->source); })()), "resourceMetadata", array()), "collectionOperations", array()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["key"] => $context["collectionOperation"]) {
                // line 89
                echo "                    ";
                echo $context["apiPlatform"]->macro_operationLine($context["key"], $context["collectionOperation"], ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "requestAttributes", array(), "any", false, true), "collection_operation_name", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "requestAttributes", array(), "any", false, true), "collection_operation_name", array()), "")) : ("")));
                echo "
                ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 91
                echo "                    <tr>
                        <td colspan=\"2\" class=\"text-muted\">
                            No available collection operation for this resource.
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['collectionOperation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 97
            echo "            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th scope=\"col\">
                        Filters
                    </th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 109
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 109, $this->source); })()), "filters", array()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["id"] => $context["filter"]) {
                // line 110
                echo "                    ";
                $context["ignored_filter"] = ($context["filter"] === null);
                // line 111
                echo "                    <tr";
                if ((isset($context["ignored_filter"]) || array_key_exists("ignored_filter", $context) ? $context["ignored_filter"] : (function () { throw new Twig_Error_Runtime('Variable "ignored_filter" does not exist.', 111, $this->source); })())) {
                    echo " class=\"status-warning\"";
                }
                echo ">
                        <td>
                            ";
                // line 113
                echo twig_escape_filter($this->env, $context["id"], "html", null, true);
                echo "
                            ";
                // line 114
                if ((isset($context["ignored_filter"]) || array_key_exists("ignored_filter", $context) ? $context["ignored_filter"] : (function () { throw new Twig_Error_Runtime('Variable "ignored_filter" does not exist.', 114, $this->source); })())) {
                    // line 115
                    echo "                                <span class=\"newline text-muted\">ignored filter</span>
                            ";
                } else {
                    // line 117
                    echo "                                ";
                    echo twig_var_dump($this->env, $context, $context["filter"]);
                    echo "
                            ";
                }
                // line 119
                echo "                        </td>
                    </tr>
                ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 122
                echo "                    <tr>
                        <td class=\"text-muted\">
                            No available filter declared for this resource.
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['filter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 128
            echo "            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th scope=\"col\" class=\"key\">
                        Attributes
                    </th>
                    <th scope=\"col\"></th>
                </tr>
            </thead>

            <tbody>
                ";
            // line 142
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 142, $this->source); })()), "resourceMetadata", array()), "attributes", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                if (($context["key"] != "filters")) {
                    // line 143
                    echo "                    <tr>
                        <th scope=\"row\">
                            ";
                    // line 145
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "
                        </th>
                        <td>";
                    // line 148
                    echo $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, $context["value"], 2);
                    // line 149
                    echo "</td>
                    </tr>
                ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            echo "            </tbody>
        </table>
        <h2>Acceptable Content Types</h2>
        <table>
            <thead>
            <tr>
                <th>Content Type</th>
            </tr>
            </thead>

            <tbody>
                ";
            // line 163
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 163, $this->source); })()), "acceptableContentTypes", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
                // line 164
                echo "                    <tr>
                        <td>";
                // line 165
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 168
            echo "            </tbody>
        </table>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 3
    public function macro_operationLine($__key__ = null, $__operation__ = null, $__actualOperationName__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "key" => $__key__,
            "operation" => $__operation__,
            "actualOperationName" => $__actualOperationName__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "operationLine"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "operationLine"));

            // line 4
            echo "    <tr>
        <th scope=\"row\"";
            // line 5
            if (((isset($context["key"]) || array_key_exists("key", $context) ? $context["key"] : (function () { throw new Twig_Error_Runtime('Variable "key" does not exist.', 5, $this->source); })()) == (isset($context["actualOperationName"]) || array_key_exists("actualOperationName", $context) ? $context["actualOperationName"] : (function () { throw new Twig_Error_Runtime('Variable "actualOperationName" does not exist.', 5, $this->source); })()))) {
                echo " class=\"status-success\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["key"]) || array_key_exists("key", $context) ? $context["key"] : (function () { throw new Twig_Error_Runtime('Variable "key" does not exist.', 5, $this->source); })()), "html", null, true);
            echo "</th>
        <td";
            // line 6
            if (((isset($context["key"]) || array_key_exists("key", $context) ? $context["key"] : (function () { throw new Twig_Error_Runtime('Variable "key" does not exist.', 6, $this->source); })()) == (isset($context["actualOperationName"]) || array_key_exists("actualOperationName", $context) ? $context["actualOperationName"] : (function () { throw new Twig_Error_Runtime('Variable "actualOperationName" does not exist.', 6, $this->source); })()))) {
                echo " class=\"status-success\"";
            }
            echo ">";
            echo $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, (isset($context["operation"]) || array_key_exists("operation", $context) ? $context["operation"] : (function () { throw new Twig_Error_Runtime('Variable "operation" does not exist.', 6, $this->source); })()), 1);
            echo "</td>
    </tr>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@ApiPlatform/DataCollector/request.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  423 => 6,  415 => 5,  412 => 4,  392 => 3,  379 => 168,  370 => 165,  367 => 164,  363 => 163,  350 => 152,  341 => 149,  339 => 148,  334 => 145,  330 => 143,  325 => 142,  309 => 128,  298 => 122,  291 => 119,  285 => 117,  281 => 115,  279 => 114,  275 => 113,  267 => 111,  264 => 110,  259 => 109,  245 => 97,  234 => 91,  226 => 89,  221 => 88,  203 => 72,  194 => 70,  190 => 69,  173 => 55,  170 => 54,  168 => 53,  160 => 48,  156 => 46,  147 => 45,  132 => 39,  126 => 37,  124 => 36,  115 => 35,  103 => 32,  100 => 31,  97 => 30,  91 => 27,  87 => 25,  85 => 24,  80 => 22,  76 => 20,  74 => 19,  71 => 18,  64 => 15,  61 => 14,  58 => 13,  49 => 12,  39 => 1,  37 => 10,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% macro operationLine(key, operation, actualOperationName) %}
    <tr>
        <th scope=\"row\"{% if key == actualOperationName %} class=\"status-success\"{% endif %}>{{ key }}</th>
        <td{% if key == actualOperationName %} class=\"status-success\"{% endif %}>{{- profiler_dump(operation, 1) -}}</td>
    </tr>
{% endmacro %}

{% import _self as apiPlatform %}

{% block toolbar %}
    {% set icon %}
        {% set status_color = collector.counters.ignored_filters|default(false) ? 'yellow' : 'default' %}
        {{ include('@ApiPlatform/DataCollector/api-platform-icon.svg') }}
        <span class=\"sf-toolbar-value\"></span>
    {% endset %}

    {% set text %}
        <div class=\"sf-toolbar-info-piece\">
            <b>Resource Class</b>
            <span>{{ collector.resourceClass|default('Not an API Platform resource') }}</span>
        </div>
        {% if collector.counters.ignored_filters|default(false) %}
            <div class=\"sf-toolbar-info-piece\">
                <b>Ignored Filters</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-yellow\">{{ collector.counters.ignored_filters }}</span>
            </div>
        {% endif %}
    {% endset %}

    {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { 'link': true, status: status_color }) }}
{% endblock %}

{% block menu %}
    {# This left-hand menu appears when using the full-screen profiler. #}
    <span class=\"label{{ collector.resourceClass ? '' : ' disabled' }}\">
        <span class=\"icon\">
            {{ include('@ApiPlatform/DataCollector/api-platform.svg') }}
        </span>
        <strong>API Platform</strong>
    </span>
{% endblock %}

{% block panel %}
    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">{{ collector.resourceClass|default('Not an API Platform resource') }}</span>
            <span class=\"label\">Resource class</span>
        </div>
    </div>

    {% if collector.resourceMetadata %}
        <h2>Metadata</h2>
        <h3>Short name: \"{{ collector.resourceMetadata.shortName }}\"</h3>
        <table>
            <thead>
                <tr>
                    <th scope=\"col\" class=\"key\">
                        Item operations
                    </th>
                    <th scope=\"col\">
                        Attributes
                    </th>
                </tr>
            </thead>

            <tbody>
                {% for key, itemOperation in collector.resourceMetadata.itemOperations %}
                    {{ apiPlatform.operationLine(key, itemOperation, collector.requestAttributes.item_operation_name|default('')) }}
                {% endfor %}
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th scope=\"col\" class=\"key\">
                        Collection operations
                    </th>
                    <th scope=\"col\">
                        Attributes
                    </th>
                </tr>
            </thead>

            <tbody>
                {% for key, collectionOperation in collector.resourceMetadata.collectionOperations %}
                    {{ apiPlatform.operationLine(key, collectionOperation, collector.requestAttributes.collection_operation_name|default('')) }}
                {% else %}
                    <tr>
                        <td colspan=\"2\" class=\"text-muted\">
                            No available collection operation for this resource.
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th scope=\"col\">
                        Filters
                    </th>
                </tr>
            </thead>
            <tbody>
                {% for id, filter in collector.filters %}
                    {% set ignored_filter = filter is same as(null) %}
                    <tr{% if ignored_filter %} class=\"status-warning\"{% endif %}>
                        <td>
                            {{ id }}
                            {% if ignored_filter %}
                                <span class=\"newline text-muted\">ignored filter</span>
                            {% else %}
                                {{ dump(filter) }}
                            {% endif %}
                        </td>
                    </tr>
                {% else %}
                    <tr>
                        <td class=\"text-muted\">
                            No available filter declared for this resource.
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th scope=\"col\" class=\"key\">
                        Attributes
                    </th>
                    <th scope=\"col\"></th>
                </tr>
            </thead>

            <tbody>
                {% for key, value in collector.resourceMetadata.attributes if key != 'filters' %}
                    <tr>
                        <th scope=\"row\">
                            {{ key }}
                        </th>
                        <td>
                            {{- profiler_dump(value, 2) -}}
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
        <h2>Acceptable Content Types</h2>
        <table>
            <thead>
            <tr>
                <th>Content Type</th>
            </tr>
            </thead>

            <tbody>
                {% for type in collector.acceptableContentTypes %}
                    <tr>
                        <td>{{ type }}</td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    {% endif %}
{% endblock %}
", "@ApiPlatform/DataCollector/request.html.twig", "/mnt/DATA/ETNA/Projets 2018/Crowdin/vendor/api-platform/core/src/Bridge/Symfony/Bundle/Resources/views/DataCollector/request.html.twig");
    }
}
