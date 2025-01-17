<?php

namespace App\Models;

use App\Models\Model;
use DateTime;

class Post extends Model{

    protected $table = 'posts';


    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H:m');
    }

    public function getExcerpt(): string
    {
        return substr($this->content,0,200) . '...';
    }

    public function getButton(): string
    {
        return '<a href="' . SCRIPTs . '../posts/' . $this->id . '" class="btn btn-primary">Lire l\'article</a>';
    }

    public function getTags()
    {
        return $this->query("
            SELECT t.* FROM tags t 
            INNER JOIN post_tag pt ON pt.tag_id = t.id
            INNER JOIN posts p ON pt.post_id = p.id 
            WHERE p.id = ?
        ",[$this->id]);    
    }

    public function update(int $id, array $data, ?array $relations = null)
    {
        parent::update($id, $data);

        $stmt = $this->db->getPDO()->prepare("DELETE FROM post_tag WHERE post_id = ?");
        $result = $stmt->execute([$id]);

        foreach ($relations as $tagId) {
            $stmt = $this->db->getPDO()->prepare("INSERT INTO post_tag (post_id, tag_id) VALUES (?, ?)");
            $stmt->execute([$id, $tagId]);
        }

        if($result){
            return true;
        }
    }

    public function create(array $data, ?array $relations = null)
    {
        parent::create($data);
        $id = $this->db->getPDO()->lastInsertId();

        foreach ($relations as $tagId) {
            $stmt = $this->db->getPDO()->prepare("INSERT INTO post_tag (post_id, tag_id) VALUES (?, ?)");
            $stmt->execute([$id, $tagId]);
        }

        return true;

    }



}

