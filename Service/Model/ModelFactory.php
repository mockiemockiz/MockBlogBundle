<?php
/**
 * Created by PhpStorm.
 * User: mockie
 * Date: 12/1/14
 * Time: 11:00 AM
 */

namespace MockBlogBundle\Service\Model;


class ModelFactory {

    public function createModelCategory($em, $request, $params)
    {
       return new ModelCategory($em, $request, $params);
    }

    public function createModelTag($em, $request, $params, $userEntity)
    {
        $tag = new ModelTag($em, $request, $params);
        $tag->setUserEntity($userEntity['user_entity']);

        return $tag;

    }

    public function createModelUser($em, $request, $params)
    {
        $user = new ModelUser($em, $request, $params);

        return $user;
    }

} 