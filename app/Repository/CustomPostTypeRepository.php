<?php

namespace app\Repository;

use App\Models\CustomPostType;
use App\Repository\CustomPostTypeInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CustomPostTypeRepository implements CustomPostTypeInterface
{
    protected $cpt = null;

    public function list() //: LengthAwarePaginator 
    {
        return CustomPostType::all();
    }

    public function findById($id): CustomPostType
    {
        return CustomPostType::find($id);
    }

    public function storeOrUpdate($id = null, $data = [])
    {

        if (is_null($id)) {
            $cpt = new CustomPostType;
            $cpt->name = $data['name'];
            $cpt->slug = $data['slug'];

            $cpt->save();

            return $cpt;
        }

        $cpt = CustomPostType::find($id);
        $cpt->name = $data['name'];
        $cpt->slug = $data['slug'];

        $cpt->save();

        return $cpt;
    }
    public function findWhere($data = [])
    {
        $cpt = CustomPostType::select('*');

        foreach ($data as $key => $d) {
            $data =  $cpt->where($key, $d);
        }
        return $data;
    }

    public function destroyById($id)
    {
        return CustomPostType::find($id)->delete();
    }
}
