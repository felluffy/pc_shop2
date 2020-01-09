<?php

namespace App\Repositories;

use App\Models\Category;
use App\Components\Uploadble;
use Illuminate\Http\UploadedFile;
use App\Interfaces\CategoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\DBAL\Exception\InvalidArgumentException;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    use Uploadble;

    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findCategoryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function createCategory(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'categories');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $category = new Category($merge->all());

            $category->save();

            return $category;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($category->image != null) {
                $this->deleteOne($category->image);
            }

            $image = $this->uploadOne($params['image'], 'categories');
        }

        $featured = $collection->has('featured') ? 1 : 0;
        $menu = $collection->has('menu') ? 1 : 0;

        $merge = $collection->merge(compact('menu', 'image', 'featured'));

        $category->update($merge->all());

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);
        // if($category->children())
        // {
        //     foreach($category->children() as $child)
        //     {
        //         //$child->
        //         //$child 
        //         $params = array(
        //             'id' => $child->id,
        //             'parent_id' => 1,
        //         );
        //         $child->updateCategory($params);
        //     }
        // }

        if ($category->image != null) {
            $this->deleteOne($category->image);
        }

        $category->delete();

        return $category;
    }

    public function treeList()
    {
        return Category::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->listsFlattened('name');
    }

    public function findByName($name)
    {
        error_log('ERROR AT Category repo '.$name.'\n');
        //error_log(Category::with('products')->where('name', $name)->where('menu',1)->first());
        //return null;
        //$user = DB::table('categories')->where('name', $name)->first();

        //echo $user->name;
        return Category::with('products')->where('name',  $name)->first();//where('name', $name)->first();;
    }

    public function listFeaturedCategories()
    {
        return Category::where('featured', 1)->get();
    }
}
