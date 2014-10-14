<?php namespace Atrakeur\Forum\Repositories;

use \Atrakeur\Forum\Models\ForumTopic;
use \Atrakeur\Repository\Eloquent\AbstractEloquentRepository;
use \Atrakeur\Repository\Eloquent\Converters\EloquentToObjectConverter;

class TopicsRepository extends AbstractEloquentRepository {

	public function __construct(ForumTopic $model, EloquentToObjectConverter $converter)
	{
		parent::__construct($model, $converter);
	}

	public function getById($ident)
	{
		if (!is_numeric($ident))
		{
			throw new \InvalidArgumentException();
		}

		return $this->byId($ident)->with($with)->getOne();
	}

}
