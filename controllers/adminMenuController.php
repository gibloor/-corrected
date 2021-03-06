<?
class adminMenuController extends Controller
{
    private $pageTpl = '/views/adminMenu.tpl.php';

    public function __construct()
    {
        $this->model = new adminMenuModel();
        $this->view = new View();
    }

    public function index()
    {
        $results = $this->model->getUsers();
  	    $this->pageData['results'] = $results;

        $results = $this->model->getBooks();
        $this->pageData['resultz'] = $results;


        if (isset($_POST['typeissue'])){
            $user = $this->model->getLoginId($_POST["login"]);
            $book = $this->model->getBookId($_POST['nameBook']);
            $this->model->addOrderBook();
        }

    $this->pageData['title'] = "Заказы";
    $this->view->render($this->pageTpl, $this->pageData);
    }
}
