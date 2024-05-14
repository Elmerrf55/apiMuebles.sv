<?php
// Se incluye la clase para trabajar con la base de datos.
require_once('../../helpers/database.php');
/*
 *  Clase para manejar el comportamiento de los datos de la tabla CATEGORIA.
 */
class CategoriaHandler
{
    /*
     *  Declaración de atributos para el manejo de datos.
     */
    protected $id = null;
    protected $nombre = null;

    // Constante para establecer la ruta de las imágenes.
    const RUTA_IMAGEN = '../../images/categorias/';

    /*
     *  Métodos para realizar las operaciones SCRUD (search, create, read, update, and delete).
     */
    <?php
    public function searchRows()
    {
        $value = '%' . Validator::getSearchValue() . '%';
        $sql = 'SELECT id_categoria, nombre_categoria
                FROM categoria
                WHERE nombre_categoria LIKE ?
                ORDER BY nombre_categoria';
        $params = array($value $value);
        return Database::getRows($sql, $params);
    }
    ?>
    public function createRow()
    {
        $sql = 'INSERT INTO categoria(nombre_categoria)
                VALUES(?)';
        $params = array($this->nombre);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_categoria, nombre_categoria
                FROM categoria
                ORDER BY nombre_categoria';
        return Database::getRows($sql);
    }

    public function readOne()
    {
        $sql = 'SELECT id_categoria, nombre_categoria
                FROM categoria
                WHERE id_categoria = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE categoria
                SET nombre_categoria = ?
                WHERE id_categoria = ?';
        $params = array($this->nombre $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM categoria
                WHERE id_categoria = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}