<?php declare(strict_types=1);
namespace App\Presenters;

use Nette\Application\UI\Presenter;
class ProjectPresenter extends Presenter
{

    private $projects;

    public function __construct()
    {
        parent::__construct();
        $this->projects = [
            1=>[
                "id"=>"1",
                "title"=>"Project 1",
                "content"=>"Content",
                "image"=>"https://via.placeholder.com/100"
            ],
            2=>[
                "id"=>"2",
                "title"=>"Project 2",
                "content"=>"Content",
                "image"=>"https://via.placeholder.com/100"
            ]
        ];
    }

    public function actionDefault(): void
    {
        $this->template->projects = $this->projects;
    }

    public  function actionView($id): void
    {
        $project = $this->projects[$id];
        if (!$project) {
            $this->flashMessage("Projekt neexistuje.", "error");
            $this->redirect("Project:default");
        }
        $this->template->project = $project;
    }
}