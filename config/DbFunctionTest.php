<?php
require 'DbFunction.php';

class DbFunctionTest extends \PHPUnit\Framework\TestCase {

    public function testLoginSuccess() {
        $dbFunction = new DbFunction();
        // Simula una conexión a la base de datos para evitar la conexión real
        $dbFunction->getConnection = $this->createMock(PDO::class);
        $this->assertTrue($dbFunction->login('valid_id', 'valid_password'));
    }

    public function testLoginFailure() {
        $dbFunction = new DbFunction();
        // Simula una conexión a la base de datos para evitar la conexión real
        $dbFunction->getConnection = $this->createMock(PDO::class);
        $this->assertFalse($dbFunction->login('invalid_id', 'invalid_password'));
    }

    public function testCreateCourse() {
        $dbFunction = new DbFunction();
        // Simula una conexión a la base de datos para evitar la conexión real
        $dbFunction->getConnection = $this->createMock(PDO::class);
        $this->expectOutputString("<script>alert('Select  Course Short Name')</script>");
        $dbFunction->create_course("", "Course Full Name", "2023-10-26");
    }

    // Puedes seguir creando más pruebas para otras funciones
}
