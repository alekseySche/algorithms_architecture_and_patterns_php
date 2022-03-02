<?php

declare(strict_types = 1);

namespace Model\Repository;

use Model\Entity;

class User
{
    private $identityMap = [];
    public function getById(int $id): ?Entity\User
    {
        foreach ($this->getDataFromSource(['id' => $id]) as $user) {
            if (isset($this->identityMap[$id])) {
                return $this->identityMap[$id];
            }
            $userObj = $this->createUser($user);
            $this->identityMap[$id] = $userObj;
            return $userObj;
        }

        return null;
    }

    public function getByLogin(string $login): ?Entity\User
    {
        foreach ($this->getDataFromSource(['login' => $login]) as $user) {
            if ($user['login'] === $login) {
                return $this->createUser($user);
            }
        }

        return null;
    }

    private function createUser(array $user): Entity\User
    {
        $role = $user['role'];

        return new Entity\User(
            $user['id'],
            $user['name'],
            $user['login'],
            $user['password'],
            new Entity\Role($role['id'], $role['title'], $role['role'])
        );
    }

    private function getDataFromSource(array $search = [])
    {
        $admin = ['id' => 1, 'title' => 'Super Admin', 'role' => 'admin'];
        $user = ['id' => 1, 'title' => 'Main user', 'role' => 'user'];
        $test = ['id' => 1, 'title' => 'For test needed', 'role' => 'test'];

        $dataSource = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'login' => 'root',
                'password' => '$2y$10$GnZbayyccTIDIT5nceez7u7z1u6K.znlEf9Jb19CLGK0NGbaorw8W', 
                'role' => $admin
            ],
            [
                'id' => 2,
                'name' => 'Doe John',
                'login' => 'doejohn',
                'password' => '$2y$10$j4DX.lEvkVLVt6PoAXr6VuomG3YfnssrW0GA8808Dy5ydwND/n8DW', 
                'role' => $user
            ],
            [
                'id' => 3,
                'name' => 'Ivanov Ivan Ivanovich',
                'login' => 'i**extends',
                'password' => '$2y$10$TcQdU.qWG0s7XGeIqnhquOH/v3r2KKbes8bLIL6NFWpqfFn.cwWha', 
                'role' => $user
            ],
            [
                'id' => 4,
                'name' => 'Test Testov Testovich',
                'login' => 'testok',
                'password' => '$2y$10$vQvuFc6vQQyon0IawbmUN.3cPBXmuaZYsVww5csFRLvLCLPTiYwMa', 
                'role' => $test
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return (bool) array_intersect($dataSource, $search);
        };

        return array_filter($dataSource, $productFilter);
    }
}