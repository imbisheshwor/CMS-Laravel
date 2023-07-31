<?php

namespace app\Repository;

use App\Repository\StoreInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Store;
use Carbon\Carbon;

class StoreRepository implements StoreInterface
{
    protected $cpt = null;

    public function list($slug)
    {
        return Store::all();
    }

    public function findById($id): Store
    {
        return Store::find($id);
    }

    public function storeOrUpdate($id = null, $data = [])
    {

    // $old_id =(Store::latest()->first()->key ?? 0);
    $old_id =(Store::latest()->first()->key ?? 0);
    // dd($old_id);

        if (is_null($id)) {
            $inputArray = [];
            foreach ($data['values'] as $entity_id => $value) {
                array_push($inputArray, [
                    'value' => $value,
                    'entity_id' => $entity_id,
                    'custom_post_type_id' => $data['cpt_id'],
                    'key' =>  $old_id + 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            $msg = Store::insert($inputArray);
            return $msg;
           
        }

        $cpt = Store::find($id);
        $cpt->name = $data['name'];
        $cpt->slug = $data['slug'];

        $cpt->save();

        return $cpt;
    }

    public function destroyById($id)
    {
        return Store::find($id)->delete();
    }

    public function findWhere($data = [])
    {
        $cpt = Store::select('*');

        foreach ($data as $key => $d) {
            $data =  $cpt->where($key, $d);
        }
        return $data;
    }
    public function groupBy($col){
        return Store::groupBy($col);
    }
}
