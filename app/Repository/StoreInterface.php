<?php
namespace App\Repository;

use App\Models\Store;
interface StoreInterface
{
    public function list($slug) ;
    public function findById($id) : Store;
    public function storeOrUpdate( $id, $collection );
    public function destroyById($object);
    public function findWhere( $collection = [] );
    public function groupBy($col);
}

?>
