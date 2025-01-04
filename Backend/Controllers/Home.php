<!---Archivo Home.php-->
<?php 
class Home extends Controller
{
  public function index()
  {
   $this->views->getview($this, "index");
  }
}
?>