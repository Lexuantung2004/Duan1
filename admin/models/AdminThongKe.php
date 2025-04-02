<?php
class AdminThongKe{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllThongKe(){
        try{
            $sql = "SELECT danh_mucs.ten_danh_muc, danh_mucs.id, 
                           COUNT(san_phams.id) as countSp, 
                           MIN(san_phams.gia_san_pham) as minPrice, 
                           MAX(san_phams.gia_san_pham) as maxPrice, 
                           AVG(san_phams.gia_san_pham) as avgPrice
                    FROM san_phams 
                    LEFT JOIN danh_mucs ON danh_mucs.id = san_phams.danh_muc_id
                    GROUP BY danh_mucs.ten_danh_muc, danh_mucs.id
                    ORDER BY danh_mucs.id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
}