<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $name =  $request->input('name');
        $data = array('name'=>$name);
        if(Category::create($data))
        {
            Session::flash('type', 'true');
            Session::flash('message', 'New Category Created');
            return redirect('admin/show-all-categories');
        }
        else
        {
            Session::flash('type', 'false');
            Session::flash('message', 'Unable to create category');
            return redirect('admin/show-all-categories');
        }
    }
    public function edit($id)
    {
        $category = Category::where('id',$id)->first();
        return view('category.edit')->with('data',$category);
    }
    public function update(Request $request)
    {
        $name =  $request->input('name');
        $id =  $request->input('id');

        $data = array('name'=>$name);
        if(Category::where('id',$id)->update($data))
        {
            Session::flash('type', 'true');
            Session::flash('message', 'Category Updated');
            return redirect('admin/show-all-categories');
        }
        else
        {
            Session::flash('type', 'false');
            Session::flash('message', 'Unable to update category');
            return redirect('admin/show-all-categories');
        }

    }
    public function delete($id)
    {
       DB::table('user_categories')->where('category_id',$id)->delete();
       if(Category::where('id',$id)->delete())
       {
           Session::flash('type', 'true');
           Session::flash('message', 'Category Deleted');
           return redirect('admin/show-all-categories');
       }
       else
       {
           Session::flash('type', 'false');
           Session::flash('message', 'Unable to delete category');
           return redirect('admin/show-all-categories');
       }
    }
    public function listCategory(Request $request)
    {
        $response = array();
        $user_id = $request->input('user_id');
        $data = DB::table('category')
            ->select('category.id as category_id','category.name as category_name',(DB::raw('(CASE WHEN user_categories.user_id='.$user_id.' THEN 1 ELSE 0 END) AS is_selected')))
            ->leftjoin('user_categories', function ($join) use ($user_id){
                $join->on('user_categories.category_id','=','category.id')->where('user_categories.user_id','=',$user_id);
            })
            ->groupBy('category.id')
            ->get();
        if(!empty($data))
        {
            $response['status'] = true;
            $response['message'] = 'Category list';
            $response['category_data'] = $data;
        }
        else
        {
            $response['status'] = false;
            $response['message'] = 'Category list not found';
        }
        return $response;
    }
    public function setCategory(Request $request)
    {
        $response = array();
        $user_id = $request->input('user_id');
        $category_ids = $request->input('category_ids');
        $category_ids = explode(',',$category_ids);
        if($user_id != '')
        {
            foreach ($category_ids as $cat)
            {
                if(DB::table('user_categories')->where('category_id',$cat)->where('user_id',$user_id)->count() == 0)
                {
                    $data = array(
                        'category_id' => $cat,
                        'user_id' => $user_id
                    );
                    DB::table('user_categories')->insert($data);
                }
            }
            $response['status'] = true;
            $response['message'] = 'category set successfully';
        }
        else
        {
            $response['status'] = true;
            $response['message'] = 'unable to set category';
        }
        return $response;
    }
    public function showAll()
    {
        $all_category = Category::orderBy('id','DESC')->get();
        return view('category.show')->with('data',$all_category);

    }

}
