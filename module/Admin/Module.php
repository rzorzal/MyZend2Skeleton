<?php

namespace Admin;

use Doctrine\ORM\EntityManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Admin\Domain\Service\AuthService;
use Admin\Domain\Service\ServidorService;
use Admin\Domain\Service\MailService;
use Admin\Domain\Service\ComunidadeService;
use Admin\Domain\Service\CargoService;
use Admin\Domain\Service\PerfilService;
use Admin\Domain\Service\PermissaoService;
use Admin\Domain\Service\SecretariaService;
use Admin\Domain\Service\SetorService;
use Admin\Domain\Service\RequisicaoService;
use Admin\Domain\Service\RequisicaoMensagemService;
use Admin\Domain\Service\RequisicaoDestinoService;
use Admin\Domain\Service\RequisicaoAnexoService;
use Admin\Domain\Service\AtualizacaoService;
use Admin\Domain\Service\AtualizacaoDestinoService;
use Admin\Domain\Service\GatilhoService;

class Module {

    protected $whitelist = array('admin_login');

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
        $auth = $sm->get("auth_service");

        $eventManager->attach(MvcEvent::EVENT_ROUTE, function($e) use ($list, $auth) {
            $match = $e->getRouteMatch();

            $name = explode("/", $match->getMatchedRouteName());
            $name = $name[0];

            if (in_array($name, $list)) {
                return;
            }

            // User is authenticated
            if ($auth->isLogged()) {
                return;
            }

            $router = $e->getRouter();
            $url = $router->assemble(array(), array(
                'name' => 'admin_login'
            ));
            $response = $e->getResponse();
            $response->getHeaders()->addHeaderLine('Location', $url);
            $response->setStatusCode(302);

            return $response;
        }, -100);

        if ($auth->isLogged()) {
            $usuarioLogado = $auth->getServidorLogado();
            $usuarioLogado['cargo'] = $this->em->getRepository("\Admin\Domain\Entity\Cargo")->find($usuarioLogado['cargo']);
            $viewModel->user = $usuarioLogado;
        }
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
                'auth_service' => function ($service) {
                    return new AuthService($service->get('Doctrine\ORM\EntityManager'));
                },
                'servidor_service' => function ($service) {
                    return new ServidorService($service->get('Doctrine\ORM\EntityManager'));
                },
                'mail_service' => function ($service) {
                    return MailService::getInstance($service->get('Doctrine\ORM\EntityManager'));
                },
                'comunidade_service' => function ($service) {
                    return new ComunidadeService($service->get('Doctrine\ORM\EntityManager'));
                },
                'perfil_service' => function ($service) {
                    return new PerfilService($service->get('Doctrine\ORM\EntityManager'));
                },
                'cargo_service' => function ($service) {
                    return new CargoService($service->get('Doctrine\ORM\EntityManager'));
                },
                'permissao_service' => function ($service) {
                    return new PermissaoService($service->get('Doctrine\ORM\EntityManager'));
                },
                'secretaria_service' => function ($service) {
                    return new SecretariaService($service->get('Doctrine\ORM\EntityManager'));
                },
                'setor_service' => function ($service) {
                    return new SetorService($service->get('Doctrine\ORM\EntityManager'));
                },
                'requisicao_service' => function ($service) {
                    return new RequisicaoService($service->get('Doctrine\ORM\EntityManager'));
                },
                'requisicaoMensagem_service' => function ($service) {
                    return new RequisicaoMensagemService($service->get('Doctrine\ORM\EntityManager'));
                },
                'requisicaoAnexo_service' => function ($service) {
                    return new RequisicaoAnexoService($service->get('Doctrine\ORM\EntityManager'));
                },
                'requisicaoDestino_service' => function ($service) {
                    return new RequisicaoDestinoService($service->get('Doctrine\ORM\EntityManager'));
                },
                'atualizacao_service' => function ($service) {
                    return new AtualizacaoService($service->get('Doctrine\ORM\EntityManager'));
                },
                'atualizacaoDestino_service' => function ($service) {
                    return new AtualizacaoDestinoService($service->get('Doctrine\ORM\EntityManager'));
                },
                'gatilho_service' => function ($service) {
                    return GatilhoService::getInstance($service->get('Doctrine\ORM\EntityManager'));
                },
            )
        );
    }

}
