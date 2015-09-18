<?php
namespace Admin\Domain\Service;

use Admin\Infra\Service;
use Admin\Domain\Entity\OtherEntity;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\ClassMethods as HydratorClassMethods;

/**
 * Class OtherEntityService
 * @package Admin\Domain\Service
 */
class OtherEntityService extends Service
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
        $otherEntity = new OtherEntity();
        unset($data['id']);
        
        $data['ativo'] = 1;
        
        $data = $this->prepareAttributes($data);
        
        $data['dataAlteracao'] = new \DateTime("now");

        
        $hydrator = new HydratorClassMethods();
        $entity = $hydrator->hydrate($data, $otherEntity);

        $this->em->persist($entity);
        $this->em->flush();

        return $otherEntity;
    }

    /**
     * @param array $data
     * @return Setor
     */
    public function atualizar(array $data)
    {
        $exemplo = $this->em->getReference(
            'Admin\Domain\Entity\OtherEntity',
            (int) $data['id']
        );

        $data = $this->prepareAttributes($data);

        $data['dataAlteracao'] = new \DateTime("now");
        
        $hydrator = new HydratorClassMethods();
        $otherEntity = $hydrator->hydrate($data, $otherEntity);

        $this->em->persist($otherEntity);
        $this->em->flush();

        return $otherEntity;
    }

    /**
     * @param $id
     * @return integer
     */
    public function excluir($id)
    {
        $entity = $this->em->getReference(
            'Admin\Domain\Entity\OtherEntity',
            (int) $id
        );

        $this->em->remove($entity);
        $this->em->flush();

        return (int) $id;
    }
}
