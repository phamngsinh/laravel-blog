<?php namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class TagRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TagRepositoryEloquent extends BaseRepository implements TagRepository {

    /**
     * @var array
     */
    protected $rules = [];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return 'App\Entities\Tag';
    }

    /**
     *
     */
    public function boot()
    {
        $this->pushCriteria( app('Prettus\Repository\Criteria\RequestCriteria') );
    }
}