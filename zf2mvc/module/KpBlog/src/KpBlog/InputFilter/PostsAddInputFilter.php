<?php

namespace KpBlog\InputFilter;

class PostsAddInputFilter extends PostsBaseInputFilter
{
    public function init()
    {
        parent::init();

        $this->remove('id');
    }
}