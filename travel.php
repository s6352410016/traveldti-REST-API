<?php
    class Travel{
        public $travelId; 
        public $travelGoDetail; 
        public $travelWho;  
        public $travelStartDate; 
        public $travelEndDate; 
        public $travelPay; 
        public $travelImg1; 
        public $travelImg2; 
        private $conn;

        public function __construct($connDB){
            $this->conn = $connDB;
        }

        public function insertTravel(){
            $strSql = 'INSERT INTO travel_tb (travelGoDetail , travelWho , travelStartDate , travelEndDate , travelPay , travelImg1 , travelImg2) VALUES(:travelGoDetail , :travelWho , :travelStartDate , :travelEndDate , :travelPay , :travelImg1 , :travelImg2)';
            $stmt = $this->conn->prepare($strSql);
            $this->travelGoDetail = htmlspecialchars(strip_tags($this->travelGoDetail));
            $this->travelWho = htmlspecialchars(strip_tags($this->travelWho));
            $this->travelStartDate = htmlspecialchars(strip_tags($this->travelStartDate));
            $this->travelEndDate = htmlspecialchars(strip_tags($this->travelEndDate));
            $this->travelPay = floatval(strip_tags($this->travelPay));
            $this->travelImg1 = htmlspecialchars(strip_tags($this->travelImg1));
            $this->travelImg2 = htmlspecialchars(strip_tags($this->travelImg2));
            $stmt->bindParam(':travelGoDetail' , $this->travelGoDetail);
            $stmt->bindParam(':travelWho' , $this->travelWho);
            $stmt->bindParam(':travelStartDate' , $this->travelStartDate);
            $stmt->bindParam(':travelEndDate' , $this->travelEndDate);
            $stmt->bindParam(':travelPay' , $this->travelPay);
            $stmt->bindParam(':travelImg1' , $this->travelImg1);
            $stmt->bindParam(':travelImg2' , $this->travelImg2);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getAllTravel(){
            $strSql = 'SELECT * FROM travel_tb ORDER BY travelId ASC';
            $stmt = $this->conn->query($strSql);
            return $stmt;
        }

        public function updateTravel(){         
            if(!empty($this->travelImg1) && empty($this->travelImg2)){
                $strSql = 'UPDATE travel_tb SET travelGoDetail = :travelGoDetail , travelWho = :travelWho , travelStartDate = :travelStartDate , travelEndDate = :travelEndDate , travelPay = :travelPay , travelImg1 = :travelImg1 WHERE travelId = :travelId';
                $stmt = $this->conn->prepare($strSql);
                $this->travelGoDetail = htmlspecialchars(strip_tags($this->travelGoDetail));
                $this->travelWho = htmlspecialchars(strip_tags($this->travelWho));
                $this->travelStartDate = htmlspecialchars(strip_tags($this->travelStartDate));
                $this->travelEndDate = htmlspecialchars(strip_tags($this->travelEndDate));
                $this->travelPay = floatval(strip_tags($this->travelPay));
                $this->travelImg1 = htmlspecialchars(strip_tags($this->travelImg1));
                $this->travelId = intval(strip_tags($this->travelId));
                $stmt->bindParam(':travelGoDetail' , $this->travelGoDetail);
                $stmt->bindParam(':travelWho' , $this->travelWho);
                $stmt->bindParam(':travelStartDate' , $this->travelStartDate);
                $stmt->bindParam(':travelEndDate' , $this->travelEndDate);
                $stmt->bindParam(':travelPay' , $this->travelPay);
                $stmt->bindParam(':travelImg1' , $this->travelImg1);
                $stmt->bindParam(':travelId' , $this->travelId);

                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }

            if(!empty($this->travelImg2) && empty($this->travelImg1)){
                $strSql = 'UPDATE travel_tb SET travelGoDetail = :travelGoDetail , travelWho = :travelWho , travelStartDate = :travelStartDate , travelEndDate = :travelEndDate , travelPay = :travelPay , travelImg2 = :travelImg2 WHERE travelId = :travelId';
                $stmt = $this->conn->prepare($strSql);
                $this->travelGoDetail = htmlspecialchars(strip_tags($this->travelGoDetail));
                $this->travelWho = htmlspecialchars(strip_tags($this->travelWho));
                $this->travelStartDate = htmlspecialchars(strip_tags($this->travelStartDate));
                $this->travelEndDate = htmlspecialchars(strip_tags($this->travelEndDate));
                $this->travelPay = floatval(strip_tags($this->travelPay));
                $this->travelImg2 = htmlspecialchars(strip_tags($this->travelImg2));
                $this->travelId = intval(strip_tags($this->travelId));
                $stmt->bindParam(':travelGoDetail' , $this->travelGoDetail);
                $stmt->bindParam(':travelWho' , $this->travelWho);
                $stmt->bindParam(':travelStartDate' , $this->travelStartDate);
                $stmt->bindParam(':travelEndDate' , $this->travelEndDate);
                $stmt->bindParam(':travelPay' , $this->travelPay);
                $stmt->bindParam(':travelImg2' , $this->travelImg2);
                $stmt->bindParam(':travelId' , $this->travelId);

                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }

            if(empty($this->travelImg1 && $this->travelImg2)){
                $strSql = 'UPDATE travel_tb SET travelGoDetail = :travelGoDetail , travelWho = :travelWho , travelStartDate = :travelStartDate , travelEndDate = :travelEndDate , travelPay = :travelPay WHERE travelId = :travelId ';
                $stmt = $this->conn->prepare($strSql);
                $this->travelGoDetail = htmlspecialchars(strip_tags($this->travelGoDetail));
                $this->travelWho = htmlspecialchars(strip_tags($this->travelWho));
                $this->travelStartDate = htmlspecialchars(strip_tags($this->travelStartDate));
                $this->travelEndDate = htmlspecialchars(strip_tags($this->travelEndDate));
                $this->travelPay = floatval(strip_tags($this->travelPay));
                $this->travelId = intval(strip_tags($this->travelId));
                $stmt->bindParam(':travelGoDetail' , $this->travelGoDetail);
                $stmt->bindParam(':travelWho' , $this->travelWho);
                $stmt->bindParam(':travelStartDate' , $this->travelStartDate);
                $stmt->bindParam(':travelEndDate' , $this->travelEndDate);
                $stmt->bindParam(':travelPay' , $this->travelPay);
                $stmt->bindParam(':travelId' , $this->travelId);

                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }  
            }   

            if(!empty($this->travelImg1 && $this->travelImg2)){
                $strSql = 'UPDATE travel_tb SET travelGoDetail = :travelGoDetail , travelWho = :travelWho , travelStartDate = :travelStartDate , travelEndDate = :travelEndDate , travelPay = :travelPay , travelImg1 = :travelImg1 , travelImg2 = :travelImg2 WHERE travelId = :travelId ';
                $stmt = $this->conn->prepare($strSql);
                $this->travelGoDetail = htmlspecialchars(strip_tags($this->travelGoDetail));
                $this->travelWho = htmlspecialchars(strip_tags($this->travelWho));
                $this->travelStartDate = htmlspecialchars(strip_tags($this->travelStartDate));
                $this->travelEndDate = htmlspecialchars(strip_tags($this->travelEndDate));
                $this->travelPay = floatval(strip_tags($this->travelPay));
                $this->travelImg1 = htmlspecialchars(strip_tags($this->travelImg1));
                $this->travelImg2 = htmlspecialchars(strip_tags($this->travelImg2));
                $this->travelId = intval(strip_tags($this->travelId));
                $stmt->bindParam(':travelGoDetail' , $this->travelGoDetail);
                $stmt->bindParam(':travelWho' , $this->travelWho);
                $stmt->bindParam(':travelStartDate' , $this->travelStartDate);
                $stmt->bindParam(':travelEndDate' , $this->travelEndDate);
                $stmt->bindParam(':travelPay' , $this->travelPay);
                $stmt->bindParam(':travelImg1' , $this->travelImg1);
                $stmt->bindParam(':travelImg2' , $this->travelImg2);
                $stmt->bindParam(':travelId' , $this->travelId);

                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }   
            }  
        } 
        
        public function deleteTravel(){
            $strSql = 'DELETE FROM travel_tb WHERE travelId = :travelId';
            $stmt = $this->conn->prepare($strSql);
            $this->travelId = intval(strip_tags($this->travelId));
            $stmt->bindParam(':travelId' , $this->travelId);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            } 
        }
    }
?>