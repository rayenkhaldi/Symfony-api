<?php

declare(strict_types=1);

namespace App\Tests\Unit;


use App\Entity\Article;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest  extends TestCase
{
    private User $user;

    //setting up our user to run test on
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }
    //testing email and username (they're the same)
    public function testGetEmail():void{
        $value = 'test@test.fr';
        $response = $this->user->setEmail($value);


        self::assertInstanceOf(User::class,$response);
        self::assertEquals($value,$this->user->getEmail());
        //UserIdentifier==username since it's been deprecated in symf 5.4
        self::assertEquals($value,$this->user->getUserIdentifier());
    }
    //testing roles
    public function testGetRoles():void{
        //Roles are an array
        $value = ['ROLE_ADMIN'];
        $response = $this->user->setRoles($value);


        self::assertInstanceOf(User::class,$response);
        //testing the default value from Entity\User
        self::assertContains('ROLE_USER',$this->user->getRoles());
        //testing ROLE_ADMIN
        self::assertContains('ROLE_ADMIN',$this->user->getRoles());
    }
    //testing passwoord
    public function testGetPassword():void{
        $value = 'password';
        $response = $this->user->setPassword($value);


        self::assertInstanceOf(User::class,$response);
        self::assertEquals($value,$this->user->getPassword());
    }
    //testing articles (trying to return One article)
    public function testGetArticles():void{
        $value = new Article();
        $response = $this->user->addArticle($value);


        self::assertInstanceOf(User::class,$response);
        self::assertCount(1,$this->user->getArticles());
        self::assertTrue($this->user->getArticles()->contains($value));
/*
        $response = $this->user->removeArticle($value);

        self::assertInstanceOf(User::class,$response);
        self::assertCount(0,$this->user->getArticles());
        self::assertFalse($this->user->getArticles()->contains($value));*/
/*
        //*****************
                    $value = new Article();
                    $value1 = new Article();
                    $value2 = new Article();
            $this->user->addArticle($value);
            $this->user->addArticle($value1);
            $this->user->addArticle($value2);


            self::assertCount (3, $this->user->getArticles ());
            self::assertTrue ($this->user->getArticles()->contains($value));
            self::assertTrue ($this->user->getArticles()->contains($value1));
            self::assertTrue ($this->user->getArticles()->contains($value2));
            $response = $this->user->removeArticle($value);
            self::assertInstanceOf(User::class, $response);
            self::assertCount(2,$this->user->getArticles());
            self::assertFalse($this->user->getArticles()->contains( $value));
            self::assertTrue($this->user->getArticles()->contains( $value1));
            self::assertTrue($this->user->getArticles()->contains( $value2));*/
    }

}