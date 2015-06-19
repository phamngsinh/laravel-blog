<?php namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository {

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
        return 'App\Entities\User';
    }

    /**
     *
     */
    public function boot()
    {
        $this->pushCriteria( app('Prettus\Repository\Criteria\RequestCriteria') );
    }
}