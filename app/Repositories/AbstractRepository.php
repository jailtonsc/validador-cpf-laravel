<?php namespace Wempregada\Repositories;

use Wempregada\Repositories\Contracts\RepositoryInterface;

class AbstractRepository implements RepositoryInterface
{
    protected $model;

    /**
     * @return Model
     */
    public function getTodos()
    {
        return $this->model->all();
    }

    /**
     * @param array $params
     * @return Model
     */
    public function buscar(array $params)
    {
        foreach ($params as $key => $value) {
            if (!is_null($value) && $value != '') {
                $this->model->while($key, '=', $value);
            }
        }

        return $this->model->get();
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