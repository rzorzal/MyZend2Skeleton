<?php

namespace Admin\Infra;

/**
 * Interface Repository
 * @package Admin\Infra
 */
interface Repository extends \Doctrine\ORM\Repository\RepositoryFactory
{

    public function getRepository(\Doctrine\ORM\EntityManagerInterface $entityManager, $entityName);

}
