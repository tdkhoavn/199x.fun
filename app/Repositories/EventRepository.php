<?php

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\TaskRepository;
use Carbon\Carbon;

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

        if (isset($condition['start_date']) && $condition['start_date']) {
            $start_date = explode(' 〜 ', $condition['start_date']);
            $builder    = $builder->whereDate(
                'start_date',
                '>=',
                Carbon::createFromFormat('d-m-Y', $start_date[0])
            )->whereDate(
                'start_date',
                '<=',
                Carbon::createFromFormat('d-m-Y', $start_date[1])
            );
        }

        if (isset($condition['created_by']) && $condition['created_by']) {
            $builder = $builder->where('created_by', $condition['created_by']);
        }

        if (isset($condition['member_id']) && $condition['member_id']) {
            $builder = $builder->whereJsonContains('member_id', $condition['member_id']);
        }

        if (isset($condition['type_id']) && $condition['type_id']) {
            $builder = $builder->where('type_id', $condition['type_id']);
        }

        if (isset($condition['with']) && $condition['with']) {
            $builder = $builder->with($condition['with']);
        }

        if (isset($condition['order_by']) && $condition['order_by']) {
            foreach ($condition['order_by'] as $col_name => $value) {
                $builder = $builder->orderBy($col_name, $value);
            }
        }

        if (isset($condition['page_number']) && $condition['page_number']) {
            return $builder->paginate($condition['page_number']);
        }

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
