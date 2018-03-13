<?php
class Database extends PDO{

	public function __construct($dsn, $user, $pass){
		
		parent::__construct($dsn, $user, $pass);
	}

	public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC){
		$stmt = $this->prepare($sql);
		foreach ($data as $key => $value) {
			$stmt->bindParam($key, $value);
		}

		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function insert($table, $data){
		$keys   = implode(", ",array_keys($data));
		$values = ":".implode(", :", array_keys($data));

		$sql = "INSERT INTO $table ($keys) VALUES ($values)";
		$stmt = $this->prepare($sql);

		foreach ($data as $key => $value) {
			$stmt->bindValue(":$key", $value);
		}
		return $stmt->execute();
	}

	public function update($table, $data, $cond){
		$updatekeys = NULL;
		foreach ($data as $key => $value) {
			$updatekeys .= "$key=:$key,";
		}
		$updatekeys = rtrim($updatekeys, ",");

		$sql = "UPDATE $table SET $updatekeys WHERE $cond";
		$stmt = $this->prepare($sql);

		foreach ($data as $key => $value) {
			$stmt->bindValue(":$key", $value);
		}
		return $stmt->execute();
	}

	public function delete($table, $cond){
		$sql = "DELETE FROM $table WHERE $cond";
		return $this->exec($sql);
	}


	/* login access */
	public function affectRows($sql, $username, $password){
		$stmt = $this->prepare($sql);
		$stmt->execute(array($username, $password));
		return $stmt->rowCount();
	}

	/* login access */
	public function selectUser($sql, $username, $password){
		$stmt = $this->prepare($sql);
		$stmt->execute(array($username, $password));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>