<?php
namespace App\Interfaces;

interface AnnouncementInterface
{
    public function listAnnouncements(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
    public function findAnnouncementById(int $id);
    public function createAnnouncement(array $params);
    public function deleteAnnouncement($id); 
    public function updateAnnouncement(array $params);
    public function latestAnnouncement();
    public function listPage(int $pageNums = 5, string $order = 'id', string $sort = 'desc', array $columns = ['*']);
}