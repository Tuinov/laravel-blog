<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    /*
     * Получить модель для редактирования
     */
    public function getEdit($id)
    {
        return $this->startCondition()->find($id);
    }

    public function getForComboBox()
    {
        // $this->startCondition()->all();
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ".", title) AS id_title'
        ]);

        $result = $this->startCondition()
            ->selectRaw($columns)
            ->toBase()
            ->get();
($result);
        return $result;

    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this->startCondition()
            ->select($columns)
            ->with(['parentCategory:id,title'])
            ->paginate($perPage);

        return $result;
    }
}