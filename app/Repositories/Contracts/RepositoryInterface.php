<?php namespace Wempregada\Repositories\Contracts;

interface RepositoryInterface
{
    public function getTodos();

    public function buscar(array $params);

    public function salvar(array $data);

    public function editar($id, array $data);

    public function deletar($id);
}
