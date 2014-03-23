<?php 

class Friends_Model extends CI_Model
{
	public function add_friend($friend_info)
	{
		$query = "INSERT INTO friends (users_id, friend_id)
				  VALUES (?, ?)";
		$values = array($friend_info['user_id'], $friend_info['friend_id']);

		$this->db->query($query, $values);

		$query2 = "INSERT INTO friends (users_id, friend_id)
				   VALUES (?, ?)";
		$values2 = array($friend_info['friend_id'], $friend_info['user_id']);

		$this->db->query($query2, $values2);
	}

	public function get_friends_by_id($user_info)
	{
		$query = "SELECT id, first_name, last_name, email FROM users
				  LEFT JOIN friends ON friends.users_id = users.id
				  WHERE friends.friend_id = ?";
		$values = array($user_info['id']);

		return $this->db->query($query, $values)->result_array();
	}
}
 ?>