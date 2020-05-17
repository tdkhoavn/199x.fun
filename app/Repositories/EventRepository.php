<?php

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\TaskRepository;

class EventRepository implements TaskRepository
{
    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentTask constructor.
     *
     * @param App\Models\Event $model
     */
    public function __construct()
    {
        $this->model = new Event;
    }

    /**
     * Get all.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get by id.
     *
     * @param integer $id
     *
     * @return App\Models\Post
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * get by condition
     * @param  array $condition
     * @return Collection
     */
    public function getByCondition($condition)
    {
        $builder = $this->model;

        return $builder->get();
    }

    /**
     * Create a new.
     *
     * @param array $attributes
     *
     * @return App\Models\Post
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update.
     *
     * @param integer $id
     * @param array $attributes
     *
     * @return App\Model\Post
     */
    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Delete a task.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
