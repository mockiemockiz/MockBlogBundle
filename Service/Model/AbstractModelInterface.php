<?php
/**
 * Created by PhpStorm.
 * User: mockie
 * Date: 12/3/14
 * Time: 6:22 AM
 */

namespace MockBlogBundle\Service\Model;


interface AbstractModelInterface {

    public function __construct($em, $request, $params);

    public function getRepository();

    public function getEntity();

    public function getRequest($key='');

    public function find($id);

    public function create($form);

    public function save($form);

    public function delete($form);

} 