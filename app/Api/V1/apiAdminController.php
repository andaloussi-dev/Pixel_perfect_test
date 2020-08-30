<?php

namespace App\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Admin\Repositories\AdminRepository;

class apiAdminController extends Controller
{
    private $AdminRepository;
    
    public function __construct(AdminRepository $AdminRepository){
            $this->AdminRepository=$AdminRepository;
    }

    public function index()
    {
        $this->authorize('index');
        return $this->AdminRepository->all();
    }

    public function show($îd)
    {
        $this->authorize('show');
        return $this->AdminRepository->show($id);
    }

    public function update(IssueRequest $request,IssueUpdated $issueUpdated,$id)
    {
        $this->authorize('update');
        $issue = $this->AdminRepository->update($request->all(),$id);
        // sending the mail to the user
        $issueUpdated->toMail(auth()->admins()->merge($issue->user),$issue->title);
    }

    public function destroy($id)
    {
        $this->authorize('destory');
        $this->AdminRepository->delete($id);
    }

}