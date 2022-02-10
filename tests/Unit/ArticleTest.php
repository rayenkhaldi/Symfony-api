<?php


declare(strict_types=1);
namespace App\Tests\Unit;


use App\Entity\Article;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    private Article $article;

    protected function setUp(): void
    {
        parent::setUp();
        $this->article=new Article();
    }
    //testing name
    public function testGetName():void{
        $value='Rayen';
        $response = $this->article->setName($value);

        self::assertInstanceOf(Article::class,$response);
        self::assertEquals($value,$this->article->getName());
    }
    //testing content
      public function testGetContent():void{
        $value="some content";

          $response = $this->article->setContent($value);

          self::assertInstanceOf(Article::class,$response);
          self::assertEquals($value,$this->article->getContent());
    }
      public function testGetAuthor():void{
        $value=new User();

        $response = $this->article->setAuthor($value);

        self::assertInstanceOf(Article::class,$response);
        self::assertEquals($value,$this->article->getAuthor());

    }

}