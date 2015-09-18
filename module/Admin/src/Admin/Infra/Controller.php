<?php

namespace Admin\Infra;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Class Controller
 * @package Admin\Infra
 */
abstract class Controller extends AbstractActionController
{
    
    /**
     * @param $service
     * @return object Service
     */
    protected function getService($service)
    {
        $serviceLocator = $this->getServiceLocator()->get($service);
        return $serviceLocator;
    }

    /**
     * 
     * @param object $entity
     * @return array
     */
    protected function entityToArray($entity)
    {
        $hydrator = new ClassMethods();
        return $hydrator->extract($entity);
    }

    /*
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm()
    {
        return $this->getService('Doctrine\ORM\EntityManager');
    }
    
    /**
     * Retorna uma instancia do Serviço de Autenticação
     * 
     * @return \Dfranquias\Expansao\Domain\Service\AuthService
     */
    protected function getAuthServico()
    {
        return $this->getService('auth_service');
    }
    
}
