<?php

namespace Admin\Domain\Repository;

use Admin\Domain\Entity\Exemplo;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Admin\Infra\Repository;

/**
 * Class ExemploRepository
 * @package Admin\Domain\Repository
 */
class ExemploRepository extends EntityRepository{
    
    public function findByAtivos(){
        return $this->findBy(array("ativo" => 1),array("nome" => "asc"));
    }
    
    public function findOneByAtivos($data){
        $where['ativo'] = 1;
        foreach($data as $key => $value){
            if(isset($value)  && !empty($value)){
                $where[$key] = $value;
            }
        }
        return $this->findOneBy($where);
    }
    
    
    
}
