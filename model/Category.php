<?php


class Category
{
    private $name;
    private $created;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    function setCreated()
    {
        $date = new DateTime();
        $created_datetime = $date->format('Y-m-d H:i:s');

        $this->created = $created_datetime;
    }

    function create($connection){
        $this->setCreated();
        $sql = "INSERT INTO categories(name, created) 
                    VALUES('$this->name', '$this->created')";
        return $connection->exec($sql);

    }

    function getAllCategories($connection){
        $sql = "SELECT * FROM categories";
        $result= $connection->query($sql);
        $allData = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $allData[]=$row;
        }
        return $allData;
    }

    static public function deleteCategory ($connection, $id){
        $sql = "DELETE FROM categories WHERE id=$id";
        $connection->exec($sql);
    }

    function updateCategory($connection, $id){
        $sql="UPDATE categories SET name='$this->name' WHERE id=$id";
        return $connection->exec($sql);
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
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
//    public function setCreated($created)
//    {
//        $this->created = $created;
//    }

    public function getCategories ($connection)
    {
//        $sql = "SELECT name, id FROM categories ";
        $sql = "SELECT * FROM categories";
        $result= $connection->query($sql);
        $allData = [];
//        var_dump($result->fetch(PDO::FETCH_ASSOC));
//        var_dump($result->fetch(PDO::FETCH_ASSOC));
//        var_dump($result->fetch(PDO::FETCH_ASSOC));
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $allData[]=$row;
        }
//        var_dump($allData);
//        return $result->fetch(PDO::FETCH_ASSOC);
        return $allData;
    }
}