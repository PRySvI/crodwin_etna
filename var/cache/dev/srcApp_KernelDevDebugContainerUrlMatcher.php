<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = array(
            '/project_create' => array(array(array('_route' => 'project_create', '_controller' => 'App\\Controller\\ProjectController::create'), null, null, null, false, null)),
            '/done' => array(array(array('_route' => 'done_page', '_controller' => 'App\\Controller\\ProjectController::created'), null, null, null, false, null)),
            '/inscription' => array(array(array('_route' => 'security_registration', '_controller' => 'App\\Controller\\SecurityController::registration'), null, null, null, false, null)),
            '/connection' => array(array(array('_route' => 'security_login', '_controller' => 'App\\Controller\\SecurityController::login'), null, null, null, false, null)),
            '/logout' => array(array(array('_route' => 'security_logout', '_controller' => 'App\\Controller\\SecurityController::logout'), null, null, null, false, null)),
            '/hello' => array(array(array('_route' => 'hello_page', '_controller' => 'App\\Controller\\SecurityController::index'), null, null, null, false, null)),
            '/_profiler' => array(array(array('_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'), null, null, null, true, null)),
            '/_profiler/search' => array(array(array('_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'), null, null, null, false, null)),
            '/_profiler/search_bar' => array(array(array('_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'), null, null, null, false, null)),
            '/_profiler/phpinfo' => array(array(array('_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'), null, null, null, false, null)),
            '/_profiler/open' => array(array(array('_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'), null, null, null, false, null)),
        );
        $this->regexpList = array(
            0 => '{^(?'
                    .'|/api(?'
                        .'|(?:/(index)(?:\\.([^/]++))?)?(*:42)'
                        .'|/(?'
                            .'|docs(?:\\.([^/]++))?(*:72)'
                            .'|contexts/(.+)(?:\\.([^/]++))?(*:107)'
                        .')'
                    .')'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:148)'
                        .'|wdt/([^/]++)(*:168)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:214)'
                                .'|router(*:228)'
                                .'|exception(?'
                                    .'|(*:248)'
                                    .'|\\.css(*:261)'
                                .')'
                            .')'
                            .'|(*:271)'
                        .')'
                    .')'
                .')(?:/?)$}sDu',
        );
        $this->dynamicRoutes = array(
            42 => array(array(array('_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => '1', 'index' => 'index'), array('index', '_format'), null, null, false, null)),
            72 => array(array(array('_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_api_respond' => '1', '_format' => ''), array('_format'), null, null, false, null)),
            107 => array(array(array('_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_api_respond' => '1', '_format' => 'jsonld'), array('shortName', '_format'), null, null, false, null)),
            148 => array(array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null, false, null)),
            168 => array(array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null, false, null)),
            214 => array(array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null, false, null)),
            228 => array(array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null, false, null)),
            248 => array(array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null, false, null)),
            261 => array(array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null, false, null)),
            271 => array(array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null, false, null)),
        );
    }
}
