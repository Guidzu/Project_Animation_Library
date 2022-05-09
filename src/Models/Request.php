<?php
declare(strict_types=1);
namespace App\Models;
use App\Models\Database;


 class Request extends ModelManager
{

     public function findByMail(string $Email)
    {
        $sql = 'SELECT id, Last_Name, First_Name, Email, Password, role from users WHERE Email = :Email';
        $param = [':Email' => $Email];
        return $this->findOne($sql, $param);
    }
   public function verifyMail(string $Email)
    {
        $sql = 'SELECT id from users WHERE Email = :Email';
        $param = [':Email' => $Email];
        return $this->countRow($sql, $param);
    }
    public function insertUser(string $Last_Name, string $First_Name, string $Email, string $Password): ?string
    {
        $sql = 'INSERT INTO users (Last_Name, First_Name, Email, Password)  VALUE ( :Last_Name, :First_Name, :Email, :Password )';
        $param = [
            ':Last_Name' => $Last_Name,
            ':First_Name' => $First_Name,
            ':Email' => $Email,
            ':Password' => password_hash($Password, PASSWORD_DEFAULT)
        ];
        return $this->baseSql($sql, $param);
    }
    public function findByCategory(string $category): array
    {
         $category = $category;
         $sql = 'SELECT id, category, name, html_content, css_content, created_at, gif FROM animations WHERE category = :category';
        $param = [':category' => $category];
        return $this->findAll($sql, $param);
    }
    public function findByDate(): array
    {
         $sql = 'SELECT created_at, gif, html_content, css_content, category, name FROM animations ORDER BY id DESC';
        return $this->findAll($sql);
    }
    public function insertAnimation(string $name, string $category, string $html_content, string $css_content, string $gif): ?string
    {
        $sql = 'INSERT INTO animations (name, category, html_content, css_content, gif)  VALUE ( :name, :category, :html_content, :css_content, :gif)';
        $param = [
            ':name' => $name,
            ':category' => $category,
            ':html_content' => $html_content,
            ':css_content' => $css_content,
            ':gif' => $gif
        ];
        return $this->baseSql($sql, $param);
    }
    // public function deleteAnimation(): array
    // {
    //      $sql = 'DELETE FROM `animations` WHERE id = id';
    //     return $this->delete($sql);
    // }
    public function countLike(): int
    {
        $sql = 'Select count FROM like_count';
        return $this->baseSql($sql);
    }
    // public function addLike(): int
    // {
    //     $sql = 'UPDATE Like_Count set `Likes_count` = `Likes_count`+1';
    //     return $this->baseSql($sql);
    // }
}