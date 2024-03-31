<?php

namespace Tests\Unit\Services;

use App\Services\TweetService;
use App\Modules\ImageUpload\ImageManagerInterface;
use PHPUnit\Framework\TestCase;
use Mockery;

class TweetServiceTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @return void
     * 
     * A basic unit test example.
     */
    public function test_check_own_tweet(): void
    {
        $imageManager = Mockery::mock(ImageManagerInterface::class);
        // $tweetService = new TweetService();
        $tweetService = new TweetService($imageManager);
        $mock = Mockery::mock('alias:App\Models\Tweet');
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1
        ]);

        $result = $tweetService->checkOwnTweet(1, 1);
        $this->assertTrue($result);

        // $result = $tweetService->checkOwnTweet(2, 1);
        // $this->assertTrue($result);
    }
}
