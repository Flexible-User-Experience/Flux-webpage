<?php

/**
 * MemberTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MemberTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MemberTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Member');
    }
}