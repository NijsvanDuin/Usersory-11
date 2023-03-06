<?php
class HomePages extends Controller
{

  public function index()
  {
    $sumtext = "1 + 2 = " . $this->add(1, 2);
    $data = [
      'title' => "Homepage MVC OOP Framework",
      'sumtext' => $sumtext
    ];
    $this->view('homepages/index', $data);
  }
  public function add($n1, $n2)
  {
    $a = $n1 + $n2;
    return $a;
  }
}
