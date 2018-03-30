<?php

namespace AppBundle\Repository;

/**
 * GroupeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GroupeRepository extends \Doctrine\ORM\EntityRepository
{
    public function searchGroup($data)
    {
        $queryBuilder = $this->createQueryBuilder('groupe')
            ->select('groupe')
            ->where('groupe.filiereG=?1')
            ->andWhere('groupe.anneeEtudeG=?2')
            ->andWhere('groupe.matiereG=?3')
            ->andWhere('groupe.jourG=?4');

            $andModule = $queryBuilder->expr()->andX();
            $andModule->add($queryBuilder->expr()->gte('groupe.heureDebutG', '?5'));
            $andModule->add($queryBuilder->expr()->lte('groupe.heureFinG', '?6'));

            $andModule2 = $queryBuilder->expr()->andX();
            $andModule2->add($queryBuilder->expr()->lte('groupe.heureDebutG', '?5'));
            $andModule2->add($queryBuilder->expr()->gte('groupe.heureFinG', '?5'));

            $andModule3 = $queryBuilder->expr()->andX();
            $andModule3->add($queryBuilder->expr()->lte('groupe.heureDebutG', '?6'));
            $andModule3->add($queryBuilder->expr()->gte('groupe.heureFinG', '?6'));

            $orModule = $queryBuilder->expr()->orX();
            $orModule->add($andModule);
            $orModule->add($andModule2);
            $orModule->add($andModule3);

            $queryBuilder->andWhere($orModule);

            $queryBuilder->setParameters(array(1 => $data['filiereG'], 2 => $data['anneeEtudeG'], 3 => $data['matiereG'], 4 => $data['jourG'], 5 => $data['heureDebutG'], 6 => $data['heureFinG']));

        return ($queryBuilder->getQuery()->execute());
    }
}