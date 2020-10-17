<?php

declare(strict_types=1);


namespace Skeleton\Shared\Infrastructure\Doctrine;


use Carbon\Carbon;
use Doctrine\Common\Util\Inflector;
use Doctrine\ORM\EntityRepository;

class DoctrineBaseRepository extends EntityRepository
{
    public function create($data)
    {
        $entity = new $this->_entityName();

        return $this->prepare($entity, array_merge($data->getProp(), ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]));

    }

    public function update($data, $id)
    {
        $entity = $this->FindUuid($id);

        return $this->prepare($entity, array_merge($data->getProp(), ['updated_at' => Carbon::now()]));
    }

    public function FindUuid($uuid)
    {
        return $this->findOneBy(['uuid' => $uuid]);
    }

    public function prepare($entity, $data)
    {
        $set = 'set';
        $whitelist = $entity->whitelist();

        foreach($whitelist as $field){

            if (isset($data[$field])){
                $setter = $set.Inflector::classify($field); // reurn setName

                $entity->$setter($data[$field]);
            }

        }

        return $entity;
    }

    public function save($object)
    {
        $this->_em->persist($object);

        $this->_em->flush($object);

        return $object;
    }

    public function delete($object)
    {
        $this->_em->remove($object);

        $this->_em->flush($object);

        return true;
    }
}
