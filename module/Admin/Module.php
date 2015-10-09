<?php

namespace Admin;

use Doctrine\ORM\EntityManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;


class Module {

    protected $whitelist = array();

    /**
     *
     * @var EntityManager 
     */
    private $em;

    public function onBootstrap(MvcEvent $e) {
        $app = $e->getApplication();
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $sm = $app->getServiceManager();

        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $config = $e->getApplication()->getServiceManager()->get('config');

            if (isset($config['module_layouts'][$moduleNamespace])) {
                $controller->layout($config['module_layouts'][$moduleNamespace]);
            }
        }
                , 100);


        $viewModel = $e->getApplication()->getMvcEvent()->getViewModel();
        /**
         * @var EntityManager
         */
        $this->em = $sm->get('Doctrine\ORM\EntityManager');
        $list = $this->whitelist;

        

    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    'Admin\Controller' => __DIR__ . '/src/Admin/Controller',
                    'Admin\Domain' => __DIR__ . '/src/Admin/Domain',
                    'Admin\Form' => __DIR__ . '/src/Admin/Form',
                    'Admin\Infra' => __DIR__ . '/src/Admin/Infra',
                ),
            ),
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(

            )
        );
    }

}
