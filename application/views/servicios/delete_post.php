<?php
$id = $this->input->post('id',true);
$this->db->where('id',$id);
$query = $this->db->delete('blog');
if($query)
{
    print json_encode(['res'=>'ok']);
}else{
    print json_encode(['res'=>'bad']);
}