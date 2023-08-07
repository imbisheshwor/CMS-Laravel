<?php 
namespace App\Repository;

use App\Models\Entity;
interface EntityInterface 
{
    public function list() ; 
    public function findById($id) : Entity;
    public function storeOrUpdate( $id = null, $collection = [] );
    public function destroyById($object);
    public function findWhere( $collection = [] );
}

?>