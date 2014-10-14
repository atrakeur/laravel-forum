<?php namespace Atrakeur\Forum\Repositories;

use \Atrakeur\Forum\Models\ForumCategory;
use \Atrakeur\Repository\Eloquent\AbstractEloquentRepository;
use \Atrakeur\Repository\Eloquent\Converters\EloquentToObjectConverter;
use \Atrakeur\Repository\Eloquent\Converters\EloquentToEloquentConverter;

class CategoriesRepository extends AbstractEloquentRepository {

	public function __construct(ForumCategory $model, EloquentToObjectConverter $converter) 
	{
		parent::__construct($model, $converter);
	}

	public function getById($ident, array $with = array())
	{
		if (!is_numeric($ident))
		{
			throw new \InvalidArgumentException();
		}

		return $this->byId($ident)->with($with)->getOne();
	}

	public function getByParent($parent, array $with = array())
	{
		if (is_array($parent) && isset($parent['id'])) 
		{
			$parent = $parent['id'];
		}

		if ($parent != null && !is_numeric($parent))
		{
			throw new \InvalidArgumentException();
		}

		return $this->byField('parent_category', $parent)->with($with)->getMany();
	}

}
