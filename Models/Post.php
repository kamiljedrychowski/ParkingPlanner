<?php


class Post
{
    private $image;

    public function __construct(string $image)
    {
        $this->image = $image;
    }

    public function getImage(): string
    {
        return $this->image;
    }

}