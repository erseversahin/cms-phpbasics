<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelHome extends BaseModel
{

    public function getTotals()
    {

        return ['totals' => $this->db->query('SELECT (SELECT COUNT(c.id) FROM customers c) as total_customer, 
                                            (SELECT COUNT(p.id) FROM projects p) as total_project,
                                            (SELECT COUNT(s.id) FROM system_users s) as system_users;', false) ?? [],
                'projects' => $this->db->query('SELECT COUNT(p.id) as total, status FROM projects p GROUP BY p.status', true) ?? []

                ];

    }

}