<?php

$this->db->select('password, id');
$this->db->where('update_password','1');
$query = $this->db->get('users');
if ($query->num_rows()>0) {
  $query=$query->result();

  foreach ($query as $k => $q) {
    $new_password = password_hash($q->password,PASSWORD_DEFAULT);
    $data = ['password'=>$new_password, 'update_password'=>'0'];
    $this->db->where('id', $q->id);
    $this->db->update('users', $data);
  }
}