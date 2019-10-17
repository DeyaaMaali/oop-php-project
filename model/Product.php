<?php


class Product
{
    private $name;
    private $description;
    private $price;
    private $category_id;
    private $created;


    function updateProduct($connection, $id){
        $sql="UPDATE products SET name='$this->name', description='$this->description', price = $this->price WHERE id=$id";
        return $connection->exec($sql);
    }


    function setCreated()
    {
        $date = new DateTime();
        $created_datetime = $date->format('Y-m-d H:i:s');

        $this->created = $created_datetime;
    }

    function create($connection)
    {
        $this->setCreated();

        $sql = "INSERT INTO products(name, price, description, created, category_id) 
                    VALUES('$this->name', $this->price, '$this->description', '$this->created', $this->category_id)";

        return $connection->exec($sql);
    }

    function getAllProducts ($connection){
        $sql = "SELECT * FROM products";
        $result= $connection->query($sql);
        $allData = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $allData[]=$row;
        }
        return $allData;
    }

    static public function deleteProduct ($connection, $id){
        $sql = "DELETE FROM products WHERE id=$id";
        $connection->exec($sql);
    }

    // NOTE: create setters and getters shortcut: alt - insert - getters and setters

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }
}