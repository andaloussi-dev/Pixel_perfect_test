<?php

namespace App\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Customer\Repositories\CustomerRepository;
use  App\Admin\Repositories\AdminRepository;

class apiCustomerController extends Controller
{
    private $CustomerRepository;
    
    public function __construct(CustomerRepository $CustomerRepository){
            $this->CustomerRepository=$CustomerRepository;
    }

    public function index()
    {
        $this->authorize('index');
        return $this->CustomerRepository->all();
    }

    public function create(IssueRequest $request,IssueCreated $issueCreated)
    {
        $this->authorize('create');
        $this->CustomerRepository->create($request->all());
        $issueCreated->toMail(auth()->admins());
    }

    public function show($id)
    {
        $issue = $this->CustomerRepository->show($id);
        $this->authorize('show',$issue);
        return $issue;
    }

}