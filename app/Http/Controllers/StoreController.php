<?php

namespace App\Http\Controllers;

use App\Repository\CustomPostTypeInterface;
use App\Repository\EntityInterface;
use App\Repository\StoreInterface;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $store,$cpt,$entity;
    function __construct(StoreInterface $store, EntityInterface $entity, CustomPostTypeInterface $cpt)
    {
        $this->store = $store;
        $this->entity = $entity;
        $this->cpt = $cpt;
    }

    public function index($slug){
        $cpt = $this->cpt->findWhere(['slug'=>$slug])->first();
        $entity = $this->entity->findWhere(['custom_post_type_id'=>$cpt->id])->get();
        $data = $this->store->findWhere(['custom_post_type_id'=>$cpt->id])->get()->groupBy('key');

        // return response()->json($data);
      return view('dashboard.dynamic.index',compact('cpt','data','entity'));
    }

    function create($slug) {

        $cpt = $this->cpt->findWhere(['slug'=>$slug])->first();
        $cpt_id = $cpt->id;
        $entity = $this->entity->findWhere(['custom_post_type_id'=>$cpt_id])->get();

        return view('dashboard.dynamic.add',compact('slug','cpt_id','cpt','entity'));
    }

    public function store(Request $request,$slug){

        $data = $request->all();
        $this->store->storeOrUpdate($id=null,$data);

        return redirect()->route('store.index',$slug) ->with([
            'message' => "Custom Post Added Successfully",
            'status' => "success",
        ]);

    }

    public function edit($slug,$key){
        $cpt = $this->cpt->findWhere(['slug'=>$slug])->first();
        $data = $this->store->findWhere(['key'=>$key,'custom_post_type_id'=>$cpt->id])->with('entity')->get();
        return view('dashboard.dynamic.edit',compact('slug','cpt','data','key'));

    }

    function update(Request $request,$slug,$key) {

        $cpt = $this->cpt->findWhere(['slug'=>$slug])->first();
        foreach ($request->values as $id => $value) {

            $this->store->storeOrUpdate($id,[
                'value' => $value
            ]);
        }
        $change = $this->store->findWhere(['id'=>$cpt->id,'key'=>$key]);

        return redirect()->route('store.index',$slug);


    }

    function delete(Request $request,$slug,$key) {

        $cpt = $this->cpt->findWhere(['slug'=>$slug])->first();
        $data = $this->store->findWhere(['key'=>$key,'custom_post_type_id'=>$cpt->id])->with('entity')->get();

        foreach ($data as $item) {
            $this->store->destroyById($item->id);
        }
        return redirect()->route('store.index',$slug);
    }



}
