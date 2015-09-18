<?php

namespace Admin;

return array(
    'router' => array(
        'routes' => array(
            'home_redirect' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Index',
                        'action' => 'login',
                    ),
                ),
            ),
            'home_admin' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'admin' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/id/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+'
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => 1
                            ),
                        ),
                    ),
                ),
            ),
            'admin_vinculado' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/requisicao/vinculado',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Requisicao',
                        'action' => 'vinculado',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/:hash',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'hash' => '[a-zA-Z0-9_-]+'
                            )
                        ),
                    ),
                ),
            ),
            'admin_login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/login',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Index',
                        'action' => 'login',
                    ),
                ),
            ),
            'admin_api' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/api',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Api',
                        'action' => 'getObras',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/id/:id][/:status]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'tipo' => '\d+',
                                'status' => '[a-zA-Z0-9_-]*',
                            )
                        ),
                    ),
                ),
            ),
            
            
            'admin_requisicao' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/requisicao',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Requisicao',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/id/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'tipo' => '\d+'
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => 1
                            ),
                        ),
                    ),
                ),
            ),
            
            
            'admin_servidor' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/servidor',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Servidor',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/id/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'tipo' => '\d+'
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => 1
                            ),
                        ),
                    ),
                ),
            ),
            
            
            'admin_comunidade' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/comunidade',
                    'defaults' => array(
                        'controller'    => 'Admin\Controller\Comunidade',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/id/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+'
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => 1
                            ),
                        ),
                    ),
                ),
            ),
            
            'admin_ajax' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/ajax',
                    'defaults' => array(
                        'controller'    => 'Admin\Controller\Ajax',
                        'action'        => 'getInfo',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/id/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'tipo' => '\d+'
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => 1
                            ),
                        ),
                    ),
                ),
            ),
            
            
            'admin_secretaria' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/secretaria',
                    'defaults' => array(
                        'controller'    => 'Admin\Controller\Secretaria',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/id/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'tipo' => '\d+'
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => 1
                            ),
                        ),
                    ),
                ),
            ),
            
            
            'admin_setor' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/setor',
                    'defaults' => array(
                        'controller'    => 'Admin\Controller\Setor',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/id/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'tipo' => '\d+'
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => 1
                            ),
                        ),
                    ),
                ),
            ),
            
            
            
            'admin_perfil' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/perfil',
                    'defaults' => array(
                        'controller'    => 'Admin\Controller\Perfil',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/id/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'tipo' => '\d+'
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => 1
                            ),
                        ),
                    ),
                ),
            ),
            
            
            
            'admin_cargo' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/cargo',
                    'defaults' => array(
                        'controller'    => 'Admin\Controller\Cargo',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/id/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'tipo' => '\d+'
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => 1
                            ),
                        ),
                    ),
                ),
            ),
            
            
            
            'admin_redirecionamento' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/redirecionamento',
                    'defaults' => array(
                        'controller'    => 'Admin\Controller\Redirecionamento',
                        'action'        => 'manutencao',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/id/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'tipo' => '\d+'
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                'action' => 'manutencao',
                                'page' => 1
                            ),
                        ),
                    ),
                ),
            ),
            
            
            
        )
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'pt_BR',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Index' => 'Admin\Controller\IndexController',
            'Admin\Controller\Servidor' => 'Admin\Controller\ServidorController',
            'Admin\Controller\Comunidade' => 'Admin\Controller\ComunidadeController',
            'Admin\Controller\Ajax' => 'Admin\Controller\AjaxController',
            'Admin\Controller\Cargo' => 'Admin\Controller\CargoController',
            'Admin\Controller\Secretaria' => 'Admin\Controller\SecretariaController',
            'Admin\Controller\Setor' => 'Admin\Controller\SetorController',
            'Admin\Controller\Perfil' => 'Admin\Controller\PerfilController',
            'Admin\Controller\Redirecionamento' => 'Admin\Controller\RedirecionamentoController',
            'Admin\Controller\Requisicao' => 'Admin\Controller\RequisicaoController',
        ),
    ),
    'module_layouts' => array(
        'Admin' => 'layout/admin',
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/admin' => __DIR__ . '/../view/layout/layout.phtml',
            'admin/index/index' => __DIR__ . '/../view/admin/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'application_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => __DIR__ . '/../src/' . __NAMESPACE__ . '/Domain/Entity',
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Domain' => 'application_entity',
                )
            )
        ),
        'migrations_configuration' => array(
            'orm_default' => array(
                'directory' => 'data/migrations',
                'namespace' => 'DoctrineMigrations',
                'table' => 'migrations',
            ),
        ),
    ),
);
