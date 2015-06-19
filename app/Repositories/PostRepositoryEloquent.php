<?php namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PostRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository {

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
        return 'App\Entities\Post';
    }

    /**
     *
     */
    public function boot()
    {
        $this->pushCriteria( app('Prettus\Repository\Criteria\RequestCriteria') );
    }
}