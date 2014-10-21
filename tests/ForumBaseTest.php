<?php namespace Atrakeur\Forum;

abstract class ForumBaseTest extends \Orchestra\Testbench\TestCase {

	protected function getPackageProviders()
    {
        return array('\Atrakeur\Forum\ForumServiceProvider');
    }

    protected function createViewController($categories, $topics, $messages)
	{
		return $this->getMockForAbstractClass(
			'\Atrakeur\Forum\Controllers\AbstractViewForumController',
			array($categories, $topics, $messages)
		);
	}

	protected function createCategoriesMock()
	{
		return \Mockery::mock('Eloquent', '\Atrakeur\Forum\Repositories\CategoriesRepository');
	}

	protected function createTopicsMock()
	{
		return \Mockery::mock('Eloquent', '\Atrakeur\Forum\Repositories\TopicsRepository');
	}

	protected function createMessagesMock()
	{
		return \Mockery::mock('Eloquent', '\Atrakeur\Forum\Repositories\MessagesRepository');
	}

}
