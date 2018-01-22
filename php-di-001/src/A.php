<?php


namespace JK\DicExample\PhpDi;


class A
{
    /** @var Database $db */
    private $db;

    /**
     * A constructor.
     *
     * @param Database $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function doSomeHeavyWork() {
        $this->db->doSomething();
    }
}
