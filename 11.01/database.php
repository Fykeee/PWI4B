<?php

namespace DB;

require_once "products.php";
require_once "users.php";

class Database
{
    private string $hostName;
    private string $userName;
    private string $userPassword;
    private string $databaseName;

    private \mysqli $db;

    public function __construct(string $hostName, string $userName, string $userPassword, string $databaseName)
    {
        $this->hostName = $hostName;
        $this->userName = $userName;
        $this->userPassword = $userPassword;
        $this->databaseName = $databaseName;
    }

    public function openConnection()
    {
        $db = new \mysqli(
            $this->hostName,
            $this->userName,
            $this->userPassword,
            $this->databaseName
        );
        $this->db = $db;
    }

    public function closeConnection()
    {
        $this->db->close();
        unset($this->db);
    }

    public function getAllData(string $tableName)
    {
        if (!$this->db->connect_error or isset($this->db)) {
            $query = sprintf("SELECT * FROM %s", $tableName);
            $result = $this->db->query($query);

            if ($result) {
                $data = [];

                while ($row = $result->fetch_assoc()) {
                    if ($tableName === 'products') {
                        $product = new Products(
                            $row['id'],
                            $row['ean'],
                            $row['name'],
                            $row['description'],
                            $row['price'],
                            $row['created_at'],
                            $row['updated_at'],
                            $row['deleted_at']
                        );
                        $data[] = $product;
                    } elseif ($tableName === 'users') {
                        $user = new Users();
                        $user->setId($row['id']);
                        $user->setEmail($row['email']);
                        $user->setPassword($row['password']);
                        $user->setFirstName($row['first_name']);
                        $user->setLastName($row['last_name']);
                        $data[] = $user;
                    }
                }

                return $data;
            }
        } else {
            echo("Error, db connection failed: " . $this->db->error);
            return false;
        }
    }

    public function getProductByGlowny(int $id)
    {
        if (!$this->db->connect_error or isset($this->db)) {
            $query = sprintf("SELECT * FROM products WHERE id = %d", $id);
            $result = $this->db->query($query);

            if ($result) {
                $row = $result->fetch_assoc();

                if ($row) {
                    return $this->productHelp($row);
                }
            }
        } else {
            echo("Error, db connection failed: " . $this->db->error);
            return false;
        }
    }

    public function getProductByEAN(string $ean)
    {
        if (!$this->db->connect_error or isset($this->db)) {
            $query = sprintf("SELECT * FROM products WHERE ean = '%s'", $ean);
            $result = $this->db->query($query);

            if ($result) {
                $row = $result->fetch_assoc();

                if ($row) {
                    return $this->productHelp($row);
                } else {
                    echo("Error, no results found: " . $this->db->error);
                    return false;
                }
            }
        }

        return null;
    }

    private function productHelp($row)
    {
        $product = new Products();
        $product->setId($row['id']);
        $product->setEan($row['ean']);
        $product->setName($row['name']);
        $product->setDescription($row['description']);
        $product->setPrice($row['price']);
        $product->setCreatedAt($row['created_at']);
        $product->setUpdatedAt($row['updated_at']);
        $product->setDeletedAt($row['deleted_at']);
        return $product;
    }
}
