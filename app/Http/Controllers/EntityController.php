<?php

namespace App\Http\Controllers;

use App\Repository\EntityInterface;
use App\Repository\CustomPostTypeInterface;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    protected $entity, $cpt;
    public function __construct(EntityInterface $entity, CustomPostTypeInterface $cpt){
        $this->entity = $entity;
        $this->cpt = $cpt;
    }
    
    function index() {
        $data = $this->entity->list(); 
       
        return view('dashboard.entity.index',compact('data'));
    }

    public function create($id)
    {
        $data = $this->cpt->list();
        return view('dashboard.entity.add',compact('data','id'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'type' => 'required',
            'cpt_id' =>'required',
        ]);

        $this->entity->storeOrUpdate($id=null,$data);

        return redirect()->route('customPostType.show',$request->cpt_id) ->with([   
            'message' => "Custom Post Added Successfully",
            'status' => "success",
        ]);
        // echo "success";
    }

    function edit($id) {
        $data = $this->entity->findById($id);
        return view('dashboard.entity.edit',compact('data'));
    }

    function update(Request $request,$id) {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        
        $this->entity->storeOrUpdate($id,$data);
        return redirect()->route('customPostType.index') ->with([
            'message' => "Custom Post Updated Successfully",
            'status' => "success",
        ]);
    }

    public function destroy($id)
    {   
        $this->entity->destroyById($id);

        return redirect()->route('customPostType.show',$id)->with([
            'message' => 'Custom Post Type deleted successfully!', 
            'status' => 'success'
        ]);
    }
    
}
