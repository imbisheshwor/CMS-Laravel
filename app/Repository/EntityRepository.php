<?php 
namespace app\Repository;

use App\Models\Entity;
use App\Repository\EntityInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class EntityRepository implements EntityInterface
{
    protected $cpt = null;

    public function list() 
    {   
        return Entity::all();
    }

    public function findById($id) : Entity
    {
        return Entity::find($id);
    }

    public function storeOrUpdate($id = null, $data = [] )
    {  
        
        if(is_null($id)) {
            $cpt = new Entity;
            $cpt->name = $data['name'];
            $cpt->slug = $data['slug'];
            $cpt->type = $data['type'];
            $cpt->custom_post_type_id = $data['cpt_id'];
          
            $cpt->save();

            return $cpt;
        }

        $cpt = Entity::find($id);
        $cpt->name = $data['name'];
        $cpt->slug = $data['slug'];
       
        $cpt->save();

        return $cpt;
    }
    
    public function destroyById($id)
    {
        return Entity::find($id)->delete();
    }
    
    public function findWhere($data = [])
    {
        $cpt = Entity::select('*');

        foreach ($data as $key => $d) {
            $data =  $cpt->where($key, $d);
        }
        return $data;
    }
}




?>