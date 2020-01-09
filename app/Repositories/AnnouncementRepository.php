<?php

namespace App\Repositories;

use App\Interfaces\AnnouncementInterface;
use App\Models\Announcement;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class AnnouncementRepository extends BaseRepository implements AnnouncementInterface
{
    public function __construct(Announcement $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listAnnouncements(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
        
    }
    public function listPage(int $pageNums = 5, string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {   
        return $this->paginate($pageNums, $columns, $order, $sort);
    }

    public function findAnnouncementById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }

    public function createAnnouncement(array $params)
    {
        try {
            $collection = collect($params);

            $title = $collection->has('title') ? $params['title'] : '';

            $announcement = new Announcement($collection->all());
            $announcement->save();
            return $announcement;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function deleteAnnouncement($id)
    {
        $announcement = $this->findAnnouncementById($id);

        $announcement->delete();

        return $announcement;
    }

    public function updateAnnouncement(array $params)
    {
        $announcement = $this->findAnnouncementById($params['id']);
        $collection = collect($params)->except('_token');

        $merge = $collection->merge($params['title'], $params['content']);
        $announcement->update($merge->all());
        return $announcement;
    }

    public function latestAnnouncement()
    {
        return Announcement::latest()->first();
    }
}
