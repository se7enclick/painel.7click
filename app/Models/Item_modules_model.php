<?php

namespace App\Models;

class Item_modules_model extends Crud_model {

    protected $table = null;

    function __construct() {
        $this->table = 'item_modules';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $item_modules_table = $this->db->prefixTable('item_modules');
        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where = " AND $item_modules_table.id=$id";
        }

        $sql = "SELECT $item_modules_table.*
        FROM $item_modules_table
        WHERE $item_modules_table.deleted=0 $where";
        return $this->db->query($sql);
    }

}
