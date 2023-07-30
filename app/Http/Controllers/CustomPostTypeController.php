<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CustomPostTypeInterface;
use App\Repository\EntityInterface;

class CustomPostTypeController extends Controller
{
    protected $cpt, $entity;
    public function __construct(CustomPostTypeInterface $cpt,EntityInterface $entity){
        $this->cpt = $cpt;
        $this->entity = $entity;
    }
    
    function index() {
        $data = $this->cpt->list(); 
       
        return view('dashboard.cpt.index',compact('data'));
    }

    public function create()
    {
        return view('dashboard.cpt.add');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $this->cpt->storeOrUpdate($id=null,$data);
        return redirect()->route('customPostType.index') ->with([
            'message' => "Custom Post Added Successfully",
            'status' => "success",
        ]);
    }

    function edit($id) {
        $data = $this->cpt->findById($id);
        return view('dashboard.cpt.edit',compact('data'));
    }

    function update(Request $request,$id) {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        
        $this->cpt->storeOrUpdate($id,$data);
        return redirect()->route('customPostType.index') ->with([
            'message' => "Custom Post Updated Successfully",
            'status' => "success",
        ]);
    }

    public function destroy($id)
    {   
        $this->cpt->destroyById($id);

        return redirect()->route('customPostType.index')->with([
            'message' => 'Custom Post Type deleted successfully!', 
            'status' => 'success'
        ]);
    }

    function show($id) {
        $cpt = $this->cpt->findById($id);

        $entity = $this->entity->findWhere(['custom_post_type_id'=>$cpt->id])->get();
       return view('dashboard.entity.index',compact('cpt','entity','id'));
        
        
    }
    

    

}
