<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\AnnouncementInterface;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    protected $announcementRepository;
    public function __construct(AnnouncementInterface $announcementRepository)
    {
        $this->announcementRepository = $announcementRepository;
    }

    public function index(Request $request)
    {
        if(!$request->has('sort')) {
            $request->sort = 'desc';
        }
        //$announcements = $this->announcementRepository->listAnnouncements('id', 'desc');
        $announcements = $this->announcementRepository->listPage(5, 'id', $request->sort);
        //$announcements = Announcement::()
        return view('site.pages.announcements', compact('announcements'));
    }
}
