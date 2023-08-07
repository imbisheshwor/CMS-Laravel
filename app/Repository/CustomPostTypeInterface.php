<?php 
namespace App\Repository;
use App\Models\CustomPostType;
use Illuminate\Pagination\LengthAwarePaginator;

interface CustomPostTypeInterface 
{
    public function list() ; // : LengthAwarePaginator;
    public function findById($id) : CustomPostType;
    public function storeOrUpdate( $id = null, $collection = [] );
    public function destroyById($object);
    public function findWhere( $collection = [] );
}

?>