<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

use App\Interfaces\AnnouncementInterface;

class AnnouncementController extends BaseController
{
    protected $announcementRepository;

    public function __construct(AnnouncementInterface $announcementRepository)
    {
        $this->announcementRepository = $announcementRepository;
    }

    public function index()
    {
        $announcements = $this->announcementRepository->listAnnouncements();

        $this->setPageTitle('Announcements', 'List of all announcements');
        return view('admin.announcements.index', compact('announcements'));
    }
    public function create()
    {
        $this->setPageTitle('Announcements', 'Create Announcement');
        return view('admin.announcements.create');
    }

    public function delete($id)
    {
        $announcement = $this->announcementRepository->deleteAnnouncement($id);
        if (!$announcement) {
            return $this->responseRedirectBack('Error occured while deletingf announcement.', 'error', true, true);
        }
        return $this->responseRedirect('admin.announcements.index', 'Announcement deleted successfully', 'success', false, false);
    }


    public function edit($id)
    {
        $announcement = $this->announcementRepository->findAnnouncementById($id);

        $this->setPageTitle('Announcements', 'Edit Announcement : ' . $announcement->title);
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function store(Request $request)
    {

        
        $this->validate($request, [
            'title'                 =>  'required',
            'content'               =>  'required'
        ]);

        $params = $request->except('_token');

        $announcement = $this->announcementRepository->createAnnouncement($params);

        if (!$announcement) {
            error_log('Something wrong here at creating announcement'.'\n'   );
            return $this->responseRedirectBack('Error occurred while creating Announcement.', 'error', true, true);
        }
        error_log('Something went right here at creating announcement'.'\n'   );
        return $this->responseRedirect('admin.announcements.index', 'Announcement added successfully', 'success', false, false);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title'                 =>  'required',
            'content'               =>  'required'
        ]);

        $params = $request->except('_token');

        $announcement = $this->announcementRepository->updateAnnouncement($params);

        if (!$announcement) {
            return $this->responseRedirectBack('Error occurred while updating Announcement.', 'error', true, true);
        }
        return $this->responseRedirectBack('Announcement updated successfully', 'success', false, false);
    }
}
