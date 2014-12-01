<?php
/**
 * Created by PhpStorm.
 * User: mockie
 * Date: 12/1/14
 * Time: 11:00 AM
 */

namespace MockBlogBundle\Service\Model;


class ModelFactory {

    public function createModelCategory($em)
    {
       return new ModelCategory($em);
    }

} 