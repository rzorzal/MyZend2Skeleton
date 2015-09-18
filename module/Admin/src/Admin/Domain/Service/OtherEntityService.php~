<?php
namespace Admin\Domain\Service;

use Admin\Infra\Service;
use Admin\Domain\Entity\Exemplo;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\ClassMethods as HydratorClassMethods;

/**
 * Class ExemploService
 * @package Admin\Domain\Service
 */
class ExemploService extends Service
{
    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    /**
     * @param array $data
     * @return Setor
     */
    public function criar(array $data)
    {
        $exemplo = new Exemplo();
        unset($data['id']);
        
        $data['ativo'] = 1;
        
        $data = $this->prepareAttributes($data);
        
        $data['dataAlteracao'] = new \DateTime("now");

        
        $hydrator = new HydratorClassMethods();
        $entity = $hydrator->hydrate($data, $exemplo);

        $this->em->persist($entity);
        $this->em->flush();

        return $exemplo;
    }

    /**
     * @param array $data
     * @return Setor
     */
    public function atualizar(array $data)
    {
        $exemplo = $this->em->getReference(
            'Admin\Domain\Entity\Exemplo',
            (int) $data['id']
        );

        $data = $this->prepareAttributes($data);

        $data['dataAlteracao'] = new \DateTime("now");
        
        $hydrator = new HydratorClassMethods();
        $exemplo = $hydrator->hydrate($data, $exemplo);

        $this->em->persist($exemplo);
        $this->em->flush();

        return $exemplo;
    }

    /**
     * @param $id
     * @return integer
     */
    public function excluir($id)
    {
        $entity = $this->em->getReference(
            'Admin\Domain\Entity\Exemplo',
            (int) $id
        );

        $this->em->remove($entity);
        $this->em->flush();

        return (int) $id;
    }
}
