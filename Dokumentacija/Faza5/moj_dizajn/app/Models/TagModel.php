<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class TagModel extends Model
{
        protected $table      = 'tag';
        protected $primaryKey = 'idTag';
        protected $returnType = 'object';
        protected $useAutoIncrement = true;
        protected $allowedFields = [];
       

        public function ubaciTag($tag)
        {
                $this->db->query("INSERT IGNORE INTO `tag`
                SET `idTag` = '$tag'");
        }
}