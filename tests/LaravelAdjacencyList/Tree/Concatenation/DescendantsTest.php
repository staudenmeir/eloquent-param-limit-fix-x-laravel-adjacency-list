<?php

namespace Staudenmeir\LaravelAdjacencyList\Tests\Tree\Concatenation;

use Staudenmeir\LaravelAdjacencyList\Tests\Tree\Models\Role;
use Staudenmeir\LaravelAdjacencyList\Tests\Tree\Models\User;
use Staudenmeir\LaravelAdjacencyList\Tests\Tree\TestCase;

class DescendantsTest extends TestCase
{
    public function testLazyLoading()
    {
        $posts = User::find(2)->descendantPosts;

        $this->assertEquals([50, 80], $posts->pluck('id')->all());
    }

    public function testLazyLoadingAndSelf()
    {
        $posts = User::find(2)->descendantPostsAndSelf;

        $this->assertEquals([20, 50, 80], $posts->pluck('id')->all());
    }

    public function testLazyLoadingWithoutParentKey()
    {
        $posts = (new User())->descendantPosts()->get();

        $this->assertEmpty($posts);
    }

    public function testEagerLoading()
    {
        $users = User::with('descendantPosts')->get();

        $this->assertEquals([20, 30, 40, 50, 60, 70, 80], $users[0]->descendantPosts->pluck('id')->all());
        $this->assertEquals([50, 80], $users[1]->descendantPosts->pluck('id')->all());
        $this->assertEquals([], $users[8]->descendantPosts->pluck('id')->all());
        $this->assertEquals([100, 110], $users[9]->descendantPosts->pluck('id')->all());
    }

    public function testEagerLoadingAndSelf()
    {
        $users = User::with('descendantPostsAndSelf')->get();

        $this->assertEquals([10, 20, 30, 40, 50, 60, 70, 80], $users[0]->descendantPostsAndSelf->pluck('id')->all());
        $this->assertEquals([20, 50, 80], $users[1]->descendantPostsAndSelf->pluck('id')->all());
        $this->assertEquals([], $users[8]->descendantPostsAndSelf->pluck('id')->all());
        $this->assertEquals([100, 110], $users[9]->descendantPostsAndSelf->pluck('id')->all());
    }

    public function testLazyEagerLoading()
    {
        $users = User::all()->load('descendantPosts');

        $this->assertEquals([20, 30, 40, 50, 60, 70, 80], $users[0]->descendantPosts->pluck('id')->all());
        $this->assertEquals([50, 80], $users[1]->descendantPosts->pluck('id')->all());
        $this->assertEquals([], $users[8]->descendantPosts->pluck('id')->all());
        $this->assertEquals([100, 110], $users[9]->descendantPosts->pluck('id')->all());
    }

    public function testLazyEagerLoadingAndSelf()
    {
        $users = User::all()->load('descendantPostsAndSelf');

        $this->assertEquals([10, 20, 30, 40, 50, 60, 70, 80], $users[0]->descendantPostsAndSelf->pluck('id')->all());
        $this->assertEquals([20, 50, 80], $users[1]->descendantPostsAndSelf->pluck('id')->all());
        $this->assertEquals([], $users[8]->descendantPostsAndSelf->pluck('id')->all());
        $this->assertEquals([100, 110], $users[9]->descendantPostsAndSelf->pluck('id')->all());
    }

    public function testExistenceQuery()
    {
        if (in_array($this->database, ['mariadb', 'sqlsrv'])) {
            $this->markTestSkipped();
        }

        $users = User::find(8)->ancestors()->has('descendantPosts', '>', 1)->get();

        $this->assertEquals([2, 1], $users->pluck('id')->all());
    }

    public function testExistenceQueryAndSelf()
    {
        if (in_array($this->database, ['mariadb', 'sqlsrv'])) {
            $this->markTestSkipped();
        }

        $users = User::find(8)->ancestors()->has('descendantPostsAndSelf', '>', 2)->get();

        $this->assertEquals([2, 1], $users->pluck('id')->all());
    }

    public function testExistenceQueryForSelfRelation()
    {
        if (in_array($this->database, ['mariadb', 'sqlsrv'])) {
            $this->markTestSkipped();
        }

        $users = User::has('descendantPosts', '>', 1)->get();

        $this->assertEquals([1, 2, 11], $users->pluck('id')->all());
    }

    public function testExistenceQueryForSelfRelationAndSelf()
    {
        if (in_array($this->database, ['mariadb', 'sqlsrv'])) {
            $this->markTestSkipped();
        }

        $users = User::has('descendantPostsAndSelf', '>', 2)->get();

        $this->assertEquals([1, 2], $users->pluck('id')->all());
    }

    public function testUnsupportedPosition()
    {
        $this->expectExceptionMessage('Descendants can only be at the beginning of deep relationships at the moment.');

        Role::find(11)->userDescendants;
    }
}
