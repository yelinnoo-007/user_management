<?php

namespace Libs\Database;

use PDOException;

class UsersTable
{
	private $db = null;

	public function __construct(MySQL $db)
	{
		$this->db = $db->connect();
	}

	public function insert($data)
	{
		try {
			$query = " INSERT INTO users (name, email, phone, address, password, role_id, created_at) VALUES (:name, :email, :phone, :address, :password, :role_id, NOW())";

			$statement = $this->db->prepare($query);
			$statement->execute($data);

			return $this->db->lastInsertId();
		} catch (PDOException $e) {
			return $e->getMessage()();
		}
	}

	public function getAll()
	{
		$statement = $this->db->query("
            SELECT users.*, roles.name AS role, roles.value
            FROM users LEFT JOIN roles
            ON users.role_id = roles.id
        ");

		return $statement->fetchAll();
	}

	public function findByEmailAndPassword($email,$password){
		$statement = $this->db->prepare("
		select users.*,roles.name as role, roles.value
		from users left join roles
		on users.role_id=roles.id
		where users.email=:email
		and users.password=:password");
		$statement->execute([
			'email' => $email,
			'password' => $password,
		]);
		
		$row = $statement->fetch();
		return $row ?? false;
	}

	public function suspended($id)
	{
		$statement = $this->db->prepare("
            SELECT suspended FROM users WHERE id = :id
        ");
		$statement->execute([':id' => $id]);
		$row = $statement->fetch();
		return $row->suspended;
	}

	public function updatePhoto($id,$name){
		$statement = $this->db->prepare("update users set photo=:name where id=:id");
		$statement->execute([
			':name' => $name,
			':id' => $id,
		]);
		return $statement->rowCount();
	}

	public function suspend($id){
		$statement = $this->db->prepare("update users set suspended=1 where id = :id");
		$statement->execute([
			':id' => $id,
		]);
		return $statement->rowCount();
	}

	public function unsuspend($id){
		$statement = $this->db->prepare("update users set suspended=0 where id = :id");
		$statement->execute([
			':id' => $id,
		]);
		return $statement->rowCount();
	}

	public function changeRole($id, $role){
		$statement = $this->db->prepare("update users set role_id = :role where id = :id");
		$statement->execute([
			':role' => $role,
			':id' => $id,
		]);
		return $statement->rowCount();
	}

	public function delete($id){
		$statement = $this->db->prepare("delete from users where id = :id");
		$statement->execute([
			':id' => $id,
		]);
		return $statement->rowCount();
	}
}