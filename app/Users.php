<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['id', 'username', 'password', 'role_id', 'avatar', 'realname', 'info'];
    protected $beforeInsert   = ['hashPassword'];
    protected $beforeUpdate   = ['hashPassword'];
    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) {
        return $data;
        } else {
        $password = $data['data']['password'];
        $data['data']['password'] = password_hash($password, PASSWORD_BCRYPT);
        return $data;
        }
    }
}
