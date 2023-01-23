<?php
class HomePages extends Controller
{

  public function index()
  {
    $data = [
      'title' => "Homepage MVC OOP Framework"
    ];
    $this->view('homepages/index', $data);
  }
}
