<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
//{
//    public  function index(){
//
//        $data = Category::latest()->paginate(5);
//   return view('pages.categories', ['data' =>$data]);
//    }
//
//
//    public  function store(Request $request){
//
//        $validator = Validator::make($request->all(),[
//            'name' => 'required|string|max:45|min:6',
//        ]);
//        if($validator->fails()){
//        return redirect()->route('category.index')
//         ->withErrors($validator)
//         ->withInput();
//             }
//        Category::create([
//            'name' => $request->name
//        ]);
//        return redirect()->route('category.index')->with('addedSuccessfully', 'Category added successfully');
//    }
//
//   public function update(Request $request, Category $category){
//     $validator = Validator::make($request->all(),[
//                 'name' => 'required|string|max:45|min:6',
//             ]);
//
//             if($validator->fails()){
//                  return redirect()->route('category.index')
//                      ->withErrors($validator)
//                      ->withInput();
//                 }
//   $category->update($request->all());
//
//
//     return redirect()->route('category.index')->with('addedSuccessfully', 'Category updated successfully');
//
//   }
//
//    public function destroy(Category  $category){
//
//        $category->delete();
//
//        return redirect()->route('category.index')->with('deletedSuccessfully', 'Category deleted successfully');
//    }
//}

{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
//    use SoftDeletes;
    //
    /* vamos a obtener todas las categorua de nuestra base de datos ELOQUEN ORM
        Select * from categories  */
    public function index(){
        /* cambiamos la consulta all por patest paginate para la apginacion de nuestros registros */
        $categories = Category::latest()->paginate(20);
        //return $categories;
        return view('categories.index',[
            'categories'=> $categories,
        ]);


    }
    /* insertar datos en la tabla category con el metodo create dentro de un array  */
    public function store(Request $request){
        Category::create([

            'name'=>$request->name
        ]);
        return redirect('/category')->with('mesage', 'la categoria se ha agregado exitosamente!');

    }

    /* edit Category */
    public function edit($id){
        $category = Category::findOrFail($id);
        //return $category;
        return view('categories.edit',['category'=>$category]);

    }
    /* Update category */
    public function update(Request $request, $id){
        /*   $validateData = $request->validate([
              'name' => 'required|max:5'
          ]); */
        $category = Category::findOrFail($id);

        $category->update($request->all());

        //return back();

        return redirect('/category')->with('mesageUpdate', 'la categoria se ha modificado exitosamente!');

    }

    /* eliminacion de */
    public function delete(Category $category){

        $category->delete();
        return redirect('/category')->with('mesageDelete', 'la categoria se ha eliminado exitosamente!');


    }
}
