<?php namespace Wempregada\Repositories;

use Wempregada\Repositories\Contracts\RepositoryInterface;

class AbstractRepository implements RepositoryInterface
{
    protected $model;

    public function getTodos()
    {
        return $this->model->all();
    }

    public function buscar($id)
    {
        return $this->model->find($id);
    }

    public function salvar(array $data)
    {
        return $this->model->create($data);
    }

    public function editar($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function deletar($id)
    {
        return $this->model->find($id)->delete();
    }

}