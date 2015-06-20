<?php namespace Wempregada\Repositories;

use Wempregada\Repositories\Contracts\RepositoryInterface;

class AbstractRepository implements RepositoryInterface
{
    protected $model;

    /**
     * @param $orderBy
     * @return Model
     */
    public function getTodos($orderBy = null)
    {
        if (!is_null($orderBy)) {
            return $this->model->rderBy($orderBy)->get();
        }
        return $this->model->all();
    }

    /**
     * @param array $params
     * @return Model
     */
    public function buscar(array $params)
    {
        $where = [];
        foreach ($params as $key => $value) {
            if (!is_null($value) && $value != '') {
                $where[$key] = $value;
            }
        }

        return $this->model->where($where)->get();
    }

    /**
     * retorna um array para o combo box
     * @param $orderBy
     * @return Array
     */
    public function getCombo($orderBy = null)
    {
        return $this->getTodos($orderBy)->lists('nome', 'id')->toArray();
    }

    /**
     * @param array $data
     * @return Model
     */
    public function salvar(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param Integer $id
     * @param array $data
     * @return Model
     */
    public function editar($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * @param Integer $id
     * @return Model
     */
    public function deletar($id)
    {
        return $this->model->find($id)->delete();
    }
}
