<?php

class DatabaseTest extends \PHPUnit\Framework\TestCase {
    public function testGetInstance() {
        $db1 = Database::getInstance();
        $db2 = Database::getInstance();

        $this->assertInstanceOf(Database::class, $db1);
        $this->assertInstanceOf(Database::class, $db2);
        $this->assertSame($db1, $db2);
    }

    public function testGetConnection() {
        $db = Database::getInstance();
        $connection = $db->getConnection();

        $this->assertInstanceOf(\mysqli::class, $connection);
    }

    public function testConnectionError() {
        // Simulación de un error de conexión a la base de datos
        $db = $this->getMockBuilder(Database::class)
            ->setMethods(['__construct'])
            ->getMock();

        $db->expects($this->once())
            ->method('__construct')
            ->will($this->throwException(new \Exception('Database connection error')));

        $this->expectException(\Exception::class);
        $db->getConnection();
    }
}
