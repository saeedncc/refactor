<?php

namespace DTApi\Repository;

interface IRepository 
{
    public function getAll($request);

    public function getById($id);
	
    public function getByCond($cond);

    public function find($id);
	
    public function store($params);
	
    public function update( $item, $params);
    
	public function delete($id);
}