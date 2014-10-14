<?php namespace Atrakeur\Forum\Repositories;

use \Atrakeur\Forum\Models\ForumMessage;
use \Atrakeur\Repository\Eloquent\AbstractEloquentRepository;
use \Atrakeur\Repository\Eloquent\Converters\EloquentToObjectConverter;

class MessagesRepository extends AbstractEloquentRepository {

	public function __construct(ForumMessage $model, EloquentToObjectConverter $converter)
	{
		parent::__construct($model, $converter);
	}

	public function boot()
	{
		//Auto order articles by creation date
		$this->query = $this->query->orderBy('created_at', 'DESC');
	}

	public function getById($messageId)
	{
		if (!is_numeric($messageId))
		{
			throw new \InvalidArgumentException();
		}

		return $this->byId($messageId)->with($with)->getOne();
	}

	public function getByTopic($topicId)
	{
		if (!is_numeric($topicId))
		{
			throw new \InvalidArgumentException();
		}

		return $this->byField('parent_topic', $topicId)->with($with)->getMany();
	}

	public function getLastByTopic($topicId, $count = 10)
	{
		if (!is_numeric($topicId))
		{
			throw new \InvalidArgumentException();
		}

		return $this->byField('parent_topic', $topicId)->with($with)->paginate($count);
	}

}
