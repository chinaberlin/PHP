<?php

namespace KpBlog\Entity;

class PostsTagEntity{

    protected $posts_id;
    protected $tag_id;

    /**
     * @param mixed $posts_id
     */
    public function setPostsId($posts_id)
    {
        $this->posts_id = $posts_id;
    }

    /**
     * @return mixed
     */
    public function getPostsId()
    {
        return $this->posts_id;
    }

    /**
     * @param mixed $tag_id
     */
    public function setTagId($tag_id)
    {
        $this->tag_id = $tag_id;
    }

    /**
     * @return mixed
     */
    public function getTagId()
    {
        return $this->tag_id;
    }


}