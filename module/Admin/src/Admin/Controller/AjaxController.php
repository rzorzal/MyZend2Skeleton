<?php

namespace Admin\Controller;

use Admin\Infra\Controller;
use Zend\View\Model\ViewModel;

class AjaxController extends Controller {


    /**
    	Action on javascript
    */
    public function getInfoAction() {
        /** @var HttpRequest $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $dataPost = $request->getPost()->toArray();
            
            
            //HERE YOUR CODE
            
        }
        echo json_encode($entidade);
        exit();
    }

    
    /**
     * 
     * @param string $entity
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getEntityRepositorio($entity) {
        return $this->getEm()->getRepository('Admin\Domain\Entity\\' . $entity);
    }

    /**
     * @return \Dfranquias\Expansao\Domain\Service\RequisicaoDestinoService
     */
    protected function getEntityServico($entity) {
        return $this->getService($entity);
    }

}
