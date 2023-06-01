<?php
require_once("sistema.php");
class Index extends Sistema{
    public function getLastID(){
        $this->db();
        $id_venta = $this->db->lastInsertId();
        return $id_venta;
    }      

    public function get($id = null){        
        $this->db();
        if (is_null($id)){
            $sql = "SELECT v.id_venta, v.fecha, u.id_usuario, u.usuario, u.nombre AS nombre, 
            t.id_tienda, t.tienda, t.direccion, e.id_empleado, ue.nombre AS empleado 
            FROM venta AS v LEFT JOIN usuario AS u ON u.id_usuario = v.id_usuario 
            LEFT JOIN tienda AS t ON t.id_tienda = v.id_tienda 
            LEFT JOIN empleado AS e ON e.id_empleado = v.id_empleado 
            LEFT JOIN usuario AS ue ON ue.id_usuario = e.id_usuario;";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = "SELECT v.id_venta, v.fecha, u.id_usuario, u.usuario, u.nombre AS nombre, 
            t.id_tienda, t.tienda, t.direccion, e.id_empleado, ue.nombre AS empleado 
            FROM venta AS v LEFT JOIN usuario AS u ON u.id_usuario = v.id_usuario 
            LEFT JOIN tienda AS t ON t.id_tienda = v.id_tienda 
            LEFT JOIN empleado AS e ON e.id_empleado = v.id_empleado 
            LEFT JOIN usuario AS ue ON ue.id_usuario = e.id_usuario
            WHERE v.id_venta=:id;";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    public function new($data)
    {        
        $this->db();

        try {
            $this->db->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
            $this->db->beginTransaction();

            $sql = "INSERT INTO `venta`(`fecha`, `id_usuario`, `id_tienda`, `id_empleado`)
                    VALUES (:fecha ,:id_usuario ,:id_tienda ,:id_empleado)";

            $st = $this->db->prepare($sql);
            $st->bindParam(":fecha", $data['fecha'], PDO::PARAM_STR);
            $st->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
            $st->bindParam(":id_tienda", $data['id_tienda'], PDO::PARAM_INT);
            $st->bindParam(":id_empleado", $data['id_empleado'], PDO::PARAM_INT);

            $st->execute();

            $rc = $st->rowCount();

            $id_venta = $this->db->lastInsertId();

            $sql = "INSERT INTO venta_detalle (id_venta, id_producto, cantidad, precio_unitario)
                    VALUES (:id_venta,:id_producto,:cantidad,:precio_unitario)";

            $st = $this->db->prepare($sql);
            $st->bindParam(":id_venta", $id_venta, PDO::PARAM_INT);
            $st->bindParam(":id_producto", $data['id_producto'], PDO::PARAM_INT);
            $st->bindParam(":cantidad", $data['cantidad'], PDO::PARAM_INT);
            $st->bindParam(":precio_unitario", $data['precio_unitario'], PDO::PARAM_STR);

            $st->execute();

            $rc = $st->rowCount();

            $this->db->commit();
            return $rc;
        } catch (PDOException $e) {
            $this->db->rollBack();
        }
    }
    public function delete($id){
        $this->db();
        $sql = "DELETE FROM venta WHERE id_venta=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data){
        $this->db();

        $sql = "UPDATE venta 
            SET fecha =:fecha, id_usuario =:id_usuario, id_tienda =:id_tienda, id_empleado =:id_empleado
            where id_venta =:id";
        
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":fecha", $data['fecha'], PDO::PARAM_STR);
        $st->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
        $st->bindParam(":id_tienda", $data['id_tienda'], PDO::PARAM_INT);
        $st->bindParam(":id_empleado", $data['id_empleado'], PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
    public function getSalesbyDay(){        
        $this->db();
        $sql = "SELECT fecha AS Dia, COUNT(*) AS Ventas FROM venta GROUP BY fecha ORDER BY fecha LIMIT 7;";
        $st = $this->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function motsSoldProducts(){        
        $this->db();
        $sql = "SELECT p.id_producto, p.producto, SUM(vd.cantidad) AS total
                FROM producto p
                INNER JOIN venta_detalle vd ON p.id_producto = vd.id_producto
                INNER JOIN venta v ON vd.id_venta = v.id_venta
                WHERE v.fecha >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
                GROUP BY p.id_producto, p.producto
                ORDER BY total DESC LIMIT 10;";
        $st = $this->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}
$index = new Index; 
?>